<?php
    class User {
        function __construct() {
            $this->db = new DB();
        }

        public function select_all_users() {
            $sql = "SELECT * from korisnik";

            $conn = $this->db->connect();
            $users = $conn->query($sql);
            $this->db->disconnect();

            return $users;
        }

        public function insert_user($name, $surname, $username, $email, $password, $sha256_password, $salt, $terms) {
            $activation_code = bin2hex(random_bytes(4));

            $mailto = $email;
            $mailfrom = "trcanjemail@mail.com";
            $mail_subject = "Account Activation - Trčanje";
            $mail_body = "Your activation code is $activation_code .";

            $conn = $this->db->connect();
            $stmt = $conn->prepare("INSERT INTO korisnik (ime, prezime, korisnicko_ime, email, lozinka, lozinka_sha256, sol, uvjeti_koristenja, aktivacijski_kod) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssss", $name, $surname, $username, $email, $password, $sha256_password, $salt, $terms, $activation_code);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function check_username($username) {
            $conn = $this->db->connect();

            $stmt = $conn->prepare("SELECT * FROM korisnik WHERE korisnicko_ime = ?");
            $stmt->bind_param("s", $username);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            while($row = $result->fetch_object()) {
                if ($row) return [
                    "id" => $row->korisnik_id,
                    "salt" => $row->sol, 
                    "sha256_password" => $row->lozinka_sha256
                ];
            }

            return false;
        }

        public function check_user($username, $password)  {
            $conn = $this->db->connect();

            $stmt = $conn->prepare("SELECT * FROM korisnik WHERE korisnicko_ime = ? AND lozinka = ?");
            $stmt->bind_param("ss", $username, $password);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            while ($row = $result->fetch_object()) {
                if ($row) return [
                    "id" => $row->korisnik_id,
                    "role" => $row->tip_korisnika_tip_korisnika_id, 	
                    "salt" => $row->sol, 
                    "sha256_password" => $row->lozinka_sha256,
                    "blocked" => $row->blokiran
                ];
            }

            return false;
        }

        public function block_user($user_id) {
            $conn = $this->db->connect();

            $stmt = $conn->prepare("UPDATE korisnik SET blokiran = 1 WHERE korisnik_id = ?");
            $stmt->bind_param("s", $user_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function select_signed_races($stage_id, $page, $num_of_results) {
            $conn = $this->db->connect();
            $start_row = ($page - 1) * $num_of_results;

            $sql = "SELECT k.korisnik_id, k.korisnicko_ime, u.naziv as 'utrka', p.datum_prijave, p.godina_rodenja, p.slika
                    FROM prijavio p
                    INNER JOIN utrka u ON u.utrka_id = p.utrka_utrka_id
                    INNER JOIN korisnik k ON k.korisnik_id = p.korisnik_korisnik_id
                    INNER JOIN etapa e ON e.utrka_utrka_id = u.utrka_id
                    WHERE e.etapa_id = ?
                    LIMIT $start_row, $num_of_results";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $stage_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            return $result;
        }

        public function select_num_of_signed_races($stage_id) {
            $conn = $this->db->connect();

            $sql = "SELECT k.korisnicko_ime, u.naziv as 'utrka', p.datum_prijave, p.godina_rodenja, p.slika
                    FROM prijavio p
                    INNER JOIN utrka u ON u.utrka_id = p.utrka_utrka_id
                    INNER JOIN korisnik k ON k.korisnik_id = p.korisnik_korisnik_id
                    INNER JOIN etapa e ON e.utrka_utrka_id = u.utrka_id
                    WHERE e.etapa_id = ?";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $stage_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            return mysqli_num_rows($result);
        }
    }