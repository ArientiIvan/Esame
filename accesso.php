<!DOCTYPE html>
<html>
<?php
    include 'start.php';
?>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Accesso</title>
</head>
<body style="text-align: center">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="card card-container">

                    <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="email" id="email" class="form-control" placeholder="Email" required autofocus>
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                        <a href="#" class="passwordDimenticata">Password dimenticata?</a>
                        <button class="btn btn-lg btn-primary btn-block btn-accesso" type="submit">Accedi</button>
                    </form>
                    <div class="login-oppure">
                        <hr class="hr-oppure">
                        <span class="span-oppure">Oppure</span>
                    </div>
                    <form action="#"><button class="btn btn-lg btn-primary btn-block btn-registrazione" type="submit">Registrati</button></form>
                </div>
            </div>
            <div class="col-md-4">

                <?php
                    if(isset($_POST['submit'])){
                        echo"yess";
                        if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !='')){

                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            $sqlEmail = "SELECT * 
                                         FROM Utenti 
                                         WHERE email = '". $email ."'"
                                        ;
                            $result = $conn->connection->query($query);
                            
                            if($result === TRUE){
                                echo"primo";
                                $row = mysqli_fetch_assoc($rs);
                                
                                if(password_verify($password,$row['password'])){
                                    echo"secondo";
                                    /*header('location:homepage.php');
                                    exit;*/
                                }
                                else
                                {
                                    echo"secondo else";
                                    $errore =  "Password non corretta";
                                }
                            }
                            else
                            {
                                echo"primo else";
                                $errore =  "Email non corretta";
                            }

                            if(isset($errore)){
                                echo"terzo if";
                                echo "<div class='error-msg'>";
                                echo $errore;
                                echo "</div>";
                                unset($errore);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>