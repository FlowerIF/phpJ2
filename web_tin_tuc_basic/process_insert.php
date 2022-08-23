<?php
$tieu_de = $_POST['tieu_de'];
$noi_dung = $_POST['noi_dung'];
$anh = $_POST['anh'];

require_once 'connect.php';

$sql = "insert into tin_tuc(tieu_de,noi_dung,anh)
value('$tieu_de','$noi_dung','$anh')";
//die($sql); ktra loi

mysqli_query($ket_noi,$sql);
//echo mysqli_error($ket_noi); ktra loi
header('Location: index.php');
mysqli_close($ket_noi);//dong ket noi
