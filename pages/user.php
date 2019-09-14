<?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->uloga_id==="2"): ?>
<div class="site-section site-section-sm">
      <div class="container">




<div id="poll">
<p>Are you more interested in yoga after scrolling trough our website?</p>
<br/>
<?php
$query = "SELECT * FROM anketa";
$voting = executeQuery($query);
?>
<form action='<?php echo $_SERVER["PHP_SELF"]."?page=user" ; ?>' method="POST">
<?php foreach($voting as $vote): ?>
<button type="button" class="btn btn-primary btnSubmitVote" data-id='<?= $vote->id?>'
value='<?= $vote->id?>'>
<?= $vote->odgovor; ?> <span class="badge badge-light"><?= $vote->brojac; ?></span>
</button><br/><br/>
<?php endforeach;?>
</form>
</div>
</div>
</div>


<?php else: ?>
<div class="site-section site-section-sm">
    <div class="container">
<br/><br/>
<br/>
<h3> You must log in as user first! (Go back) </h3>
<br/>
<?php endif; ?>
</div>
<br/>
<br/>
<div class="container">
</div>
</div>