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

        $q = $db->prepare("SELECT * FROM Service WHERE SIREN=:SIREN AND name=:name");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'name' => $this->currency['service_name']
        ]);

        $service_info = $q->fetch();
        $number_hours = intval(substr($this->currency['hours_days'], 0, 2));
        $number_minutes = intval(substr($this->currency['hours_days'], -2, -1));
        $price_ht = $service_info['costhour']*$this->currency['number_days']*((($number_hours*60)+$number_minutes)/60);

        $s = $db->prepare("INSERT INTO Currency(`SIREN`,`customer_name`,`service_name`,`category`,`start_date`,`end_date`,`hours_days`,`number_days`,`costhour`,`price_ht`,`state`,`description`) VALUES(:SIREN,:customer_name,:service_name,:category,:start_date,:end_date,:hours_days,:number_days,:costhour,:price_ht,:state,:description)");
        $s->execute([
            'SIREN' => $user['SIREN'],
            'customer_name'=> $this->currency['customer_name'],
            'service_name' => $this->currency['service_name'],
            'category' => $service_info['category'],
            'start_date' => $this->currency['start_date'],
            'end_date' => $this->currency['end_date'],
            'hours_days' => $this->currency['hours_days'],
            'number_days' => $this->currency['number_days'],
            'costhour' => $service_info['costhour'],
            'price_ht' => $price_ht,
            'state' => 'unpaid',
            'description' => $this->currency['description']
            ]);

    }

    /**
        * Pay currency method
        *
        */

    public function payCurrency(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();
        
        $q = $db->prepare("UPDATE `Currency` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->currency['value'],
        'SIREN' => $user['SIREN'],
        'state' => "paid"
        ]);

    }

    /**
        * Cancel currency method
        *
        */

    public function cancelCurrency(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();
        
        $q = $db->prepare("UPDATE `Currency` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->currency['value'],
        'SIREN' => $user['SIREN'],
        'state' => "cancel"
        ]);
        
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
        
        $q = $db->prepare("UPDATE `Currency` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->currency['value'],
        'SIREN' => $user['SIREN'],
        'state' => "delete"
        ]);
        
    }
    
}