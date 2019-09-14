<body>
<?php
include "php/konekcija.php";?>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.html">Yogalife</a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    
                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                     <?php 
                     $upit="SELECT * FROM navbar";
                     $stmt=$konekcija->prepare($upit);
                     $stmt->execute();
                     $menus=$stmt->fetchAll();
                     foreach($menus as $menu): ?>

                      <li><a href="<?=$menu->putanja?>"><?=$menu->naslov?></a></li>
                   <?php endforeach; ?>

                  <?php if(isset($_SESSION['korisnik'])):?>
                      <li><a href="php/logout.php">Logout</a></li>
                 <?php else: ?>
                  <li><a href="index.php?page=login">Login</a></li>

             <?php endif;?>
             <?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->uloga_id==="1"): ?>
             <li><a href="index.php?page=admin"> Admin </a></li>
<?php endif;?>
<?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->uloga_id==="2"): ?>
             <li><a href="index.php?page=user"> User account </a></li>
<?php endif;?>

                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>