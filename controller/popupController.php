<?php

class popupController {
    private $popupView = "view/popup.php";

    public function load(){
        session_start();
        include ($this->popupView);
        self::unsetPopup();
    }

    public static function setPopup($message){
        $_SESSION['invalid'] = "true";
        $_SESSION['message'] = $message;
    }
    
    public static function unsetPopup(){
        unset($_SESSION['invalid']);
        unset($_SESSION['message']);
    }

}

?>
