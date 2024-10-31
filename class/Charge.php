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

        $q = $db->prepare("INSERT INTO Charge(`SIREN`,`name`,`price`,`state`) VALUES(:SIREN,:name,:price,:state)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name'=> $this->charge['name'],
            'price'=> $this->charge['price'],
            'state' => 'active'
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

        $q = $db->prepare("UPDATE Charge SET name=:name, price=:price WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'id' => $this->charge['value'],
            'SIREN' => $user['SIREN'],
            'name'=> $this->charge['name'],
            'price'=> $this->charge['price']
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