<?php
/**
    * Currency management class.
    *
    * @author Emile Z.
    */
class Currency extends Database{
    
    protected $currency;

    public function __construct(){
        $this->currency = $_POST;
    }

    /**
        * Currency recoveries
        *
        * @return tab currency informations list
        *
        */

    public function getCurrency(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN']
        ]);

        $currency_list = null;

        if($q->rowCount() > 0){

            $i = 0;

            while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                $i = $i + 1;

                $currency_list[$i] = $currency;
        
            }
        
        }

        return $currency_list;

    }

    /**
        * New currency method
        *
        */

    public function addCurrency(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("INSERT INTO Currency(`SIREN`,`customer_name`,`service_name`,`start_date`,`end_date`,`hours_days`,`number_days`,`state`,`description`) VALUES(:SIREN,:customer_name,:service_name,:start_date,:end_date,:hours_days,:number_days,:state,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'customer_name'=> $this->currency['customer_name'],
            'service_name' => $this->currency['service_name'],
            'start_date' => $this->currency['start_date'],
            'end_date' => $this->currency['end_date'],
            'hours_days' => $this->currency['hours_days'],
            'number_days' => $this->currency['number_days'],
            'state' => 'unpaid',
            'description' => $this->currency['description']
            ]);

    }



    public function editCurrency(){



    }

    /**
        * Delete currency method
        *
        */

    public function deleteCurrency(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        
        
    }
    
}