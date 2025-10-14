<?php
/**
    * Bank management class.
    *
    * @author Emile Z.
    */
class Bank extends Database{
    
    protected $bank;

    public function __construct(){
        $this->bank = $_POST;
    }

    /**
        * Bank information
        *
        * @return tab bank informations
        *
        */

    public function getBank(){

        $db = self::getDatabase();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Bank WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN']
        ]);

        $bankinfo = $q->fetch();

        return $bankinfo;

    }

    /**
        * Annual turnover information
        *
        * @return string annual turnover information
        *
        */

    public function getAnnualTurnover($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'state' => "paid",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'state' => "paid",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }

        return $amount;

    }

    /**
        * Turnover BIC-1 information
        *
        * @return string turnover BIC-1 information
        *
        */

    public function getTurnoverBIC1($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "BIC-1",
                'state' => "paid",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "BIC-1",
                'state' => "paid",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }

        return $amount;

    }

    /**
        * Turnover BIC-2 information
        *
        * @return string turnover BIC-2 information
        *
        */

    public function getTurnoverBIC2($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "BIC-2",
                'state' => "paid",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "BIC-2",
                'state' => "paid",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }

        return $amount;

    }

    /**
        * Turnover BNC information
        *
        * @return string turnover BNC information
        *
        */

    public function getTurnoverBNC($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "BNC",
                'state' => "paid",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "BNC",
                'state' => "paid",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($currency = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $currency['price_ht'];
            
                }
            
            }

        }

        return $amount;

    }

    /**
        * BIC-1 liberatory payment information
        *
        * @return string BIC-1 liberatory payment information
        *
        */

    public function getBIC1LiberatoryPayment($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "paybic1",
                'state' => "validated",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "paybic1",
                'state' => "validated",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }

        return $amount;

    }

    /**
        * BIC-2 liberatory payment information
        *
        * @return string BIC-2 liberatory payment information
        *
        */

    public function getBIC2LiberatoryPayment($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();
        $setting_value = $Setting->getBIC1PayRate();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "paybic2",
                'state' => "validated",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "paybic2",
                'state' => "validated",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }

        return $amount;

    }

    /**
        * BNC liberatory payment information
        *
        * @return string BNC liberatory payment information
        *
        */

    public function getBNCLiberatoryPayment($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();
        $setting_value = $Setting->getBIC1PayRate();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "paybnc",
                'state' => "validated",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "paybnc",
                'state' => "validated",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }

        return $amount;

    }

    /**
        * Liberal professional training information
        *
        * @return string liberal professional training information
        *
        */

    public function getLiberalProfessionalTraining($Setting){

        $db = self::getDatabase();
        $startmonthlydate = $Setting->getMonthlyTaxDateStart();
        $endmonthlydate = $Setting->getMonthlyTaxDateEnd();
        $startquarterlydate = $Setting->getQuarterlyTaxDateStart();
        $endquarterlydate = $Setting->getQuarterlyTaxDateEnd();
        $setting_value = $Setting->getBIC1PayRate();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $amount = 0;

        if($user['taxation'] == 'month'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "training",
                'state' => "validated",
                'date1' => '%'.substr($startmonthlydate, 0, 6).'%',
                'date2' => '%'.substr($endmonthlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }elseif($user['taxation'] == 'quarterly'){

            $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND category=:category AND state=:state AND date LIKE :date1 AND date LIKE :date2");
            $q->execute([
                'SIREN' => $user['SIREN'],
                'category' => "training",
                'state' => "validated",
                'date1' => '%'.substr($startquarterlydate, 0, 6).'%',
                'date2' => '%'.substr($endquarterlydate, 0, 6).'%'
            ]);

            if($q->rowCount() > 0){

                while($charge = $q->fetch(PDO::FETCH_ASSOC)){

                    $amount = $amount + $charge['price'];
            
                }
            
            }

        }

        return $amount;


    }

    /**
        * Add turnover method
        *
        */

    public function addTurnover(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'id' => $this->bank['value']
        ]);

        $currency = $q->fetch();

        if($currency['category'] === "BIC-1"){

            $this->addBIC1();

        }elseif($currency['category'] === "BIC-2"){

            $this->addBIC2();

        }elseif($currency['category'] === "BNC"){

            $this->addBNC();

        }

        $s = $db->prepare("UPDATE Bank SET turnover_excluding_tax=:turnover_excluding_tax WHERE SIREN=:SIREN");
        $s->execute([
            'SIREN' => $user['SIREN'],
            'turnover_excluding_tax' => $bankinfo['turnover_excluding_tax']+$currency['price_ht']
        ]);
    
    }

    /**
        * Add BIC-1 method
        *
        */

    protected function addBIC1(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'id' => $this->bank['value']
        ]);

        $currency = $q->fetch();

        $s = $db->prepare("UPDATE Bank SET bic1_excluding_tax=:bic1_excluding_tax WHERE SIREN=:SIREN");
        $s->execute([
            'SIREN' => $user['SIREN'],
            'bic1_excluding_tax' => $bankinfo['bic1_excluding_tax']+$currency['price_ht']
        ]);

    }

    /**
        * Add BIC-2 method
        *
        */

    protected function addBIC2(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'id' => $this->bank['value']
        ]);

        $currency = $q->fetch();

        $s = $db->prepare("UPDATE Bank SET bic2_excluding_tax=:bic2_excluding_tax WHERE SIREN=:SIREN");
        $s->execute([
            'SIREN' => $user['SIREN'],
            'bic2_excluding_tax' => $bankinfo['bic2_excluding_tax']+$currency['price_ht']
        ]);

    }

    /**
        * Add BNC method
        *
        */

    protected function addBNC(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'id' => $this->bank['value']
        ]);

        $currency = $q->fetch();

        $s = $db->prepare("UPDATE Bank SET bnc_excluding_tax=:bnc_excluding_tax WHERE SIREN=:SIREN");
        $s->execute([
            'SIREN' => $user['SIREN'],
            'bnc_excluding_tax' => $bankinfo['bnc_excluding_tax']+$currency['price_ht']
        ]);

    }

    /**
        * Add money method
        *
        */

    public function addBank(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();
        $bank = 

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Currency WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'id' => $this->bank['value']
        ]);

        $currency = $q->fetch();

        $s = $db->prepare("UPDATE Bank SET treasury=:treasury WHERE SIREN=:SIREN");
        $s->execute([
            'SIREN' => $user['SIREN'],
            'treasury' => $bankinfo['treasury']+$currency['price_ht']
        ]);

    }

    /**
        * Withdrawal money method
        *
        */

    public function withdrawBank(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("SELECT * FROM Charge WHERE SIREN=:SIREN AND id=:id");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'id' => $this->bank['value']
        ]);

        $charge = $q->fetch();

        $s = $db->prepare("UPDATE Bank SET treasury=:treasury WHERE SIREN=:SIREN");
        $s->execute([
            'SIREN' => $user['SIREN'],
            'treasury' => $bankinfo['treasury']-$charge['price']
        ]);

    }

    /**
        * Amount BIC information
        *
        * @return string amount BIC information
        *
        */

    public function getAmountBIC1($Setting){

        $db = self::getDatabase();
        $amount = $this->getTurnoverBIC1($Setting);
        
        $setting_value = $Setting->getBIC1Rate();

        $amount = ($amount/100)*$setting_value;

        return $amount;

    }

    /**
        * Amount BIC information
        *
        * @return string amount BIC information
        *
        */

    public function getAmountBIC2($Setting){

        $db = self::getDatabase();
        $amount = $this->getTurnoverBIC2($Setting);

        $setting_value = $Setting->getBIC2Rate();

        $amount = ($amount/100)*$setting_value;

        return $amount;

    }

    /**
        * Amount BNC information
        *
        * @return string amount BNC information
        *
        */

    public function getAmountBNC($Setting){

        $db = self::getDatabase();
        $amount = $this->getTurnoverBNC($Setting);

        $setting_value = $Setting->getBNCRate();

        $amount = ($amount/100)*$setting_value;

        return $amount;

    }

    /**
        * Amount BIC pay information
        *
        * @return string amount BIC pay information
        *
        */

    public function getAmountBIC1Pay($Setting){

        $db = self::getDatabase();
        $amount = $this->getBIC1LiberatoryPayment($Setting);

        $setting_value = $Setting->getBIC1PayRate();

        $amount = ($amount/100)*$setting_value;

        return $amount;

    }

    /**
        * Amount BIC pay information
        *
        * @return string amount BIC pay information
        *
        */

    public function getAmountBIC2Pay($Setting){

        $db = self::getDatabase();
        $amount = $this->getBIC2LiberatoryPayment($Setting);

        $setting_value = $Setting->getBIC2PayRate();

        $amount = ($amount/100)*$setting_value;

        return $amount;

    }

    /**
        * Amount BNC pay information
        *
        * @return string amount BNC pay information
        *
        */

    public function getAmountBNCPay($Setting){

        $db = self::getDatabase();
        $amount = $this->getBNCLiberatoryPayment($Setting);

        $setting_value = $Setting->getBNCPayRate();

        $amount = ($amount/100)*$setting_value;

        return $amount;

    }

    /**
        * Amount ProfessionalTraining information
        *
        * @return string amount ProfessionalTraining information
        *
        */

    public function getAmountProfessionalTraining($Setting){

        $db = self::getDatabase();
        $amount = $this->getLiberalProfessionalTraining($Setting);

        $setting_value = $Setting->getProfessionalTrainingRate();

        $amount = ($amount/100)*$setting_value;

        return $amount;

    }
    
}