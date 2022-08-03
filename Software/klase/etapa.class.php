<?php
    class Stage {
        function __construct() {
            $this->db = new DB();
        }

        public function create_stage($name, $start_date, $race_id) {
            $conn = $this->db->connect();

            $sql = "INSERT INTO etapa (naziv, vrijeme_pocetka, zavrsena, utrka_utrka_id) VALUES (?, ?, 0, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $start_date, $race_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function update_stage($stage_id, $name, $start_date, $race_id) {
            $conn = $this->db->connect();

            $sql = "UPDATE etapa SET naziv = ?, vrijeme_pocetka = ?, utrka_utrka_id = ? WHERE etapa_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $start_date, $race_id, $stage_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function close_stage($stage_id) {
            $conn = $this->db->connect();

            $sql = "UPDATE etapa SET zavrsena = 1 WHERE etapa_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $stage_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function select_num_of_stages() {
            $conn = $this->db->connect();

            $sql = "SELECT * FROM etapa";
            $stages = $conn->query($sql);

            $this->db->disconnect();
            return mysqli_num_rows($stages);
        }

        public function select_all_stages_formatted($page, $num_of_results, $orderby = false, $user_id = null) {
            $start_row = ($page - 1) * $num_of_results;

            if ($user_id != null) {
                $sql = "SELECT e.etapa_id, e.naziv, e.vrijeme_pocetka, e.zavrsena, u.naziv as 'utrka'
                        FROM etapa e
                        INNER JOIN utrka u ON e.utrka_utrka_id = u.utrka_id
                        INNER JOIN moderira m ON m.drzava_drzava_id = u.drzava_drzava_id AND m.korisnik_korisnik_id = $user_id
                        ORDER BY e.etapa_id
                        LIMIT $start_row, $num_of_results";
            } else {
                $sql = "SELECT e.etapa_id, e.naziv, e.vrijeme_pocetka, e.zavrsena, u.naziv as 'utrka'
                        FROM etapa e
                        INNER JOIN utrka u ON e.utrka_utrka_id = u.utrka_id
                        ORDER BY e.etapa_id
                        LIMIT $start_row, $num_of_results";
            }

            $conn = $this->db->connect();
            $races = $conn->query($sql);
            $this->db->disconnect();

            return $races;
        }

        public function select_stage($stage_id) {
            $conn = $this->db->connect();

            $sql = "SELECT * FROM etapa WHERE etapa_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $stage_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
            }

            $result = $stmt->get_result();
            $this->db->disconnect();

            while ($row = $result->fetch_object()) {
                if ($row) return $row;
            }

            return false;
        }

        public function save_result($user_id, $stage_id, $time, $finished) {
            $conn = $this->db->connect();
            
            $sql = "INSERT INTO rezultat (korisnik_korisnik_id, etapa_etapa_id, vrijeme, zavrsio) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $user_id, $stage_id, $time, $finished);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();
            return true;
        }

        public function select_results_per_stage($stage_id) {
            $conn = $this->db->connect();
            $results = $conn->query("SELECT * FROM rezultat WHERE etapa_etapa_id = $stage_id ORDER BY IF (vrijeme = '00:00:00', '99:99:99', vrijeme)");
            $this->db->disconnect();

            $results_data = array();
            while ($row = $results->fetch_object()) {
                if ($row) {
                    array_push($results_data, [
                        "user_id" => $row->korisnik_korisnik_id,
                        "stage_id" => $row->etapa_etapa_id,
                        "time" => $row->vrijeme,
                        "points" => $row->bodovi,
                        "finished" => $row->zavrsio
                    ]);
                }
            }

            return $results_data;
        }

        public function select_results_per_stage_formatted($stage_id, $page, $num_of_results) {
            $start_row = ($page - 1) * $num_of_results;

            $conn = $this->db->connect();
            $sql = "SELECT DISTINCT k.korisnicko_ime, u.naziv as 'utrka', r.vrijeme, r.bodovi, p.slika
                    FROM rezultat r 
                    INNER JOIN korisnik k ON k.korisnik_id = r.korisnik_korisnik_id
                    INNER JOIN etapa e ON e.etapa_id = r.etapa_etapa_id
                    INNER JOIN utrka u ON u.utrka_id = e.utrka_utrka_id
                    INNER JOIN prijavio p ON p.korisnik_korisnik_id = k.korisnik_id
                    WHERE etapa_etapa_id = $stage_id
                    ORDER BY IF (r.vrijeme = '00:00:00', '99:99:99', r.vrijeme) 
                    LIMIT $start_row, $num_of_results";
            $results = $conn->query($sql);
            $this->db->disconnect();

            return $results;
        }

        public function select_num_of_results_per_stage($stage_id) {
            $conn = $this->db->connect();
            $results = $conn->query("SELECT * FROM rezultat WHERE etapa_etapa_id = $stage_id");
            $this->db->disconnect();

            return mysqli_num_rows($results);
        }

        public function update_points($results) {
            $first_place = empty($results[0]) ? null : $results[0];
            $second_place = empty($results[1]) ? null : $results[1];
            $third_place = empty($results[2]) ? null : $results[2];

            $conn = $this->db->connect();
            if ($first_place != null && $first_place["finished"] != 0) 
                $conn->query("UPDATE rezultat SET bodovi = 100, pobjednik = 1 WHERE korisnik_korisnik_id = ".$first_place["user_id"]." AND etapa_etapa_id = ".$first_place["stage_id"]);
            if ($second_place != null && $second_place["finished"] != 0) 
                $conn->query("UPDATE rezultat SET bodovi = 50 WHERE korisnik_korisnik_id = ".$second_place["user_id"]." AND etapa_etapa_id = ".$second_place["stage_id"]);
            if ($third_place != null && $third_place["finished"] != 0) 
                $conn->query("UPDATE rezultat SET bodovi = 10 WHERE korisnik_korisnik_id = ".$third_place["user_id"]." AND etapa_etapa_id = ".$third_place["stage_id"]);

            $this->db->disconnect();
        }

        public function check_finished_competitors($stage_id) {
            $sql_p = "SELECT COUNT(*) as 'broj_prijava' FROM prijavio p
                    INNER JOIN utrka u ON u.utrka_id = p.utrka_utrka_id
                    INNER JOIN etapa e ON e.utrka_utrka_id = u.utrka_id
                    WHERE e.etapa_id = $stage_id";
            
            $sql_r = "SELECT COUNT(*) as 'broj_rezultata' FROM rezultat r
                    WHERE r.etapa_etapa_id = $stage_id";

            $conn = $this->db->connect();
            $result_p = $conn->query($sql_p);
            $result_r = $conn->query($sql_r);
            $this->db->disconnect();

            $num_signed = 0;
            $num_results = 0;

            while ($row = $result_p->fetch_object()) {
                if ($row) $num_signed = $row->broj_prijava;
            }

            while ($row = $result_r->fetch_object()) {
                if ($row) $num_results = $row->broj_rezultata;
            }

            return $num_signed === $num_results;
        }

        public function select_winners($page, $num_of_results) {
            $start_row = ($page - 1) * $num_of_results;
            $sql = "SELECT DISTINCT k.ime, k.prezime, p.slika, e.naziv as 'etapa', u.naziv as 'utrka', d.naziv as 'drzava'
                    FROM rezultat r
                    INNER JOIN korisnik k ON k.korisnik_id = r.korisnik_korisnik_id
                    INNER JOIN prijavio p ON p.korisnik_korisnik_id = r.korisnik_korisnik_id
                    INNER JOIN etapa e ON e.etapa_id = r.etapa_etapa_id
                    INNER JOIN utrka u ON u.utrka_id = e.utrka_utrka_id
                    INNER JOIN drzava d ON d.drzava_id = u.drzava_drzava_id
                    WHERE r.pobjednik = 1
                    LIMIT $start_row, $num_of_results";

            $conn = $this->db->connect();
            $results = $conn->query($sql);
            $this->db->disconnect();

            return $results;
        }

        public function select_num_of_winners($sort = null) {
            if ($sort != null) {
                $sql = "SELECT DISTINCT k.ime, k.prezime, p.slika, e.naziv as 'etapa', u.naziv as 'utrka', d.naziv as 'drzava'
                        FROM rezultat r
                        INNER JOIN korisnik k ON k.korisnik_id = r.korisnik_korisnik_id
                        INNER JOIN prijavio p ON p.korisnik_korisnik_id = r.korisnik_korisnik_id
                        INNER JOIN etapa e ON e.etapa_id = r.etapa_etapa_id
                        INNER JOIN utrka u ON u.utrka_id = e.utrka_utrka_id
                        INNER JOIN drzava d ON d.drzava_id = u.drzava_drzava_id
                        WHERE r.pobjednik = 1
                        ORDER BY $sort";
            } else {
                $sql = "SELECT DISTINCT k.ime, k.prezime, p.slika, e.naziv as 'etapa', u.naziv as 'utrka', d.naziv as 'drzava'
                        FROM rezultat r
                        INNER JOIN korisnik k ON k.korisnik_id = r.korisnik_korisnik_id
                        INNER JOIN prijavio p ON p.korisnik_korisnik_id = r.korisnik_korisnik_id
                        INNER JOIN etapa e ON e.etapa_id = r.etapa_etapa_id
                        INNER JOIN utrka u ON u.utrka_id = e.utrka_utrka_id
                        INNER JOIN drzava d ON d.drzava_id = u.drzava_drzava_id
                        WHERE r.pobjednik = 1";
            }

            $conn = $this->db->connect();
            $results = $conn->query($sql);
            $this->db->disconnect();

            return mysqli_num_rows($results);
        }

        public function select_finished_stages($page, $num_of_results, $time_from = null, $time_to = null) {
            $start_row = ($page - 1) * $num_of_results;
            $sql = "SELECT k.korisnicko_ime, COUNT(r.etapa_etapa_id) as 'broj_etapa'
                    FROM rezultat r
                    INNER JOIN korisnik k ON k.korisnik_id = r.korisnik_korisnik_id
                    WHERE r.zavrsio = 1
                    GROUP BY r.korisnik_korisnik_id
                    ORDER BY COUNT(r.etapa_etapa_id) DESC
                    LIMIT $start_row, $num_of_results";
            
            $conn = $this->db->connect();
            $results = $conn->query($sql);
            $this->db->disconnect();

            return $results;
        }

        public function select_num_of_finished_stages() {
            $sql = "SELECT k.korisnicko_ime, COUNT(r.etapa_etapa_id)
                    FROM rezultat r
                    INNER JOIN korisnik k ON k.korisnik_id = r.korisnik_korisnik_id
                    WHERE r.zavrsio = 1
                    GROUP BY r.korisnik_korisnik_id";
            
            $conn = $this->db->connect();
            $results = $conn->query($sql);
            $this->db->disconnect();

            return mysqli_num_rows($results);
        }
    }