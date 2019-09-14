
   <!-- SLIDER -->

<div class="slide-one-item home-slider owl-carousel">
      
<?php
   $upit="SELECT * FROM slajder";
   $stmt=$konekcija->prepare($upit);
   $stmt->execute();
   $slike=$stmt->fetchAll();
   foreach($slike as $slajd): ?>
      <div class="site-blocks-cover overlay" style="background-image: url(<?=$slajd->slika?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2"><?= $slajd->opis1 ?></h2>
              <h1 class=""><?=$slajd->opis2?></h1>
              
            </div>
          </div>
        </div>
      </div>  
<?php endforeach; ?>
    
    </div>

    <!-- END SLIDER -->

    <!-- COURSES -->
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Our Programs</h2>
          </div>
        </div>
        <div class="row">
            <?php
            $upit="SELECT * FROM kursevi k INNER JOIN treneri t ON k.trener_id=t.id";
            $stmt=$konekcija->prepare($upit);
            $stmt->execute();
            $kursevi=$stmt->fetchAll();
            foreach($kursevi as $kurs): ?>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="program">
              <a href="#" class="d-block mb-0 thumbnail"><img src="<?=$kurs->foto?>" alt="Image" class="img-fluid"></a>
              <div class="program-body">
                <h3 class="heading mb-2"><a href="course.php?id=<?=$kurs->id_kurs?>"><?=$kurs->naziv?></a></h3>
                <p><a href="#"><?=$kurs->vrsta?></a> with <a href="#"><?=$kurs->ime?></a></p>
                <div class="span"><span class="mr-4"><span class="icon-schedule icon"></span><?=$kurs->trajanje?></span> <span> <span class="icon-signal icon"></span><?=$kurs->tezina?></span></div>
              </div>
            </div>
          </div>
<?php endforeach; ?>
 
        </div>
      </div>
    </div>
    <!-- END COURSES -->
   

<!-- GALLERY -->
    <div class="site-section">
      <div class="">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Our Gallery</h2>
          </div>
        </div>
        <div class="row no-gutters">

        <?php
        $upit="SELECT * FROM galerija";
        $stmt=$konekcija->prepare($upit);
        $stmt->execute();
        $photos=$stmt->fetchAll();
        foreach($photos as $photo): ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?=$photo->href?>" class="image-popup img-opacity"><img src="<?=$photo->putanja?>" alt="<?=$photo->alt?>" class="img-fluid"></a>
          </div>
<?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- END GALLERY -->



    <!-- POSTS -->
    <div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Info</h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">
          
        <?php

        $upit="SELECT * FROM post p INNER JOIN korisnik k ON p.korisnik_id=k.id_korisnik ORDER BY p.datum DESC";
        $stmt=$konekcija->prepare($upit);
        $stmt->execute();

        $posts=$stmt->fetchAll();

        foreach($posts as $post): ?>

            <div class="media-with-text p-md-5">
              <div class="img-border-sm mb-4">
                <a href="#" class="popup-vimeo image-play">
                  <img src="<?=$post->fotografija?>" alt="<?=$post->naslov?>" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#"><?=$post->naslov?></a></h2>
              <span class="mb-3 d-block post-date"><?=$post->datum?> &bullet; By <a href="#"><?=$post->ime?></a></span>
              <p><?=$post->sadrzaj?></p>
            </div>
          
            
<?php endforeach; ?>


        </div>

      </div>
    </div>
    <!-- END POSTS -->