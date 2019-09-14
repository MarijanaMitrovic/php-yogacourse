<?php
include "konekcija.php";

if(isset($_POST['btnRegister'])){
		
	$ime = trim($_POST['tbFirstName']);
	$prezime = trim($_POST['tbLastName']);
    $email = trim($_POST['tbEmail']);
	$lozinka=trim($_POST['tbLozinka']);

	
	$reIme = "/^[A-Z][a-z]{2,20}$/";
	$reLozinka = "/^[\S]{5,32}$/";
	
	$errors = [];

	if(!preg_match($reIme, $ime)){
		$errors[] = "Name is not ok";
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors[] = "Email is not ok";
	}

	if(!preg_match($reLozinka, $lozinka)){
		$errors[] = "Password is not ok.";
	}
	
	if(count($errors) > 0){

		echo "<ol>";
		
		foreach($errors as $error){
			echo "<li> $error </li>";
		}

		echo "</ol>";
	}
	else {
		


		$lozinka = md5($lozinka);
		$slika="images/unknown.png";
	
		$upit_unos = $konekcija->prepare("INSERT INTO korisnik VALUES ('', :ime, :prezime, :email, :lozinka, :datum_registracije, 1, 2, :slika, 0)");

		$upit_unos->bindParam(':ime', $ime);
		$upit_unos->bindParam(':prezime', $prezime);
		$upit_unos->bindParam(':email', $email);
		$upit_unos->bindParam(':lozinka', $lozinka);
		
		$datum = date("Y-m-d H:i:s"); 
		
		$upit_unos->bindParam(':datum_registracije', $datum);
		$upit_unos->bindParam(':slika', $slika);
		

		try {

			$rezultat = $upit_unos->execute();
			
			if($rezultat){
				echo "Registration successfully!";
			} else {
				echo "Error with registration!";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
			echo "Can't registrate!";
		}
	}
} ?>

