<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ID result</h1>
<?php
    $servername = "localhost";
    $db="order_system";
    $username = "dbaccess";
    $password = "password";
    $conn = new mysqli($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     $id=$_POST["product_id"];
     $sql="SELECT Product_ID, Name, Price from product where product_id=$id";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
        // output data of each row
         
        while($row = $result->fetch_assoc()) {

           $price=$row['Price'];
        }
        //Insert into order table
        $units=(int)($_POST["quant"]);
        $total=$units*$price;
        $order_id = uniqid();
        $sql="INSERT into orders (order_id,product_id, units,Price, total) values (\"$order_id\",\"$id\",$units,$price,$total);";
        $result = $conn->query($sql);

        print("Order Details");
        $sql="SELECT entry_date,product_id, units,Price, total from orders where order_id=\"$order_id\"";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
    
               print("Date:".$row['entry_date']);
               print("<br>");
               print("product_id:".$row['product_id']);
               print("<br>");
               print("units:".$row['units']);
               print("<br>");
               print("Price:".$row['Price']);
               print("<br>");
               print("Total:".$row['total']);

            }
          } else {
            echo "0 results";
          }

      } else {
        echo "Sorry Product doesn't exist";
      }
      $conn->close();
?>
<br>
<a href="index.php">home</a>
    
</body>
</html>