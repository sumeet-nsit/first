<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
 ?> 
<html>
<body>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
    Name:<br>
    <input type = "text" name ="name" value = " "><br>
    Age<br>
    <input type = "text" name ="age" value = " "><br>
    Gender<br>
    <input type = "text" name ="gender" value = " ">
    <input type ="submit" name = "sub">
    <button name = "demo" value = "print records" >print records</button>

</form>

<?php

$name = isset($_POST['name']) ? $_POST['name'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$submit = isset($_POST['sub']) ? $_POST['sub'] : '';
if($submit)
{
$sql="INSERT INTO home (Name, Age, Gender) VALUES ('$name','$age','$gender')";

if($conn->query($sql) === TRUE){
echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

$button = isset($_POST['demo']) ? $_POST['demo'] : '';
    if($button)
    {
        $sql ="SELECT* FROM home ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) 
        {
            echo $row["Name"]."<br>".$row["Age"]."<br>".$row["Gender"]."<br>";
        }
    }
    

 $conn->close();
?>


</body>
</html>