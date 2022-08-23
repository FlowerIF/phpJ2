<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang update</title>
</head>
<body>

    <?php 
    $ma = $_GET['ma'];
    require_once 'connect.php';

    $sql = "select * from tin_tuc
    where ma = '$ma'";
    $ket_qua = mysqli_query($ket_noi,$sql);
    $tin_tuc = mysqli_fetch_array($ket_qua);

    
    ?>

    <form action="process_update.php" method="post">
        <input type="hidden" name="ma" value="<?php echo $tin_tuc['ma'] ?>">
        tieu de
        <input type="text" name="tieu_de" value="<?php echo $tin_tuc['tieu_de'] ?>">
        noi dung
        <textarea name="noi_dung" id="" cols="30" rows="10"><?php echo $tin_tuc['noi_dung'] ?></textarea>
        anh
        <input type="text" name="anh" id="" value="<?php echo $tin_tuc['anh'] ?>">
        <button>Sửa</button>
    </form>
    <?php mysqli_close($ket_noi);//dong ket noi ?>
</body>
</html>