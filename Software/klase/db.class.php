<?php
    class DB {
        const server = "localhost";
        const user = ""; // database user
        const password = ""; // database password
        const database = ""; // database name

        private $conn = null;

        public function connect() {
            $this->conn = new mysqli(self::server, self::user, self::password, self::database);
            if ($this->conn->connect_errno) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            $this->conn->set_charset("utf8");
            if ($this->conn->connect_errno) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            return $this->conn;
        }

        public function disconnect() {
            $this->conn->close();
        }
    }