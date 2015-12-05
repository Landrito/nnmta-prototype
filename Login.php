<!DOCTYPE html>
<!-- saved from url=(0039)http://getbootstrap.com/examples/cover/ -->
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
              <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">NNMTA</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li><a a href="Home.html">Home</a></li>
                      <li><a>About</a></li>
                      <li><a>Events</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a>Find a teacher</a></li>
                          <li><a>State Conference</a></li>
                          <li><a>Join</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teachers<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a>Christmas Play-a-thon</a></li>
                          <li><a>MTNA Competition</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Members<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a>Bylwas</a></li>
                          <li><a>Constitution</a></li>
                        </ul>
                      </li>
                      <li><a>Contact</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" method="post" role="search">
                      <div class="form-group">
                          <input type="text" class="foram-control" name="username" placeholder="Email">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" name="password" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-default">Login</button>
                    </form>

                      <!-- PHP code to login to database -->
                      <?php
                          require('NNMTA/Database/config.php');
                          session_start();

                            echo 'TRYING TO LOGIN TO ARIA';

                          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                              // username and password are acquired from the html form
                              $user_email = mysqli_real_escape_string($db, $_POST['username']);
                              $password = mysqli_real_escape_string($db, $_POST['password']);

                              echo 'Username: ' . $user_email;
                              echo 'Password: ' . $password;

                              // query the database
                              $colToSearchFor = 'userID';
                              $query = "SELECT $colToSearchFor FROM users WHERE email = '$user_email' and password = '$password';";
                              //$query = "select * from users;";

                              echo 'Generated SQL query: ' . $query;

                              // attempt to query from database
                              $result = mysqli_query($db, $query);
                              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                              $active = $row['active'];

                              // there should only be one user in the database with the credentials entered
                              $count = mysqli_num_rows($result);
                              if ($count == 1) {
                                  echo "SUCCESSFULLY FOUND USER FROM DATABASE";
                                  //session_register($username); // deprecated?
                                  //$_SESSION['login_user'] = $username;
                                  //header("location: ../Login_successful.html");
                              }
                              else {
                                  echo "DID NOT FIND USER FROM DATABASE";
                                  $error = "Your username or password was invalid.";
                              }
                          }
                      ?>
                      <!-- End of PHP code to login to database -->

                  </div><!--/.nav-collapse -->
                </div>
              </nav>
            </div>
          </div>

           <div class="inner cover">
            <h1 class="cover-heading">Northern Nevada Music Teachers Assoc.</h1>
            <p class="lead">Providing performance and educational opportunites for teachers and students in northern Nevada.</p>
            <p class="lead">
              <a href="http://getbootstrap.com/examples/cover/#" class="btn btn-lg btn-default">Learn more</a>
            </p>
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