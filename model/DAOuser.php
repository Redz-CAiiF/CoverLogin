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


/*ID, DocumentoIdentita, Username, Password, Telefono, Nome, Cognome, Email, Fotografia
:id, :documentoidentita, :username, :password, :telefono, :nome, :cognome, :email, :fotografia*/

function insertUser($user){

    $query = "INSERT INTO utente (DocumentoIdentita, Username, Password, Telefono, Nome, Cognome, Email, Fotografia) VALUES (:documentoidentita, :username, :password, :telefono, :nome, :cognome, :email, :fotografia)";

    $parameters = array(
        "documentoidentita" => $user->DocumentoIdentita,
        "username" => $user->Username,
        "password" => $user->Password,
        "telefono" => $user->Telefono,
        "nome" => $user->Nome,
        "cognome" => $user->Cognome,
        "email" => $user->Email,
        "fotografia" => $user->Fotografia
    );

    if(Database::execute($query, $parameters)){
        return true;
    }
    return false;
}


function getUsers($parametersValues){
    $queryColums = ["ID",
                    "DocumentoIdentita",
                    "Username",
                    "Password",
                    "Telefono",
                    "Nome",
                    "Cognome",
                    "Email",
                    "Fotografia"];
    
    $queryTable = "utente";
    
    $result = Database::getTuples($queryColums, $queryTable, null, $parametersValues, null);
    $users = array();
    foreach($result as $row){
        array_push($users, new User($row['ID'], $row['DocumentoIdentita'], $row['Username'], $row['Password'], $row['Telefono'], $row['Nome'], $row['Cognome'], $row['Email'], $row['Fotografia']));
    }
    return $users;
}


/*$values = array(
    'username'=>'admin',
    'hash'=>'5E884898DA28047151D0E56F8DC6292773603D0D6AABBDD62A11EF721D1542D8'
    );

echo("chiamo la fx<br>");
print_r(getUsers($values));*/







//var_dump(getUsers(array('email'=>"ute@ute.ute")));




/*function getUserByEmail($email){
    return getUsers(array('email'=>$email));
}

function getUserByEmailPassword($email, $password){
    return getUsers(array('email'=>$email,'password'=>$password));
}

function insertUser($user){
    Database::executeQuery("INSERT INTO Utente (DocumentoIdentita,Username,Password,Telefono,Nome,Cognome,Email,Fotografia) VALUES (:DocumentoIdentita,:Username,:Password,:Telefono,:Nome,:Cognome,:Email,:Fotografia)", array(new Param(":DocumentoIdentita",$user->DocumentoIdentita), new Param(":Username",$user->Username), new Param(":Password",$user->Password), new Param(":Telefono",$user->Telefono), new Param(":Nome",$user->Nome), new Param(":Cognome",$user->Cognome), new Param(":Email",$user->Email), new Param(":Fotografia",$user->Fotografia)), $pathIni);
    return true;
}*/
?>