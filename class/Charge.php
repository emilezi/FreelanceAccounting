<?php
/**
    * Charge management class.
    *
    * @author Emile Z.
    */
class Charge extends Database{
    
    protected $charge;

    public function __construct(){
        $this->charge = $_POST;
    }

    /**
        * Charge recoveries
        *
        * @return tab Charges informations list
        *
        */

    public function getCharge(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND state=:state");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'state' => 'active'
        ]);

        $charge_list = null;

        if($q->rowCount() > 0){

            $i = 0;

            while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                $i = $i + 1;

                $charge_list[$i] = $charge;
        
            }
        
        }

        return $charge_list;

    }

    /**
        * New charge method
        *
        */

    public function addCharge(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("INSERT INTO Charge(`SIREN`,`name`,`category`,`price`,`state`,`description`) VALUES(:SIREN,:name,:category,:price,:state,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name'=> $this->charge['name'],
            'category'=> $this->charge['category'],
            'price'=> $this->charge['price'],
            'state' => 'active',
            'description' => $this->charge['description']
            ]);

    }

    /**
        * Edit charge method
        *
        */

    public function editCharge(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Charge SET name=:name, category=:category, price=:price, description=:description WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'id' => $this->charge['value'],
            'SIREN' => $user['SIREN'],
            'name'=> $this->charge['name'],
            'category'=> $this->charge['category'],
            'price'=> $this->charge['price'],
            'description' => $this->charge['description']
        ]);

    }

    /**
        * Validate charge method
        *
        */

    public function validateCharge(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE `Charge` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->charge['value'],
        'SIREN' => $user['SIREN'],
        'state' => "validated"
        ]);

    }

    /**
        * Cancel charge method
        *
        */

    public function cancelCharge(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE `Charge` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->charge['value'],
        'SIREN' => $user['SIREN'],
        'state' => "cancel"
        ]);
        
    }

    /**
        * Delete charge method
        *
        */

    public function deleteCharge(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE `Charge` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->charge['value'],
        'SIREN' => $user['SIREN'],
        'state' => "delete"
        ]);
        
    }
    
}