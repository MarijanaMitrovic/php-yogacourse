
  
      
      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">Know us more</h2>
              <h1 class="">About Studio</h1>
              
            </div>
          </div>
        </div>
      </div>  

      

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Yoga Trainers</h2>
          </div>
        </div>
        <div class="row">
          <?php
          $upit="SELECT * FROM treneri";
          $stmt=$konekcija->prepare($upit);
          $stmt->execute();
          $trainers=$stmt->fetchAll();
          foreach($trainers as $trainer): ?>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a href="#" class="d-block mb-4 thumbnail"><img src="<?=$trainer->slika?>" alt="Image" class="img-fluid  rounded-circle w-50"></a>
              <div class="p-4">
                <h3 class="heading mb-0 h5 "><a href="#" class="text-black"><?=$trainer->ime?></a></h3>
                <p class="mb-3"><?=$trainer->oblast?></p>
                <p><?=$trainer->tekst?></p>
               
              </div>
            </div>
          </div>
<?php endforeach; ?>
        
        </div>
      </div>
      <div class="container">
        <div id="row" class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form action="<?php $_SERVER['PHP_SELF'].'?page=about' ?>" method="POST" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" id="tbName" name="tbName" class="form-control" placeholder="Full Name">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="tbMail" name="tbMail" class="form-control" placeholder="Email Address">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="">Subject</label>
                  <input type="text" id="tbSubject" name="tbSubject" class="form-control" placeholder="Subject">
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea name="message" id="tbMessage" name="tbMessage" cols="30" rows="5" class="form-control" placeholder="Send us message"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="btnSubmit" id="btnSubmit" value="Send Message" class="btn btn-primary pill text-white px-5 py-2">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>

