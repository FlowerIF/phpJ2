<?php
$tieu_de = $_POST['tieu_de'];
$noi_dung = $_POST['noi_dung'];
$anh = $_POST['anh'];


require 'connect.php';// chen file dung chung

$sql = "insert into tin_tuc(tieu_de,noi_dung,anh)
value('$tieu_de','$noi_dung','$anh')";//truy van lay toan bo thong tin nhap vao chen vao cau truy van

// sua loi dung lenh die($sql);
mysqli_query($ket_noi,$sql);

// in ra lỗi
$loi = mysqli_error($ket_noi);
echo $loi;

mysqli_close($ket_noi);// đóng kết nối