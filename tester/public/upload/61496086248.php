<?php include('core/init.php'); ?>
<!DOCTYPE html>
<html class="bg-black">
   <head>
        <meta charset="UTF-8">
        <title>Products manager</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
       
    </head>
    <body class="bg-black">
<?php
session_start();
if(isset($_SESSION['email'])){
header("Location: main/index.php");

	}
if(empty($_POST) === false){
$DD = new Database;
$email = $_POST['email'];
$passward = $_POST['password'];

$DD->query("SELECT * FROM users WHERE `email` = '$email'");

$results = $DD->resultset();
foreach ($results as $res) {
$session = $res->email;
$pass = $res->password;
}
if (password_verify($passward, $pass)) {

$_SESSION['email'] = $session;
if(isset($_SESSION['email'])){

            header("Location: main/index.php");
			
        }
}else 
		{
		$error = '<div class="alert alert-danger"><b>OOOps!</b> username or password wrong try again.</div>';
}

}

?>
        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="User Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button> 
                </div>
				<?php echo $error; ?>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>