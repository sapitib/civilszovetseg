<?php
    // Alkalmazás logika:
    include('config.inc.php');

    // adatok összegyűjtése:
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);

    // Megjelenítés logika:
?><!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <style type="text/css">
      div#galeria {margin: 0 auto; width: 620px;}
      div.kep { display: inline-block; }
      div.kep img { width: 200px; }
  </style>
   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Archívum</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/media-queries.css">

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.png" >

</head>

<body class="page">

   <!-- Header
   ================================================== -->
   <header id="top">

     <div class="row">

       <div class="header-content twelve columns">

         <h1 id="logo-text"><a href="index.html" title="">Archívum</a></h1>
       <p id="intro"></p>

     </div>

    </div>

    <nav id="nav-wrap">

     <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>

     <div class="row">

         <ul id="nav" class="nav">
             <li><a href="index.html">Kezdőlap</a></li>
             <li><a href="bemutat.html">Bemutatkozás</a></li>
                <li class="current"><a href="archives.php">Archívum</a></li>
                 <li><a href="feltolt.php">Képek feltöltése</a></li>
             <li class="has-children"><a href="hirek.html">Hírek</a></li>
             <li><a href="elerhetoseg.html">Elérhetőség</a></li>
         </ul> <!-- end #nav -->

     </div>

    </nav> <!-- end #nav-wrap -->

   </header> <!-- Header End -->

   <!-- Content
   ================================================== -->
   <div id="content-wrap">

   	<div class="row">

   		<div id="main" class="eight columns">

   			<section class="page">

          <div id="galeria">
          <h1>Galéria</h1>
          <?php
          arsort($kepek);
          foreach($kepek as $fajl => $datum)
          {
          ?>
              <div class="kep">
                  <a href="<?php echo $MAPPA.$fajl ?>">
                      <img src="<?php echo $MAPPA.$fajl ?>">
                  </a>
                  <p>Név:  <?php echo $fajl; ?></p>
                  <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
              </div>
          <?php
          }
          ?>
          </div>

				</section> <!-- End page -->

   		</div> <!-- End main -->


      <div id="sidebar" class="four columns">

   			<div class="widget widget_search">
                  <form role="search" method="get" id="searchform" class="searchform" action="http://www.google.co.uk/search?hl=en-GB&source=hp&q=">
                    <div id="gform">
                      <input type="text" name="q" id="s" value="Google keresés..." onblur="if(this.value == '') { this.value = 'Google keresés...'; }" onfocus="if (this.value == 'Google keresés...') { this.value = ''; }" class="text-search">
                      <input type="submit" value="&#xf002;" class="submit-search">
                    </div>
                  </form>
               </div>

   		</div> <!-- end sidebar -->

   	</div> <!-- end row -->

   </div> <!-- end content-wrap -->


   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">




         <div class="two columns">
            <h3 class="social">Navigálás</h3>

            <ul class="navigate group">
               <li><a href="index.html">Kezdőlap</a></li>
               <li><a href="bemutat.html">Bemutatkozás</a></li>
               <li><a href="archives.php">Archívum</a></li>
               <li><a href="feltolt.php">Képek feltöltése</a></li>
               <li><a href="hirek.html">Hírek</a></li>
               <li><a href="elerhetoseg.html">Elérhetőség</a></li>
            </ul>
         </div>

         <p class="copyright">&copy; Copyright 2014 Keep It Simple. &nbsp; Design by <a title="Styleshout" href="http://www.styleshout.com/">Styleshout</a>.</p>

      </div> <!-- End row -->

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-chevron-up"></i></a></div>

   </footer>


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
