<?php
include_once('connection.php');
function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = test_input($_POST["user_name"]);
    $token = md5($_POST["new_password"]);

    $sql = "INSERT INTO `login` (`user_name`, `user_token`) VALUES ('$user_name','$token')";
    if ($con->query($sql) === TRUE) {
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>";
    }

} ?>