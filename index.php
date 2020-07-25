<?php
ob_start();
session_start();
require_once 'dbconnect.php';


if ( isset($_SESSION['user'])!=""){
    header("Location: home.php");
    exit;
}

$error = false;

if( isset($_POST['btn-login'])){


$email = trim($_POST['email']);
$email = strip_tags($email);
$email = htmlspecialchars($email);

$pass = trim($_POST[ 'pass']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);


if(empty($email)){
    $error = true;
    $emailError = "Please enter your email address.";
} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter valid email address.";
}

if (empty($pass)){
    $error = true;
    $passError = "Please enter your password.";
}


if (!$error) {

    $password = hash( 'sha256', $pass);

    $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'" );
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res);

    if( $count == 1 && $row['userPass' ]==$password ) {
        if($row["status"] == 'admin'){
          $_SESSION["admin"] = $row["userId"];
          header("Location: admin.php");

        }else {
            $_SESSION['user'] = $row['userId'];
            header( "Location: home.php");
          }
         
        } else {
         $errMSG = "Incorrect Credentials, Try again..." ;
        }
       
       }
      
      }
      ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - Petadoption</title>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <br>
        <br>
        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">


<h2 class="index-color">Welcome to Pet's Adoption by PatrickM</h2>
<h2 class="index-color">Please enter your E-Mail and password to enter the Pet Adoption</h2>
<hr />

<?php
if (isset($errMSG) ) {
    echo $errMSG; ?>

    <?php
}
?>



<input type"email" name="email" placeholder= "Your E-Mail" value="<?php echo $email; ?>" maxlength="40" /> <br>

<span><?php echo $emailError; ?></span>


<input type="password" name="pass" placeholder ="Your Password" maxlength="15" /> <br>

<span><?php echo $passError; ?></span>
<hr>
<button type="submit" name="btn-login">Enter</button>


<hr>
<p class="index-color">Create a new PatrickM Pet Adoption Account?
    <a href="register.php">Register new Account</a></p>


</form>
</div>
<br>
<br>
<body>
    </html>
    <?php ob_end_flush(); ?>