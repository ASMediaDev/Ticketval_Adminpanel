<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.11.16
 * Time: 12:04
 */

session_start();
session_destroy();

header("Location: ../index.php");