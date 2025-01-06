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

        $q = $db->prepare("UPDATE Bank SET turnover_excluding_tax=:turnover_excluding_tax WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'turnover_excluding_tax' => $bankinfo['turnover_excluding_tax']+$this->bank['value']
        ]);

    }

    /**
        * Add BIC-1 method
        *
        */

    public function addBIC1(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Bank SET bic1_excluding_tax=:bic1_excluding_tax WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'bic1_excluding_tax' => $bankinfo['bic1_excluding_tax']+$this->bank['value']
        ]);

    }

    /**
        * Add BIC-1 method
        *
        */

    public function addBIC2(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Bank SET bic2_excluding_tax=:bic2_excluding_tax WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'bic2_excluding_tax' => $bankinfo['bic2_excluding_tax']+$this->bank['value']
        ]);

    }

    /**
        * Add BNC method
        *
        */

    public function addBNC(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Bank SET bnc_excluding_tax=:bnc_excluding_tax WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'bnc_excluding_tax' => $bankinfo['bnc_excluding_tax']+$this->bank['value']
        ]);

    }

    /**
        * Add money method
        *
        */

    public function addBank(){

        $db = self::getDatabase();
        $bankinfo = $this->getBank();

        $u = $db->prepare("SELECT * FROM User WHERE id=:id");
        $u->execute([
            'id' => $_SESSION['id']
            ]);

        $user = $u->fetch();

        $q = $db->prepare("UPDATE Bank SET treasury=:treasury WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'treasury' => $bankinfo['treasury']+$this->bank['value']
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

        $q = $db->prepare("UPDATE Bank SET treasury=:treasury WHERE SIREN=:SIREN");
        $q->execute([
            'SIREN' => $user['SIREN'],
            'treasury' => $bankinfo['treasury']-$this->bank['value']
        ]);

    }
    
}