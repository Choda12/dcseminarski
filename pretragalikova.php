<?php

include 'init.php';

$film = new FilmClass();
$sort = 'asc';

$filmovi = $film->vratiFilmoveSortirane($konekcija,$sort);

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
              <h4><strong>Pretrazi likove po filmu</strong></h4>
              <select class="form-inline" id="izabraniFilm" onchange="pretrazi()">
                  <?php
                  foreach($filmovi as $film){
                      ?>
                        <option value="<?= $film->getFilmID() ?>"><?= $film->getNazivFilma() ?></option>
                      <?php
                  }

                  ?>
              </select>
          </div>

        <h1>Lista likova</h1>
          <hr/>
          <table id="tabela" class="table table-hover">
              <thead>
              <tr>
                  <th>Film</th>
                  <th>Naziv lika</th>
                  <th>Glumac</th>
                  <th>Ocena</th>
              </tr>
              </thead>
              <tbody id="podaci">

              </tbody>
          </table>
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
      function pretrazi() {
          let filmID = $('select#izabraniFilm').val();

          $.ajax({
              url : 'pretragaLikovaServer.php?id='+filmID,
              success : function (data) {
                        let output = '';

                        $.each(JSON.parse(data),function (i,red) {
                            output += '<tr>';
                            output+= '<td>' + red.film.nazivFilma+'</td>';
                            output+= '<td>' + red.nazivLika+'</td>';
                            output+= '<td>' + red.nazivGlumca+'</td>';
                            output+= '<td>' + red.ocena+'</td>';
                            output += '</tr>';
                        });
                        $('#podaci').html(output);

                }
              }
          )
      }
      pretrazi();
  </script>

</body>

</html>
