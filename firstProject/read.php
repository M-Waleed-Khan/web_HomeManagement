

<?php
include 'header.php';
  $con=new PDO ("mysql:host=localhost;dbname=mydatabase","root","");

  $id=$_GET['id'];
  
$sql='SELECT * FROM personal WHERE id=:id';
$stmt=$con->prepare($sql);
$stmt->execute([':id'=>$id]);
$person=$stmt->fetch(PDO::FETCH_OBJ);


  ?>

<?php

  $con=new PDO ("mysql:host=localhost;dbname=pic","root","");

  $id=$_GET['id'];
  
$sql='SELECT * FROM image WHERE id=:id';
$stmt=$con->prepare($sql);
$stmt->execute([':id'=>$id]);
$peson=$stmt->fetch(PDO::FETCH_OBJ);


  ?>

<?php

  $con=new PDO ("mysql:host=localhost;dbname=pic","root","");
  if(isset($_POST['signup'])){

      $file=$_FILES['file'];
$filename=$file['name'];
$filetmp=$file['tmp_name'];

$fileextension=explode(".", "$filename");
$fileend=strtolower(end($fileextension));

if($fileend=='jpg'||'jpeg'||'png')
{
  $uploadfolder='pictures/'.$filename;
  move_uploaded_file($filetmp, $uploadfolder);
    $sql=$con->prepare("insert into image(picture,userid) values (:uploadfolder,:id)");
    $con->beginTransaction();
    $sql->execute(array(':uploadfolder'=>$uploadfolder,':id'=>$id));
    $con->commit();
 header("location:index1.php");
      
  }
}

  ?>
  <?php
  $query="SELECT * FROM image where userid=$id";

  $data=$con->query($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>database</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  

  <link rel="stylesheet" type="text/css" href="css/glyphicon.css">
  <style type="text/css">
    .sty{
      border-radius: 3%;
    }
    .mar{
      margin-left: 50px;
    }
    .colr{
   
      color: white;
    margin-left: 350px;
    }

    #col{
      margin-right: -320px;
      margin-left: 190px;
    }
    

  </style>
</head>
<body>



  <div class="container">

<br>
 <img class="sty" src="<?php echo "$person->picture";?>" height="200px" width="200px"><br><a href="pic.php?id=<?php echo $person->id;?>"> <span style="color:red" class="glyphicon glyphicon-pencil mar"> Update</span></a>
  <br>
  <br>
    <table class="table table-bordered table-striped table-hover text-center">
  
  <tr>
  <th class="bg-dark text-white">ID</th>
  <th class="bg-dark text-white">Firstname</th>
  <th class="bg-dark text-white">Lastname</th>
  <th class="bg-dark text-white">Nick</th>
  <th class="bg-dark text-white">Email</th>
  <th class="bg-dark text-white">Salary</th>
  </tr>
   <tr>
    <td><?php echo "$person->id";?></td>
<td><?php echo "$person->firstName";?></td>
<td><?php echo "$person->lastName";?></td>
<td><?php echo "$person->nick";?></td>
<td><?php echo "$person->email";?></td>
<td><?php echo "$person->salary";?></td> 
 
    <a href="deleted.php?id=<?php echo $person->id;?>" onclick="return confirm('Are you sure you want to delete ?')">  <span class="glyphicon glyphicon-trash" style="color:red"></span></a></td>
</tr>
</table>
</div>

  <div class="container">

    <table class="table table-bordered table-striped table-hover text-center">
      
  <tr>

  <th class="bg-dark text-white">Images gallery</th>
 
  <th class="bg-dark text-white">Edit</th>

  <th class="bg-dark text-white">Remove</th>
  </tr>
  <?php
  foreach ($data as $row) {
    ?>
  <tr>

<td><center><img class="sty" src="<?php echo $row["picture"];?>" height="100px" width="100px"></center></td>

<td><a href="newup.php?id=<?php echo $row["id"];?>"><span style="color:red" class="glyphicon glyphicon-pencil"></span>edit</a></td> 
 
    <td><a href="newdel.php?id=<?php echo $row["id"];?>" onclick="return confirm('Are you sure you want to delete ?')">  <span class="glyphicon glyphicon-trash" style="color:red"></span>remove</a></td>
    </tr>
  <?php
}
?>
  </table>
</div>
<br>
<br>
  <form method="POST" enctype="multipart/form-data">
 
 <center><span id="col"><font size="4"><b>Add Image : </b></font></span><input type="file" name="file" class="colr"  value="file">
 </center>
<br>
<center>  <button  class="btn btn-primary" name="signup" class="back">Upload</button>
   <a href="index1.php"><button type="button" class="btn btn-primary">Back</button></a>
         </center> 
   
         <br>
         <br>
</div>
</form>


</body>
</html>
<br>
<br>
<?php
include 'footer.php';
?>
