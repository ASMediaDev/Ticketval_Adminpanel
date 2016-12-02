<?php
include 'header.php';

?>

<?php

    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'error=empty') !== false){
        echo "Fill out all fields!";
    }
    elseif (strpos($url, 'error=username') !== false){
        echo "Username already exists!";
    }

    if (isset($_SESSION['id'])){
    echo $_SESSION['id'];

} else {
    echo "You are not logged in!";
}


?>

<br><br><br>
<?php
if (isset($_SESSION['id'])){
    echo "You are already logged in!";
    //header("Location: upload.php");

} else {
    echo "<form action='includes/signup.inc.php' method='post'>
            <input type='text' name='first' placeholder='Firstname'><br>
            <input type='text' name='last' placeholder='Lastname'><br>
            <input type='text' name='mail' placeholder='E-Mail'><br>
            <input type='text' name='uid' placeholder='Username'><br>
            <input type='password' name='pwd' placeholder='Password'><br>
            <button type='submit'>SIGN UP</button><br>
            </form>";
    }
?>

</body>
</html>