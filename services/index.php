<?php include 'services_header.php'; ?>
<!-- /.header -->
<?php 
$projects = new Projects();
$the_projects = $projects->get_all_prj();
?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- .page-header -->
    <header class="page-header container text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>— kurse & mehr —</h1>
        </div>
    </header>
    <!-- /.page-header -->


    <!-- CONTAINER -->
    <article class="container text-center">
        <div class="col-sm-4">
            <div class="block bg-info">
                <h4>kurse</h4>
                <p>
                <br>
                Der Spaß und die Freude am kreativen Erschaffungsprozess sind 
                für mich als Künstlerin ausschlaggebend für meine „Arbeiten". 
                Deshalb möchte ich mein Wissen und meine Fertigkeiten im Umgang 
                mit verschiedenen Materialien gerne an Sie weitergeben. 
                Ich biete in meiner kreativen Glaswerkstatt Kurse für folgenden 
                Bereichen an:
                <br>
                </p>
                <ul>
                    <li>-Tiffanytechnik</li>
                    <li>
                        -Schmuckherstellung
                        <br>
                        (u.a Perlenwickeln)
                    </li>
                    <li>
                        -Arbeiten mit Tonobjekten
                        <br>
                        (u.a. Grabvasen, Tonschalen)
                    </li>
                </ul>
                <br>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block bg-info">
                <h4>individuelle einzelstücke </h4>
                
                <p>
                    Angesichts der vielen Materialen und Möglichkeiten in meiner
                    Werkstatt entwerfe ich neben meiner eigenen Kunst auch gerne
                    individuelle Einzelstücke nach Maß. Haben Sie z.B. ein 
                    persönliches Schmuckstück, welches umgestaltet werden soll, 
                    nehme ich mich sehr gerne und mit viel Liebe dieser Sache an,
                    um für Sie eine neue Kreation nach Ihren Wünschen zu 
                    erschaffen. Aufgrund meiner umfassenden Arbeit mit Glas 
                    entwerfe ich für Sie gerne Lampenunikate im 
                    Tiffanystil - passend zu Ihrer Einrichtung in Form, 
                    Farbe und Größe. Wünschen Sie sich den passenden 
                    Trachtenschmuck für Ihr Dirndl nach Ihren Vorstellungen und 
                    Ideen? Kontaktieren Sie mich, ich freue mich über Ihre 
                    Nachricht.
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block bg-info">
                <h4>materialverkauf</h4>
                <p>
                    <br>
                    Sie sind selbst kreativ und auf der Suche nach den passenden
                    Materialien und Zubehör für Ihre Arbeiten? 
                    Mein Materialverkauf umfasst u.a. folgende Produkte:
                    <br>
                </p>
                <ul>
                    <li>–Glasscheiben für Kunstverglasung bunt, klar, opak</li>
                    <li>–Zubehör für Tiffanytechnik</li>
                    <li>
                        –Material für Kettenherstellung
                        <br>
                        (Perlen, Verschlüsse etc.)
                    </li>
                    <li>
                        –Schmucksteine
                        <br>
                        (u.a. Unikate über 50 Jahre alt)
                    </li>
                    <li>–Glasstäbe zum Perlenwickeln
                        <br>
                        klar, opak
                    </li>
                    <li>–hochwertige Leinwände</li>
                </ul>
                <br>
                <br>
            </div>
        </div>
    </article>
    <!-- /.container -->

    <!-- SLIDER -->
    <article class="ribbon slider">
        <div class="carouwrap clearfix">
            <ul data-fx="directscroll">
                <?php while ($row = mysqli_fetch_array($the_projects)) { ?>
                    <li>
                        <img src="../images/<?php echo $row['image']; ?>" width="400" height="270" alt="">
                        <a href="../einzelarbeit?p_id=<?php echo $row['id']; ?>" class="mask">
                            <h6><?php echo $row['project_name']; ?> <small><?php echo $row['project_cat']; ?></small></h6>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="slidebar">
                <div class="container">
                    <a href="../meine_arbeiten/" class="block-link right">meine <br/> arbeiten</a>
                </div>
                <nav class="nav-pages"></nav>
            </div>
        </div>
    </article>
    <!-- /.slider -->

    <!-- CONTAINER -->
    <div class="bg-info">
        <div class="container text-center purchase">
            <div class="col-md-5 col-sm-9 col-md-offset-2">
                <h4>conny kerpl —</h4>
            </div>
            <div class="col-md-2 col-sm-3 text-left">
                <a class="btn btn-default" href="../kontakt/">KONTAKT</a>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.wrapper -->

<!-- FOOTER -->
<?php include 'services_footer.php';