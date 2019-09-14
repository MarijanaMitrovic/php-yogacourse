<?php
session_start();
$statusCode = 404;
if($_SERVER['REQUEST_METHOD'] != "POST"){
echo "You can't access this page!";
}
if(!empty($_POST['id'])){
$id = $_POST['id'];
include "konekcija.php";
try{
$idUsera = $_SESSION['korisnik']->id_korisnik;
$userVote = $_SESSION['korisnik']->korisnik_glas;
$flag = false;
$idUser = $_SESSION['korisnik']->id_korisnik;

if($userVote==1){
}
else {
$updateUserVote = $konekcija->prepare("UPDATE korisnik SET korisnik_glas = 1 WHERE id_korisnik = :id");
$updateUserVote->bindParam(":id", $idUser);
$userVoteUpdated = $updateUserVote->execute();
if($userVoteUpdated){
$query= $konekcija->prepare("UPDATE anketa SET brojac=brojac+1 WHERE id = :id");
$query->bindParam(":id", $id);
$rezultat = $query->execute();
if($rezultat){
$_SESSION['korisnik']->korisnik_glas=1;
$statusCode = 204;
$flag = true;
}
else{
$statusCode = 500;
}
}
else{
$statusCode = 500;
}
}
echo $flag;
}
catch(PDOException $e){
$statusCode = 500;
echo $e->getMessage();
}
}

?>