<?php require_once("../resources/config.php"); ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  

  
      <link rel="stylesheet" href="login.css">

  
</head>

<body>

  <body class="pimg1">
      
	<div class="login">
		<div class="login-screen">
            <a href="index.php"><h6>home</h6></a>
			<div class="app-title">
                <h1>Login</h1>
                <h3><?php display_message(); ?></h3>
			</div>

            <form action="" method="post">

                    <?php login_user(); ?>
                
                <div class="login-form">
                    <div class="control-group"><label for=""></label>
                        <input type="text" class="login-field"  placeholder="username" name="username">
                        
                    </div>

                    <div class="control-group"><label for="password"></label>
                        <input type="password" class="login-field"  placeholder="password" name="password">
                        
                    </div>
            
				<input class="btn btn-primary btn-large btn-block" type="submit" name="submit">
                </div>
            </form>    
		</div>
	</div>
</body>


</body>

</html>
