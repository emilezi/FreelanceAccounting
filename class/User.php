<?php
/**
    * User management class.
    *
    * @author Emile Z.
    */
class User extends Database{

    protected $user;

    public function __construct(){
        $this->user = $_POST;
    }

    /**
        * Check login verification
        *
        * @param array login information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function UserLogin(){

        $db = parent::getDatabase();

        $login = $db->prepare("SELECT * FROM User WHERE email=:email");
        $login->execute([
        'email' => $this->user['email']
        ]);

        $user = $login->fetch();

        if($user == TRUE){

            if($user['type'] == 'admin' || $user['type'] == 'user'){

                if(password_verify($this->user['password'], $user['password'])){

                    $_SESSION['id'] = $user['id'];
                    $_SESSION['type'] = $user['type'];
                    $_SESSION['SIREN'] = $user['SIREN'];
                    $_SESSION['SIRET'] = $user['SIRET'];
                    $_SESSION['date_creation'] = $user['date_creation'];
                    $_SESSION['taxation'] = $user['taxation'];
                    $_SESSION['status'] = $user['status'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['identifier'] = $user['identifier'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['phone'] = $user['phone'];
                    $_SESSION['user_key'] = $user['user_key'];
    
                    return 0;
            
                }else{

                    return 1;

                }
            
    
            }else{
    
                return 2;
    
            }

        }else{

            return 3;

        }
    
    }

    /**
        * Edit user method
        *
        */

    public function editUser(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];
                    
        $q = $db->prepare("UPDATE User SET email=:email, phone=:phone WHERE id=:id");
        $q->execute([
            'id' => $_SESSION['id'],
            'email' => $this->user['email'],
            'phone' => $this->user['phone']
            ]);
        
    }

    /**
        * New user method
        *
        */

    public function newUser(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];
                    
        $i = $db->prepare("INSERT INTO User(`status`,`type`,`SIREN`,`SIRET`,`date_creation`,`taxation`,`first_name`,`last_name`,`identifier`,`email`,`phone`,`password`,`user_key`) VALUES(:status,:type,:SIREN,:SIRET,:date_creation,:taxation,:first_name,:last_name,:identifier,:email,:phone,:password,:user_key)");
        $i->execute([
            'status' => $this->user['status'],
            'type'=> 'user',
            'SIREN' => $this->user['SIREN'],
            'SIRET' => $this->user['SIRET'],
            'date_creation' => $this->user['date_creation'],
            'taxation' => $this->user['taxation'],
            'first_name' => $this->user['first_name'],
            'last_name' => $this->user['last_name'],
            'identifier' => $this->user['identifier'],
            'email' => $this->user['email'],
            'phone' => $this->user['phone'],
            'password' => password_hash($this->user['password'], PASSWORD_BCRYPT, $options),
            'user_key' => md5(microtime(TRUE)*100000)
            ]);
        
        $j = $db->prepare("INSERT INTO Bank(`SIREN`,`turnover_excluding_tax`,`bic1_excluding_tax`,`bic2_excluding_tax`,`bnc_excluding_tax`,`treasury`) VALUES(:SIREN,:bic1_excluding_tax,:bic2_excluding_tax,:bnc_excluding_tax,:treasury)");
        $j->execute([
            'SIREN' => $this->user['SIREN'],
            'turnover_excluding_tax' => '0',
            'bic1_excluding_tax' => '0',
            'bic2_excluding_tax' => '0',
            'bnc_excluding_tax' => '0',
            'treasury' => '0'
            ]);
            
        if(!file_exists("uploads/users/" . $this->user['identifier'])){
                
            mkdir("uploads/users/" . $this->user['identifier']);

            }
        
    }

    /**
        * First user method
        *
        */

    public function firstUser(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];
                    
        $i = $db->prepare("INSERT INTO User(`status`,`type`,`SIREN`,`SIRET`,`date_creation`,`taxation`,`first_name`,`last_name`,`identifier`,`email`,`phone`,`password`,`user_key`) VALUES(:status,:type,:SIREN,:SIRET,:date_creation,:taxation,:first_name,:last_name,:identifier,:email,:phone,:password,:user_key)");
        $i->execute([
            'status' => $this->user['status'],
            'type'=> 'admin',
            'SIREN' => $this->user['SIREN'],
            'SIRET' => $this->user['SIRET'],
            'date_creation' => $this->user['date_creation'],
            'taxation' => $this->user['taxation'],
            'first_name' => $this->user['first_name'],
            'last_name' => $this->user['last_name'],
            'identifier' => $this->user['identifier'],
            'email' => $this->user['email'],
            'phone' => $this->user['phone'],
            'password' => password_hash($this->user['password'], PASSWORD_BCRYPT, $options),
            'user_key' => md5(microtime(TRUE)*100000)
            ]);
        
        $j = $db->prepare("INSERT INTO Bank(`SIREN`,`turnover_excluding_tax`,`bic1_excluding_tax`,`bic2_excluding_tax`,`bnc_excluding_tax`,`treasury`) VALUES(:SIREN,:turnover_excluding_tax,:bic1_excluding_tax,:bic2_excluding_tax,:bnc_excluding_tax,:treasury)");
        $j->execute([
            'SIREN' => $this->user['SIREN'],
            'turnover_excluding_tax' => '0',
            'bic1_excluding_tax' => '0',
            'bic2_excluding_tax' => '0',
            'bnc_excluding_tax' => '0',
            'treasury' => '0'
            ]);
            
        if(!file_exists("uploads/users/" . $this->user['identifier'])){
                
            mkdir("uploads/users/" . $this->user['identifier']);

            }
        
    }

    /**
        * Set password method
        *
        */

    public function setPassword(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE User SET password=:password WHERE id=:id");
        $q->execute([
            'id' => $_SESSION['id'],
            'password' => password_hash($this->user['password'], PASSWORD_BCRYPT, $options)
            ]);
        
    }

    /**
        * Set key method
        *
        */

    protected function setKey(){

        $db = parent::getDatabase();

        $q = $db->prepare("UPDATE User SET key=:key WHERE id=:id");
        $q->execute([
            'id' => $_SESSION['id'],
            'key' => md5(microtime(TRUE)*100000)
            ]);
        
    }

    /**
        * Get user
        *
        * @return array user
        *
        */

    protected function getUser(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE email=:email");
        $q->execute([
        'email' => $_SESSION['email']
        ]);

        $user = $q->fetch();
        
    }

    /**
        * Check user mail
        *
        * @return boolean
        *
        */

    public function checkUserMail(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE email=:email");
        $q->execute([
        'email' => $this->user['email']
        ]);

        if($user == TRUE){
            return 1;
        }else{
            return 0;
        }
        
    }

    /**
        * Key mail verification
        *
        * @return boolean
        *
        */

    public function checkKeyMail($user_key,$key){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE user_key=:user_key AND key=:key");
        $q->execute([
        'user_key' => $user_key,
        'key' => $key
        ]);

        if($user == TRUE){
            return 1;
        }else{
            return 0;
        }
        
    }

    /**
        * Recovery key verification
        *
        * @return boolean
        *
        */

    public function checkRecoveryKey($user_key,$key){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE user_key=:user_key AND key=:key");
        $q->execute([
        'user_key' => $user_key,
        'key' => $key
        ]);

        if($user == TRUE){
            return 1;
        }else{
            return 0;
        }
        
    }
    
}