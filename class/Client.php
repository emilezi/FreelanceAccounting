<?php
/**
    * Client management class.
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

        $q = $db->prepare("INSERT INTO Client(`SIREN`,`name`,`email`,`phone`,`category`,`langue`,`country`,`address`,`address_supplement`,`postal_code`,`city`,`state`,`description`) VALUES(:SIREN,:name,:email,:phone,:category,:langue,:country,:address,:address_supplement,:postal_code,:city,:state,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name'=> $this->client['name'],
            'email' => $this->client['email'],
            'phone' => $this->client['phone'],
            'category' => $this->client['category'],
            'langue' => $this->client['langue'],
            'country' => $this->client['country'],
            'address' => $this->client['address'],
            'address_supplement' => $this->client['address_supplement'],
            'postal_code' => $this->client['postal_code'],
            'city' => $this->client['city'],
            'state' => 'active',
            'description' => $this->client['description']
            ]);

    }

    /**
        * Edit client method
        *
        */

    public function editClient(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Client SET name=:name, email=:email, phone=:phone, category=:category, langue=:langue, country=:country, address=:address, address_supplement=:address_supplement, postal_code=:postal_code, city=:city, description=:description WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'id' => $this->client['value'],
            'SIREN' => $user['SIREN'],
            'name'=> $this->client['name'],
            'email' => $this->client['email'],
            'phone' => $this->client['phone'],
            'category' => $this->client['category'],
            'langue' => $this->client['langue'],
            'country' => $this->client['country'],
            'address' => $this->client['address'],
            'address_supplement' => $this->client['address_supplement'],
            'postal_code' => $this->client['postal_code'],
            'city' => $this->client['city'],
            'description' => $this->client['description']
        ]);

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