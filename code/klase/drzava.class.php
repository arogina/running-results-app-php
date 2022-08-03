<?php
    class Country {
        function __construct() {
            $this->db = new DB();
        }

        public function create_country($name, $label, $continent) {
            $conn = $this->db->connect();

            $sql = "INSERT INTO drzava (naziv, oznaka, kontinent) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $label, $continent);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function select_all_countries() {
            $sql = "SELECT * FROM drzava";

            $conn = $this->db->connect();
            $countries = $conn->query($sql);
            $this->db->disconnect();

            return $countries;
        }

        public function select_all_countries_formatted($page, $num_of_results) {
            $conn = $this->db->connect();
            $start_row = ($page - 1) * $num_of_results;

            $sql = "SELECT * FROM drzava LIMIT $start_row, $num_of_results";
            $countries = $conn->query($sql);

            $this->db->disconnect();

            return $countries;
        }

        public function select_num_of_countries() {
            $conn = $this->db->connect();

            $sql = "SELECT * FROM drzava";
            $countries = $conn->query($sql);

            $this->db->disconnect();

            return mysqli_num_rows($countries);
        }

        public function select_country($id) {
            $conn = $this->db->connect();

            $sql = "SELECT * FROM drzava WHERE drzava_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
            }

            $result = $stmt->get_result();
            while($row = $result->fetch_object()) {
                if ($row) return $row;
            }

            return false;
        }

        public function update_country($country_id, $name, $label, $continent) {
            $conn = $this->db->connect();

            $sql = "UPDATE drzava SET naziv = ?, oznaka = ?, kontinent = ? WHERE drzava_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $label, $continent, $country_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function delete_country($country_id) {
            $conn = $this->db->connect();

            $sql = "DELETE FROM drzava WHERE drzava_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $country_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;   
        }

        public function define_moderator($country_id, $user_id) {
            $conn = $this->db->connect();

            $sql = "INSERT INTO moderira (korisnik_korisnik_id, drzava_drzava_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $user_id, $country_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
                return false;
            }

            $this->db->disconnect();

            return true;
        }

        public function select_all_moderators() {
            $conn = $this->db->connect();

            $sql = "SELECT * FROM moderira";
            $countries = $conn->query($sql);

            $this->db->disconnect();

            return $countries;
        }

        public function select_moderator_per_country($country_id) {
            $conn = $this->db->connect();

            $sql = "SELECT k.korisnicko_ime FROM korisnik k 
                    INNER JOIN moderira m ON m.korisnik_korisnik_id = k.korisnik_id
                    WHERE drzava_drzava_id = ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $country_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
            }

            $result = $stmt->get_result();
            $moderators = array();

            while ($row = $result->fetch_object()) {
                if ($row) {
                    array_push($moderators, $row->korisnicko_ime);
                }
            }

            $this->db->disconnect();

            return $moderators;
        }

        public function check_moderator($user_id, $country_id) {
            $conn = $this->db->connect();

            $sql = "SELECT * FROM moderira WHERE korisnik_korisnik_id = ? AND drzava_drzava_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $user_id, $country_id);

            if (!$stmt->execute()) {
                trigger_error("Error executing query: " . $stmt->error);
                $this->db->disconnect();
            }

            $result = $stmt->get_result();

            while ($row = $result->fetch_object()) {
                if ($row) return true;
            }

            $this->db->disconnect();

            return false;
        }
    }