<?php 
    include('db_config.php');
     class Database
    {
        private static $db_dsn = DB_DSN;
        private static $db_user = DB_USER;
        private static $db_pass = DB_PASS;
        private static $db;
        
        public static function connect()
        {
            try{
                self::$db = new PDO(self::$db_dsn,self::$db_user,self::$db_pass);
                return self::$db;
            } catch (PDOException $e){
                die("Un problème lors de la connexion à la base de données. ERREUR : " . $e->getMessage());
            }
            
        }

        public static function clear($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data =htmlspecialchars($data);
            return $data;
        }

        public static function disconnect()
        {
            self::$db = null;
        }
    }
?>