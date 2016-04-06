<?php include 'ueber_mich_header.php'; ?>
<!-- /.header -->
<?php $projects = new Projects(); ?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- .page-header -->
    <header class="page-header container text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>— Meine kunst —</h1>
        </div>
    </header>
    <!-- /.page-header -->

    <!-- CONTAINER -->
    <article class="container m-center">
        <div class="col-sm-12 text-justify">
            In meiner kreativen Glaswerkstatt in Denklingen entwerfe 
            ich einzigartige Unikate mit eigener Persönlichkeit. 
            Mein besonderes Interesse gilt hier der Wiederaufbereitung und 
            Umformung von bereits Vorhandenem, sowie der Einzigartigkeit und 
            Bearbeitung von Glas. Aus diesem filigranen Material forme und 
            erarbeite ich eine ganze Bandbreite an verschiedenen Objekten. 
            Von klassischen oder modernen Tiffany Objekten, 
            handgefertigten Glasschmuck oder Glasbildern bis zu Glaskreuzen und 
            Mobiles - dem künstlerischen Erschaffungsprozess sind hier keine 
            Grenzen gesetzt.<br>
    </article>
    <!-- /.header text -->

    <!-- SLIDER -->
     <article class="ribbon slider">
         <div class="container">
             <div class="col-xs-12 text-right">
                 <h4 class="text-muted">Impressionen</h4>
             </div>
         </div>
        <div class="carouwrap clearfix">
            <div class="magnific-wrap">
            <div class="caroufredsel_wrapper">
                
            <ul data-fx="directscroll">
                <?php 
                $the_projects_all = $projects->get_all_prj();
                while ($row = mysqli_fetch_array($the_projects_all)) { ?>
                    <li>
                        <img src="../images/<?php echo $row['image']; ?>" width="400" height="270" alt="">
                        <a href="../images/<?php echo $row['image']; ?>" class="magnific mask" title="<?php echo $row['project_name']; ?>">
                            <h6><?php echo $row['project_name']; ?> <small><?php echo $row['project_cat']; ?></small></h6>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            </div>
            </div>
            <div class="slidebar">
                <div class="container">
                    <a href="../meine_arbeiten/" class="block-link right">ARBEITEN</a>
                </div>
                <nav class="nav-pages"></nav>
            </div>
        </div>
    </article>
    <!-- /.container -->

    <!-- History -->
    <article class="history text-center">
        <h2>— MEIN LEBENSLAUF —</h2>
        <div class="hist-years">1965 - 2015</div>
        <div class="histline">
            <div class="histlinewrap">
                <ul>
                    <li>1965</li>
                    <li>1999</li>
                    <li>2000</li>
                    <li>2002</li>
                    <li>2006</li>
                    <li>2010</li>
                    <li>2012</li>
                    <li>2015</li>
                </ul>
            </div>
            <div class="separator"><ins></ins></div>
        </div>
        <div class="histcontent">
            <section class="container">
                <div class="col-sm-6 col-sm-offset-3">
                    <p>Ea nec enim accumsan, ut prima blandit mel, labores nonumes detraxit an sed. Omnis malis propriae an sed, eu mea erat utinam meliore, inciderint philosophia usu ne. Laudem labores eu sed, vix in omnis habemus omnesque.</p>
                </div>
            </section>
            <section class="container text-left">
                <div class="col-sm-4 col-sm-offset-2">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="col-sm-4">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </section>
            <section class="container text-left">
                <div class="col-sm-5 col-sm-offset-1">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="col-sm-5">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </section>
            <section class="container">
                <div class="col-sm-6 col-sm-offset-3">
                    <p>Ea nec enim accumsan, ut prima blandit mel, labores nonumes detraxit an sed. Omnis malis propriae an sed, eu mea erat utinam meliore, inciderint philosophia usu ne. Laudem labores eu sed, vix in omnis habemus omnesque.</p>
                </div>
            </section>
            <section class="container text-left">
                <div class="col-sm-4 col-sm-offset-2">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="col-sm-4">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </section>
            <section class="container text-left">
                <div class="col-sm-5 col-sm-offset-1">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="col-sm-5">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </section>
            <section class="container text-left">
                <div class="col-sm-4 col-sm-offset-2">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="col-sm-4">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </section>
            <section class="container text-left">
                <div class="col-sm-5 col-sm-offset-1">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="col-sm-5">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </section>
        </div>
    </article>
    <!-- /.history -->
</div>
<!-- /.wrapper -->

<!-- FOOTER -->
<?php include 'ueber_mich_footer.php';
