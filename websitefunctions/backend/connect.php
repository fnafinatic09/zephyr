<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database connection
$conn = new mysqli('localhost','root','','users');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("Insert into users(username, email, password)
        values(?,?,?)");
        $stmt->bind_param("sss",$username,$email,$password);
        $stmt->execute();
        echo "Registration Successful";
        $stmt->close();
        $conn->close();
}



?>