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

    $disease = test_input($_POST["disease"]);
    echo $disease;
    $tailbar = test_input($_POST["tailbar"]);
    $sergiileh = test_input($_POST["sergiileh"]);

    $sql = "INSERT INTO `prediction` (`disease`, `tailbar`, `sergiileh`) VALUES ('$disease','$tailbar','$sergiileh')";
    if ($con->query($sql) === TRUE) {
        header("Location: http://127.0.0.1:5000/");
    } else {
        echo "Error: " . $sql . "<br>";
    }


}


?>