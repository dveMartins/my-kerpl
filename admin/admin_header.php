<?php
require_once '../init.php';

?>

<?php
$user = new User();
if (!isset($_SESSION['user_id'])) {
    $user->redirect("../404.php");
}
$user->get_user();
?>  

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>Conny Kerpl - Admin </title>
        <link href="../images/ck_ico.png" rel="shortcut icon" type="image/x-icon">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <!-- Yokko - Responsive Multipurpose Template - v.1.3 -->
    </head>
    <body class="home">

        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>

        <!-- HEADER -->
        <header class="header">
            <div class="container">
                <div class="col-xs-2">
                    <a href="index.php" class="logo">CONNY<br>KERPL</a>
                </div>
                <div class="col-xs-10">
                    <!-- Mainmenu -->
                    <nav class="navbar mainmenu">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="navbar-collapse pull-right collapse" id="navbar-collapse">
                            <button type="button" class="pclose collapsed" data-toggle="collapse" data-target="#navbar-collapse"></button>
                            <ul class="nav navbar-nav pull-right">
                                <li>
                                    <a href="../index.php" class="">STARTSEITE</a>
                                </li>
                                <li class="current-menu-item">
                                    <a href="index.php" class="">ADMIN</a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eingeloggt: <?php echo $user->username; ?></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php">Profil editieren</a></li>
                                        <li><a href="edit_pass.php">Passwort ändern</a></li>
                                        <li><a href="logout.php">Ausloggen</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- /.mainmenu -->
                </div>
            </div>
        </header>




