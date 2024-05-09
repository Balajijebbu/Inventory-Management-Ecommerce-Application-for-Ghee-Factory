
                <!DOCTYPE html>
                <html lang="en">
                <?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"])) 
     {
    $loginquery ="SELECT * FROM admin WHERE username='$username' && password='$password'";

	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
                                    	$_SESSION["adm_id"] = $row['adm_id'];
										header("refresh:1;url=dashboard.php");
	                            } 
							else
							    {
										echo "<script>alert('Invalid Username or Password!');</script>"; 
                                }
	 }
	
	
}

?>
                <head>
                    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/x-icon" href="images/uma ghee logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Admin Login</title>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

                    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
                    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
                    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

                    <link rel="stylesheet" href="css/login.css">

                    <style>
        body{
            background-image: url('images/bg img.jpg');
            
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
                </head>

                <body>

                    <div class="container">
                        <div class="info">
                        <h1 style="display: inline; font-family: 'Open Sans', sans-serif;">UMA GHEE ADMIN PANEL</h1>

                        </div>
                    </div>
                    <div class="form">
                        <div class="thumbnail"><img src="images/manager.png" /></div>
                        <span style="color:red;"><?php echo $message; ?></span>
                        <span style="color:green;"><?php echo $success; ?></span>
                        <form class="login-form" action="index.php" method="post">
                            <input type="text" placeholder="Username" name="username" />
                            <input type="password" placeholder="Password" name="password" />
                            <input type="submit" name="submit" value="Login" />

                        </form>
                       

                    </div>
                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                    <script src='js/index.js'></script>
                </body>

                </html>
               