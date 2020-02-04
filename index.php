<?php
include "init.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>DC Filmovi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Dc filmovi" />
  <meta name="author" content="" />

  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="css/prettyPhoto.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <link id="t-colors" href="color/default.css" rel="stylesheet" />

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="ico/favicon.png" />

</head>

<body>
  <div id="wrapper">
    <!-- start header -->
    <?php include 'header.php'; ?>
    <!-- end header -->

    <!-- section intro -->
    <section id="intro">
      <div class="intro-content">
        <h2>Dobrodosli na sajt DC-a</h2>
        <h3>Ovde mozete pronaci filmove i likove</h3>
      </div>
    </section>
    <!-- /section intro -->

    <section id="content">
      <div class="container">


        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span3">
                <div class="box aligncenter">
                  <div class="icon">
                    <span class="badge badge-info badge-circled">1</span>
                    <i class="ico icon-pencil icon-5x"></i>
                  </div>
                  <div class="text">
                    <h4><strong>Likovi</strong></h4>
                    <p>
                      U nasim stripovima postoji preko 10000 likova
                    </p>
                  </div>
                </div>
              </div>

              <div class="span3">
                <div class="box aligncenter">
                  <div class="icon">
                    <span class="badge badge-success badge-circled">2</span>
                    <i class="ico icon-stethoscope icon-5x"></i>
                  </div>
                  <div class="text">
                    <h4><strong>Mi smo tu za vas</strong></h4>
                    <p>
                      Uvek vam mozemo pomoci
                    </p>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="box aligncenter">
                  <div class="icon">
                    <span class="badge badge-warning badge-circled">3</span>
                    <i class="ico icon-list icon-5x"></i>
                  </div>
                  <div class="text">
                    <h4><strong>Lista nasih likova</strong></h4>
                    <p>
                      Na sajtu mozete pronaci listu nasih likova
                    </p>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="box aligncenter">
                  <div class="icon">
                    <span class="badge badge-important badge-circled">4</span>
                    <i class="ico icon-cut icon-5x"></i>
                  </div>
                  <div class="text">
                    <h4><strong>Skratite vreme pregleda</strong></h4>
                    <p>
                      Postoji pretraga koja ce vam pomoci da brze pronadjete sve sto vam treba
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="span12">
            <div class="cta-box">
              <div class="row">
                <div class="span8">
                  <div class="cta-text">
                    <h2>Mozete pogledati nase <span>DC</span> filmove</h2>
                  </div>
                </div>
                <div class="span4">
                  <div class="cta-btn">
                    <a href="filmovi.php" class="btn btn-color">Pregledaj <i class="icon-caret-right"></i></a>
                  </div>
                </div>

              </div>


            </div>
          </div>
        </div>
          <div class="row">
              <h3>Zanrovi</h3>
              <ul id="zanrovi">

              </ul>
          </div>

      </div>
    </section>


   <?php include 'footer.php'; ?>

  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/toucheffects.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>
  <script src="js/animate.js"></script>

  <script src="js/custom.js"></script>
      <script>
          $.ajax({
              url: 'podaciApisaGithaba.php',
              success: function (podaci) {
                  $.each(JSON.parse(podaci),function (i,podatak) {
                      $("#zanrovi").append('<li>'+podatak+'</li>');
                  })
              }
          })
          </script>

</body>

</html>
