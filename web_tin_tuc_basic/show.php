<!DOCTYPE html>
<html lang="en">
<head>

<?php 
        $ma = $_GET['ma'];
        require_once 'connect.php';// file quan trong thi dung require thay vi include
        //require_once -- chi chen file 1 lan, lan sau goi den file do no se k dc chen them nua
        $sql = "select * from tin_tuc
        where ma = '$ma'";

        $ket_qua = mysqli_query($ket_noi,$sql);
        $bai_tin_tuc = mysqli_fetch_array($ket_qua);//lay phan tu dau tien cua mang
        
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $bai_tin_tuc['tieu_de'] ?></title>
</head>
<body>
    
    <a href="index.php">trang chủ</a>
    <h1>
        <?php echo $bai_tin_tuc['tieu_de'] ?>
    </h1>
    <p>
    <?php echo nl2br($bai_tin_tuc['noi_dung']) ?>
    </p>
    <img src="<?php echo $bai_tin_tuc['anh'] ?>" alt="" width="100%">
    <?php mysqli_close($ket_noi);//dong ket noi ?>
</body>
</html>