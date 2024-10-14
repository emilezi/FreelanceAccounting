<?php
/**
    * Application management class.
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

    public function editTaxDate(){

        

    }
    
}