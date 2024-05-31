<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$pid = $name = $quantity = $price = $supplier = '';

if (isset($_GET['edit'])) {
    $edit = intval($_GET['edit']);
    $sql = "SELECT * FROM inventory WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $edit);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $pid = $row['id'];
        $name = $row['ProductName'];
        $quantity = $row['Quantity'];
        $price = $row['UnitPrice'];
        $supplier = $row['Supplier'];
    } else {
        echo "No record found";
        exit;
    }

    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $edit = intval($_POST['id']);
    $name = $_POST['ProductName'];
    $quantity = intval($_POST['Quantity']);
    $price = floatval($_POST['UnitPrice']);
    $supplier = $_POST['Supplier'];

    $sql = "UPDATE inventory SET ProductName = ?, Quantity = ?, UnitPrice = ?, Supplier = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sidsi", $name, $quantity, $price, $supplier, $edit);

    if ($stmt->execute()) {
        echo "Database edited successfully";
        // Uncomment the line below to redirect after successful edit
         echo '<script>location.replace("index.php");</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inventory Management Application</title>
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
<form action="edit.php" method="post">
<div class="form-group">
<label>Product ID</label>
<input type="text" name="id" class="form-control" placeholder="Enter ID" value="<?php echo htmlspecialchars($pid); ?>" readonly>
</div>
<div class="form-group">
<label>Product Name</label>
<input type="text" name="ProductName" class="form-control" placeholder="Enter Name" value="<?php echo htmlspecialchars($name); ?>">
</div>
<div class="form-group">
<label>Quantity</label>
<input type="text" name="Quantity" class="form-control" placeholder="Enter Quantity" value="<?php echo htmlspecialchars($quantity); ?>">
</div>
<div class="form-group">
<label>Unit Price</label>
<input type="text" name="UnitPrice" class="form-control" placeholder="Enter Price" value="<?php echo htmlspecialchars($price); ?>">
</div>
<div class="form-group">
<label>Supplier</label>
<input type="text" name="Supplier" class="form-control" placeholder="Enter Supplier Name" value="<?php echo htmlspecialchars($supplier); ?>">
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
