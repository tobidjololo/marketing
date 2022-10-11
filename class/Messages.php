<?php
    include('base.php');

    class Messages extends Base
    {
        private $_db;

        public function insertMessages(string $recepteur , string $expediteur, string $contenu, $client) {
 
            $this->_db = Database::connect();
            $req = $this->_db->prepare('INSERT INTO `Messages`(`recepteur`, `expediteur`, `contenu`,`id_client`) VALUES(:recepteur,:expediteur,:contenu,:client)');
            $req->execute(array(
                                'recepteur' => $recepteur,
                                'expediteur' => $expediteur,
                                'contenu' => $contenu,
                                'client' => $client,
                                )
            );   
            
        }

        public function updateCredits(string $table, $value, string $key, string $key1,$value2, string $key2) {
            $this->_db = Database::connect();
            $sql = "UPDATE " . $table . " SET " . $key . "='" . $value . "'," . $key1 . "='" . $value . "' WHERE "  . $key2 . "='" . $value2 . "'" ; 
            $request = $this->_db->prepare($sql);
			$request->execute();
        }

        public function nbrAll(string $table, $value, string $key) {
            $this->_db = Database::connect();
            $sql = "Select * from " . $table . " where ".$key."=".$value . ""; 
			$request = $this->_db->prepare($sql);
			$request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }

        public function nbrPack(string $table, $value, string $key) {
            $this->_db = Database::connect();
            $sql = "Select * from " . $table . " where ".$key."=".$value . ""; 
			$request = $this->_db->prepare($sql);
			$request->execute();
            return $request->fetch(PDO::FETCH_ASSOC);
        }
    }
    
?>