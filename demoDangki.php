<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <style type="text/css">
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
     body{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;
        background: linear-gradient(135deg, #8B7355, #BCAC9F, #8B4513);
      }
    .form{
      position: relative;
      max-width: 800px;
      width: 100%;
      background-color: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }
    .img{
      float: left;
      margin-top: 10px;
    }
    .content{
      float: right;
    }
    .title{
      font-size: 25px;
      color: #8B4513;
      font-weight: bold;
      text-align: center;
    }
    .form-input{
      margin-top: 30px;
    }

    .name{
      color: #8B4513;
      font-weight: bold;
      margin-left: 10px;
      font-size: 17px;
    }

    .form-input input{
      position: relative;
      height: 50px;
      width: 95%;
      outline: none;
      color: #707070;
      margin-top: 5px;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 0 15px;
      margin-right: 150px;
      font-family: serif;
      font-size: 17px;
    }

    .form-submit{
      height: 45px;
      margin-top: 25px;
    }
    
    .form-submit input{
      height: 100%;
      width: 100%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      cursor: pointer; 
      background: #8B7355;
      font-family: serif;
      font-size: 20px;
    }
        
    .db{
      display: none;
    }
  </style>
</head>
<body>
  <div class ="form">
    <div class="img">
      <img src="Image/register.png" width="400px" height="430px">
    </div>

    <div class="content">
      <div class="title">Registration</div>

      <form method="POST" class ="form-login">
        <div class="form-group">

          <div class="form-input">
            <div class="name">User ID</div>
              <input type="text" name="user_id" placeholder="User ID">
            </div>

            <div class="form-input">
              <div class="name">User Name</div>
                <input type="text" name="username" placeholder="User Name">
            </div>

            <div class="form-input">
              <div class="name">Password</div>
                <input type="password" name="password" placeholder="Password">
            </div>

            <div class="form-submit">
              <input type="submit" name="register" value="Register">
            </div>
          </div>
        </form>
    </div>
        
    </div>
  
  <div class="db">
    <?php  
    //B1: Kết nối đến MySQL 
    $connect = mysqli_connect('localhost','root','','demo_db');
    if($connect == true)
    {
      echo "Successful connection";
    }
    else
    {
      echo "Connection failure";
    }

    //Nhập dữ liệu từ form
    if(isset($_POST['register']))
    {
      $user_id = $_POST['user_id'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      //B2: Xây dựng câu truy vấn
      $sql = "INSERT INTO users VALUES('$user_id','$username','$password')";
      //B3: Thực thi truy vấn
      $result = mysqli_query($connect,$sql);
      if ($result) 
      {
        echo "<script> alert ('Successfully registered') </script>";
      }
      else
      {
        echo "<script> alert ('Registration failed') </script>";
        echo"<script>window.open('index.php','_self')</script>";
          $_SESSION['username'] = $username;
      }
    }
    ?>
  </div>
</body>
</html>