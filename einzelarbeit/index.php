<?php include 'einzelarbeit_header.php'; ?>
<!-- /.header -->
<?php

$projects = new Projects();

if(!isset($_GET['p_id'])) {
    $projects->redirect("../404.php");
}

if(isset($_GET['p_id'])) {
    
$single_project_id = $_GET['p_id'];

$query = "SELECT * FROM projects WHERE id = $single_project_id";
$the_project = $database->query($query);
while ($row = mysqli_fetch_array($the_project)) {
    $projects->project_name = $row['project_name'];
    $projects->image = $row['image'];
    $projects->project_desc = $row['project_desc'];
    $projects->project_cat = $row['project_cat'];
    
}
?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- .page-header -->
    <header class="page-header container text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>-<?php echo $projects->project_cat; ?>-</h1>
        </div>
    </header>
    <!-- /.page-header -->

    <!-- SLIDER -->
    <article class="oneslider slider magnific-wrap">
        <div class="carouwrap clearfix">
            <ul>
                <li>
                    <a href="../images/<?php echo $projects->image; ?>" class="magnific" title="<?php echo $projects->project_name; ?>"><img src="../images/<?php echo $projects->image; ?>" alt="" width="1600" height="567"></a>
                </li>
            </ul>
        </div>
    </article>
    <!-- /.slider -->
    
    <!-- CONTAINER -->
    <article class="container m-center">
        <div class="col-sm-5 text-right">
            <h3 class="color"><?php echo $projects->project_name; ?></h3>
        </div>
        <div class="col-sm-6">
            <p><?php echo $projects->project_desc; ?></p>
        </div>
    </article>
    <!-- /.container -->

        <article class="ribbon slider">
        <div class="carouwrap clearfix">
            <ul data-fx="directscroll">
                <?php 
                $the_projects_all = $projects->get_all_prj();
                while ($row = mysqli_fetch_array($the_projects_all)) { ?>
                    <li>
                        <img src="../images/<?php echo $row['image']; ?>" width="400" height="270" alt="">
                        <a href="?p_id=<?php echo $row['id']; ?>" class="mask">
                            <h6><?php echo $row['project_name']; ?> <small><?php echo $row['project_cat']; ?></small></h6>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="slidebar">
                <div class="container">
                    <a href="../meine_arbeiten/" class="block-link right">MEINE <br/> ARBEITEN</a>
                </div>
                <nav class="nav-pages"></nav>
            </div>
        </div>
    </article>
    
</div>
<?php } ?>
<!-- /.wrapper -->

<!-- FOOTER -->
<?php include 'einzelarbeit_footer.php'; 