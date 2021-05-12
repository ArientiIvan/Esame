<!DOCTYPE html>
<html>
<?php
    include 'start.php';
?>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Registrazione</title>
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
                        <button class="btn btn-lg btn-primary btn-block btn-accesso" type="submit">Registrati</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">

                <?php
                    if(isset($_POST['submit'])){
                        if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !='')){

                            $email = $_POST['email'];
                            $password = $_POST['password'];
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>