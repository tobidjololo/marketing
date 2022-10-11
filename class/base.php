<?php
    include('database.php');
    class Base extends Database
    {
        private $_db;
        
        /**
         * Méhode qui construit la classe 
         */
        public function __construct()
        {
            //Initialisation de la variable DB en stockant la connexion à la base de donnée
            $this->_db = Database::connect();
        }

        /**
         * Méthode permettant récupérer tous le contenu d'une table.
         */
        public function selectAll($table) {
            $request = $this->_db->prepare('Select * from '. $table);
            //echo("entrer");
			$request->execute();
			$content = $request->fetchAll(PDO::FETCH_ASSOC);
            return $content;
        }
        
        /**
         * Méthode de recherche en fonction d'un élément
        */
        public function selectAllByElement(string $key, string $value, string $table)
        {
            $sql = "Select * from " . $table . " where ".$key."='".$value."' "; 
            $request = $this->_db->prepare($sql);
            $request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * Méthode permettant de faire des recherches en fonction d'un élément donné et renvoyant plusieurs lignes
         */
        public function selectAllBy(string $key, string $value, string $table)
		{
            $table = Database::clear($table);
            $key = Database::clear($key);
            $value = Database::clear($value);
			$sql = "Select * from " . $table . " where ".$key."='".$value."' "; 
			$request = $this->_db->prepare($sql);
			$request->execute();
			return $request->fetchAll(PDO::FETCH_ASSOC);
		}

        /**
         * Méthode permettant de faire des recherches en fonction d'un élément donné et renvoyant une ligne
         */
        public function selectBy(string $key, string $value, string $table)
		{
            $table = Database::clear($table);
            $key = Database::clear($key);
            $value = Database::clear($value);
			$sql = "Select * from " . $table . " where ".$key."='".$value."' "; 
			$request = $this->_db->prepare($sql);
			$request->execute();
			return $request->fetch(PDO::FETCH_ASSOC);
		}
        
        /**
         * Méthode pour supprimer un tuple de la table
         */
        public function delete($table, $key, $value) {
            $table = Database::clear($table);
            $key = Database::clear($key);
            $value = Database::clear($value);
            $sql = "Delete from " . $table . " where ".$key."=".$value.""; 
            echo $sql;
			$request = $this->_db->prepare($sql);
			$content = $request->execute();
            return $content;
        }

        /**
         * Méthode de recherche en fonction d'un élément
         */
        public function findByOne(string $key, string $value, string $table)
		{
			$sql = "Select count(*) as nbr from " . $table . " where ".$key."='".$value."' ";
			$request = $this->_db->prepare($sql);
			$request->execute();
			return $request->fetch(PDO::FETCH_ASSOC);
		}

        /**
         * Méthode de recherche en fonction de deux éléments
         */
        public function findByTwo(string $key1, string $value1, string $key2, string $value2, string $table)
		{
            $value21 = sha1($value2);
			$sql = "Select email,count(*) as nbr from " . $table . " where ".$key1."='".$value1."' And " .$key2."='".$value21."'"; 
			echo $sql;
            $request = $this->_db->prepare($sql);
			$request->execute();
            
			return $request->fetch(PDO::FETCH_ASSOC);
		}

        public function findByTwoCode(string $key1, string $value1, string $key2, string $value2, string $table)
		{
			$sql = "Select email,count(*) as nbr from " . $table . " where ".$key1."='".$value1."' And " .$key2."='".$value2."'"; 
			echo $sql;
            $request = $this->_db->prepare($sql);
			$request->execute();
            
			return $request->fetch(PDO::FETCH_ASSOC);
		}
    }
?>