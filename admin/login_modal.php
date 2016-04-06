<?php

$user = new User();

if(isset($_POST['login'])) {
   
 $user->username = $database->escape_string($_POST['user_name']);
 $user->password = $database->escape_string($_POST['user_password']);

 $user_logged = $user->verify_user();
 
 if($user->login($user_logged)) {

     $user->redirect("admin");
        
 } else {
     
     $_SESSION['login_failed'] = "Anmelden error! Bitte, versuchen Sie es noch einmal";
     
 }
    
    
}


?>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><strong>CONNY KERPL</strong> <br>Login</h4>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-lg-8 col-lg-offset-2 ">
                        <form role="form" action="" method="post">
                            <div class="form-group">                      
                                <input type="text" class="form-control text-center" name="user_name" placeholder="Benutzer"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control text-center" name="user_password" placeholder="*******"/>
                                <br>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default btn-sm" id="login" name="login" value="einloggen"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

