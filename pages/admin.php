<?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->uloga_id==="1"): ?>
<div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
        <div class="col-md-3">
                    <br/>
                    <h3 class="heading mb-2"><a href="#deleteUser">Delete user</a></h3>
                </div>
            <div class="col-md-3">
             <br/>
             <h3 class="heading mb-2"><a href="#addUser">Add user</a></h3>
                </div>     
               <div class="col-md-3">
                    <br/>
                    <h3 class="heading mb-2"><a href="#addPost">Add post</a></h3>
                </div>
                <div class="col-md-3">
                    <br/>
                    <h3 class="heading mb-2"><a href="#deletePost">Delete post</a></h3>
                </div>
<br/>
<br/>

<!-- LIST OF USERS AND DELETE OPTION -->
       <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-8 mb-5" id="deleteUser">
        <br/>
        <br/>
        <h3 class="mb-5">All users</h2>
        <br/>
    <table class='table'>
<thead>
<tr>
<th scope='col'>First Name</th>
<th scope='col'>Last name</th>
<th scope='col'>Email</th>
<th scope='col'>Date</th>
<th scope='col'>Role</th>
<th scope='col'>Photo</th>
<th scope='col'>Vote</th>
<th scope='col'>Delete</th>
</tr>
</thead>
<tbody>
<?php
            $upit="SELECT * FROM korisnik k INNER JOIN uloga u ON k.uloga_id=u.id";
            $stmt=$konekcija->prepare($upit);
            $stmt->execute();
            $korisnici=$stmt->fetchAll();
            foreach($korisnici as $korisnik): ?>

<tr>
<td><?= $korisnik->ime ?> </td>
<td><?= $korisnik->prezime?></td>
<td><?= $korisnik->email?></td>
<td><?= $korisnik->datum_registracije?></td>
<td><?= $korisnik->naziv ?> </td>
<td><img src="<?=$korisnik->slika?>" width='100px' height='125px'/></td>
<td><?= $korisnik->korisnik_glas?></td>
<td> <a href='#' class='delete-user' data-id='<?= $korisnik->id_korisnik?>'>DELETE</a></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>
</div>
</div>
</div>

<!-- FORM FOR ADD NEW USER -->
          <div class="col-md-12 col-lg-8 mb-5" id="addUser">
       <form action="<?php  $_SERVER['PHP_SELF']."?page=admin" ; ?>" method="POST" class="p-5 bg-white" enctype="multipart/form-data">
            <h3 class="mb-5">Add user</h2>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">First Name</label>
                  <input type="text" id="tbAddName" name="tbAddName" class="form-control" placeholder="First Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">Last Name</label>
                  <input type="text" id="tbAddLast" name="tbAddLast" class="form-control" placeholder="Last Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="text" id="tbAddEmail" name="tbAddEmail" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Password</label>
                  <input type="password" id="tbAddLozinka" name="tbAddLozinka" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Role id</label>
                  <input type="text" id="tbRole" name="tbRole" class="form-control" placeholder="Role id">
                </div>
              </div>
              <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="name">Image</label>
                      <input type="file" id="fUserImage" name="fUserImage" class="form-control" placeholder="Choose Image">
            </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Add new user" id="btnAddUser" name="btnAddUser" class="btn btn-primary pill text-white px-5 py-2">
                </div>
                <br/>
                <br/>
              
              </div>

  
            </form>

          
          </div>
         
        </div>
      </div>

      <!-- LIST OF POSTS AND DELETE POST OPTION -->

      <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-8 mb-5" id="deletePost">
        <br/>
        <br/>
        <h3 class="mb-5">All posts</h2>
        <br/>
    <table class='table'>
<thead>
<tr>
<th scope='col'>Title</th>
<th scope='col'>Text</th>
<th scope='col'>Photo</th>
<th scope='col'>Date</th>
<th scope='col'>Author</th>
<th scope='col'>Delete</th>
</tr>
</thead>
<tbody>
<?php
            $upit="SELECT * FROM post p INNER JOIN korisnik k ON p.korisnik_id=k.id_korisnik";
            $stmt=$konekcija->prepare($upit);
            $stmt->execute();
            $postovi=$stmt->fetchAll();
            foreach($postovi as $post): ?>

<tr>
<td><?= $post->naslov ?> </td>
<td><?= $post->sadrzaj?></td>
<td><img src="<?=$post->fotografija?>" width='100px' height='125px'/></td>
<td><?= $post->datum?></td>
<td><?= $post->ime ?> </td>

<td> <a href='#' class='delete-post' data-id='<?= $post->id?>'>DELETE</a></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>
</div>
</div>
</div>


<!-- FORM FOR ADD NEW POST -->
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5" id="addPost">
       <form action="<?php  $_SERVER['PHP_SELF']."?page=admin" ; ?>" method="POST" class="p-5 bg-white" enctype="multipart/form-data">
            <h3 class="mb-5">Add post</h2>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">Title</label>
                  <input type="text" id="tbTitle" name="tbTitle" class="form-control" placeholder="Insert title">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">Content</label>
                  <textarea class="form-control" id="tbContent" name="tbContent" placeholder="Insert content"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Id author</label>
                  <input type="text" id="tbAuthor" name="tbAuthor" class="form-control" placeholder="Id of author">
                </div>
              </div>
             
              <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="name">Image</label>
                      <input type="file" id="fPostImage" name="fPostImage" class="form-control" placeholder="Choose Image">
            </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Add new post" id="btnAddPost" name="btnAddPost" class="btn btn-primary pill text-white px-5 py-2">
                </div>
                <br/>
                <br/>             
              </div>
            </form>
          </div>
       </div>
      </div>




 



    </div>




    <!-- ADD NEW USER -->
<?php
if (isset($_POST['btnAddUser'])) {
$firstName = trim($_POST['tbAddName']);
$lastName = trim($_POST['tbAddLast']);
$email = trim($_POST['tbAddEmail']);
$pass = $_POST['tbAddLozinka'];
$userRole = $_POST['tbRole'];
$userImage = $_FILES['fUserImage'];
echo "<br/>";


$fileName = $userImage['name'];
$fileType = $userImage['type'];
$fileSize = $userImage['size'];
$tmpPath = $userImage['tmp_name'];


$errors = [];

$reName = "/^[A-Z][a-z]{2,50}$/";
$rePassword = "/^[\S]{5,}$/";

$errors = [];
if (!preg_match($reName, $firstName)) {
$errors[] = "First name is not ok.";
}
if (!preg_match($reName, $lastName)) {
$errors[] = "Last name is not ok.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors[] = "Email nije ok";
}
if (!preg_match($rePassword, $pass)) {
$errors[] = "Password is not ok.";
}
$allowedFormats = array("image/jpg", "image/jpeg", "image/png", "image/gif");
if (!in_array($fileType, $allowedFormats)) {
$errors[] = "File type is not ok.";
}
if ($fileSize > 3000000) { // 3.000.000B ~ 3MB
$errors[] = "File size must be less than 3MB.";
}


if (count($errors) == 0) {
$imageName = time() . $fileName;
$newPath = "images/" . $imageName;

if (move_uploaded_file($tmpPath, $newPath)) {
try {

$pass=md5($pass);
$datum = date("Y-m-d H:i:s"); 
$userInsert = "INSERT INTO korisnik VALUES('', :ime, :prezime, :email, :lozinka,
:datum_registracije, 1, :uloga_id, :slika, 0)";


$prepareUserInsert = $konekcija->prepare($userInsert);
$prepareUserInsert->bindParam(":ime", $firstName);
$prepareUserInsert->bindParam(":prezime", $lastName);
$prepareUserInsert->bindParam(":email", $email);
$prepareUserInsert->bindParam(":lozinka", $pass);
$prepareUserInsert->bindParam(":datum_registracije", $datum);
$prepareUserInsert->bindParam(":uloga_id", $userRole);
$prepareUserInsert->bindParam(":slika", $newPath);
$result= $prepareUserInsert->execute();

if ($result) {
echo "New user has been added successfully!";
}
} 
catch (PDOException $ex) {
echo $ex->getMessage();
}
} 
else {
echo "File upload failed!";
}
} 
else {
echo "<ol>";
foreach ($errors as $error) {
echo "<li> $error </li>";
}
echo "</ol>";
}
}
?>
<!-- END ADDING NEW USER -->





 <!-- ADD NEW POST -->
 <?php
if (isset($_POST['btnAddPost'])) {
$title = trim($_POST['tbTitle']);
$content = trim($_POST['tbContent']);
$author = trim($_POST['tbAuthor']);
$postImage = $_FILES['fPostImage'];
echo "<br/>";


$fileName = $postImage['name'];
$fileType = $postImage['type'];
$fileSize = $postImage['size'];
$tmpPath = $postImage['tmp_name'];


$errors = [];



$allowedFormats = array("image/jpg", "image/jpeg", "image/png", "image/gif");
if (!in_array($fileType, $allowedFormats)) {
$errors[] = "File type is not ok.";
}
if ($fileSize > 3000000) { // 3.000.000B ~ 3MB
$errors[] = "File size must be less than 3MB.";
}


if (count($errors) == 0) {
$imageName = time() . $fileName;
$newPathPost = "images/" . $imageName;

if (move_uploaded_file($tmpPath, $newPathPost)) {
try {

$datum = date("Y-m-d H:i:s"); 
$postInsert = "INSERT INTO post VALUES('', :fotografija, :naslov, :datum, :sadrzaj,
:korisnik_id)";


$preparePostInsert = $konekcija->prepare($postInsert);
$preparePostInsert->bindParam(":fotografija", $newPathPost);
$preparePostInsert->bindParam(":naslov", $title);
$preparePostInsert->bindParam(":datum", $datum);
$preparePostInsert->bindParam(":sadrzaj", $content);
$preparePostInsert->bindParam(":korisnik_id", $author);
$result= $preparePostInsert->execute();

if ($result) {
echo "New post has been added successfully!";
}
} 
catch (PDOException $ex) {
echo $ex->getMessage();
}
} 
else {
echo "File upload failed!";
}
} 
else {
echo "<ol>";
foreach ($errors as $error) {
echo "<li> $error </li>";
}
echo "</ol>";
}
}
?>
<!-- END ADDING NEW POST -->


<?php else: ?>
<div class="site-section site-section-sm">
    <div class="container">
<br/><br/>
<br/>
<h3> You must log in as administrator first! (Go back) </h3>
<br/>
<?php endif; ?>
</div>
<br/>
<br/>
<div class="container">
</div>
</div>