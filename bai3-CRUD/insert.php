<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="process_insert.php">
        <table>
            <tr>
                <td>
                    Tiêu đề
                </td>
                <td>
                    <input type="text" name="tieu_de" id="">
                </td>
                
            </tr>
            <tr>
                <td>
                    Nội dung
                </td>
                <td>
                    <textarea name="noi_dung" id="" cols="30" rows="10"></textarea>
                </td>
                
            </tr>
            <tr>
                <td>
                    link ảnh
                </td>
                <td>
                    <input type="text" name="anh" id="">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button>Thêm</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>