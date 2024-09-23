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

        $q = $db->prepare("SELECT * FROM Service WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN']
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

        $q = $db->prepare("INSERT INTO Service(`SIREN`,`name`,`costhour`,`documents`,`description`) VALUES(:SIREN,:name,:costhour,:documents,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name'=> $this->service['name'],
            'costhour' => $this->service['costhour'],
            'documents' => $this->service['documents'],
            'description' => $this->service['description']
            ]);

    }



    public function editService(){

    }



    public function deleteService(){

        
        
    }
    
}