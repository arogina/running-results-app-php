<?php
    class Race {
        function __construct() {
            $this->db = new DB();
        }

        public function create_race($name, $due_date, $race_type, $country) {
            $conn = $this->db->connect();

            $sql = "INSERT INTO utrka (naziv, rok_prijave, zavrsena, tip_utrke_tip_utrke_id, drzava_drzava_id) VALUES (?, ?, 0, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $due_date, $race_type, $country);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();
            return true;
        }

        public function update_race($race_id, $name, $due_date, $race_type, $country) {
            $conn = $this->db->connect();

            $sql = "UPDATE utrka SET naziv = ?, rok_prijave = ?, tip_utrke_tip_utrke_id = ?, drzava_drzava_id = ? WHERE utrka_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $due_date, $race_type, $country, $race_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();
            return true;
        }

        public function close_race($race_id) {
            $conn = $this->db->connect();

            $sql = "UPDATE utrka SET zavrsena = 1 WHERE utrka_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $race_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function select_all_races($user_id = null) {
            $sql = "";
            if ($user_id === null) {
                $sql = "SELECT * FROM utrka";
            } else {
                $sql = "SELECT u.utrka_id, u.naziv, u.rok_prijave, u.zavrsena 
                        FROM utrka u, moderira m
                        WHERE u.drzava_drzava_id = m.drzava_drzava_id AND m.korisnik_korisnik_id = $user_id";
            }

            $conn = $this->db->connect();
            $races = $conn->query($sql);
            $this->db->disconnect();

            return $races;
        }

        public function select_all_active_races($user_id = null) {
            $sql = "";
            if ($user_id === null) {
                $sql = "SELECT * FROM utrka WHERE zavrsena = 0";
            } else {
                $sql = "SELECT u.utrka_id, u.naziv, u.rok_prijave, u.zavrsena 
                        FROM utrka u, moderira m
                        WHERE u.drzava_drzava_id = m.drzava_drzava_id AND m.korisnik_korisnik_id = $user_id AND u.zavrsena = 0";
            }

            $conn = $this->db->connect();
            $races = $conn->query($sql);
            $this->db->disconnect();

            return $races;
        }

        public function select_race($race_id) {
            $sql = "SELECT * FROM utrka WHERE utrka_id = ?";

            $conn = $this->db->connect();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $race_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            while ($row = $result->fetch_object()) {
                if ($row) return $row;
            } 

            return $result;
        }

        public function select_all_races_formatted($page, $num_of_results, $orderby = false, $user_id = null) {
            $start_row = ($page - 1) * $num_of_results;
            $sql = "";

            if ($user_id != null) {
                $sql = "SELECT u.utrka_id, u.naziv, u.rok_prijave, u.zavrsena, t.naziv as 'tip_utrke', d.naziv as 'drzava'
                        FROM utrka u
                        INNER JOIN tip_utrke t ON t.tip_utrke_id = u.tip_utrke_tip_utrke_id
                        INNER JOIN drzava d ON d.drzava_id = u.drzava_drzava_id
                        INNER JOIN moderira m ON m.drzava_drzava_id = u.drzava_drzava_id AND m.korisnik_korisnik_id = $user_id
                        ORDER BY u.utrka_id
                        LIMIT $start_row, $num_of_results";
            } else {
                $sql = "SELECT u.utrka_id, u.naziv, u.rok_prijave, u.zavrsena, t.naziv as 'tip_utrke', d.naziv as 'drzava'
                        FROM utrka u
                        INNER JOIN tip_utrke t ON t.tip_utrke_id = u.tip_utrke_tip_utrke_id
                        INNER JOIN drzava d ON d.drzava_id = u.drzava_drzava_id
                        ORDER BY u.utrka_id
                        LIMIT $start_row, $num_of_results";
            }

            $conn = $this->db->connect();
            $races = $conn->query($sql);
            $this->db->disconnect();

            return $races;
        }

        public function get_num_of_races() {
            $sql = "SELECT * FROM utrka";

            $conn = $this->db->connect();
            $races = $conn->query($sql);
            $this->db->disconnect();

            return mysqli_num_rows($races);
        }

        public function get_upcoming_races($page, $num_of_results) {
            $start_row = ($page - 1) * $num_of_results;
            $curr_date = date("Y-m-d");

            $sql = "SELECT u.utrka_id, u.naziv, u.rok_prijave, t.naziv as 'tip_utrke', d.naziv as 'drzava'
                    FROM utrka u
                    INNER JOIN tip_utrke t ON t.tip_utrke_id = u.tip_utrke_tip_utrke_id
                    INNER JOIN drzava d ON d.drzava_id = u.drzava_drzava_id
                    WHERE DATE(u.rok_prijave) > DATE('$curr_date')
                    ORDER BY u.utrka_id
                    LIMIT $start_row, $num_of_results";

            $conn = $this->db->connect();
            $races = $conn->query($sql);
            $this->db->disconnect();

            return $races;
        }

        public function get_num_of_upcoming_races() {
            $curr_date = date("Y-m-d");
            $sql = "SELECT * FROM utrka WHERE DATE(rok_prijave) > DATE('$curr_date')";

            $conn = $this->db->connect();
            $races = $conn->query($sql);
            $this->db->disconnect();

            return mysqli_num_rows($races);
        }

        public function sign_user_on_race($user_id, $race_id, $birth_date, $picture) {
            $conn = $this->db->connect();

            $current_date = date("Y-m-d");
            $stmt = $conn->prepare("INSERT INTO prijavio (korisnik_korisnik_id, utrka_utrka_id, datum_prijave, godina_rodenja, slika) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $user_id, $race_id, $current_date, $birth_date, $picture);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function update_signed_race($user_id, $race_id, $birth_date, $picture) {
            $conn = $this->db->connect();

            $current_date = date("Y-m-d");
            $stmt = $conn->prepare("UPDATE prijavio SET godina_rodenja = ?, slika = ? WHERE korisnik_korisnik_id = ? AND utrka_utrka_id = ?");
            $stmt->bind_param("ssss", $birth_date, $picture, $user_id, $race_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function get_signed_races($user_id, $page, $num_of_results) {
            $conn = $this->db->connect();
            $start_row = ($page - 1) * $num_of_results;

            $sql = "SELECT u.naziv, u.utrka_id, p.datum_prijave, p.godina_rodenja, p.slika
                    FROM prijavio p
                    INNER JOIN utrka u ON u.utrka_id = p.utrka_utrka_id
                    WHERE p.korisnik_korisnik_id = ? LIMIT $start_row, $num_of_results";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            return $result;
        }

        public function get_num_of_signed_races($user_id) {
            $conn = $this->db->connect();

            $sql = "SELECT u.naziv, u.utrka_id, p.datum_prijave, p.godina_rodenja, p.slika
                    FROM prijavio p
                    INNER JOIN utrka u ON u.utrka_id = p.utrka_utrka_id
                    WHERE p.korisnik_korisnik_id = ?";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            return mysqli_num_rows($result);
        }

        public function get_signed_race($user_id, $race_id) {
            $conn = $this->db->connect();

            $sql = "SELECT * FROM prijavio WHERE korisnik_korisnik_id = ? AND utrka_utrka_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $user_id, $race_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            while ($row = $result->fetch_object()) {
                if ($row) return $row->godina_rodenja;
            }

            return false;
        }

        public function select_race_types() {
            $sql = "SELECT * FROM tip_utrke";
            
            $conn = $this->db->connect();
            $types = $conn->query($sql);
            $this->db->disconnect();

            return $types;
        }

        public function check_stages() {
            $sql = "SELECT DISTINCT u.utrka_id 
                    FROM utrka u
                    INNER JOIN etapa e ON e.utrka_utrka_id = u.utrka_id
                    WHERE e.zavrsena = 0";

            $conn = $this->db->connect();
            $result = $conn->query($sql);
            $this->db->disconnect();

            return $result;
        }
    }