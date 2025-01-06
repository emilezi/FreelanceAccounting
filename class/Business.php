<?php
/**
    * Business management class.
    *
    * @author Emile Z.
    */
class Business extends Database{
    
    protected $business;

    public function __construct(){
        $this->business = $_POST;
    }

    /**
        * Business recoveries
        *
        * @return tab business informations list
        *
        */

    public function getBusiness(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Business WHERE SIREN=:SIREN AND state=:state");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'state' => 'active'
        ]);

        $business_list = null;

        if($q->rowCount() > 0){

            $i = 0;

            while($business = $q->fetch(PDO::FETCH_ASSOC)){

                $i = $i + 1;

                $business_list[$i] = $business;
        
            }
        
        }

        return $business_list;

    }

    /**
        * New business method
        *
        */

    public function addBusiness(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("INSERT INTO Business(`SIREN`, `company_name`, `trade_name`, `SIRET`, `vat_number`, `country`, `address`, `address_supplement`, `postal_code`, `city`, `state`, `description`) VALUES(:SIREN,:company_name,:trade_name,:SIRET,:vat_number,:country,:address,:address_supplement,:postal_code,:city,:state,:description)");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'company_name' => $this->business['company_name'],
            'trade_name' => $this->business['trade_name'],
            'SIRET' => $this->business['SIRET'],
            'vat_number' => $this->business['vat_number'],
            'country' => $this->business['country'],
            'address' => $this->business['address'],
            'address_supplement' => $this->business['address_supplement'],
            'postal_code' => $this->business['postal_code'],
            'city' => $this->business['city'],
            'state' => 'active',
            'description' => $this->business['description']
            ]);

    }

    /**
        * Edit business method
        *
        */

    public function editBusiness(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Business SET company_name=:company_name, trade_name=:trade_name, SIRET=:SIRET, vat_number=:vat_number, country=:country, address=:address, address_supplement=:address_supplement, postal_code=:postal_code, city=:city WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'id' => $this->business['value'],
            'SIREN' => $user['SIREN'],
            'company_name' => $this->business['company_name'],
            'trade_name' => $this->business['trade_name'],
            'SIRET' => $this->business['SIRET'],
            'vat_number' => $this->business['vat_number'],
            'country' => $this->business['country'],
            'address' => $this->business['address'],
            'address_supplement' => $this->business['address_supplement'],
            'postal_code' => $this->business['postal_code'],
            'city' => $this->business['city'],
            'state' => 'active',
            'description' => $this->business['description']
        ]);

    }

    /**
        * Delete business method
        *
        */

    public function deleteBusiness(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE `Business` SET state=:state WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
        'id' => $this->business['value'],
        'SIREN' => $user['SIREN'],
        'state' => "delete"
        ]);
        
    }
    
}