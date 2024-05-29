<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"dbcrud");
if(isset($_POST['submit']))
{
$pid=$_POST['productID'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$supplier = $_POST['Supplier'];
$sql = "insert into inventory(ProductName,Quantity,UnitPrice,Supplier)values(' $name', $quantity, $price,'$supplier')";
if(mysqli_query($connection,$sql))
{
echo '<script> location.replace("index.php")</script>';
}
else
{
echo "Some thing Error" . $connection->error;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Application</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="card">
<div class="card-header">
<h1> Student Application </h1>
</div>
<div class="card-body">
<form action="add.php" method="post">
<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control"  placeholder="Enter Product Name">
</div>
<div class="form-group">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control"  placeholder="Enter Quantity left">
</div>
<div class="form-group">
<label>Unit Price</label>
<input type="text" name ="price" class="form-control"  placeholder="Enter Price per Unit">
</div>
<div class="form-group">
<label>Supplier</label>
<input type="text" name ="Supplier" class="form-control"  placeholder="Enter Supplier Name">
</div>
<br/>
<input type="submit" class="btn btn-primary" name="submit" value="Register">
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
