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
        * Get users
        *
        * @return array tab users informations list
        *
        */

    public function getUsers(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE 1");
        $q->execute();

        $users_list = null;

        if($q->rowCount() > 0){

            $i = 0;

            while($user = $q->fetch(PDO::FETCH_ASSOC)){

                $i = $i + 1;

                $users_list[$i] = $user;
        
            }
        
        }

        return $users_list;
        
    }

    /**
        * Get user
        *
        * @return array tab user informations
        *
        */

    public function getUser(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE id=:id");
        $q->execute(['id' => $_SESSION['id']]);

        $user = $q->fetch();

        return $user;
        
    }

    /**
        * Get recovery user
        *
        * @return array tab user informations
        *
        */

    public function getRecoveryUser(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE email=:email");
        $q->execute(['email' => $this->user['email']]);

        $user = $q->fetch();

        return $user;
        
    }

    /**
        * Check login verification
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function UserLogin(){

        $db = parent::getDatabase();

        $login = $db->prepare("SELECT * FROM User WHERE email=:email OR identifier=:identifier");
        $login->execute([
        'email' => $this->user['email'],
        'identifier' => $this->user['email']
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
                    
        $q = $db->prepare("UPDATE User SET email=:email, email_checked=:email_checked, phone=:phone WHERE id=:id");
        $q->execute([
            'id' => $_SESSION['id'],
            'email' => $this->user['email'],
            'email_checked' => "false",
            'phone' => $this->user['phone']
            ]);
        
    }

    /**
        * Edit users method
        *
        */

    public function editUsers(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];
                    
        $q = $db->prepare("UPDATE User SET email=:email, email_checked=:email_checked, phone=:phone WHERE id=:id");
        $q->execute([
            'id' => $this->user['value'],
            'email' => $this->user['email'],
            'email_checked' => "false",
            'phone' => $this->user['phone']
            ]);
        
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
                    
        $i = $db->prepare("INSERT INTO User(`status`,`type`,`SIREN`,`SIRET`,`date_creation`,`taxation`,`first_name`,`last_name`,`identifier`,`email`,`email_checked`,`phone`,`password`,`user_key`) VALUES(:status,:type,:SIREN,:SIRET,:date_creation,:taxation,:first_name,:last_name,:identifier,:email,:email_checked,:phone,:password,:user_key)");
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
            'email_checked' => "false",
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
        * New user method
        *
        */

    public function newUser(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];
                    
        $i = $db->prepare("INSERT INTO User(`status`,`type`,`SIREN`,`SIRET`,`date_creation`,`taxation`,`first_name`,`last_name`,`identifier`,`email`,`email_checked`,`phone`,`password`,`user_key`) VALUES(:status,:type,:SIREN,:SIRET,:date_creation,:taxation,:first_name,:last_name,:identifier,:email,:email_checked,:phone,:password,:user_key)");
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
            'email_checked' => "false",
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
        * Set user password method
        *
        */

    public function setUserPassword(){

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
        * Set recovery user password method
        *
        */

    public function setRecoveryPassword(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE User SET password=:password WHERE user_key=:user_key AND recovery_key=:recovery_key");
        $q->execute([
            'user_key' => $_GET['get1'],
            'recovery_key' => $_GET['get2'],
            'password' => password_hash($this->user['password'], PASSWORD_BCRYPT, $options)
            ]);
        
    }

    /**
        * Set users password method
        *
        */

    public function setUsersPassword(){

        $db = parent::getDatabase();

        $options = [
        'cost' => 12
        ];

        $q = $db->prepare("UPDATE User SET password=:password WHERE id=:id");
        $q->execute([
            'id' => $this->user['value'],
            'password' => password_hash($this->user['password'], PASSWORD_BCRYPT, $options)
            ]);
        
    }

    /**
        * Delete user method
        *
        */

    public function deleteUser(){

        $db = parent::getDatabase();

        $q = $db->prepare("DELETE FROM `User` WHERE id=:id");
        $q->execute([
            'id' => $_SESSION['id']
            ]);

        $s = $db->prepare("DELETE FROM `Bank` WHERE SIREN=:SIREN");
        $s->execute([
            'SIREN' => $_SESSION['SIREN']
            ]);
        
    }

    /**
        * Delete users method
        *
        */

    public function deleteUsers(){

        $db = parent::getDatabase();

        $q = $db->prepare("DELETE FROM `User` WHERE id=:id");
        $q->execute([
            'id' => $this->user['value']
            ]);

        $s = $db->prepare("DELETE FROM `Bank` WHERE id=:id");
        $s->execute([
            'id' => $this->user['value']
            ]);
        
    }

    /**
        * Check user type
        *
        * @return boolean
        *
        */

    public function checkUserType(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE id=:id");
        $q->execute([
        'id' => $_SESSION['id']
        ]);

        $user = $q->fetch();

        if($user['type'] == "admin"){
            return 1;
        }else{
            return 0;
        }
        
    }

    /**
        * Check users type
        *
        * @return boolean
        *
        */

    public function checkUsersType(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE id=:id");
        $q->execute([
        'id' => $this->user['value']
        ]);

        $user = $q->fetch();

        if($user['type'] == "admin"){
            return 1;
        }else{
            return 0;
        }
        
    }

    /**
        * Check user
        *
        * @return boolean
        *
        */

    public function checkUser(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE SIREN=:SIREN OR SIRET=:SIRET OR email=:email OR identifier=:identifier");
        $q->execute([
        'SIREN' => $this->user['SIREN'],
        'SIRET' => $this->user['SIRET'],
        'email' => $this->user['email'],
        'identifier' => $this->user['identifier'],
        ]);

        $user = $q->fetch();

        if($user == TRUE){
            return 1;
        }else{
            return 0;
        }
        
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

        $user = $q->fetch();

        if($user == TRUE){
            return 0;
        }else{
            return 1;
        }
        
    }

    /**
        * Set email key method
        *
        */

    public function setEmailKeyChecked(){

        $db = parent::getDatabase();

        $q = $db->prepare("UPDATE User SET email_key=:email_key WHERE user_key=:user_key");
        $q->execute([
            'user_key' => $_GET['get1'],
            'email_key' => md5(microtime(TRUE)*100000)
            ]);
        
    }

    /**
        * Set email key method
        *
        */

    public function setEmailKey(){

        $db = parent::getDatabase();

        $q = $db->prepare("UPDATE User SET email_key=:email_key WHERE email=:email");
        $q->execute([
            'email' => $_SESSION['email'],
            'email_key' => md5(microtime(TRUE)*100000)
            ]);
        
    }

    /**
        * Set recovery key method
        *
        */

    public function setRecoveryKeyChecked(){

        $db = parent::getDatabase();

        $q = $db->prepare("UPDATE User SET recovery_key=:recovery_key WHERE user_key=:user_key");
        $q->execute([
            'user_key' => $_GET['get1'],
            'recovery_key' => md5(microtime(TRUE)*100000)
            ]);
        
    }

    /**
        * Set recovery key method
        *
        */

    public function setRecoveryKey(){

        $db = parent::getDatabase();

        $q = $db->prepare("UPDATE User SET recovery_key=:recovery_key WHERE email=:email");
        $q->execute([
            'email' => $this->user['email'],
            'recovery_key' => md5(microtime(TRUE)*100000)
            ]);
        
    }

    /**
        * Key mail verification
        *
        * @return boolean
        *
        */

    public function checkEmailKey(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE user_key=:user_key AND email_key=:email_key");
        $q->execute([
        'user_key' => $_GET['get1'],
        'email_key' => $_GET['get2']
        ]);

        $user = $q->fetch();

        if($user == TRUE){
            return 0;
        }else{
            return 1;
        }
        
    }

    /**
        * Recovery key verification
        *
        * @return boolean
        *
        */

    public function checkRecoveryKey(){

        $db = parent::getDatabase();

        $q = $db->prepare("SELECT * FROM User WHERE user_key=:user_key AND recovery_key=:recovery_key");
        $q->execute([
        'user_key' => $_GET['get1'],
        'recovery_key' => $_GET['get2']
        ]);

        $user = $q->fetch();

        if($user == TRUE){
            return 0;
        }else{
            return 1;
        }
        
    }
    
}