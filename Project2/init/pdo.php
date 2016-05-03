<?php 
$pdo = new PDO('mysql:host=sylvester-mccoy-v3.ics.uci.edu;
dbname=inf124grp14','inf124grp14', 'W6uP=epe');
// $pdo = new PDO('mysql:host=127.0.0.1;
// dbname=inf124grp14','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>