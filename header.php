<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TicketVal</title>
    <link rel="stylesheet" type="text/css" href="header_style.css">
    <link rel="shortcut icon" href="/images/favicon.ico">
</head>

<body>

<header>
	
    <nav>
    	<img src="images/logo_web.png" id="header" alt="">
        <ul>
            <li><a href='index.php'>HOME</a></li>
            <?php
				
                if (isset($_SESSION['id'])){

                    echo "<form action='upload.php'>
                            <button>UPLOAD</button>
                            </form>";

                    echo "<form action='showdb.php'>
                            <button>Show DB</button>
                            </form>";


                    echo "<form action='includes/logout.inc.php'>
                            <button>LOG OUT</button>
                            </form>";



                } else {
                    echo "<form action='includes/login.inc.php' method='post'>
                          <input type='text' name='uid' placeholder='Username'>
                          <input type='password' name='pwd' placeholder='Password'>
                          <button type='submit'>LOGIN</button>
                          </form>";
                }


            ?>
            <li><a href="signup.php">SIGNUP</a></li>
        </ul>


    </nav>

</header>