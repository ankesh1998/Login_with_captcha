<?php
include('include/dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login_Page</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome.min.css" rel="stylesheet">
    <link href="animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="custom.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>
      <script type="text/javascript">
            function refresh(){
            $("#reload").click(function() {
    
        $("img#img").remove();
        var id = Math.random();
        $('<img id="img" src="captcha/captcha.php?id='+id+'"/>').appendTo("#imgdiv");
         id ='';
    });}
        </script>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


</head>

<body style="background:#F7F7F7;">
    
    <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="" method="post">
                        <img src="lock1.png"><br><br>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Username" autofocus='autofocus' style="border-radius: 20px" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" style="border-radius: 20px" required />
                        </div>
                        <div id="imgdiv" align="center">
                            <button class="btn" id="reload" onclick="refresh();"><i class="fa fa-refresh"></i> Refresh</button>
                             <img id="img" src="captcha/captcha.php" style="padding-bottom: 5px;" />
                             
                        </div><br> 
                        <div >
                            <input type="text" class="form-control input-sm" name="captcha" placeholder="Enter Above Captcha" style="border-radius: 20px"/>
                        </div>
                        <div>
								<button class="btn btn-primary submit btn-block" type="submit" name="login" style="border-radius: 20px"><i class="fa fa-check"></i>&nbsp; SIGN IN</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
						
                            <div class="clearfix"></div>
                            <br /><br><br>
                            <div>
                                <h1><i class="fa fa-university" style="font-size: 26px;"></i>&nbsp; Kashi Institute Of Technology</h1>

                                <p>© <?php echo date('Y'); ?> &nbsp;&nbsp;<i class="fa fa-book"></i> Library Management System</p>
                            </div>
                        </div>
                    </form>
<?php
if (isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$login_query=mysqli_query($con,"select * from admin where username='$username' and password='$password'");
$count=mysqli_num_rows($login_query);
$row=mysqli_fetch_array($login_query);

if (($count > 0) && (($_SESSION["code"] == $_POST["captcha"])))
{
    $_SESSION['id']=$row['admin_id'];
    echo "<script>window.location='home.php'</script>";
}
elseif ($_SESSION["code"] <> $_POST["captcha"]) {
   echo "<script>alert('Wrong Entered Captcha'); 
   window.location='login.php'</script>";
}else{ 
echo "<script>alert('Wrong Password Entered'); 
   window.location='login.php'</script>";
   
}
}
?>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>
