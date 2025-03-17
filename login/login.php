<?php
error_reporting(0);
ini_set('display_errors', '0');

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'reglog');


if(!(empty($nome) && empty($password))){
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare('select * from utente where email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                $_SESSION["email"] = $data["email"];
                $_SESSION["logged"] = true;
                header("location: ../index.php");
                exit;
            }
            else{
                $error = "Email o password non validi";
            }
        }
        else{
            $error = "Email o password non validi";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CashTrash - Login</title>
    <link rel="stylesheet" href="login.css">
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

                    <h2>Login</h2>
                    <?php if(!empty($_SESSION["success"])){?>
                        <div class="success">
                            <p class="successp"><?= $_SESSION["success"]?></p>
                        </div>
                    <?php } ?>
                    <?php if(!empty($error)){?>
                        <div class="error">
                            <p class="errorp"><?= $error?></p>
                        </div>
                    <?php } ?>

                    <form action="login.php" method="post">
                        <input type="text" placeholder="Email" required autofocus="" name="email">
                        <input type="password" placeholder="Password" required autofocus="" name="password">
                        <button class="btn" type="submit">Login</button>
                    </form>
                    <p class="account">Non hai un'account? <a href="signup.php">Registrati</a></p>
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