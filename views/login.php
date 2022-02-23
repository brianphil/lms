<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Login Page</title>
    <!-- responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="http://localhost/lms/assets/images/logo.png">
</head>
<?php
$message = "";
if(isset($_POST['submit'])){
    $login = new Login();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $res = $login->login($username, $password);
    if($res){
        header('location: home');
    }
    else{
        $message = '<div style="margin-top: 5px;" class="alert alert-danger" role="alert">Invalid username or password!</div>';
    }
}
?>
<body style="text-align: center; margin-top: 5%; background: #ddd;">
    <h1>Welcome to <span style="color:crimson"><i>f</i></span><span style="color:darkmagenta">LMS</span></h1>
    <div class="card" style="width: fit-content; text-align: center; margin-left:auto; margin-right: auto; border-radius: 30%">
        <form class="form-control" method="post" action="login">
            <div style="text-align: center; margin: 30px;">
                <p>
                    <label>Please enter the login details</label>
                </p>
                <p><?php echo $message;?></p>
                <p>
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" name="username" />
                </p>
                <p>
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" />
                </p>
                <p>
                    <input class="form-control btn-primary" style="width: 100%;" type="submit" name="submit" value="Login" />
                </p>
                <?php
              
                ?>
                

            </div>
        </form>
    </div>
</body>

</html>