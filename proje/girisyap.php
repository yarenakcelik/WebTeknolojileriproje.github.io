<?php

$servername = "localhost";
$username = "kullanici_adi";
$password = "sifre";
$dbname = "veritabani_adi";


$kullanici_adi = $_POST['username'];
$sifre = $_POST['password'];


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$stmt = $conn->prepare("SELECT * FROM kullanici WHERE kullanici_adi=? AND sifre=?");
$stmt->bind_param("ss", $kullanici_adi, $sifre);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {

    header("Location: basarili.html");
    exit(); 
} else {
  
    header("Location: girisyap.html");
    exit(); 
}


$conn->close();
?>
