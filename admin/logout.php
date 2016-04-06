<?php
require_once '../init.php';

$user = new User();
if($user) {
    $user->logout();
    $user->redirect("../index.php");
} else {
    echo '<p class="text-center alert-danger">You are not logged in!</p>';
}
