<!-- header -->
<?php include 'kontakt_header.php'; ?>
<!-- /.header -->

<!-- mailer -->
<?php

$success_msg = $error_msg = "";

if(isset($_POST['submit'])) {
    
    $to = "cruzmill.cm@gmail.com";
    $validate_email = $database->escape_string($_POST['email']);
    $from = filter_var($validate_email, FILTER_VALIDATE_EMAIL);
    $sender_name = $database->escape_string($_POST['name']);
    $body = $database->escape_string($_POST['message']);
    $subject = "E-Mail von Kunden";
    
    // headers
    $headers     = "MIME-Version: 1.0" . "\r\n";
    $headers    .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers    .= 'From: ' . $sender_name. "\r\n";
    $headers    .= 'Email: ' . $from. "\r\n";
    
    if (!empty($sender_name) && !empty($from) && !empty($body)) {

        if(mail($to, $subject, $body, $headers)) {

        $success_msg = "Vielen Dank! Ihre Nachricht wurde gesendet.";
        
        } else {
            $error_msg = "Es gab ein Fehler! Ihre Nachricht wurde nicht gesendet.";
        }
        
    } else {

        $error_msg = "Fehler!  Bitte Versuchen Sie es nochmal";
        
    }
}

?>
<!-- /mailer -->

<!-- WRAPPER -->
<div class="wrapper">

    <!-- .page-header -->
    <header class="page-header container text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>— kontakt —</h1>
        </div>
    </header>
    <!-- /.page-header -->


    <!-- CONTAINER -->
    <article class="container inforow">
        <div class="col-sm-4 col-sm-offset-1">
            <address>
                <p>08243/90122</p>
                <p><a href="mailto:cornelia.kerpl@web.de">cornelia.kerpl@web.de</a></p>
                <p>Postgasse 1 <br> 86920 Denklingen <br> Deutschland</p>
            </address>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <h3>schreiben sie mir —</h3>
            <p class="alert-success"><?php if(!empty($success_msg)) {echo $success_msg;} ?> </p>
            <p class="alert-danger"><?php if(!empty($error_msg)) {echo $error_msg;} ?> </p>
             
            <form  method="post" action="index.php">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="ihre name" name="name">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="ihre Email" name="email">
                </div>
                <div class="form-group">
                    <textarea placeholder="ihre nachricht" name="message"></textarea>
                </div>
                <input class="btn btn-default" type="submit" name="submit" value="Senden">
                <span class="succs-msg">message was sent</span>
            </form>
        </div>
    </article>
    <!-- /.container -->
    
        <!-- MAP -->
    <article class="map">
        <div class="container">
            <div class="col-xs-12">
                <a href="" class="block-link right"  data-toggle="modal" data-target="#contact-modal">zeige <br/> vollbild</a>
            </div>
        </div>
        <div id="map"></div>
    </article>

</div>
<!-- /.wrapper -->

<!-- FOOTER -->
<?php include 'kontakt_footer.php';

