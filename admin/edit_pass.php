<?php include 'admin_header.php'; ?>

<?php

$user = new User();
$user->get_user();
$err_msg = "";
$success_msg = "";

if(isset($_POST['edit_pass'])) {
    
   $old_pass = $database->escape_string(htmlspecialchars($_POST['old_pass']));
   $new_pass = $database->escape_string(htmlspecialchars($_POST['new_pass']));
   $cpass = $database->escape_string(htmlspecialchars($_POST['cpass']));
   
   if($old_pass == $user->password) {
       if($new_pass == $cpass) {
           if($user->update_pass($new_pass)) {
           $user->logout();
           $success_msg = "Passwort geändert";
           } else {
               $err_msg = "Passwortänderung Fehler!";
           }
       } else {
           $err_msg = "Ihre Passwörter stimmen nicht überein!";
       }
   } else {
       $err_msg = "Passwort Validierungsfehler!";
   }
}

?>
<?php include 'login_modal2.php'; ?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- CONTAINER -->
    <article class="container text-center">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 no-padding">
            <p class="alert-danger"><?php echo $err_msg; ?></p>
            <p class="alert-success"><?php 
            
            if($success_msg) {
                echo "$success_msg" . " " . "- Bitte <a href='#' class='link' data-toggle='modal' data-target='#myModal2'>einloggen.</a>";
            }
            
            ?>
            </p>
            <h3><?php echo $user->username; ?></h3>
            <p>Passwort Ändern</p>
            <form action="edit_pass.php" method="post">
                <div class="form-group">
                    <input class="form-control text-center" name="old_pass" type="password" placeholder="Altes Passwort">
                </div>
                <div class="form-group">
                    <input class="form-control text-center" name="new_pass" type="password" placeholder="Neues Passwort">
                </div>
                <div class="form-group">
                    <input class="form-control text-center" name="cpass" type="password" placeholder="Bestätigen Sie das Passwort">
                </div>
                <input class="btn btn-default" name="edit_pass" type="submit" value="Passwort ändern">
            </form>
        </div>
    </article>
    <!-- /.container -->
</div>
<!-- /.wrapper -->


<?php include('admin_footer.php'); 




