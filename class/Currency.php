<?php

class Currency extends Database{
    
    protected $currency;

    public function __construct(){
        $this->currency = $_POST;
    }



    public function getCurrency(){

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



    public function addCurrency(){

    }



    public function editCurrency(){

    }



    public function deleteCurrency(){
        
    }
    
}