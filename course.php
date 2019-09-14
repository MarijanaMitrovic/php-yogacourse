<?php
session_start();
if (isset($_GET['id'])):
$id = $_GET['id'];

include "views/head.php";
include "views/nav.php";




$upit = $konekcija->prepare("SELECT *
				FROM kursevi k 
					INNER JOIN treneri t
						ON k.trener_id = t.id
						WHERE k.id_kurs=:id");
$upit->execute(array(":id"=>$id));
$kurs=$upit->fetch();

if(isset($kurs)):
 ?>
     <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">Course</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="site-block-half d-flex">
            <div class="image bg-image" style="background-image: url('<?=$kurs->foto?>');"></div>
            <div class="text py-5">
              <h2 class="font-family-serif h4 mb-3"><?=$kurs->naziv?></h2>
              <p><?=$kurs->opis?></p>

            

              <h2 class="font-family-serif h4 mb-3">Instructor:</h2>
              <p>
                <?=$kurs->ime?>
              </p>           
            </div>
          </div>
        </div>
      </div>
</div>
<br/>
<br/>



<?php endif; ?>
<?php endif; ?>
<?php 
include "views/footer.php"; ?>	