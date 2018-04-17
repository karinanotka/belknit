<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login :</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>

    <div class="container">
     <div class="form-container">
        <form action="" method="POST">
            <h2>Login</h2><hr />
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            
            <div class="form-group">
             <input type="text" class="form-control" name="username" placeholder="Username or Email" required />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="password" placeholder="Your Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" name="submit" class="btn btn-block btn-primary" value="Login" >
                 <i class="glyphicon glyphicon-log-in"></i>&nbsp;LOGIN
                </button>
            </div>
            <br />
        
        </form>
       </div>
</div>

</body>
</html>