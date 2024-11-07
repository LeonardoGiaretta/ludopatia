<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ludopatia</title>
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['partita'])) {
    // Fai il reload della pagina
    header("Location:landing.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['salva'])) {
    
}


?>

<form method="POST">
    <h1>Prima carta</h1>
    <label>inserisci il segno della carta : </label>
    <select name='segno'>
        <option value='A'>Asso</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
        <option value='9'>9</option>
        <option value='10'>10</option>
        <option value='J'>J</option>
        <option value='Q'>Q</option>
        <option value='K'>K</option>
    </select>     
    <br>
    <label>inserisci il seme della carta : </label>
    <select name='seme'>
        <option value='C'>Cuori</option>
        <option value='Q'>Quadri</option>
        <option value='F'>Fiori</option>
        <option value='P'>Picche</option>
    </select>  
    <br>

    <h1>Seconda carta</h1>
    <label>inserisci il segno della carta : </label>
    <select name='segno'>
        <option value='A'>Asso</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
        <option value='9'>9</option>
        <option value='10'>10</option>
        <option value='J'>J</option>
        <option value='Q'>Q</option>
        <option value='K'>K</option>
    </select>  
    <br>
    <label>inserisci il seme della carta : </label>
    <select name='seme'>
        <option value='C'>Cuori</option>
        <option value='Q'>Quadri</option>
        <option value='F'>Fiori</option>
        <option value='P'>Picche</option>
    </select>  
    <br>
    <br>

    <label>inserisci l'esito : </label>
    <br>
    <input type='radio' name='esito2' value='vinto' required>Vincita
    <input type='radio' name='esito2' value='perso'required>Perdita
    <br>
    <label>inserisci la puntata della giocata : </label>
    <input type='number' name='puntata' placeholder='Putanta....' required>
    <br>
    <br>
    <button type='submit' value='salva'>SALVA</button>
    <br>
    <button type='submit' value='partita' >partita</button>
    
</form>


    
    
</body>
</html>