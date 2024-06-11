<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="icon" type="image/png" href="dist/img/logo1.png">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->
    <!-- Custome css -->
    <link rel="stylesheet" href="dist/css/custome.css">
    <link rel="stylesheet" href="dist/css/responsive.css">
    <link rel="icon" type="image/png" href="dist/img/logo1.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">    

  </head>
  <body class="hold-transition login-page text-center">
    <br>
    <br>
    <div class="login-logo">
      <img src="dist/img/login/logo.png" alt="E Pension Booklet Logo">
      <p><b>RailSathi</b></p>
      <p>Human Resource Management System</p>
    </div>
    <div class="login-box">
      <!--<div class="login-logo col-md-6 col-lg-6 col-sm-6 hidden-xs text-center">
          <img src="dist/img/login/logo.png" alt="E Pension Booklet Logo">
          <h3>CENTRAL RAILWAY</h3>
          <div class="divider"></div>
          <h4>SOLAPUR DIVISION</h4>
          <p>HRMS</p>
          <p>Human Resource Management System</p>
      </div>-->
      <div class="login-box-body login-form bg-transparent col-md-12 col-lg-12 col-sm-12 text-center">
        <h3>OTP</h3>
        <div class="divider"></div>
        <div class="clearfix"></div>
        <p class="login-box-msg">One Time Password</p>
        <form method="POST" action="otp-ch.php" autocomplete="off">
          <div class="form-group">
            <input type="text" class="form-control" name="otp" id="otp" placeholder="OTP" autofocus>
          </div>
          <div class="form-group row">
            <div class="col-xs-12 col-md-4 col-md-offset-4 submit-btn text-center">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
            </div>
          </div>
        </form>
      </div> 
    </div>
    
    

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="../../plugins/iCheck/icheck.min.js"></script> -->

  </body>
</html>