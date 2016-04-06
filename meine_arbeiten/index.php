<?php include 'meine_arbeiten_header.php'; ?>
<!-- /.header -->
<?php 

$projects = new Projects();
$all_projects = $projects->get_all_prj();

?>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- .page-header -->
    <header class="page-header container text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>— MEINE KUNSTWERKE —</h1>
        </div>
    </header>
    <!-- /.page-header -->

    <!-- GALLERY -->
    <section class="gallery text-center">
        <nav>
            <ul class="nav-category">
                <li><a href="#all" class="filter" data-filter="all">Alle</a></li>
                <li><a href="#glasobjekten" class="filter" data-filter=".glasobjekten">glasobjekten</a></li>
                <li><a href="#flaschenuhren" class="filter" data-filter=".flaschenuhren">flaschenuhren</a></li>
                <li><a href="#schmuck" class="filter" data-filter=".schmuck">schmuck</a></li>
            </ul>
        </nav>

        <div class="container">
            <div class="col-xs-12">
                <a href="../kontakt/" class="block-link right">kontakt</a>
            </div>
        </div>

        <!-- mix-list -->
        <ul class="row mix-list">
            <?php
            
            while($row = mysqli_fetch_array($all_projects)) {
            
            ?>
            <li class="col-md-3 col-sm-4 col-xs-6 mix <?php echo $row['project_cat']; ?>">
                <img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['project_name']; ?>" width="400" height="270">
                <a href="../einzelarbeit?p_id=<?php echo $row['id']; ?>" class="mask">
                    <h6><?php echo $row['project_name']; ?> <small>— <?php echo $row['project_cat']; ?> —</small></h6>
                </a>
            </li>
            <?php } ?>
        </ul>
        <!-- /.mix-list -->
    </section>
    <!-- /.gallery -->

</div>
<!-- /.wrapper -->

<!-- FOOTER -->
<?php
include 'meine_arbeiten_footer.php';

