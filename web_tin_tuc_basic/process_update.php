<?php
$ma = $_POST['ma'];
$tieu_de = $_POST['tieu_de'];
$noi_dung = $_POST['noi_dung'];
$anh = $_POST['anh'];

require_once 'connect.php';

$truy_van = "update tin_tuc
set
tieu_de = '$tieu_de',
noi_dung = '$noi_dung',
anh = '$anh'
where
ma = '$ma'";

mysqli_query($ket_noi,$truy_van);
header('Location: index.php');
mysqli_close($ket_noi);