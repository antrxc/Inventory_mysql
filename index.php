<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inventory Managment Window</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="card">
<div class="card-header">
<h1> Inventory Management</h1>
</div>
<div class="card-body">

<button class="btn btn-success"> <a href="add.php" class="text-light"> Add New </a> </button>
<br/>
<br/>

<table class="table">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Product Name</th>
<th scope="col">Quantity</th>
<th scope="col">Unit Price</th>
<th scope="col">Supplier</th>
<th scope="col">Function</th>
</tr>
</thead>
<tbody>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"dbcrud");
$sql = "select * from inventory";
$run = mysqli_query($connection, $sql);
$id= 1;
while($row = mysqli_fetch_array($run))
{
$pid = $row['id'];
$name = $row['ProductName'];
$quantity = $row['Quantity'];
$Price = $row['UnitPrice'];
$supplier = $row['Supplier']
?>
<tr>
<td><?php echo $pid ?></td>
<td><?php echo $name ?></td>
<td><?php echo $quantity ?></td>
<td><?php echo $Price ?></td>
<td><?php echo $supplier ?></td>
<td>
<button class="btn btn-success"> <a href='edit.php?edit=<?php echo $pid ?>' class="text-light"> Edit </a> </button> &nbsp;
<button class="btn btn-danger"><a href='delete.php?del=<?php echo $pid ?>' class="text-light"> Delete </a> </button>
</td>
</tr>
<?php $id++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
