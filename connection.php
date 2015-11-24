<?php
    require_once 'settings.php';

    class DatabaseConnection
    {
        private $host = "localhost";
        private $username = "username";
        private $password = "password";
        private $database = "";
        private $mysqli;
		
        public function __construct ()
        {
            global $db_connection;

            $host = $db_connection['host'];
            $username = $db_connection['username'];
            $password = $db_connection['password'];
            $database = $db_connection['database'];

            $this->setup($host, $username, $password, $database);
        }

        public function __destruct ()
        {
            $this->disconnect();
        }

        public function change_database ($newDb)
        {
            $this->database = $newDb;
            if (isset($this->mysqli))
                $this->mysqli->select_db($newDb);
            else
                $this->connect();
        }

        public function setup ($host, $username, $password, $db)
        {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $db;

            if (isset($this->mysqli))
                $this->disconnect();

            $this->connect();
        }

        public function disconnect ()
        {
            if (isset($this->mysqli))
                $this->mysqli->close();
            if (isset($this->res) && gettype($this->res) == "object") {
                $this->res->free();
            }
            unset($this->res);
            unset($this->mysqli);
        }

        public function connect ()
        {
            if (isset($this->mysqli))
                $this->disconnect();
            try {
                if (!$this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database))
                    throw new Exception("Cannot Connect to " . $this->host);
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
        }

        public function prepare_statement($statement) {
            if (!isset($this->mysqli)) $this->connect();

            return $this->mysqli->prepare($statement);
        }

        public function send_sql($statement) {
            if (!isset($this->mysqli)) $this->connect();

            return $this->mysqli->query($statement);
        }
    }
?>
