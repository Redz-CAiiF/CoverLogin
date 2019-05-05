<?php

class RegisterController {
    private $viewRegister = "view/registerModal.php";
    /*private $successPath = "success.php";
    private $errorPath = "index.php";*/
    private $modelUser = "model/DAOuser.php";
    
    
    private static function loadPupupController(){
        include_once ("controller/popupController.php"); /* gestione popup */
    }

    public function loadPage(){
        include ($this->viewRegister);
    }

    public function loadErrorPage($popup){
        //prepare the popup in case of error login invalid
        $_SESSION['invalid']="true";
        $_SESSION['message']=$popup;

        header("Location: ".$this->errorPath); die(); //mi sposto nella main-page
    }

    private function requireDaoUser(){
        require_once $this->modelUser;
    }

    //viene usata per encodare in formato json un array tra due stringhe
    private function JsonEncoder($arr){
        return "registerController".json_encode($arr)."registerController";
    }

    public function check(){
        self::loadPupupController();
        // controllo quando il model è finito
        if(isset($_POST['submit'])){ //controllo per sicurezza
            //register logic here
            session_start();
            $this->requireDaoUser();

            $user = new User(null,$_POST['user_DocumentoIdentita'],$_POST['user_username'],hash('sha256',$_POST['user_password']),$_POST['user_phonenumber'],$_POST['user_name'],$_POST['user_surname'],$_POST['user_email'],$_POST['user_photo']);

            if(count(getUsers(array('email'=>$user->Email))) >= 1){//ho un riscontro qundi esiste gia un utente con quella mail
                popupController::setPopup('Mail already used');
                //include the view
                echo $this->JsonEncoder(array('status' => false));
            } else {
                if(count(getUsers(array('username'=>$user->Username))) >= 1){//ho un riscontro qundi esiste gia un utente con quel username
                    popupController::setPopup('Username already used');
                    //include the view
                    echo $this->JsonEncoder(array('status' => false));
                } else {
                    //procedo ad inserire l'utente nel database
                    $result = insertUser($user); //inserire l'utente
                    
                    $_SESSION['username'] = $user->Username;
                    $_SESSION['password'] = $user->Password;
                    
                    if($result === false){
                        popupController::setPopup(':( Something bad happend');
                        echo $this->JsonEncoder(array('status' => false));
                    }else {
                        echo $this->JsonEncoder(array('status' => true));
                        //die();//apre la nuova pagina
                    }
                }
            }
        } else {
            echo $this->JsonEncoder(array('status' => false)); //non è passato per la logica corretta
        }
    }

}

?>
