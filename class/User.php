<?php
    include('base.php');

    class User extends Base
    {
        private $_db;
    
        public function insert(string $username, string $email,string $password, string $code) {
            $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); 
            $ver = array(); 
            $combLen = strlen($comb) - 1; 

            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $combLen);
                $pass[] = $comb[$n];
            }

            for ($i = 0; $i < 6; $i++) {
                $n = rand(0, $combLen);
                $ver[] = $comb[$n];
            }
            $this->_db = Database::connect();
            $req = $this->_db->prepare('INSERT INTO `User`(`username`, `email`, `password`,`code_parrainage`,`code_parrain`,`code`) VALUES(:username,:email,:password,:pass,:code,:ver)');
            
            $req->execute(array(
                                'username' => $username,
                                'email' => $email,
                                'password' => sha1($password),
                                'pass' => implode($pass),
                                'code' => $code,
                                'ver' => implode($ver),
                                )
            );
        }

        public function nbrMessages(string $table, $value, string $key) {
            $this->_db = Database::connect();
            $sql = "Select count(*) as nbr from " . $table . " where ".$key."='".$value . "'"; 
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

        public function updateCredits(string $table, $value, string $key, string $key1,$value2, string $key2) {
            $this->_db = Database::connect();
            $sql = "UPDATE " . $table . " SET " . $key . "='" . $value . "'," . $key1 . "='" . $value . "' WHERE "  . $key2 . "='" . $value2 . "'" ; 
            $request = $this->_db->prepare($sql);
			$request->execute();
        }

        public function insertContact(string $nom, string $prenom,string $telephone,$client) {
 
            $this->_db = Database::connect();
            $req = $this->_db->prepare('INSERT INTO `MesContacts`(`nom`, `prenom`, `telephone`,`id_client`) VALUES(:nom,:prenom,:telephone,:client)');
            $req->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'telephone' => $telephone,
                                'client' => $client,
                                )
            );   
        }

        public function insertSouscription($pack, $transaction,$client) {
 
            $this->_db = Database::connect();
            $req = $this->_db->prepare('INSERT INTO `Souscription`(`id_pack`, `id_client`, `id_transaction`) VALUES (:pack,:client,:transaction)');
            $req->execute(array(
                                'transaction' => $transaction,
                                'pack' => $pack,
                                'client' => $client,
                                )
            );   
        }

        public function verification(string $table, $value, string $key, $value2, string $key2) {
            $this->_db = Database::connect();
            $sql = "UPDATE " . $table . " SET " . $key . "='" . $value . "' WHERE "  . $key2 . "='" . $value2 . "'" ; 
            echo $sql;
            $request = $this->_db->prepare($sql);
			$request->execute();
        }
        
    }
    
?>