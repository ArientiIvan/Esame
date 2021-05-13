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
                <?php
                        if(isset($_POST['enter'])){
                            if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !='')){
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                $query = "SELECT * 
                                        FROM utenti 
                                        WHERE email = '". $email ."'"
                                        ;
                                $result = $conn->connection->query($query);

                                if($result->num_rows > 0){

                                    $row = mysqli_fetch_assoc($result);
                                    
                                    if(hash('SHA512',$password) == $row['Password']){

                                        header('location:paginaPrincipale.php');
                                        exit;
                                    }
                                    else{
                                        $errore =  "Password non corretta";
                                    }
                                }
                                else{
                                    $errore =  "Email non corretta";
                                }
                                
                                if(isset($errore)){
                                    echo "<div class='error-msg'>";
                                    echo $errore;
                                    echo "</div>";
                                    unset($errore);
                                }
                            }
                        }

                    ?>
                <div class="card card-container">
                    <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <a href="#" class="passwordDimenticata">Password dimenticata?</a>
                        <button name= "enter" class="btn btn-primary btn-block btn-accesso" type="submit">Accedi</button>
                    </form>
                    <div class="login-oppure">
                        <hr class="hr-oppure">
                        <span class="span-oppure">Oppure</span>
                    </div>
                    <form action="registrazione.php"><button class="btn btn-lg btn-primary btn-block btn-registrazione" type="submit">Registrati</button></form>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>

</body>
</html>