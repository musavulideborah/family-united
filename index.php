<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                                    'username' => array(
                                        'required' => true,
                                        'min' => 2,
                                        'max' => 20,
                                        'unique' => 'users'
                                        ),
                                    'password' => array(
                                        'required' => true,
                                        'min' => 6
                                        ),
                                    'password_again' => array(
                                        'required' => true,
                                        'matches' => 'password'
                                        ),
                                    'name' => array(
                                        'required' => true,
                                        'min' => 2,
                                        'max' => 50
                                        )
                                    ));

        if ($validation->passed()) {
            $user = new User();
            $salt = Hash::salt(32);

            try {
                $user->create(array(
                    'Username' => Input::get('username'),
                    'Password' => Hash::make(Input::get('password'), $salt),
                    'Salt' => $salt,
                    'Name' => Input::get('name')
                ));
                //echo $salt . "<br>";
                //echo Hash::make(Input::get('password'), $salt);
                //Session::flash('home', 'You have been registered and can now login');
                Redirect::to('dashboard.php');

            } catch (Exception $e) {
                die($e->getMessage());
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

    <title>Family United</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css">
    <style type="text/css">
        .item{
        background: #333;
        text-align: center;
        height: 300px !important;
        }
        .carousel{
        margin-top: 20px;
        }
    </style>
</head>
<body>
<?php include 'includes/menu.inc.php'; ?>
<div class="container">

       <div class="row">
            <div class="col-md-12">
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/tente.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/DRC.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/syria-refugees.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
            </div>
        </div><!-- /.col-md-8 -->
    </div><!-- /.row -->
    <div class="jumbotron">
        <div class="container">
            <h1>Family United System</h1>
            <p>Considering the sheer number of the individuals who were forced to leave their homes, more than 50 million refugees around the world, half of which are women and children (UNHCR, 2015). 
				Alone, in an unknown place, the displaced persons suffer from depression, worry, uncertainty, hunger and lack of shelter that makes their lives even harder to bear. 
				This project will empower separated families to take the search for their missing loved ones through web page.</p>
            <a href="#" class="btn btn-primary" id="signup">Sign Up</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            Worry and uncertainty takes its toll on the whole family, children as well as adult are forced to leave their homes to look for safety somewhere else in the country or in neighbouring countries, due to this families are torn apart as they ran away. Children are more vulnerable because they find themselves alone without their family’s protection, support and care.
        </div>
        <br>
        <div class="col-md-4">
As time goes on, they experience rejection, exploitation, malnutrition, hard time and other attacks that some of them are not able to bear and may end up dying. The food reserves from food aid programs are running out. The United Nations estimates that 2.5 million people in Somalia is extremely undernourished, no one has kept track of how many people there have died of malnutrition. (Antje Diekhans, 2015).
        </div>
        <br>
        <div class="col-md-4">
                           Once this project is accomplished, the displaced will easily find the location of the person(s) he/she is looking and this will facilitate them to get back together; their lifestyle will definitely change. This initiative has the power to transform the nature of family reunification for the next generations and it is a typical example of how Africans' lives are being changed by the technology.
        </div>
    </div>
    <hr>
    <?php include 'includes/footer.inc.php'; ?>
</div>
<!-- modal for signing in -->
    <div id="mymodal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h1 class="modal-title">Sign Up</h1>
                </div>
                <div class="modal-body" style="margin: 15px">
                    <form role="form" method="post" action="" class="form-horizontal">
                        <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" id="name" class="form-control" placeholder="Please enter your full name" required>
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Choose a username" required>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Choose a password" required>
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="password_again" type="password" class="form-control" id="password_again" placeholder="Re-enter Password" required>
                      </div>
                      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <input type="submit" name="Submit" class="btn btn-success btn-block" value="Register">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#signup").click(function(){
                $("#mymodal").modal('show');
            });
        });
</script>

</body>
</html>