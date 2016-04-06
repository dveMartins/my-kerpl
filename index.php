<!-- header -->
<?php include 'includes/header.php'; ?>
<!-- /.header -->
<?php 
$projects = new Projects();
$the_projects = $projects->get_all_prj();
?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- .header text -->
    <article class="container m-center">
        <p class="alert-danger text-center">
            <?php
            if (isset($_SESSION['login_failed'])) {
                echo $_SESSION['login_failed'];
            }
            ?>
        </p>
        <div class="col-sm-10 col-sm-offset-1 text-center">
            Herzlich Willkommen. Hier finden Sie alle Informationen zu 
            meinen Arbeiten, meiner Person und meinem künstlerischen Werdegang. 
            Für Fragen, Wünsche oder Anregungen stehe ich ihnen jederzeit zur 
            Verfügung. Kontaktieren Sie mich einfach. Viel Spaß beim Stöbern und 
            Impressionen sammeln.<br> <br> Ihre Conny Kerpl
        </div>
    </article>

    <!-- /.header text -->

    <!-- SLIDER -->
    <article class="ribbon slider">
        <div class="carouwrap clearfix">

            <ul data-fx="directscroll">
                <?php while ($row = mysqli_fetch_array($the_projects)) { ?>
                    <li>
                        <img src="images/<?php echo $row['image']; ?>" width="400" height="270" alt="">
                        <a href="einzelarbeit?p_id=<?php echo $row['id']; ?>" class="mask">
                            <h6><?php echo $row['project_name']; ?> <small><?php echo $row['project_cat']; ?></small></h6>
                        </a>
                    </li>
                <?php } ?>
            </ul>


            <div class="slidebar">
                <div class="container">
                    <a href="meine_arbeiten/" class="block-link right">MEINE <br/> ARBEITEN</a>
                </div>
                <nav class="nav-pages"></nav>
            </div>
        </div>
    </article>
    <!-- /.slider -->
    <!-- /.wrapper -->

    <!-- middle content -->

    <article class="container m-center">
        <div class="col-sm-9 col-sm-offset-2">
            <p>"Mein Bestreben ist es alte Dinge zu erhalten oder Vorhandenes neu zu gestalten."</p>
        </div>
    </article>
</div>
<!-- /.middle content -->

<?php
include ('includes/footer.php');
