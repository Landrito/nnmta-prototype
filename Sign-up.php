<!DOCTYPE html>
<!-- NNMTA SIGN UP PAGE -->
<!-- Date Modified: 12/8 -->
<!-- Authors: Iinuma, Kepke, Landrito, Lee -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="http://getbootstrap.com/favicon.ico"> -->

    <title>NNMTA</title>

    <!-- Bootstrap core CSS -->
    <link href="./NNMTA/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./NNMTA/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./NNMTA/ie-emulation-modes-warning.js"></script><style>.carbonad,
#content > #right > .dose > .dosesingle,
#content > #center > .dose > .dosesingle,
#carbonads-container
{display:none !important;}</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Home.html">NNMTA</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li><a a href="Home.html">Home</a></li>
                      <li><a href = "Info.html">About</a></li>
                      <li><a href="Events.html">Events</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="Find_teacher.html">Find a teacher</a></li>
                          <li><a>Join</a></li>
                        </ul>
                      </li>
                      
                      <li><a href="Teachers.html">Teachers</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Members<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a>Bylaws</a></li>
                          <li><a>Constitution</a></li>
                        </ul>
                      </li>
                      <li><a href="Calendar.html">Calendar</a></li>
                      <li><a href="Contact.html">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="Login.php">Login</a></li>
                      <li class="active"><a href="Sign-up.php">Sign-up</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Create an Account</h1>
            <form class="form" method="post">
              <div class="form-group col-xs-6">
                <input type="text" class="form-control" name="firstname" id="exampleInputEmail1" placeholder="First Name">
              </div>
              <div class="form-group col-xs-6">
                <input type="text" class="form-control" name="lastname" id="exampleInputEmail1" placeholder="Last Name">
              </div>
              <div class="form-group col-xs-12">
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group col-xs-12">
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group col-xs-12">
                <input type="password" class="form-control" name="password_confirm" id="exampleInputPassword2" placeholder="Confirm Password">
              </div>
              <div class="form-group col-xs-12">
                <select class="form-control" name="account_type" id="sel1">
                  <option>Account Type:</option>
                  <option>Teacher</option>
                  <option>Student</option>
                </select>
              </div>

              <button type="submit" name="submit" class="btn btn-default">Submit</button>

                <!-- PHP code to store login information into database. -->
                <?php
                    require('Session/config.php');
                    session_start();
                    $config = new Config();
                    $db = $config->GetDatabaseLink();
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // obtain information from the user
                        $firstName = mysqli_real_escape_string($db, $_POST['firstname']);
                        $lastName = mysqli_real_escape_string($db, $_POST['lastname']);
                        $email = mysqli_real_escape_string($db, $_POST['email']);
                        $password = mysqli_real_escape_string($db, $_POST['password']);
                        $passwordConfirm = mysqli_real_escape_string($db, $_POST['password_confirm']);
                        $accountType = '';
                        if (isset($_POST['submit'])) {
                            $accountType = $_POST['account_type'];
                            echo "Selected account type: " . $accountType;
                        }
                        else {
                            echo "no account selected";
                        }


                        // check to see if passwords match
                        if ($password != $passwordConfirm) {
                            // passwords do not match
                            echo 'DID NOT ENTER THE SAME PASSWORD!';
                            die();
                        }

                        // generate sql query
                        $query = "INSERT INTO users (firstName, lastName, email, password, accountType)
                            VALUES ('$firstName', '$lastName', '$email', '$password', '$accountType')";

                        // attempt to add to database
                        if (mysqli_query($db, $query) === TRUE) {
                            echo 'Successfully added a new user to the database!';
                        }
                        else {
                            echo mysqli_error($db);
                        }

                        // close database
                        closeDatabase($db);
                    }
                ?>
                <!-- End of PHP code  to store login information into database -->
            </form>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>ARIA built by Kyle, Renee, Ernest, and Wes.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./NNMTA/jquery.min.js"></script>
    <script src="./NNMTA/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./NNMTA/ie10-viewport-bug-workaround.js"></script>
</body></html>