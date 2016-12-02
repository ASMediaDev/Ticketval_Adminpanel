<link rel="stylesheet" type="text/css" href="showdb_style.css">

<?php
include 'header.php';

?>

<?php

include 'tv_dbh.php';

$manager = $_SESSION['id'];
echo "Session-ID: ".$manager."<br>";

$sql = "SELECT TABLE_NAME 
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['TABLE_NAME']."<br>";
}



/*

echo "<table border='1'>
        <tr>
        <th>Ordernumber</th>
        <th>Ticketname</th>
        <th>Ticket-ID</th>
        <th>Buyer</th>
        </tr> ";

    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['ordernumber']."</td>";
        echo "<td>".$row['ticketName']."</td>";
        echo "<td>".$row['ticketId']."</td>";
        echo "<td>".$row['customerName']."</td>";
        echo "</tr>";

    }
*/

?>
<br>



</body>
</html>