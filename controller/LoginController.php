<?php

class LoginController {
    private $viewLogin = "view/loginModal.php";
    /*private $successPath = "success.php";
    private $errorPath = "index.php";*/
    private $modelUser = "model/DAOuser.php";

    private static function loadPupupController(){
        include_once ("controller/popupController.php"); /* gestione popup */
    }

    public function loadPage(){
        include ($this->viewLogin);
    }

    private function requireDaoUser(){
        require_once $this->modelUser;
    }

    //viene usata per encodare in formato json un array tra due stringhe
    private function JsonEncoder($arr){
        return "loginController".json_encode($arr)."loginController";
    }

    public function check(){
        self::loadPupupController();
        // controllo quando il model è finito
        if(isset($_POST['submit'])){ //controllo per sicurezza
            session_start();
            $this->requireDaoUser();
        
            $user_username =  $_POST['user_username'];
            $user_password =  hash('sha256',$_POST['user_password']);
            $filterCredential = array('username'=>$user_username,'password'=>$user_password);
        
            if(count(getUsers($filterCredential)) == 1){//ho un riscontro
        
                $_SESSION['username'] = $user_username;
                $_SESSION['password'] = $user_password;
                
                //var_dump($_REQUEST);
                
                //header("Location: ".$this->successPath); die();//chiamo la pagina di success
                echo $this->JsonEncoder(array('status' => true));
            } else {
                //prepare the popup in case of error login invalid
                popupController::setPopup("Invalid username and password");

                //header("Location: ".$this->errorPath); die(); //mi sposto nella main-page
                echo $this->JsonEncoder(array('status' => false));
            }
        } else {
            //$this->loadPage("error incorrect program logic"); //non è passato per la logica corretta
            echo $this->JsonEncoder(array('status' => false));
            //the passed message is only for debug
        }
    }

}

?>
