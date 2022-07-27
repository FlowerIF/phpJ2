<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ket_noi = mysqli_connect('localhost','root','','j2school');
    mysqli_set_charset($ket_noi,'utf8');
    $sql = "select * from tin_tuc";
    $ket_qua = mysqli_query($ket_noi,$sql);

    mysqli_close($ket_noi);
    ?>
<a href="insert.php">Thêm bài đăng mới</a>

<table border="1" width="100%">
    <tr>
        <th>
            Ma
        </th>
        <th>
            tieu de
        </th>
        <th>
            anh
        </th>
        
    </tr>
    <?php foreach ($ket_qua as $tung_bai_tin_tuc ){?>
        <tr>
            <td>
                <?php echo $tung_bai_tin_tuc['ma'] ?>
            </td>
            <td>
                <a href="show.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>"><?php echo $tung_bai_tin_tuc['tieu_de'] ?></a>
            </td>
            <td>
                <img src="<?php echo $tung_bai_tin_tuc['anh'] ?>" alt="" height="200px">
            </td>
        </tr>
    <?php } ?>

</table>
</body>
</html>