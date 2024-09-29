<?php
/**
    * Application management class.
    *
    * @author Emile Z.
    */
class Client extends Database{
    
    protected $client;

    public function __construct(){
        $this->client = $_POST;
    }

    /**
        * Client recoveries
        *
        * @return tab clients informations list
        *
        */

    public function getClient(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Client WHERE SIREN=:SIREN AND state=:state");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'state' => 'active'
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

    /**
        * New client method
        *
        */

    public function addClient(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("INSERT INTO Client(`SIREN`,`name`,`email`,`phone`,`state`,`description`) VALUES(:SIREN,:name,:email,:phone,:state,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name'=> $this->client['name'],
            'email' => $this->client['email'],
            'phone' => $this->client['phone'],
            'state' => 'active',
            'description' => $this->client['description']
            ]);

    }



    public function editClient(){



    }

    /**
        * Delete client method
        *
        */

    public function deleteClient(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE `Client` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->client['value'],
        'SIREN' => $user['SIREN'],
        'state' => "delete"
        ]);
        
    }
    
}