<?php
    class Session {
        public static function create_session() {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
        }

        public static function save_user($id, $username, $role) {
            self::create_session();
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;
        }

        public static function close_session() {
            session_unset();
            session_destroy();
        }
    }