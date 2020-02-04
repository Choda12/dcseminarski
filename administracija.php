<?php
include 'init.php';
$poruka = '';
if(isset($_GET['poruka'])){
  $poruka = $_GET['poruka'];
}

$film = new FilmClass();
$sort = 'asc';

$filmovi = $film->vratiFilmoveSortirane($konekcija,$sort);

$lik = new LikoviClass();

$likovi = $lik->vratiSve($konekcija);

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
    <?php include 'header.php'; ?>

    <section id="intro">
      <div class="intro-content">
        <h2>Dobrodosli na sajt DC-a</h2>
        <h3>Ovde mozete pronaci filmove i likove</h3>
      </div>
    </section>

    <section id="content">
      <div class="container">
          <div id="poruka">
          <?php
            echo '<h2><strong>' .$poruka . '</strong></h2>';
          ?>
          </div>

          <h2>Unos lika za film</h2>

          <label for="film">Film</label>
          <select class=" form-inline" id="izabraniFilm">
              <?php
              foreach($filmovi as $film){
                  ?>
                  <option value="<?= $film->getFilmID() ?>"><?= $film->getNazivFilma() ?></option>
                  <?php
              }

              ?>
          </select>
          <label for="nazivLika">Naziv lika</label>
          <input type="text" id="nazivLika" required />
          <label for="nazivGlumca">Naziv glumca</label>
          <input type="text" id="nazivGlumca" required />
          <label for="ocena">Ocena</label>
          <select class=" form-inline" id="ocena">
              <?php
              for ($x = 1; $x <= 10; $x++) {
                  ?>
                    <option value="<?= $x ?>"><?= $x ?></option>
                  <?php
              }
              ?>
          </select>
        <div id="greske"></div>
          <button type="button" onclick="unesi()" class="btn btn-primary btn-large" >Unesi lika za film</button>

      </div>
    </section>

  <section id="content">
      <div class="container">

          <h2>Prikaz svih likova</h2>

          <table id="tabela" class="table table-hover">
              <thead>
              <tr>
                  <th>Film</th>
                  <th>Naziv lika</th>
                  <th>Glumac</th>
                  <th>Ocena</th>
                  <th>Obrisi</th>
              </tr>
              </thead>
              <tbody>

              <?php
                foreach ($likovi as $lik){
                    ?>
                    <tr>
                        <td><?= $lik->getFilm()->getNazivFilma(); ?></td>
                        <td><?= $lik->getNazivLika(); ?></td>
                        <td><?= $lik->getNazivGlumca(); ?></td>
                        <td><?= $lik->getOcena(); ?></td>
                        <td><a href="obrisi.php?id=<?= $lik->getLikID(); ?>"><i class="ico icon-trash icon-2x"></i></a></td>
                    </tr>
              <?php
                }
              ?>

              </tbody>
          </table>

      </div>
  </section>

  <section id="content">
      <div class="container">
          <h2>Izmena ocene</h2>
    <form method="POST" action="izmenaOcene.php">
          <label for="lik">Lik iz filma</label>
          <select class=" form-inline" id="lik" name="lik">
              <?php
              foreach($likovi as $lik){
                  ?>
                  <option value="<?= $lik->getLikID() ?>"><?= $lik->getNazivLika() . ' - ' . $lik->getOcena() ?></option>
                  <?php
              }

              ?>
          </select>
          <label for="ocena">Nova ocena</label>
          <select class=" form-inline" name="ocenaIzmena" id="ocenaIzmena">
              <?php
              for ($x = 1; $x <= 10; $x++) {
                  ?>
                  <option value="<?= $x ?>"><?= $x ?></option>
                  <?php
              }
              ?>
          </select>

        <br>
        <input type="submit" value="Izmeni" class="btn btn-primary btn-large" />
    </form>

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
      function unesi() {
          let film = $('#izabraniFilm').val();
          let nazivLika = $('#nazivLika').val();
          let nazivGlumca = $('#nazivGlumca').val();
          let ocena = $('#ocena').val();

          let greske = [];

          if(nazivGlumca === ''){
              greske.push('Naziv glumca mora biti popunjen')
          }

          if(nazivLika === ''){
              greske.push('Naziv lika mora biti popunjen')
          }

          if(greske.length === 0){
                $.ajax({
                    url: 'unosLika.php',
                    type: 'POST',
                    data: {
                        film : film,
                        nazivLika : nazivLika,
                        nazivGlumca : nazivGlumca,
                        ocena : ocena
                    },
                    success: function (data) {
                        $('#poruka').html(data);
                    }
                })
          }else{
              $('#greske').html(greske.join(','));
          }
      }
  </script>

</body>

</html>
