<?php

$ma = $_GET['ma'];
require_once 'connect.php';

$truy_van ="delete from tin_tuc where ma = '$ma'";

mysqli_query($ket_noi,$truy_van);
header('Location: index.php');
mysqli_close($ket_noi);