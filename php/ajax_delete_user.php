<?php
$statusCode = 404;
if($_SERVER['REQUEST_METHOD'] != "POST"){
echo "You can't access this page!";
}

if(!empty($_POST['id'])){
$id = $_POST['id'];
include "konekcija.php";
try{
$upit = $konekcija->prepare("DELETE FROM korisnik WHERE id_korisnik= :id");
$upit->bindParam(":id", $id);
$rezultat = $upit->execute();
// echo $rezultat;
if($rezultat){
$statusCode = 204;
}
else{
$statusCode = 500;
}
}
catch(PDOException $e){
$statusCode = 500;
echo $e->getMessage();
}
}

?>