<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
    WHERE email = '%s'",
   $mysqli->real_escape_string($_POST["email"]));

   $result = $mysqli->query($sql);

   $user = $result->fetch_assoc();

if ($user) {

  if(password_verify($_POST["password"], $user["password_hash"])) {
    
        session_start();

        session_regenerate_id();

        $_SESSION["user_id"] = $user["id"];

        header("Location: index.php");
        exit;

  }
}

    $is_invalid = true;

}
?>

<html>
<head>
<title>Login | Zephyr Mailing</title>
 <link rel="stylesheet" href="../assets/css/quinnawesome.css">
</head>
<body style="background-image: url(../../imageassets/zephyrbg.png);
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;">
<div class="topnav" id="myTopnav">
  <a href="../../index.html" >Home</a>
  <a href="login.php" class="active">Log In</a>
  <a href="../../about.html">About Us</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<div class="accountscreen">

<div class="row">
<div class="column1" style="display: flex;">
    <img src="../../imageassets/femboy-Photoroom.png" width="50%" height="100%" alt="meow meow meow x3" class="center">
</div>

    <div class="column2">


    <h1>Login To Your Account</h1>

        <?php if ($is_invalid): ?>
            <em> Invalid Login </em>
        <?php endif ?>


    <form method="post">
        <div class="elementyey">
        <label for="email">Email</label>
        <br>
        <input type = "email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>
         <div class="elementyey">
        <label for="password">Password</label>
        <br>
        <input type = "password" name="password" id="password">
        </div>
        <button> Log In </button>
    </form>
        <em><p> Have no account? <a href="../htmls/signup.html"> Register</a> here.</p></em>
        </div> </div>
</body>
</html>
