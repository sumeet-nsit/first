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

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Name:<br>
    <input type = "text" name ="name"><br>
    Age<br>
    <input type = "text" name ="age"><br>
    Gender<br>
    <input type = "text" name ="gender">
    <input type ="submit">
</form>
<button id = "demo" type = "button" onclick ="myFunction()">print records</button>

<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$sql="INSERT INTO home (Name, Age, Gender) VALUES ('$name','$age','$gender')";

if($conn->query($sql) === TRUE){
echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql ="SELECT* FROM home";
$result = $conn->query($sql);


    while($row = $result->fetch_assoc()) {
        echo $row["Name"]."<br>".$row["Age"]."<br>".$row["Gender"]."<br>";
    }

 $conn->close();
?>
<script>
 function myFunction() {
     document.getElementById("demo").innerHTML = "Nahi karna";
 }
</script>

</body>
</html>