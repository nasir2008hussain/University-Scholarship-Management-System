<?php
  $bg = array('bg-01.jpg', 'bg-02.jpg', 'bg-03.jpg', 'bg-04.jpg', 'bg-05.jpg', 'bg-06.jpg' ); // array of filenames

  $i = rand(0, count($bg)-1); 
  $selectedBg = "$bg[$i]"; 
?>

<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="g.js"></script>
    <title>Document</title>
</head>
<body>
    <style>
        body {
            background: url(images/<?php echo $selectedBg; ?>) no-repeat fixed center center/cover;
            background-size: cover;
            font-family: Montserrat;
        }
    
        .logo {
            width: 213px;
            height: 36px;
            margin: 30px auto;
        }
    
        .login-block {
            opacity: 80%;
            width: 320px;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            border-top: 5px solid  #04AA6D;
            margin: 0 auto;
        }
    
        .login-block h1 {
            text-align: center;
            color: #000;
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 20px;
        }
    
        .login-block input {
            width: 100%;
            height: 42px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 14px;
            font-family: Montserrat;
            padding: 0 20px 0 50px;
            outline: none;
        }
    
        .login-block input#username {
            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
            background-size: 16px 80px;
        }
    
        .login-block input#username:focus {
            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }
    
        .login-block input#password {
            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
            background-size: 16px 80px;
        }
    
        .login-block input#password:focus {
            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }
    
        .login-block input:active,
        .login-block input:focus {
            border: 1px solid  #04AA6D;
        }
    
        .login-block button {
            width: 100%;
            height: 40px;
            background:  #04AA6D;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid  #04AA6D;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            font-family: Montserrat;
            outline: none;
            cursor: pointer;
        }
    
        .login-block button:hover {
            background:  #09c982;
        }
        span{
            color: red;
            margin-bottom: 10px;
        }
    </style>
    
    
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <div class="logo"></div>
    <form action="accountClass.php" method="post">
        <div class="login-block">
            <h1>Login</h1>
            <input required onchange="setU()" type="text" placeholder="Username" id="username" name="username" />
            <input required onchange="setP()" type="password" placeholder="Password" id="password" name="password"/>
            <br>
            <center>
            <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>\n";
                    }
            ?>  
            </center>
            <button value="submit" name="login">Submit</button>
        </div>
    </form>
</body>

</html>
<?php
    unset($_SESSION["error"]);
?>





<!-- 
<script>
    function goPage(){
        let user=document.getElementById(`username`).value
        let password=document.getElementById(`password`).value
        if(user.length!=0 && password.length!=0){
        if(user==`Nasir` && password==`04072013040`){
            window.open(`studentProfile.html`)
        }
        else{
            let error=document.getElementById(`errorID`)
            error.innerHTML=`Incorrect Username or Password`
            error.style.color=`red`
        }   
        }
        if(user==`admin` && password==`admin`){
            window.open(`adminHome.html`)
        }
        else{
            let error=document.getElementById(`errorID`)
            error.innerHTML=`Incorrect Username or Password`
            error.style.color=`red`
        }
    }
</script> -->