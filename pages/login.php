<?php

	if(isset($_POST['btnLogin'])){
		

		$email = $_POST['tbEmail'];
		$lozinka = $_POST['tbLozinka'];

		$errors = [];
		$reLozinka = "/^[\S]{5,}$/";

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Email nije ok";
		}

		if(!preg_match($reLozinka, $lozinka)){
			$errors[] = "Lozinka nije ok.";
		}

		if(count($errors) > 0){
            $_SESSION['greske'] = $errors;
          
			header("Location: index.php?page=login");
		}
		else {
			
			$lozinka = md5($lozinka);

			 $upit = "SELECT id_korisnik, ime, prezime, email, uloga_id, korisnik_glas FROM korisnik k INNER JOIN uloga u 
              ON k.uloga_id = u.id WHERE email = :email AND lozinka = :lozinka";

			    $stmt = $konekcija->prepare($upit);
			    $stmt->bindParam(":email", $email);
			    $stmt->bindParam(":lozinka", $lozinka);

			    $stmt->execute();
			    $user = $stmt->fetch();
			    if($user) {
              $_SESSION['korisnik'] = $user; 
       //       if($_SESSION['korisnik']->uloga_id=="1"){
            //    header("Location: index.php?page=admin");
           //     } else {
              header("Location: index.php?page=home"); 
            //}
			        
			    } else {
			        $_SESSION['greske'] = "Pogresan email ili password.";
			        header("Location: index.php?page=login");
			    }
		}
  }
  ?>


<div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          


          
            <form action="" method="POST" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="text" id="tbEmail" name="tbEmail" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Password</label>
                  <input type="password" id="tbLozinka" name="tbLozinka" class="form-control" placeholder="Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Login" id="btnLogin" name="btnLogin" class="btn btn-primary pill text-white px-5 py-2">
                </div>
                <br/>
                <br/>
                <div class="col-md-12">
                <a class="btn btn-primary pill text-white px-5 py-2" href="index.php?page=register" name="btnRegister">
                                    Register
                                </a>
              </div> 
              
              </div>

  
            </form>

   
          </div>
          <?php
if (isset($_SESSION['errors'])):
echo "<div class='text-center'><br/>
<strong>Please enter valid email and password.</strong>
</div>";
unset($_SESSION['errors']);
?>
<?php endif;?>

         
        </div>
      </div>
    </div>