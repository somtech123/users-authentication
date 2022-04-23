<?php 

class SingupContr extends Singup {
    private $username;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct($username, $email, $password, $confirmPassword)
    {
       $this->username = $username;
       $this->email = $email;
       $this->password = $password;
       $this->confirmPassword = $confirmPassword;
    }
    public function singupUser(){
        if($this->emptyInput() == false){
            //echo emptyinput
            header("Location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsename() == false){
            //echo invalid username
            header("Location: ../index.php?error=invalidusername");
            exit();
        }
        if($this->inValidEmail() == false){
            //echo invalid email
            header("Location: ../index.php?error=invalidemail");
            exit();
        }
        
        if($this->pwdMatch() == false){
            //echo password do not match
            header("Location: ../index.php?error=passworderror");
            exit();
        }
        
        if($this->isTaken() == false){
            //echo username or email available
            header("Location: ../index.php?error=usernameandemailtaken");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->password);
        
    }

    //check for empty array
private function emptyInput(){
    $result;
  if(empty($this->username) || empty($this->email)   || empty($this->password) || empty($this->confirmPassword)){
       $result = false;
  } else{
      $result = true;
  }
  return $result;
}
private function invalidUsename(){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
       $result = false;
    } else{
        $result = true;
    }
    return $result;

}

private function inValidEmail(){
    $result;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        $result = false;
    } else{
        $result = true;
    }
    return $result;

}

private function pwdMatch(){
    $result;
    if($this->password !== $this->confirmPassword){
        $result = false;
    } else{
        $result = true;
    }
    return $result;
}

private function isTaken(){
    $result;
    if(!$this->checkUser($this->username, $this->email)){
        $result = false;
    } else{
        $result = true;
    }
    return $result;
}








}





