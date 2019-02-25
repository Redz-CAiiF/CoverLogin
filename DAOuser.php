<?php
require_once "Database.php";

class User{
    public $ID;
    public $DocumentoIdentita;
    public $Username;
    public $Password;
    public $Telefono;
    public $Nome;
    public $Cognome;
    public $Email;
    public $Fotografia;

    function __construct($ID,$DocumentoIdentita,$Username,$Password,$Telefono,$Nome,$Cognome,$Email,$Fotografia){
        $this->ID = $ID;
        $this->DocumentoIdentita = $DocumentoIdentita;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->Telefono = $Telefono;
        $this->Nome = $Nome;
        $this->Cognome = $Cognome;
        $this->Email = $Email;
        $this->Fotografia = $Fotografia;
    }
}

class UserCredential{
    private $email;
    private $hash;
    
    function __construct($email, $hash){
        $this->email = $email;
        $this->hash = $hash;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getHash(){
        return $this->hash;
    }
    public function setHash($hash){
        $this->hash = $hash;
    }
}

function getUserByEmail($email, $pathIni){
    $result =  Database::executeQuery("SELECT email FROM Utente WHERE email=:email", array(new Param(":email",$email)), $pathIni);
    $return = array();
    foreach($result as $row){
        array_push($return, new UserCredential($row['email'], null));
    }
    //print_r($return);
    return $return;
}

function getUserByEmailPassword($email, $password, $pathIni){
    $result =  Database::executeQuery("SELECT ID,DocumentoIdentita,Username,Password,Telefono,Nome,Cognome,Email,Fotografia FROM Utente WHERE Email=:email AND Password=:password", array(new Param(":email",$email), new Param(":password",$password)), $pathIni);
    $return = array();
    foreach($result as $row){
        //array_push($return, new UserCredential($row['email'], $row['password']));
        array_push($return, new User($row['ID'],$row['DocumentoIdentita'],$row['Username'],$row['password'],$row['Telefono'],$row['Nome'],$row['Cognome'],$row['email'],$row['Fotografia']));
    }
    return $return;
}

/*
SELECT ID,DocumentoIdentita,Username,Password,Telefono,Nome,Cognome,Email,Fotografia,

ID INT AUTO_INCREMENT,
DocumentoIdentita CHAR(9) NOT NULL COMMENT 'Codice del documento',
Username VARCHAR(50) NOT NULL,
Password CHAR(128) NOT NULL,
Telefono VARCHAR(10) NOT NULL COMMENT 'Numero di telefono',
Nome VARCHAR(50) NOT NULL,
Cognome VARCHAR(50) NOT NULL,
Email VARCHAR(50) NOT NULL,
Fotografia VARCHAR(50) NOT NULL,
*/

function insertUser($user, $pathIni){
    Database::executeQuery("INSERT INTO Utente (DocumentoIdentita,Username,Password,Telefono,Nome,Cognome,Email,Fotografia) VALUES (:DocumentoIdentita,:Username,:Password,:Telefono,:Nome,:Cognome,:Email,:Fotografia)", array(new Param(":DocumentoIdentita",$user->DocumentoIdentita), new Param(":Username",$user->Username), new Param(":Password",$user->Password), new Param(":Telefono",$user->Telefono), new Param(":Nome",$user->Nome), new Param(":Cognome",$user->Cognome), new Param(":Email",$user->Email), new Param(":Fotografia",$user->Fotografia)), $pathIni);
    return true;
}

?>