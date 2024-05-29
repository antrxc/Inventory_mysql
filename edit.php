<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"dbcrud");
$edit = $_GET['edit'];
$sql = "select * from inventory where id= '$edit' ";
$run = mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($run))
{
    $pid = $row['id'];
    $name = $row['ProductName'];
    $quantity = $row['Quantity'];
    $Price = $row['UnitPrice'];
    $supplier = $row['Supplier'];
}
?>
<?php
$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,"dbcrud");
if(isset($_POST['submit']))
{
$edit = $_GET['edit'];
$name = $_POST['ProductName'];
$quantity = $_POST['Quantity'];
$Price = $_POST['UnitPrice'];
$supplier = $_POST['Supplier'];
$sql = "update inventory set ProductName= '$name',Quantity= '$quantity',UnitPrice='$Price',Supplier='$Supplier' where id =  '$edit";
if(mysqli_Query($connection,$sql))
{
echo '<script > location.replace("index.php")</script>';
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
<title>Inventory Managment Application</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="card">
<div class="card-header">
<h1> Inventory </h1>
</div>
<div class="card-body">
<form action="add.php" method="post">
<div class="form-group">
<label>Product Name</label>
<input type="text" name="ProductName" class="form-control"  placeholder="Enter Name" value="<?php echo $name; ?>">
</div>
<div class="form-group">
<label>Quantity</label>
<input type="text" name="Quantity" class="form-control"  placeholder="Enter Quantity" value="<?php echo $quantity;?>">
</div>
<div class="form-group">
<label>Unit Price</label>
<input type="text" name ="UnitPrice" class="form-control"  placeholder="Enter Price" value="<?php echo $Price; ?>">
</div>
<div class="form-group">
<label>Supplier</label>
<input type="text" name ="Supplier" class="form-control"  placeholder="Enter Supplier Name" value="<?php echo $supplier; ?>">
</div>
<br/>
<input type="submit" class="btn btn-primary" name="submit" value="Edit">
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
