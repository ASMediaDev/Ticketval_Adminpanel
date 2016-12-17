<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.11.16
 * Time: 11:50
 */
session_start();

include '../users_dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM users WHERE uid = '$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hash_pwd = $row['pwd'];
$hash = password_verify($pwd, $hash_pwd);

if($hash == 0){

    header("Location: ../index.php?error=empty");
    exit();


} else {


    $sql = "SELECT * FROM users WHERE uid='$uid' AND pwd='$hash_pwd'";
    $result = mysqli_query($conn, $sql);

    if (!$row = mysqli_fetch_assoc($result)) {
        echo "Your username or password is incorrect!";
    } else {
        $_SESSION['id'] = $row['id'];

    }


    header("Location: ../index.php");

    }