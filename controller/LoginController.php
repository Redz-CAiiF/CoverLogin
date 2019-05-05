<?php

class LoginController {
    private $viewLogin = "view/loginModal.php";
    private $successPath = "success.php";
    private $errorPath = "index.php";
    private $modelUser = "model/DAOuser.php";

    public function loadPage(){
        include ($this->viewLogin);
    }

    private function requireDaoUser(){
        require_once $this->modelUser;
    }

    public function check(){
        // controllo quando il model è finito
        if(isset($_POST['submit'])){ //controllo per sicurezza
            session_start();
            $this->requireDaoUser();
        
            $user_username =  $_POST['user-username'];
            $user_password =  hash('sha256',$_POST['user-password']);
            $filterCredential = array('username'=>$user_username,'password'=>$user_password);
        
            if(count(getUsers($filterCredential)) == 1){//ho un riscontro
        
                $_SESSION['username'] = $user_username;
                $_SESSION['password'] = $user_password;
                
                //var_dump($_REQUEST);
                
                header("Location: ".$this->successPath); die();//chiamo la pagina di success
            } else {
                //prepare the popup in case of error login invalid
                $_SESSION['invalid']="true";
                $_SESSION['message']="Invalid username and password";

                header("Location: ".$this->errorPath); die(); //mi sposto nella main-page
            }
        } else {
            $this->loadPage("error incorrect program logic"); //non è passato per la logica corretta
            //the passed message is only for debug
        }
    }

}

?>
