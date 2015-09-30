<!DOCTYPE html>
<html>
<head>
    <title>Family United System | Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css">
    <style type="text/css">
        .site-footer {
           background-color: #eee;
        }
        .site-footer ul {
            display: inline;
            list-style: none;
        }
        #basic-details, #address, #next-of-kin, #account  {
            border: 1px solid #eee;
            width: 40%;
            padding: 5px;
            margin: 10px;
           /* position: absolute;*/
        }
        #basic-details, #next-of-kin {
            /* position: absolute; */
        }
        #address, #account {
           /* margin-left: 50%; */
        }
    </style>
    <script src="js/bootstrap.js"></script>
</head>
<body>

        <?php include 'includes/menu.inc.php'; ?>
    <div class="container">
        <h1>Registration</h1>
        <form>
        <fieldset id="basic-details">
            <legend>Basic Details</legend>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname">
                <br>
                <label for="middlename">Middle Name</label>
                <input type="text" class="form-control" id="middlename">
                <br>
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname">
                <br>
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age">
                <br>
                <label for="gender">Gender</label>
                <br>
                <input type="radio" name="gender"><label>Male</label>
                <input type="radio" name="gender"><label>Female</label>
            </div>
        </fieldset>
        <fieldset id="address">
            <legend>Address</legend>
            <div class="form-group">
                <label>P.O. Box</label>
                <input type="text" class="form-control" id="po-box">
                <br>
                <label>Country</label>
                <input type="text" class="form-control" id="country">
                <br>
                <label>Town</label>
                <input type="text" class="form-control" id="town">
                <br>
                <label>Postal Code</label>
                <input type="text" class="form-control" id="postal-code">
            </div>
        </fieldset>
        <fieldset id="next-of-kin">
            <legend>Next of Kin</legend>
            <div class="form-group">
                <label for="relationship">Relationship</label>
                <select>
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Other</option>
                </select>
                <label for="kin-firstname">First Name</label>
                <input type="text" class="form-control" id="kin-firstname">
                <br>
                <label for="kin-middlename">Middle Name</label>
                <input type="text" class="form-control" id="kin-middlename">
                <br>
                <label for="kin-surname">Surname</label>
                <input type="text" class="form-control" id="kin-surname">
                <br>
                <label for="kin-age">Age</label>
                <input type="text" class="form-control" id="kin-age">
                <br>
                <label for="kin-gender">Gender</label>
                <br>
                <input type="radio" name="gender"><label>Male</label>
                <input type="radio" name="gender"><label>Female</label>
            </div>
            <div class="form-group">
                <label for="relationship">Relationship</label>
                <select>
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Other</option>
                </select>
                <label for="kin-firstname">First Name</label>
                <input type="text" class="form-control" id="kin-firstname">
                <br>
                <label for="kin-middlename">Middle Name</label>
                <input type="text" class="form-control" id="kin-middlename">
                <br>
                <label for="kin-surname">Surname</label>
                <input type="text" class="form-control" id="kin-surname">
                <br>
                <label for="kin-age">Age</label>
                <input type="text" class="form-control" id="kin-age">
                <br>
                <label for="kin-gender">Gender</label>
                <br>
                <input type="radio" name="gender"><label>Male</label>
                <input type="radio" name="gender"><label>Female</label>
            </div>
        </fieldset>
        <fieldset id="account">
            <div class="form-group">
            <legend>Choose a username and password</legend>
            <label for="username">Username</label>
            <input type="text" id="username" class="form-control">
            <br>
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control">
            <br>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" class="form-control">
            <br>
            </div>
        </fieldset>
        <button class="btn btn-primary btn-lg">Submit</button>
        </form>
    <?php include 'includes/footer.inc.php';?>
    </div>
</body>
</html>