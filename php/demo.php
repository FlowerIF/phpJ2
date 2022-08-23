<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lam việc với form</title>
</head>
<body>
    <form action="process.php" method="post">
        Tên 
        <input type="text" name="ten" id="ten">
        <div id="sai_ten"></div>
        <br>
        Ngày sinh
        <input type="date" name="ngay_sinh" id="ngay_sinh">
        <div id="sai_ngay_sinh"></div><br>
        Mật khẩu
        <input type="password" name="mat_khau"><br><br>
        giới tính
        <input type="radio" name="gioi_tinh" value="Nam">Nam
        <input type="radio" name="gioi_tinh" value="Nữ">Nữ
        <div id="sai_gioi_tinh"></div>
        <br>
        sở thích
        <select name="so_thich" id="">
            <option value="chơi game">chơi game</option>
            <option value="chơi lol">chơi lol</option>
            <option value="chơi val">chơi val</option>
        </select>
        <br>
        mô tả
        <textarea name="mo_ta" id="" cols="30" rows="10"></textarea>
        <br>
        <button onclick="return dang_ky()">Đăng ký</button>
    </form>

    <script>
        function dang_ky(){
            let check = false;
            let ten = document.getElementById('ten').value;
            let regex_ten = /^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
            if(ten.length === 0){
                document.getElementById('sai_ten').innerHTML = 'chua dien tên'
                check = true;
            }else if(!regex_ten.test(ten)){
                document.getElementById('sai_ten').innerHTML = 'sai ten'
                check = true;
            }else{
                document.getElementById('sai_ten').innerHTML = ''
            }
            //check gioi tinh
            let gioi_tinh = document.getElementsByName('gioi_tinh')
            let check_gioi_tinh = false;
            for(let i = 0;i < gioi_tinh.length;i++){
                if(gioi_tinh[i].checked){
                    check_gioi_tinh = true
                }
            }
            if(!check_gioi_tinh){
                document.getElementById('sai_gioi_tinh').innerHTML = 'gioi tinh khong duoc de trong'
                check = true
            }else{
                document.getElementById('sai_gioi_tinh').innerHTML = ''
            }
            
            //check ngay sih
            let ngay_sinh = document.getElementById('ngay_sinh').value
            if(ngay_sinh.length === 0){
                document.getElementById('sai_ngay_sinh').innerHTML = 'ngay sinh khong duoc de trong'
                check = true
            }else{
                document.getElementById('sai_ngay_sinh').innerHTML = ''
            }
            
            
            
            if(check){
                return false
            }
        }
    </script>
</body>
</html>