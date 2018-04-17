
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="views/css/styles.css">


        <title>Layout</title>
    </head>
    <body>

        <nav class="navbar-custom ">
            
            <div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
                                    <!--
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>-->
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">	
                                                    <li><a href="#">My Account</a></li>
							<li><a href="cart.html">Basket</a></li>
							<li><<a href='?controller=user&action=logout'>Logout</a></li>
                                                        <li> <a href='?controller=user&action=create'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							<li><a href='?controller=user&action=login'><span class="glyphicon glyphicon-log-in"></span> Login</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
            

            <div class="container">
                <div class="navbar-header">
                    <div class="serif">
                        <nav>                     
                            <ul class="nav navbar-nav">
                               
                                <li class="active">    <a href='/Belknit'>Home</a></li>

                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Women<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href='?controller=type&action=read&id'>Types</a></li>
                                   
                                    </ul>
                                </li>
                               <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Men<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href='?controller=type&action=readAll'>Types</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kids<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href='?controller=type&action=readAll'>Types</a></li>
                                    </ul>
                                </li>
                                <li> <a href='?controller=post&action=readAll' class=""> Blog </a></li>
                                 <ul class="nav navbar-nav navbar-right">
   
                    
                     <li> <a href='?controller=post&action=create' class="glyphicon glyphicon-edit"> AddPost </a></li>
                </ul>
                                       
                            </ul>
                        </nav>

                    </div>
                </div>
                <ul class="nav navbar-nav navbar-right">
   
                     <li><a href='?controller=user&action=readAll'>All users</a></li>
                     <li> <a href='?controller=product&action=create' class="glyphicon glyphicon-edit"> AddProduct </a></li>
                </ul>
                
            </div>
        </nav>

        <div class="w3-container w3-pink">
            <?php require_once('routes.php'); ?>
            </<div>
                <div class="w3-container w3-gray">
                    <footer >
                        Copyright &COPY; <?= date('Y'); ?> || Follow us on our social media accounts:
                        <a class="fb-ic mr-3"><i class="fa fa-lg fa-facebook"> </i></a>
                        <!--Twitter-->
                        <a class="tw-ic mr-3"><i class="fa fa-lg fa-twitter"> </i></a>
                    
                        <!--Instagram-->
                        <a class="ins-ic mr-3"><i class="fa fa-lg fa-instagram"> </i></a>
                        <!--Pinterest-->
                        <a class="pin-ic mr-3"><i class="fa fa-lg fa-pinterest"> </i></a>
      
                        <!--Youtube-->
                        <a class="yt-ic mr-3"><i class="fa fa-lg fa-youtube"> </i></a>
                    </footer>
                </div>

                </body>
                </html>
