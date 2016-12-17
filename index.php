<?php
    include 'header.php';

?>

<?php
	
    if (isset($_SESSION['id'])){
        //echo $_SESSION['id'];
        echo "You are logged in!";


    } else {
        echo "You are not logged in!";
    }


?>


</body>
</html>