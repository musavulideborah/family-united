<?php
require_once 'core/init.php';

if(Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if ($validation->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login) {
                Redirect::to('dashboard.php');
            } else {
                echo '<p>Sorry, Logging in failed </p>';
            }

        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css">
    <style type="text/css">
        .login-panel {
            margin-top: 25%;
            margin-bottom: 25%;
        }
    </style>
</head>
<body>
<?php include 'includes/menu.inc.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign-in</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" placeholder="Username" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="password">
                            </div>
                            <div class="checkbox">
                                <label for="remember-me">
                                    <input name="remember" type="checkbox" value="remember me"> Remember Me
                                </label>
                            </div>
                            <div class="form-group">
                                <a href="#">Forgot your Username or Password?</a>
                            </div>
                        </fieldset>
                        <a href="dashboard.php" class="btn btn-lg btn-success btn-block">Login</a>
                    </form>
            </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.inc.php'; ?>
</div>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>