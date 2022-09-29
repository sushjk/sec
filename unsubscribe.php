<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<?php
$connection = mysqli_connect("localhost","root","","sec");
$mail = $_GET['email'];
if(isset($mail) && $mail !=""){

$qry = "UPDATE entries SET  subscription = '0' where email = '$mail'";
$result = mysqli_query($connection,$qry);
if($result){
	echo '<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">Your Account Is Successfully Unsubscribed</h5>
    <p class="card-text">Thanks for your interest in XKCD Comic.</p>
    <a href="index.php" class="btn btn-primary">Home</a>
  </div>
  
</div>';
	
}else{
	echo '<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">Something Went wrong, Please try again</h5>
    <p class="card-text">Thanks for your interest in XKCD Comic.</p>
    <a href="index.php" class="btn btn-primary">Home</a>
  </div>
  
</div>';
}

}else{
	echo '<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">Something Went wrong, Please try again</h5>
    <p class="card-text">Thanks for your interest in XKCD Comic.</p>
    <a href="index.php" class="btn btn-primary">Home</a>
  </div>
  
</div>';
}


	?>