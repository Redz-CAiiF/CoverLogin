<?php

class popupController {
    private $popupView = "view/popup.php";

    public function load(){
        include ($this->popupView);
    }

}

?>
