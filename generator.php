<?php
include('login.php');

if(isset($_SESSION['login_user'])){
    header('Location:https://southernview-estate.herokuapp.com/generatedCode.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Resident login.css">
    <title>Resident</title>
</head>
<body>
   
    <div class="bg-img">
        <div class="content">
            <header>Code Generator</header>
            <form action="" method="post">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input id="house" name="House" type="text" placeholder="Enter house number" required>
                </div>
                <div class="field space">
                <span class="fa fa-lock"></span>
                <input name="Password" type="password" class="pass-key" required placeholder="password">
                
                </div>
                <div class="pass">
                    <a href="#">Forgot password</a>
                </div>
                <div class="code">
                    <a href="signup.php">Sign Up</a>
                </div>
                
                <div class="field">
                    <input name="Login" type="submit"  value="Generate code">
                </div>
                <span><?php echo $error; ?></span>
            </form>
        </div>
    </div>
    <script src="Resident login.js"></script>
   
</body>
</html>





<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    user-select: none;
}
.bg-img{
    background: url(img/bg.jpg);
    height: 100vh;
    background-size: cover;
    background-position: center;
}
.bg-img::after{
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(255, 255, 255, 0.174);
}
.content{
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 999;
    text-align: center;
    padding: 60px 32px;
    width: 370px;
    transform: translate(-50%, -50%);
    background: rgba(255, 255, 255, 0.133);
    border: 1px solid #fff;
    backdrop-filter: blur(3px);
    box-shadow: 0 0 6px 0 rgba(29, 29, 29, 0.203);
}
.content header{
    color: white;
    font-size: 32px;
    font-weight: 600;
    margin: 0 0 35px 0;
    font-family: "Montserrat" sans-serif;
}
.field{
    position: relative;
    height: 45px;
    width: 100%;
    display: flex;
    background: rgba(255, 255, 255, 0.94);
}
.field span{
    color: #222;
    width: 40px;
    line-height: 45px;
}
.field input{
    height: 100%;
    width: 100%;
    background: transparent;
    border: none;
    outline: none;
    color: #222;
    font-size:16px;
    font-family: "Poppins", sans-serif;
}
.space{
    margin-top: 16px;
}
.show{
    position: absolute;
    right: 13px;
    font-size: 13px;
    font-weight: 700;
    color: #222;
    display: none;
    cursor: pointer;
    font-family:"Montserrat" sans-serif;
}
.pass-key:valid ~ .show{
    display: block;
}
.pass{
    text-align: left;
    margin: 10px 0;
}
.pass a{
    color: white;
    text-decoration: none;
    font-family: "Poppins", sans-serif;
}
.pass:hover a{
    text-decoration: underline;
}
.code{
    text-align: left;
    margin: 10px 0;
}
.code a{
    color: white;
    text-decoration: none;
    font-family: "Poppins", sans-serif;
}
.code:hover a{
    text-decoration: underline;
}

.field input[type="submit"]{
    background: #682efc;
    border: 1px solid #7741fd;
    color: white;
    font-size: 10px;
    letter-spacing: 1px;
    font-weight: 600;
    cursor: pointer;
    font-family:"Montserrat" sans-serif;
    transition: 0.3s ease;
}
.field input[type="submit"]:hover{
    background: #4a0de4f5;
}
.login{
    color: white;
    margin: 20px 0;
    font-family:"Poppins", sans-serif;
}
i span{
    margin-left: 8px;
    font-weight: 500;
    letter-spacing: 1px;
    font-size: 16px;
    font-family:"Poppins", sans-serif;
}
h1{
    font-size: 40px;
}
span{
    color: red;
}
</style>
