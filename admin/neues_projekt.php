<?php include 'admin_header.php'; ?>

<?php
$err_msg = $success_msg = "";

$projects = new Projects();

if (isset($_POST['upload'])) {

    $projects->project_name = $database->escape_string($_POST['project_name']);
    $projects->project_cat = strtolower($database->escape_string($_POST['project_cat']));
    $projects->project_desc = $database->escape_string($_POST['project_desc']);
    $projects->project_image_name = $_FILES['image']['name'];
    $projects->project_img_tmp_name = $_FILES['image']['tmp_name'];

    $projects->image = $projects->set_project_img();

    if (!empty($projects->project_name) && !empty($projects->image)) {
        $projects->create_new_project();
        $success_msg = "Ihre Arbeit wurde erstellt!";
    } else {
        $err_msg = "Fehler! Ihre Arbeit wurde nicht erstellt.";
    }
}
?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- .page-header -->
    <header class="page-header container text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>— Admin —</h1>
            <h5>Neues Projekt</h5>
        </div>
    </header>

    <!-- /.page-header -->

    <!-- CONTAINER -->
    <article class="container">
        <div class="col-md-6 col-md-offset-3">
            <p class="alert-success text-center"> <?php if ($success_msg) { echo $success_msg . "<br> <a href='index.php'>Arbeit anschauen</a>"; } ?></p>
    
            <p class="alert-danger text-center"> <?php if ($err_msg) { echo $err_msg; } ?> </p>
        </div>
        <div class="col-md-6 col-md-offset-2 no-padding col-xs-6 col-xs-offset-3">
            <form action="neues_projekt.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="project_name">Arbeit Titel:</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="project_name" id="project_name" type="text">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="image">Arbeit Kategorie:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="project_cat">
                            <option>Glasobjekten</option>
                            <option>Schmuck</option>
                            <option>Flaschenuhren</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="image">Arbeit Bild:</label>
                    <div class="col-sm-8">
                        <input type="file" id="image" name="image"/>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="project_name">Arbeit Beschreibung:</label>
                    <div class="col-sm-8">
                        <textarea id="project_desc" name="project_desc"></textarea>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <input class="btn btn-primary" name="upload" type="submit" value="Hochladen">
                </div>
            </form>
        </div>
    </article>
    <!-- /.container -->
</div>

<!-- FOOTER -->
<?php
include 'admin_footer.php';

