<?php
    class Cookie {
        static function save_cookie($name, $value, $time) {
            setcookie($name, $value, $time, "/"); //['expires' => $time, "path" => "/", 'samesite' => 'None', 'secure' => true]
        }

        static function delete_cookie($name) {
            setcookie($name, "", time() - 3600, "/");
        }
    }