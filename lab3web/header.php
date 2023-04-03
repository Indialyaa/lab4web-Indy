<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>pemogramman web 2</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div id="container">
  <header>
      <h1>UNIVERSITAS PELITA BANGSA</h1>
    </header>
    <nav>
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </nav>