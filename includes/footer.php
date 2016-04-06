
<footer class="footer">
    <!-- CONTAINER -->
    <div class="container">
        <div class="col-sm-4">
            <h5><a href="about.html">NAVIGATION</a></h5>
            <ul>
                <li><a href="index.php">Startseite</a></li>
                <li><a href="ueber_mich">Über Mich</a></li>
                <li><a href="meine_arbeiten">Meine Arbeiten</a></li>
                <li><a href="services">Kurse & Mehr</a></li>
                <li><a href="neuigkeiten">Neuigkeiten</a></li>
                <li><a href="kontakt">Kontakt</a></li>
                <li><a href="impressum">Impressum</a></li>
                <?php if(!isset($_SESSION['user_id'])) { ?>
                <li class="link" data-toggle="modal" data-target="#myModal"><a href="#">Admin</a></li>
                <?php } else {  ?>
                <li><a href="admin">Admin</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-sm-5">
            <h5><a href="works.html">NEUE ARBEITEN</a></h5>
            <ul class="latest-list">
                <?php 
                $sql2 = "SELECT * FROM projects LIMIT 3";
                $_3 = $database->query($sql2);
                
                while ($row = mysqli_fetch_array($_3)) {
                ?>
                
                <li><a href="einzelarbeit?p_id=<?php  echo $row['id']; ?>"><img src="images/<?php echo $row['image']; ?>" height="75" width="110" alt=""></a></li>
                
                <?php } ?>
            </ul>
        </div>
        <div class="col-sm-3">
            <h5><a href="contact">KONTAKT</a></h5>
            <address>
                <p class="footers">08243/90122<br>
                <a href="mailto:cornelia.kerpl@web.de">cornelia.kerpl@web.de</a></p>
                <p class="footers">Postgasse 1 <br> 86920 Denklingen <br> Deutschland</p>
            </address>
        </div>
   
    </div>
    <!-- /.container -->

    <!-- CONTAINER -->
    <div class="container text-center">
        <a href="disclaimer">Haftungsausschluss</a>
        <p class="footers">Conny Kerpl - &copy; <?php echo date('Y'); ?> Alle Rechte vorbehalten</p>
        <a href="http://www.weprocom.de" target="_blank">created by Weprocom GmbH</a>
    </div>
    <!-- /.container -->
</footer>
<!-- /.footer -->

<!-- ScrollTop Button -->
<a href="#" class="scrolltop"><i></i></a>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.plugins.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
