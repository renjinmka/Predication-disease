<?php
include_once('connection.php');

//  Avch baigaa utga emh tsegtste haragduulah 
function test_input($data)
{

    $data = trim($data); // textiin ehlel ba togsgoloos hoison zai avah
    $data = stripslashes($data); //  \ / urvuu zuraas arilgah
    $data = htmlspecialchars($data);
    return $data;
}
// Utga avah
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $user_name = test_input($_POST["user_name"]);
    $token = md5($_POST["password"]);
    $sql = ("SELECT * FROM login");
    $result = $con->query($sql);

    $users = $result->fetch_All(MYSQLI_ASSOC);
    // user ner password taarch bval nevtreh ugui bol aldaa meduuleh  
    foreach ($users as $user) {

        if (
            ($user['user_name'] == $user_name) &&
            ($user['user_token'] == $token)
        ) {
            header("Location: http://127.0.0.1:5000/");
        }

    }
    echo "<script>
    window.alert('Таны нэр эсвэл нууц үг буруу байна')
     window.location.href='login.html';
  ;
      </script>";


}