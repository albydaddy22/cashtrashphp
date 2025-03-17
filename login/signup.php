<?php
error_reporting(0);
ini_set('display_errors', '0');
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'reglog');

if(!(empty($nome) && empty($email) &&empty($password))){
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare('insert into utente(nome, email, password) values(?, ?, ?)');
        $stmt->bind_param('sss', $nome, $email, $password);
        $stmt->execute();
        $_SESSION["email"] = $data["email"];
        $_SESSION["nome"] = $data["nome"];
        $_SESSION["logged"] = true;
        $_SESSION["success"] = "Registrazione avvenuta con successo. Accedi";
        header("location: ../login/login.php");
        $stmt->close();
        $conn->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CashTrash - Registration</title>
    <link rel="stylesheet" href="registration.css">
    <link rel="icon" href="../images/Logo TrashCash no scritta.png" type="image/x-icon">
</head>
<body>
    <header id="navbar">
        <div class="Logo">
            <img src="../images/Logo TrashCash.png" class="logo">
            <img src="../images/Logo TrashCash no scritta.png" class="logonoscritta">
        </div>
        <div class="menu" id="menu">
            <ul class="sidebar">
                <li><a href="#" onclick="hideSidebar()"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="../index.php" id="informazioni">Home Page</a></li>
            </ul>
            <ul class="flexbar">
                <li class="hideonmobile"><a href="../index.php">Home Page</a></li>
                <li class="menuicon"><a href="#" onclick="showSidebar()"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#434343"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </div>

    </header>
    <div class="login-form">
        
        <div class="container">
            <div class="main">
                <div class="content">

                    <h2>SignUp</h2>
                    <form action="signup.php" method="post">
                        <input type="text" placeholder="Nome e Cognome" required autofocus="" name="nome">
                        <input type="text" placeholder="Email" required autofocus="" name="email">
                        <input type="password" placeholder="Password" required autofocus="" name="password">
                        <button class="btn" type="submit">SignUp</button>
                    </form>
                    <p class="account">Hai già un account? <a href="login.php">Accedi</a></p>
                </div>
                <div class="form-img">
                    <img src="../images/phone.png">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../script.js"></script>
</html>