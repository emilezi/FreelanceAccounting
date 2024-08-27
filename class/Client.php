<?php

class Client extends Database{
    
    protected $client;

    public function __construct(){
        $this->client = $_POST;
    }



    public function getClient(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Client WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN']
        ]);

        $client_list = null;

        if($q->rowCount() > 0){

            $i = 0;

            while($client = $q->fetch(PDO::FETCH_ASSOC)){

                $i = $i + 1;

                $client_list[$i] = $client;
        
            }
        
        }

        return $client_list;

    }



    public function addClient(){

    }



    public function editClient(){

    }



    public function deleteClient(){
        
    }
    
}