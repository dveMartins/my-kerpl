<?php include 'admin_header.php'; ?>

<?php

$user = new User();

$user->get_user();
$err_msg = "";
if(isset($_POST['update'])) {
    
   $new_username = $database->escape_string(htmlspecialchars($_POST['username']));
   $new_email = $database->escape_string(htmlspecialchars($_POST['email']));
   
   if($user->edit_profile($new_username, $new_email)) {
       $err_msg = "Profil aktualisiert!";
   } else {
       $err_msg = "Error! Profil wurde nicht aktualisiert";
   }
}

?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- CONTAINER -->
    <article class="container text-center">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 no-padding">
            <p class="alert-danger">
            <?php 
            if($err_msg) {
            echo $err_msg . " " . "- zurück nach <a href='index.php'>Admin</a>"; 
            }
            ?>
            </p>
            <h3><?php echo $user->username; ?></h3>
            <p>Profil editieren</p>
            <form action="profile.php" method="post">
                <div class="form-group">
                    <input class="form-control text-center" name="username" type="text" value="<?php echo $user->username; ?>">
                </div>
                <div class="form-group">
                    <input class="form-control text-center" name="email" type="email" value="<?php echo $user->email; ?>">
                </div>
                <input class="btn btn-default" name="update" type="submit" value="Aktualisieren">
            </form>
        </div>
    </article>
    <!-- /.container -->
</div>
<!-- /.wrapper -->


<?php include('admin_footer.php'); 


