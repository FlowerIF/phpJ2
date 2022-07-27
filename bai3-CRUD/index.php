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
    $trang = 1;
    if(isset($_GET['trang'])){
        $trang = $_GET['trang'];
    }
        
    $tim_kiem = '';
    if(isset($_GET['tim_kiem'])){
        $tim_kiem = $_GET['tim_kiem'];
        
    }

    $sql_so_bai_dang = "select count(*) from tin_tuc
    where
    tieu_de like '%$tim_kiem%' ";
    $mang_so_bai_dang = mysqli_query($ket_noi,$sql_so_bai_dang);
    $ket_qua_so_bai_dang = mysqli_fetch_array($mang_so_bai_dang);
    $so_bai_dang = $ket_qua_so_bai_dang['count(*)'];

    $so_bai_dang_tren_1_trang = 1;// vi du so bai dang tren 1 trang la 2

    $so_trang = ceil($so_bai_dang / $so_bai_dang_tren_1_trang);
    // cong thuc phan trang : so_bai_bi_bo_qua = so_bai_tren_1_trang * (so_trang - 1);
    $bo_qua = $so_bai_dang_tren_1_trang * ($trang - 1);

    
        
    $sql = "select * from tin_tuc
    where
    tieu_de like '%$tim_kiem%' 
    limit $so_bai_dang_tren_1_trang offset $bo_qua";
    
    
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
<?php for($i = 1;$i <= $so_trang;$i++){ ?>
    <a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
        <?php echo $i ?>
    </a>
<?php } ?>
</body>
</html>