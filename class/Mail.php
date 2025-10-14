<?php
/**
    * Mail management class.
    *
    * @author Emile Z.
    */
class Mail extends User{
    
    public function MailVerification(){

        self->setKey();
        $user = self->getUser();

        $sujet = "FreelanceAccounting - Verification de l'adresse mail";
        $entete = "From: service@" . HTTP_HOST;
        
        $message = "Pour verifier l'adresse mail, merci de cliquer sur ce lien
        
        https://" . HTTP_HOST . "/index.php?page=mail_verification&get1=".urlencode($user['user_key'])."get2=".urlencode($user['key'])."
        
        ---------------
        Ce mail est un mail automatique, merci de ne pas répondre";
        
        mail($user['email'], $sujet, $message, $entete);

    }

    public function MailRecovery($user){

        self->setKey();
        $user = self->getUser();
    
        $sujet = HTTP_HOST . " - Recupération de votre compte";
        $entete = "From: service@" . HTTP_HOST;
        
        $message = "Pour recupérer votre compte, merci de cliquer sur ce lien
        
        https://" . HTTP_HOST . "/index.php?page=password_recovery&get1=".urlencode($user['user_key'])."&get2=".urlencode($user['key'])."
        
        ---------------
        Ce mail est un mail automatique, merci de ne pas répondre";
        
        mail($user['email'], $sujet, $message, $entete);

    }

}