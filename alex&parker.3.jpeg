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
<title>Login</title>
 <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <h1>Login</h1>

        <?php if ($is_invalid): ?>
            <em> Invalid Login </em>
        <?php endif ?>


    <form method="post">
        <label for="email">Email</label>
        <input type = "email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password</label>
        <input type = "password" name="password" id="password">

        <button> Log In </button>
    </form>

</body>
</html>