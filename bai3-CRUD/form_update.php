<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sửa</title>
</head>
<body>
<?php
$ma = $_GET['ma'];

require 'connect.php';

$sql = "select * from tin_tuc
where ma = $ma";
$ket_qua = mysqli_query($ket_noi,$sql);
$tin_tuc = mysqli_fetch_array($ket_qua);


mysqli_close($ket_noi);
?>

    <a href="index.php">Trang chủ</a>
    <form method="post" action="process_update.php">

        <table>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="ma" value="<?php echo $ma ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Tiêu đề
                </td>
                <td>
                    <input type="text" name="tieu_de" id="" value="<?php echo $tin_tuc['tieu_de'] ?>">
                </td>
                
            </tr>
            <tr>
                <td>
                    Nội dung
                </td>
                <td>
                    <textarea name="noi_dung" id="" cols="30" rows="10"><?php echo $tin_tuc['noi_dung'] ?></textarea>
                </td>
                
            </tr>
            <tr>
                <td>
                    link ảnh
                </td>
                <td>
                    <input type="text" name="anh" id="" value="<?php echo $tin_tuc['anh'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button>sửa</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>