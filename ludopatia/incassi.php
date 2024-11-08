<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ludopatia";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("". $conn->connect_error);

}

$sql = "SELECT * FROM giocate";
$stmt = $conn->prepare($sql);

if($stmt->execute())
{
    $results = $stmt->get_result();
    while($row = $results->fetch_assoc()){
        echo  "" . $row["IDGiocata"] . "";
    }
    
}
?>
</body>
</html>