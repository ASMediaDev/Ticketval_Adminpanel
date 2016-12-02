<link rel="stylesheet" type="text/css" href="showdb_style.css">

<?php
include 'header.php';

?>

<?php

include 'tv_dbh.php';

$manager = $_SESSION['id'];
echo "Session-ID: ".$manager."<br><br><br>";

$sql = "SELECT TABLE_NAME 
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'";
$result = mysqli_query($conn, $sql);


if(isset($_GET['event'])) {

    $selected = $_GET['event'];

    echo $selected;

    $display_query = "SELECT ordernumber, ticketName, ticketId, customerName FROM ". $selected;
    $result = mysqli_query($conn, $display_query);


    echo "<table border='1'>
        <tr>
        <th>Ordernumber</th>
        <th>Ticketname</th>
        <th>Ticket-ID</th>
        <th>Buyer</th>
        </tr> ";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['ordernumber'] . "</td>";
        echo "<td>" . $row['ticketName'] . "</td>";
        echo "<td>" . $row['ticketId'] . "</td>";
        echo "<td>" . $row['customerName'] . "</td>";
        echo "</tr>";

    }

}


?>
<br>
<form action="showdb.php" method="get">
    <select name="event">
    <option>Select Event:</option>
    <?php

    $sql = "SELECT TABLE_NAME 
            FROM INFORMATION_SCHEMA.TABLES
            WHERE TABLE_TYPE = 'BASE TABLE'";
    $result = mysqli_query($conn, $sql) OR die(mysqli_error());
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option>".$row['TABLE_NAME']."</option>";
    }



    ?>
    </select>
    <input type="submit" value="refresh">
</form>
</body>
</html>