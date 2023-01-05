<?php

class SignupContr extends \classes\signup {
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdrepeat, $email){
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser(){
        if($this->emptyInput() == false){

            header("location: ../index1.php?error=emptyinput");
            exit();

        }

        if($this->invalidUid() == false){

            header("location: ../index1.php?error=username");
            exit();

        }

        if($this->invalidEmail() == false){

            header("location: ../index1.php?error=email");
            exit();

        }
        if($this->pwdMatch() == false){

            header("location: ../index1.php?error=pwd");
            exit();

        }

        if(!$this->uidTakenCheck() == false){

            header("location: ../index1.php1?error=useroremailtaken");
            exit();

        }

        $this->setUser($this->uid, $this->pwd, $this->email);





    }

    private function emptyInput(){
        $result = false;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidUid(){
        $result = false;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function invalidEmail(){
        $result = false;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function pwdMatch(){
        $result = false;

        if($this->pwd !== $this->pwdrepeat){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function uidTakenCheck(){
        $result = false;

        if(!$this->checkUser($this->uid, $this->email)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }
}
