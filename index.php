<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>SHOP</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
    <div class="container2">
        <h2 style="margin-left: -1070px;">list of client</h2>
        <button style="margin-left: -1080px;"><a class='btn btn-primary' href="/myshop/create.php" role="button">New Clinet</a></button><form style="margin-left: 300px; margin-top: -35px;" method="post"><input type="search" name="search" class="search"><button class="engine" name="engine">search</button></form>
        <?php  
   
         $host="localhost";
         $user="root";
         $password="";
         $database="shop";

         $conn=mysqli_connect($host, $user, $password, $database);
         if ($conn) {
            // echo "connected";
         }
         else{
            echo "not connected";
         }

         if(isset($_POST["engine"])){
         $search=$_POST["search"];
         $sqll="SELECT * FROM `market` WHERE `name`='$search'";
         $resulter=mysqli_query($conn, $sqll);
         if (mysqli_num_rows($resulter)>0) {
            while($rows=mysqli_fetch_assoc($resulter)){
                echo "
                
                        <table border='1' style='width: 500px; margin-left: 300px;'>
                            <tr>
                               <td>".$rows["id"]."</td>
                               <td>".$rows["name"]."</td>
                               <td>".$rows["email"]."</td>
                               <td>".$rows["phone"]."</td>
                               <td>".$rows["address"]."</td>
                               <td>".$rows["date"]."</td>
                            </tr>
                        </table>
                
                ";
            }
         }
        }
   
   ?>
        <br><br><br>
        <table border="1" cellspacing="0" class="table">
        <thead>
            <tr>
                <th style="width: 100px;">ID</th>
                <th style='width: 100px;'>Name</th>
                <th style='width: 100px;'>Emaiil</th>
                <th style='width: 100px;'>Phone</th>
                <th style='width: 100px;'>Adress</th>
                <th style='width: 100px;'>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>


        <?php
         
             $host="localhost";
             $user="root";
             $password="";
             $database="shop";

             $connection=mysqli_connect($host, $user, $password, $database);
             $sql="SELECT * FROM `market`";
             $result=mysqli_query($connection, $sql);

             if(isset($_GET["id"])){
                $id=$_GET["id"];
                $delete=mysqli_query($connection, "DELETE FROM `market` WHERE `id`='$id'");
                header("location:index.php");
                die();
              }

             if (mysqli_num_rows($result)>0) {
                 while($row=mysqli_fetch_assoc($result)){
                    echo "
                    
                    <tr>
                    <td style='width: 100px;'><center>".$row["id"]."</center></td>
                    <td style='width: 100px;'><center>".$row["name"]."</center></td>
                    <td style='width: 100px;'><center>".$row["email"]."</center></td>
                    <td style='width: 100px;'><center>".$row["phone"]."</center></td>
                    <td style='width: 100px;'><center>".$row["address"]."</center></td>
                    <td style='width: 100px;'><center>".$row["date"]."</center></td>
                    <td>
                        <center>
                        <button><a href='/myshop/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a></button>
                        <button><a href='/myshop/index.php? id=".$row["id"]."' class='btn'>delete</a></button>
                        </center>
                    </td>
                    </tr>
                    
                    ";
                 }
             }
        
        ?>

        </tbody>
        </table>
    </div>
    </center>
</body>
</html>