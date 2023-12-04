<?php  

     $name="";
     $email="";
     $phone="";
     $address="";

     $errorMessage = "";
     $successMessage = "";

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $address=$_POST["address"];

        $connection=mysqli_connect('localhost', 'root', '', 'shop');
        if ($connection) {
            // echo "connected";
        }else {
            echo "not connected";
        }
        $sql="INSERT INTO `market`(`name`, `email`, `phone`, `address`) VALUES ('$name','$email','$phone','$address')";
        $result=mysqli_query($connection, $sql);

        if ($result) {
            // echo "inserted";
        }else {
            echo "not inserted";
        }
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