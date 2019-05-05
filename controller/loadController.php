<?php

class loadController {
    private $viewLogin = "view/loginPage.php";

    public function loadPage(){
        include ($this->viewLogin);
    }

}

?>
