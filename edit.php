<?php  
$host='localhost';
$user="root";
$password="";
$database="shop";

$connection=mysqli_connect($host, $user, $password, $database);


$id="";
$name="";
$email="";
$phone="";
$address="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (!isset($_GET["id"])) {
        header("location: /myshop/index.php");
        exit;
    }

    $id=$_GET["id"];

    $sql="SELECT * FROM `market` WHERE id=$id";
    $result=mysqli_query($connection, $sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /myshop/index.php");
        exit;
    }

    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $address=$row["address"];
}
else {
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];

    $connection=mysqli_connect('localhost', 'root', '', 'shop');
    if ($connection) {
        // echo "this connection is good";
    }
    else {
        echo "this connection is not good";
    }

    do {
        $sql="UPDATE `market` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE `id`='$id'";
        if ($sql) {
            // echo "this update sql is good";
        }
        else {
            echo "this not good";
        }

        $result=mysqli_query($connection, $sql);

        if ($result) {
            echo "sql is not truth";
        }
        else {
            echo "sql is truth";
        }

        header("location: /myshop/index.php");
        exit;
        
    } while (true);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h2>New clients</h2>
        <form action="" method="post">
        <input type="hidden" name="id" value="<? echo $id; ?>">
            <div class="row mb-3">
                <label class="user">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="username" name="name" value="<?php echo $name;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="ema">email</label>
                <div class="col-sm-6">
                    <input type="text" class="email" name="email" value="<?php echo $email;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="pho">phone</label>
                <div class="col-sm-6">
                    <input type="text" class="phone" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="addre">address</label>
                <div class="col-sm-6">
                    <input type="text" class="address" name="address" value="<?php echo $address;?>">
                </div>
            </div>

            <br>
           <div class="row mb-3">
                    <button type="submit" class="sub-btn">submit</button>&nbsp;&nbsp;<button  class="cancel"><a href="/myshop/index.php" role="button">cancel</a></button>
            </div>

        </form>
    </div>


</body>
</html>