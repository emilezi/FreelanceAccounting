<?php

class Service extends Database{
    
    protected $service;

    public function __construct(){
        $this->service = $_POST;
    }



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



    public function addService(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("INSERT INTO Service(`SIREN`,`name`,`costhour`,`documents`,`state`,`description`) VALUES(:SIREN,:name,:costhour,:documents,:state,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name'=> $this->service['name'],
            'costhour' => $this->service['costhour'],
            'documents' => $this->service['documents'],
            'state' => 'active',
            'description' => $this->service['description']
            ]);

    }



    public function editService(){

    }



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