<?php
include 'header.php';

if (!isset($_SESSION['id'])) {

    echo "You are not logged in!";
    exit();

} else {

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $db_host = 'db658651383.db.1and1.com';
    $db_user = 'dbo658651383';
    $db_pwd = 'Xenyx-1832';

    $database = 'db658651383';
    $table = 'testevent';

    if (!mysql_connect($db_host, $db_user, $db_pwd))
        die("Can't connect to database");

    if (!mysql_select_db($database))
        die("Can't select database");


    if (isset($_POST['submit'])) {
        $fname = $_FILES['sel_file']['name'];
        echo 'upload file name: ' . $fname . ' ';
        $chk_ext = explode(".", $fname);

        if (strtolower(end($chk_ext)) == "csv") {

            $filename = $_FILES['sel_file']['tmp_name'];
            $handle = fopen($filename, "r");

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $sql = "INSERT into testevent(ordernumber,ticketName,ticketId,customerName) values('$data[0]','$data[1]','$data[2]','$data[3]')";
                mysql_query($sql) or die(mysql_error());
            }

            fclose($handle);
            echo "Successfully Imported";

        } else {
            echo "Invalid File";
        }
    }

}

?>


<h1>Import CSV file</h1>
<form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
    Import File : <input type='file' name='sel_file' size='20'>
    <input type='submit' name='submit' value='submit'>
</form>
<br>
<br>
