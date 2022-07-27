<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $ma = $_GET['ma'];// lay ma tu thanh dia chi
    require 'connect.php';// chen file dung chung or dùng require_once() khi muốn file chỉ dc thêm 1 lần

    $sql = "select * from tin_tuc
    where ma = $ma";
    $ket_qua = mysqli_query($ket_noi,$sql);

    $bai_tin_tuc = mysqli_fetch_array($ket_qua);
    mysqli_close($ket_noi);
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $bai_tin_tuc['tieu_de']?></title>
</head>
<body>
    <a href="index.php">Trang chủ</a>
    <h1>
        <?php echo $bai_tin_tuc['tieu_de'] ?>
    </h1>
    <p>
        <?php echo nl2br($bai_tin_tuc['noi_dung']) ?> 
        
    </p>
    
    <img src="<?php echo $bai_tin_tuc['anh'] ?>" alt="" height="50%">
    
</body>
</html>