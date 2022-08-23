<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang chu</title>
</head>
<body>
    <?php 
    
    require_once 'connect.php';
    
    $trang = 1;
    if(isset($_GET['trang'])){
        $trang = $_GET['trang'];
    }

     // tim kiem
     $tim_kiem = '';
     if(isset($_GET['tim_kiem'])){// neu co tim kiem thi gan tim kiem vao bien
         $tim_kiem = $_GET['tim_kiem'];
     }

    $sql_lay_so_tin_tuc = "select count(*) from tin_tuc
    where
    tieu_de like '%$tim_kiem%'";
    $mang_so_tin_tuc = mysqli_query($ket_noi,$sql_lay_so_tin_tuc);
    $ket_qua_so_tin_tuc = mysqli_fetch_array($mang_so_tin_tuc);
    $so_tin_tuc = $ket_qua_so_tin_tuc['count(*)'];

    $so_tin_tuc_tren_1_trang = 1;
    $so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang);

    $bo_qua = $so_tin_tuc_tren_1_trang *($trang - 1);


   
        $sql  = "select * from tin_tuc
        where
        tieu_de like '%$tim_kiem%'
        limit $so_tin_tuc_tren_1_trang offset $bo_qua";
    //limit la gioi han so bai dang tren 1 trang


    
    

    $ket_qua = mysqli_query($ket_noi,$sql);

    
    ?>
    <a href="form_insert.php">Thêm bài đăng</a>
    <br>
    
    <table border="1" width="100%">
    <caption>
        <form action="">
            Tìm kiếm
            <input type="search" name="tim_kiem" 
            value="<?php echo $tim_kiem ?>">
        </form>
    </caption>
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <tr>
            <?php foreach($ket_qua as $tung_bai_tin_tuc){?>
            <tr>
                <td><?php echo $tung_bai_tin_tuc['ma']?></td>
                <td>

                    <a href="show.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>">
                        <?php echo $tung_bai_tin_tuc['tieu_de']?>
                    </a>
                </td>
                <td>
                    <img src="<?php echo $tung_bai_tin_tuc['anh']?>" height="100" alt="">
                </td>
                <td>
                    <a href="form_update.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>">Sửa</a>

                </td>
                <td>
                    <a href="delete.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>">Xóa</a>

                </td>
            </tr>
            <?php } ?>
        </tr>
    </table>
    <?php for($i = 1;$i <= $so_trang ;$i++){ ?>
        <a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
            <?php echo $i ?>
        </a>
    <?php } ?>
    <?php mysqli_close($ket_noi); ?>
    <!-- //dong ket noi -->
</body>
</html>