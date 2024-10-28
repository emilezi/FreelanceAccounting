<?php
/**
    * Application management class.
    *
    * @author Emile Z.
    */
class Service extends Database{
    
    protected $service;

    public function __construct(){
        $this->service = $_POST;
    }

    /**
        * Service recoveries
        *
        * @return tab service informations list
        *
        */

    public function getService(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();
        
        $q = $db->prepare("SELECT * FROM Service WHERE SIREN=:SIREN AND state=:state");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'state' => 'active'
        ]);

        $service_list = null;

        if($q->rowCount() > 0){

            $i = 0;

            while($service = $q->fetch(PDO::FETCH_ASSOC)){

                $i = $i + 1;

                $service_list[$i] = $service;
        
            }
        
        }

        return $service_list;

    }

    /**
        * New service method
        *
        */

    public function addService(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("INSERT INTO Service(`SIREN`,`name`,`category`,`costhour`,`state`,`description`) VALUES(:SIREN,:name,:category,:costhour,:state,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name'=> $this->service['name'],
            'category'=> $this->service['category'],
            'costhour' => $this->service['costhour'],
            'state' => 'active',
            'description' => $this->service['description']
            ]);

    }

    /**
        * Edit service method
        *
        */

    public function editService(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Service SET name=:name, category=:category, costhour=:costhour, description=:description WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'id' => $this->service['value'],
            'SIREN' => $user['SIREN'],
            'name'=> $this->service['name'],
            'category'=> $this->service['category'],
            'costhour' => $this->service['costhour'],
            'description' => $this->service['description']
        ]);

    }

    /**
        * Delete service method
        *
        */

    public function deleteService(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE `Service` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->service['value'],
        'SIREN' => $user['SIREN'],
        'state' => "delete"
        ]);
        
    }
    
}