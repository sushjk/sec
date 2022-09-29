<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<style>
		.card{
			border-radius: 0;
    box-shadow: 10px 10px 10px lightgrey;
		}
	</style>
</head>
<body>
	
	<div class="container">
		<div class="row">
<div class="col-md-4"></div>
		<div class="col-md-4">

<div class="card mt-5">
  <div class="card-header">
     <h5 class="card-title text-center">XKCD Comic Subscription</h5>
  </div>
  <div class="card-body">
   <!-- alert-->
   <?php if(isset($_GET['msg']) && $_GET['msg'] != ""){
   	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  '.$_GET['msg'].'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
   }else{
   	echo '';
   }?>
   
   
   <form method="post" action="server.php">
<div class="mb-3">

  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email Id">
</div>
<div class="mb-3">
  <input type="submit" name="submit" class="form-control btn btn-primary" >
</div>
</form>

</div>

  </div>
</div>
<div class="col-md-4"></div>
</div>
		</div>
	
</body>
</html>