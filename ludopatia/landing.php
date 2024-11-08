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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['partita'])) {
        // Fai il reload della pagina
        header("Location:landing.php");
        exit();
    }
    if (isset($_POST['salva'])) {
    
        $segno1 = htmlspecialchars(trim($_POST['segno1']));
        $seme1 = trim($_POST['seme1']);
        $segno2 = trim($_POST['segno2']);
        $seme2 = trim($_POST['seme2']);
        $puntata = trim($_POST['puntata']);
        $esito = trim($_POST['esito']);
        $data = $_POST['data'];
        $data = date('Y-m-d', strtotime($data));
        $carta1 = $segno1 . $seme1;
        $carta2 = $segno2 . $seme2;
    
        $sql = 'INSERT INTO giocate (Carta1, Carta2, Puntata, Esito, Data) VALUES (?, ?, ?, ?, ?)';
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss",$carta1, $carta2, $puntata, $esito, $data);

        if($stmt->execute())
        {
            echo "<script>alert('giocata aggiunta con successo')</script>";
            $results = $stmt->get_result();
        }
          
        else
            echo "<script>alert('giocata aggiunta con successo')</script>";
    
    }
}

?>
<form method="POST">
<button onclick="<?php header("Location: incassi.php") ?>" name='finisci' >FINISCI</button>
    <h1>Prima carta</h1>
    <label>inserisci il segno della carta : </label>
    <select name='segno1'>
        <option></option>
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
    <select name='seme1'>
        <option value='C'>Cuori</option>
        <option value='Q'>Quadri</option>
        <option value='F'>Fiori</option>
        <option value='P'>Picche</option>
    </select>  
    <br>

    <h1>Seconda carta</h1>
    <label>inserisci il segno della carta : </label>
    <select name='segno2'>
    <option value=null></option>
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
    <select name='seme2'>
        <option value='C'>Cuori</option>
        <option value='Q'>Quadri</option>
        <option value='F'>Fiori</option>
        <option value='P'>Picche</option>
    </select>  
    <br>
    <br>

    <label>inserisci l'esito : </label>
    <br>
    <input type='radio' name='esito' value='vinto' required>Vincita
    <input type='radio' name='esito' value='perso'required>Perdita
    <br>
    <label>inserisci la puntata della giocata : </label>
    <input type='number' name='puntata' placeholder='Putanta....' required>
    <br>
    <label>inserisci la data della giocata : </label>
    <input type='date' name='data' placeholder='Data....' required>
    <br>
    <br>
    <button type='submit' name='salva'>SALVA</button>
    <br>
    <button type='submit' name='partita' >PARTITA</button>
    <br>
   
</form>


    
    
</body>
</html>
