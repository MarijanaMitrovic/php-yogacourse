<div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <br/>
          <br/>
          <h2 class="mb-5">Author</h2>
        </div>
      </div>
      <?php
      $upit="SELECT * FROM autor";
      $stmt=$konekcija->prepare($upit);
      $stmt->execute();
      $autori=$stmt->fetchAll();
 foreach($autori as $autor): ?>
      <div class="row">
        <div class="col-12">
          <div class="site-block-half d-flex">
            <div class="image bg-image" style="background-image: url('<?=$autor->photo?>');"></div>
            <div class="text py-5">
              <h2 class="font-family-serif h4 mb-3"><?=$autor->ime?></h2>
              <p><?=$autor->bio?></p>

            </div>
          </div>
        </div>
      </div>
<?php endforeach; ?>

     

    </div>
    <br/>
    <br/>
    