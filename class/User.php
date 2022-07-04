<?php
    include('base.php');

    class User extends Base
    {
        private $_db;
    
        public function insert(string $username, string $email,string $password, string $code) {
            $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); 
            $combLen = strlen($comb) - 1; 
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $combLen);
                $pass[] = $comb[$n];
            }
 
            $this->_db = Database::connect();
            $req = $this->_db->prepare('INSERT INTO `User`(`username`, `email`, `password`,`code_parrainage`,`code_parrain`) VALUES(:username,:email,:password,:pass,:code)');
            $req->execute(array(
                                'username' => $username,
                                'email' => $email,
                                'password' => sha1($password),
                                'pass' => implode($pass),
                                'code' => $code,
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
    }
    
?>