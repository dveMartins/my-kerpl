<?php include 'admin_header.php'; ?>

<?php
$projects = new Projects();

if (!isset($_GET['kategorie'])) {
    $projects->redirect("index.php");
}

if (isset($_GET['kategorie'])) {

    $cat = $_GET['kategorie'];
}




$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

$items_per_page = 4;

$items_total_count = $projects->count_all_cat($cat);

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM projects WHERE project_cat = '$cat' ORDER BY id DESC "
        . "LIMIT {$items_per_page} "
        . "OFFSET {$paginate->offset()}";

$project = $database->query($sql);

//$the_projects = $projects->get_all_prj();

$success_del = $error_del = "";

if (isset($_SESSION['success_msg'])) {
    $success_del = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}
if (isset($_SESSION['error_msg'])) {
    $error_del = $_SESSION['error_msg'];
    unset($_SESSION['error_msg']);
}
?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- .page-header -->
    <header class="page-header container text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>— Admin —</h1>
            <h5>conny kerpl</h5>
        </div>
    </header>
    <br>
    <br>
    <!-- /.page-header -->

    <!-- CONTAINER -->
    <article class="container products">
        <div class="col-sm-3 col-xs-4 catalog-bar">
            <div class="widget">
                <h6>Kategorien</h6>
                <nav>
                    <ul class="category-list">
                        <li><a href="kategorie.php?kategorie=glasobjekten">Glasobjekten <span class="pull-right">
                                    <?php
                                    $glasobjekten = $projects->category_row("glasobjekten");
                                    echo $glasobjekten;
                                    ?>
                                </span></a></li>
                        <li><a href="kategorie.php?kategorie=flaschenuhren">Flaschenuhren <span class="pull-right">
                                    <?php
                                    $flaschenuhren = $projects->category_row("flaschenuhren");
                                    echo $flaschenuhren;
                                    ?>            
                                </span></a></li>
                        <li><a href="kategorie.php?kategorie=schmuck">Schmuck <span class="pull-right">
                                    <?php
                                    $schmuck = $projects->category_row("schmuck");
                                    echo $schmuck;
                                    ?>
                                </span></a></li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-12 grid-nav">
                    <a href="neues_projekt.php" class="btn btn-default btn-sm">Arbeit hochladen</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-8 product-list m-center">
            <p class="alert-success text-center"> <?php
                if ($success_del) {
                    echo $success_del;
                }
                ?> </p>

            <p class="alert-danger text-center"> <?php
                if ($error_del) {
                    echo $error_del;
                }
                ?> </p>

            <!-- .product -->
<?php while ($row = mysqli_fetch_array($project)) { ?>

                <hr/>

                <div class="product clearfix">
                    <div class="col-md-4">
                        <a href="../einzelarbeit?p_id=<?php echo $row['id']; ?>">
                            <img src="../images/<?php echo $row['image']; ?>" width="260" height="250" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 cdescription">
                        <div class="row">
                            <div class="col-md-8">
                                <h4><a href="../einzelarbeit?p_id=<?php echo $row['id']; ?>"><?php echo $row['project_name']; ?> </a></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="rating-wrap">
                                <a href="" class="add-review black"><?php echo $row['project_cat']; ?></a>
                            </div>
                        </div>
                        <p><?php echo $row['project_desc']; ?></p>

                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">löschen</a>
                        <a href="../einzelarbeit?p_id=<?php echo $row['id']; ?>" class="btn btn-default btn-sm">anschauen</a>
                    </div>
                </div>
                <br/>
<?php } ?>

            <hr/>

            <div class="row pagination-bar m-center">
                <div class="col-md-7 col-sm-8 col-md-offset-5">
                    <ul class="pagination">
                        <?php
                        if ($paginate->page_total() > 1) {
                            if ($paginate->has_prev()) {
                                echo "<li><a href='kategorie.php?kategorie={$cat}&page={$paginate->previous()}' class='prev'></a></li>";
                            }

                            for ($i = 1; $i <= $paginate->page_total(); $i++) {

                                if ($i == $paginate->current_page) {

                                    echo "<li class='active'><a href='kategorie.php?kategorie={$cat}&page={$i}'>{$i}</a></li>";
                                } else {

                                    echo "<li><a href='kategorie.php?kategorie={$cat}&page={$i}'>{$i}</a></li>";
                                }
                            }

                            if ($paginate->has_next()) {
                                echo "<li><a href='kategorie.php?kategorie={$cat}&page={$paginate->next()}' class='next'></a></li>";
                            }
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </article>
</div>
<!-- /.wrapper -->
<?php
include 'admin_footer.php';

