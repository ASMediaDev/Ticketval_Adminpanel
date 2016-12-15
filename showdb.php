<link rel="stylesheet" type="text/css" href="showdb_style.css">

<?php
include 'header.php';

?>

<?php

include 'tv_dbh.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

$manager = $_SESSION['id'];
echo "Session-ID: ".$manager."<br><br><br>";

$sql = "SELECT TABLE_NAME 
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='tv_backend'" ;
$result = mysqli_query($conn, $sql);


if(isset($_GET['title'])) {


    $empty = "Select Event:";

    if (strcmp($_GET['title'], $empty) !== 0) {

        $selected = $_GET['title'];

        $selectedevent = "'$selected'";

        $geteventid = "SELECT id FROM events WHERE title = " . $selectedevent;



        $eventidresult = mysqli_query($conn, $geteventid);
        while ($res = mysqli_fetch_array($eventidresult)) {
            $eventid = $res['id'];
        }

        $display_query = "SELECT first_name, last_name, private_reference_number FROM attendees WHERE event_id =  " . $eventid;

        $result = mysqli_query($conn, $display_query);


        echo "<table border='1'>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Ticket ID</th>
        </tr> ";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['private_reference_number'] . "</td>";
            echo "</tr>";

        }

    }

    else {
        echo "No Event selected!";
    }
}


?>
<br>
<form action="showdb.php" method="get">
    <select name="title">
    <option>Select Event:</option>
    <?php

    echo "Selected Event: ". $selected;
    echo "<br>";

    $sql = "SELECT title
            FROM events" ;
    $result = mysqli_query($conn, $sql) OR die(mysqli_error());
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option>".$row['title']."</option>";
    }




    ?>
    </select>
    <input type="submit" value="refresh">
</form>
</body>
</html>