<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript src=js/bootstrap.min.js"></script>
	<script type="text/javascript src=js/jquery.js"></script>
	<title></title>
</head>
<body>
   <?php  
      if(isset($message))  
         {  
           echo '<center><label class="text-danger">'.$message.'</label></center>';  
         }  
    ?>  
  <div class="container" style="width: 500px;">
    <form method="post">
      <label>Username</label>
      <input type="text" name="username" class="form-control" />
      <label>Password</label>
      <input type="password" name="password" class="form-control" />
      <br>
      <input type="submit" name="login" value="Login" class="btn btn-info" />

      <a href='signUpForm.php' class='btn btn-info'>Sign UP</a>  
    </form>
  </div>


<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">CRUD</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
         <a  class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      
    </ul>
    <form method="post" action="search1.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="id" autocomplete="off" aria-label="Search">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="search">	</input>
    </form>
  </div>
</nav>
<script src="https://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
  </div>
</nav> -->