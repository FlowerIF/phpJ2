<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Validate form</title>


<style>
body {font-family: Roboto;}
form {width: 500px; margin: 0 auto;border: 2px solid #b332b8;border-radius: 1%;}

input[type=text], input[type=email], input[type=password],#hobbies  {
  width: 80%;
  font-size:14px;
  padding: 9px 15px;
  margin: 6px 45px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-image: linear-gradient(to right, #662D8C , #ED1E79);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 5px;
  font-size: 30px;
}
#reset{
  background-image: linear-gradient(to right, #483d09 , #1c1870);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 5px;
  font-size: 30px;
}

#gender{
    margin: 10px 43px;
}
button:hover {
  opacity: 0.8;
}

.error{
    color:#ED1E79;
}
span.psw {
  float: right;
  padding-top: 16px;
}
.required {
  color: red;
}
#thong_tin,#loi_ten,#loi_mat_khau,#loi_gioi_tinh,#loi_email,#loi_dia_chi,#loi_ngay_sinh,#loi_so_thich{
    margin: 0 0 0 45px;
}
#so_thich{
    margin-left: auto;
    margin-right: auto;
    display: block;
}

</style>
</head>
<body style="background:#f5f5f5;">

<center><h1 style="color:rgb(83, 18, 172);background: #ED1E79;">Validate form</h1></center>

<form action="output.php" method="post"> 
    <br>
    <span id="thong_tin">Tên</span><span class="required">*</span>
    <input id="ten"  placeholder="Họ và tên" type="text" name="ten"> 
    <div class="error" id="loi_ten"></div>
    <br>

    <span id="thong_tin">Giới tính</span><span class="required">*</span>
    <input type="radio" name="gioi_tinh" id="gioi_tinh" value="nam">Nam
    <input type="radio" name="gioi_tinh" id="gioi_tinh" value="nữ">Nữ
    <div class="error"  id="loi_gioi_tinh"></div>
    <br>

    <span id="thong_tin">Email</span><span class="required">*</span>
    <input id="email" placeholder="Email" name="email" type="email" > 
    <div class="error"  id="loi_email"></div>
    <br>

    <span id="thong_tin">Mật Khẩu</span><span class="required">*</span>
    <input id="mat_khau"  placeholder="Mật khẩu" type="password" name="mat_khau"> 
    <div class="error"  id="loi_mat_khau"></div>
    <br>

    <span id="thong_tin">Ngày sinh</span><span class="required">*</span>
    <input id="ngay_sinh"   type="date" name="ngay_sinh"> 
    <div class="error"  id="loi_ngay_sinh"></div>
    <br>

    <span id="thong_tin">Địa chỉ</span><span class="required">*</span>
    <input id="dia_chi" placeholder="Địa chỉ" type="text" name="dia_chi"> 
    <div class="error"  id="loi_dia_chi"></div> 
    <br>

    <span id="thong_tin">Sở thích</span><br>
    <textarea id="so_thich" cols="52" rows="9" name="so_thich"></textarea> 
    <div class="error" id="loi_so_thich"></div>
    <button type="submit" onclick="return xuat()">Submit</button>

    <button id="reset" type="reset" >Reset</button>

</form>



    <script>
        function xuat(){
            let check = false;
            // check tên 
            let regex_name = /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]+(?: [A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*)+$/;
            let ten = document.getElementById("ten").value;
            if(ten.length === 0){
                document.getElementById("loi_ten").innerHTML = 'Tên không được để trống';
                check = true;
            }else if(!regex_name.test(ten)){
                document.getElementById("loi_ten").innerHTML = 'Tên không hợp lệ';
                check = true;
            }else{
                document.getElementById("loi_ten").innerHTML = '';
            }


            //check gioi tinh
            let mang_gioi_tinh = document.getElementsByName("gioi_tinh");
            let ktra = false;
            for(let i =0; i < mang_gioi_tinh.length;i++){
                if(mang_gioi_tinh[i].checked){
                    ktra = true;
                }
            }
            if(ktra == false){
                document.getElementById("loi_gioi_tinh").innerHTML = "Giới tính không được để trống";
                check = true;
            }else{
                document.getElementById("loi_gioi_tinh").innerHTML = "";

            }

            // check email
            let email = document.getElementById("email").value;
            if(email.length === 0){
                document.getElementById("loi_email").innerHTML = 'Email không được để trống';
                check = true;
            }else{
                document.getElementById("loi_email").innerHTML = '';
            }

            //check mật khẩu
            let mat_khau = document.getElementById("mat_khau").value;
            let strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            let mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            let enoughRegex = new RegExp("(?=.{8,}).*", "g");
            if(mat_khau.length == 0){
                document.getElementById("loi_mat_khau").innerHTML = 'Mật khẩu không được để trống';
                check = true;
            }else if(false == enoughRegex.test(mat_khau.value)){
                document.getElementById("loi_mat_khau").innerHTML = "Yếu";
                
            }else if(false == mediumRegex.test(mat_khau.value)){
                document.getElementById("loi_mat_khau").innerHTML = "Trung bình ";
                
            }else if(false == strongRegex.test(mat_khau.value)){
                document.getElementById("loi_mat_khau").innerHTML = "Khỏe ";
                
            }else{
                document.getElementById("loi_mat_khau").innerHTML = "";
            }


            // check ngay sinh
            let ngay_sinh = document.getElementById("ngay_sinh").value;
            if(ngay_sinh.length === 0){
                document.getElementById("loi_ngay_sinh").innerHTML =' Ngày sinh không được để trống';
                check = true;
            }else{
                document.getElementById("loi_ngay_sinh").innerHTML ='';
            }


            //check dia chi
            let dia_chi = document.getElementById("dia_chi").value;
            if(dia_chi.length === 0){
                document.getElementById("loi_dia_chi").innerHTML =' Địa chỉ không được để trống';
                check = true;
            }else{
                document.getElementById("loi_dia_chi").innerHTML ='';
            }

            //check so thich
            let so_thich = document.getElementById("so_thich").value;
            if(so_thich.length === 0){
                document.getElementById("loi_so_thich").innerHTML =' Sở thích không được để trống';
                check = true;
            }else{
                document.getElementById("loi_so_thich").innerHTML ='';
            }
        }
        
    </script>
</body>
</html>