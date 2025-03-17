<?php
    error_reporting(0);
    ini_set('display_errors', '0');

    session_start();
    $email = $_SESSION["email"];
    $nome = $_SESSION["nome"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CashTrash - Home Page</title>
    <link rel="icon" href="images/Logo TrashCash no scritta.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header id="navbar">
        <div class="Logo">
            <img src="images/Logo TrashCash.png" class="logo">
            <img src="images/Logo TrashCash no scritta.png" class="logonoscritta">
        </div>
        <div class="menu" id="menu">
            <ul class="sidebar">
                <li><a href="#" onclick="hideSidebar()"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="chisiamo.html">Chi siamo</a></li>
                <li><a href="#" onclick="infoscroll()" id="informazioni">Informazioni</a></li>
                <li><a href="contactus.html" id="contattaci">Contattaci</a></li>
                <?php if(!$_SESSION["logged"]){?>
                    <li><a id="pulsantePagina2" href="login/login.php"><button class="loginbtn">Login</button></a></li>
                    <li><a href="login/signup.php"><button class="signupbtn">SignUp</button></a></li>
                <?php } ?>
                <?php if($_SESSION["logged"]){?>
                    <li class="hideonmobile">
                        <div class="dropd">
                            <img src="images/account.png" alt="">
                            <div class="dropd-content">
                                <p><?php echo $_SESSION["nome"]; ?></p>
                                +<p><?php echo $_SESSION["email"]; ?></p>
                                <a href="login/logout.php">Logout</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <ul class="flexbar">
                <li class="hideonmobile"><a href="chisiamo.html">Chi siamo</a></li>
                <li class="hideonmobile"><a href="#" onclick="infoscroll()" id="informazioni">Informazioni</a></li>
                <li class="hideonmobile"><a href="contactus.html" id="contattaci">Contattaci</a></li>
                <?php if(!$_SESSION["logged"]){?>
                    <li class="hideonmobile"><a id="pulsantePagina2" href="login/login.php"><button class="loginbtn">Login</button></a></li>
                    <li class="hideonmobile"><a href="login/signup.php"><button class="signupbtn">SignUp</button></a></li>
                <?php } ?>
                <?php if($_SESSION["logged"]){?>
                    <li class="hideonmobile">
                        <div class="dropd">
                            <img src="images/account.png">
                                <div class="dropd-content">
                                    <p><?php echo $_SESSION["nome"]; ?></p>
                                    <p><?php echo $_SESSION["email"]; ?></p>
                                    <a href="login/logout.php">Logout</a>
                                </div>
                        </div>
                    </li>
                <?php } ?>
                <li class="menuicon"><a href="#" onclick="showSidebar()"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#434343"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </div>
    </header>

    <section class="main-page">
        <div class="container">
            <div class="maintextbox">
                <h1>Una ricompensa<br>per il bene<br>che fai.</h1>
                <a href="codescan.html"><button class="startbtn">Utilizza prodotto</button></a>
            </div>
            <div class="side-image">
                <img src="images/side image 2.png">
            </div>
        </div>
    </section>

    <section class="product-page">
            <div class="first-scroll">
                <div class="producttextbox">
                    <h1>RIDUCI, RICICLA, RIVOLUZIONA.</h1>
                    <p><strong>TradeBin:</strong> eleganza e tecnologia per un riciclo intelligente e premiato.</p>
                </div>
                <div class="product-img">
                    <img src="images/imgcestino.png">
                </div>
            </div>
    </section>

    <section class="videopage">
        <div class="ytvideo">
            <iframe width="100%" height="100%"
            src="https://www.youtube.com/embed/GKawjcClAXI?si=9ifklyDfc4htwCzT"
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
            </iframe>
        </div>

        <div class="videotextbox">
            <h1>DAI UN OCCHIATA!</h1>
            <p>Un piccolo video sul TradeBin per dimostrare il nostro impegno verso l'ambiente</p>
        </div>
    </section>

    <section class="infobar">
        <div class="info-container">
            <div class="info-text-container">
                <div class="ruoli">
                    <h4>Sviluppatore Web</h5>
                    <p>Alberto D'Addetta</p>
                </div>
                <div class="ruoli">
                    <h4>Sviluppatore Hardware</h5>
                    <p>Francesco Antonio Mangiacotti</p>
                </div>
                <div class="ruoli">
                    <h4>Facilitatore</h5>
                    <p>Nicola Savino</p>
                </div>
            </div>
            <div class="info-others">
                <h4>Collaboratori</h4>
                <ul>
                    <li>Emanuele Steduto</li>
                    <li>Giuseppe Ziccardi</li>
                    <li>Beatrice Patrone</li>
                    <li>Francesco Longo</li>
                    <li>Daniele Vinelli</li>
                    <li>Marwan Belli</li>
                    <li>Giovanni Luca Ciavarella</li>
                </ul>
            </div>
            <div class="info-actions">
                <h4>Azioni</h4>
                <ul>
                    <li><a href="codescan.html">Scansiona Codice</a></li>
                    <li><a href="chisiamo.html">Chi Siamo</a></li>
                    <li><a href="https://www.youtube.com/@CashTrashbuisness">Canale YT</a></li>
                    <li><a href="contactus.html">Contattaci</a></li>
                    <li><a href="login/signup.php">Registrati</a></li>
                    <li><a href="login/login.php">Accedi</a></li>
                </ul>
            </div>
        </div>
    </section>
</body>
<script src="script.js"></script>
</html>