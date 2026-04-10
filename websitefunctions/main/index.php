<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>

<html>
<head>
<title>Home</title>
 <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <h1>Home</h1>

    <?php if (isset($user)): ?>

        <p> Hello <?= htmlspecialchars($user["name"]) ?> </p>
        <p><a href="logout.php"> Log Out </a> </p>

    <?php else: ?>

        <p><a href="login.php"> Log in </a> or <a href="../htmls/signup.html"> Sign up </a></p>

  <?php endif; ?>


</body>
</html>