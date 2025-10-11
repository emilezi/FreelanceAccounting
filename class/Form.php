<?php
/**
    * Form management class.
    *
    * @author Emile Z.
    */
class Form{

    protected $post;

    public function __construct(){
        $this->post = $_POST;
    }

    /**
        * Authentification verification form
        *
        * @param array form post authentification information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function Authentication(){

        if(
            !empty($this->post['email'])
            &&
            !empty($this->post['password'])
            )
            {
                if(preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $this->post['email']))
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
    
            }

    }

    /**
        * New user verification form
        *
        * @param array form post new user information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    
    public function newUser(){

        if(
        !empty($this->post['first_name'])
        &&
        !empty($this->post['last_name'])
        &&
        !empty($this->post['identifier'])
        &&
        !empty($this->post['email'])
        &&
        !empty($this->post['phone'])
        &&
        !empty($this->post['status'])
        &&
        !empty($this->post['SIREN'])
        &&
        !empty($this->post['SIRET'])
        &&
        !empty($this->post['date_creation'])
        &&
        !empty($this->post['taxation'])
        &&
        !empty($this->post['password'])
        &&
        !empty($this->post['repassword'])
        )
        {
            if(
            preg_match("#^[^<>]+$#i", $this->post['first_name'])
            &&
            preg_match("#^[^<>]+$#i", $this->post['last_name'])
            &&
            preg_match("#^[a-z0-9]+$#i", $this->post['identifier'])
            &&
            preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $this->post['email'])
            &&
            preg_match("#^[0-9]+$#i", $this->post['phone'])
            &&
            preg_match("#^[a-z0-9]+$#i", $this->post['SIREN'])
            &&
            preg_match("#^[a-z0-9]+$#i", $this->post['SIRET'])
            )
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;
        }

    }

    /**
        * Edit user verification form
        *
        * @param array form post edit user information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */
    
    public function editUser(){

        if(
        !empty($this->post['email'])
        &&
        !empty($this->post['phone'])
        )
        {
            if(
            preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $this->post['email'])
            &&
            preg_match("#^[0-9]+$#i", $this->post['phone'])
            )
            {
                return 0;
            }else{
                return 1;
            }
        }else{
            return 2;
        }
    
    }

    /**
        * Check password verification form
        *
        * @param array form post check password information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function checkPassword(){

        if(
            !empty($this->post['password'])
            &&
            !empty($this->post['repassword'])
            ){

        if($this->post['password'] == $this->post['repassword']){

            return 0;

        }else{

            return 1;

        }

    }else{

        return 2;

    }

    }

    /**
        * Check business verification form
        *
        * @param array form post check business information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function checkBusiness(){

        if(
            !empty($this->post['company_name'])
            &&
            !empty($this->post['trade_name'])
            &&
            !empty($this->post['SIRET'])
            &&
            !empty($this->post['vat_number'])
            &&
            !empty($this->post['country'])
            &&
            !empty($this->post['address'])
            &&
            !empty($this->post['address_supplement'])
            &&
            !empty($this->post['postal_code'])
            &&
            !empty($this->post['city'])
            &&
            !empty($this->post['description'])
            )
            {
                if(
                preg_match("#^[^<>]+$#i", $this->post['company_name'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['trade_name'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['SIRET'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['vat_number'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['country'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['address'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['address_supplement'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['postal_code'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['city'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['description'])
                )
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
            }

    }

    /**
        * Check charge verification form
        *
        * @param array form post check charge information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function checkCharge(){

        if(
            !empty($this->post['name'])
            &&
            !empty($this->post['category'])
            &&
            !empty($this->post['price'])
            )
            {
                if(
                preg_match("#^[^<>]+$#i", $this->post['name'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['category'])
                &&
                preg_match("#^[0-9]+$#i", $this->post['price'])
                )
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
            }

    }

    /**
        * Check client verification form
        *
        * @param array form post check client information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function checkClient(){

        if(
            !empty($this->post['name'])
            &&
            !empty($this->post['email'])
            &&
            !empty($this->post['phone'])
            &&
            !empty($this->post['category'])
            &&
            !empty($this->post['langue'])
            )
            {
                if(
                preg_match("#^[^<>]+$#i", $this->post['name'])
                &&
                preg_match("#^[a-z0-9.]+@[a-z0-9.]+$#i", $this->post['email'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['phone'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['category'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['langue'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['country'])
                )
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
            }

    }

    /**
        * Check currency verification form
        *
        * @param array form post check currency information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function checkCurrency(){

        if(
            !empty($this->post['customer_name'])
            &&
            !empty($this->post['service_name'])
            &&
            !empty($this->post['start_date'])
            &&
            !empty($this->post['end_date'])
            &&
            !empty($this->post['hours_days'])
            &&
            !empty($this->post['number_days'])
            )
            {
                if(
                preg_match("#^[^<>]+$#i", $this->post['customer_name'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['service_name'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['start_date'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['end_date'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['hours_days'])
                &&
                preg_match("#^[0-9]+$#i", $this->post['number_days'])
                )
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
            }

    }

    /**
        * Check service verification form
        *
        * @param array form post check service information
        *
        * @return int if the fields are correctly filled in otherwise return the error number
        *
        */

    public function checkService(){

        if(
            !empty($this->post['name'])
            &&
            !empty($this->post['category'])
            &&
            !empty($this->post['costhour'])
            )
            {
                if(
                preg_match("#^[^<>]+$#i", $this->post['name'])
                &&
                preg_match("#^[^<>]+$#i", $this->post['category'])
                &&
                preg_match("#^[0-9]+$#i", $this->post['costhour'])
                )
                {
                    return 0;
                }else{
                    return 1;
                }
            }else{
                return 2;
            }

    }

}