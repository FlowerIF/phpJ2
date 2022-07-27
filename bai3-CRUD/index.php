<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <?php
    require 'connect.php';// chen file dung chung
    $tim_kiem = '';
    if(isset($_GET['tim_kiem'])){
        $tim_kiem = $_GET['tim_kiem'];
        
    }
        
        $sql = "select * from tin_tuc
        where
        tieu_de like '%$tim_kiem%' ";
    
    
    
    
    $ket_qua = mysqli_query($ket_noi,$sql);
    
    mysqli_close($ket_noi);
    ?>
<a href="insert.php">Thêm bài đăng mới</a>

<table border="1" width="100%">
    <caption>
        <form action="">
            Tìm kiếm 
            <input type="search" name="tim_kiem" >
        </form>
    </caption>
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
        <th>
            sửa
        </th>
        <th>
            xoa
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
            <td>
                <a href="form_update.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>">sửa</a>
            </td>
            <td>
                <a href="delete.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>">xóa</a>
            </td>
        </tr>
    <?php } ?>

</table>
</body>
</html>