<?php

include 'config.php';
include 'modeli/korisnikUlogovan.php';

session_start();
error_reporting(0);


if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
if (isset($_POST['email']) && isset($_POST['password'])) {
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $korisnik = new KorisnikUlogovan(1, $email, $password);
    $odg = KorisnikUlogovan::ulogujKorisnika($korisnik, $conn); 

    if ($odg->num_rows == 1) { 
        $_SESSION['user_id'] = $korisnik->id;
        header("Location: index.php"); 
        exit();
    } else {

        echo "<script>alert('Ups! Pogrešan e-mail ili lozinka.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/prijava.css">

</head>

<body>
    
    <div class="bodi" style="background-color: #88c492;">

        <div class="container"  style="background-color: #e6e6e6;">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Uloguj se</p>
                <div class="input-group">
                    <input type="email" placeholder="E-mail" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Lozinka" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group">
                <button name="submit" class="btn" style="background-color: #88c492; color: white;">Uloguj se</button>
                </div>
                <p class="login-register-text">Nemaš nalog? <a href="register.php" style="color: #88c492;">Registruj se ovde</a>.</p>
            </form>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>