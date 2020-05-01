<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login-petcareuad</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-6 form-login">
        <div class="outter-form-login">
            <form action="check-login.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Page</h3>
             <?php
                /* handle error */
                if (isset($_GET['error'])) : ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                    <strong>Warning! </strong><?=base64_decode($_GET['error']);?>
                </div>
            <?php endif;?>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
                
            <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
            <hr>
                
            <div class="text-center forget">
                <p>Forgot Password?</p>
                <p>Created an Account!</p>
            </div>
        </form>
    </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>