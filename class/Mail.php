<?php
/**
    * Mail management class.
    *
    * @author Emile Z.
    */
class Mail extends User{
    
    public function MailVerification(){

        $this->setKey();
        $user = $this->getUser();

        $sujet = "FreelanceAccounting - Verification de l'adresse mail";
        $entete = "From: service@" . EMAIL_HOST;
        
        $message = "Pour verifier l'adresse mail, merci de cliquer sur ce lien
        
        http://" . HTTP_HOST . "/index.php?link=mail_verification&get1=".urlencode($user['user_key'])."get2=".urlencode($user['recovery_key'])."
        
        ---------------
        Ce mail est un mail automatique, merci de ne pas répondre";
        
        mail($user['email'], $sujet, $message, $entete);

    }

    public function MailRecovery(){

        $this->setRecoveryKey();
        $user = $this->getUser();
    
        $sujet = "FreelanceAccounting - Recupération de votre compte";
        $entete = "From: service@" . EMAIL_HOST;
        
        $message = "Pour recupérer votre compte, merci de cliquer sur ce lien
        
        http://" . HTTP_HOST . "/link.php?page=password_recovery&get1=".urlencode($user['user_key'])."&get2=".urlencode($user['recovery_key'])."
        
        ---------------
        Ce mail est un mail automatique, merci de ne pas répondre";
        
        mail($user['email'], $sujet, $message, $entete);

    }

}