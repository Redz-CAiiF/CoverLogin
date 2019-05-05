<?php

class RegisterController {
    private $viewRegister = "view/registerModal.php";
    private $successPath = "success.php";
    private $errorPath = "index.php";
    private $modelUser = "model/DAOuser.php";

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

    public function check(){
        // controllo quando il model è finito
        if(isset($_POST['submit'])){ //controllo per sicurezza
            //register logic here
            session_start();
            $this->requireDaoUser();

            $user = new User(null,$_POST['user-DocumentoIdentita'],$_POST['user-Username'],$_POST['user-password'],$_POST['user-Telefono'],$_POST['user-Nome'],$_POST['user-Cognome'],$_POST['user-email'],$_POST['user-Fotografia']);

            if(count(getUsers(array('email'=>$user->Email))) >= 1){//ho un riscontro qundi esiste gia un utente con quella mail
                $popup = 'Mail already used';
                //include the view
                $this->loadErrorPage($popup);
            } else {
                if(count(getUsers(array('username'=>$user->Username))) >= 1){//ho un riscontro qundi esiste gia un utente con quel username
                    $popup = 'Username already used';
                    //include the view
                    $this->loadErrorPage($popup);
                } else {
                    //procedo ad inserire l'utente nel database
                    $result = insertUser($user); //inserire l'utente
                    
                    $_SESSION['username'] = $user->Username;
                    $_SESSION['password'] = $user->Password;
                    
                    if($result === false){
                        $popup = ':( Something bad happend';
                        $this->loadErrorPage($popup);//include la view register
                    }else {
                        //echo("utente inserito");
                        header("Location: ".$this->successPath); die();//apre la nuova pagina
                    }
                }
            }
        } else {
            $this->loadPage("error incorrect program logic"); //non è passato per la logica corretta
            //the passed message is only for debug
        }
    }

}

?>
