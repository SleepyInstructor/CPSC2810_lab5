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

           print("ID: ".$row['Product_ID']);
           print("<br>");
           print("Name: ".$row['Name']);
           print("<br>");
           print("Price: ".$row['Price']);
        }
      } else {
        echo "0 results";
      }
      $conn->close();
?>
<br>
<a href="index.php">home</a>
    
</body>
</html>