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
</head>
<?php
$message = "";
if (isset($_POST['submit'])) {
    $log = new Login();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $res = $log->login($username, $password);
    if ($res) {
        header('location: home');
    } else {
        $message = '<span style="color: red;">Invalid username or password!</span>';
    }
}
?>

<body style="text-align: center; margin-top: 5%; background: #ddd;">
    <h1>Welcome to LMS</h1>
    <div class="card" style="width: fit-content; text-align: center; margin-left:auto; margin-right: auto; border-radius: 30%">
        <form class="form-control" method="post" action="login">
            <div style="text-align: center; margin: 30px;">
                <p>
                    <label>Please enter the login details</label>
                </p>
                <p><?php echo $message; ?></p>
                <p>
                    <label>Enter username</label><br><br>
                    <input class="form-control" type="text" name="username" />
                </p>
                <p>
                    <label>Enter password</label><br><br>
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