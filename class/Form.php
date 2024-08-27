<?php

class Form{

    protected $post;

    public function __construct(){
        $this->post = $_POST;
    }

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
        !empty($this->post['SIREN'])
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

}