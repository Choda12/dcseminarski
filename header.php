<header>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="span12">

              <ul class="social-network">
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-circled icon-bglight icon-facebook"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-circled icon-bglight icon-twitter"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-circled icon-linkedin icon-bglight"></i></a></li>
                <li><a href="#" data-placement="bottom" title="You tube"><i class="icon-circled icon-youtube  icon-bglight"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google +"><i class="icon-circled icon-google-plus icon-bglight"></i></a></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
      <div class="container">


        <div class="row nomargin">
          <div class="span4">
            <div class="logo">
              <h1><a href="index.php"><i class="icon-tint"></i> DC Filmovi</a></h1>
            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li>
                      <a href="index.php">Pocetna</a>
                    </li>
                      <li>
                          <a href="about.php">O DC-u</a>
                      </li>
                      <?php if($_SESSION['korisnik'] != null){ ?>
                    <li>
                      <a href="filmovi.php">Filmovi</a>
                    </li>
                    <li>
                      <a href="pretragalikova.php">Pretraga likova</a>
                    </li>
                          <?php if($_SESSION['admin'] == true){ ?>
                    <li>
                      <a href="administracija.php">Administracija</a>
                    </li>
                              <?php } ?>
                          <li>
                              <a href="odjaviSe.php">Odjavi se</a>
                          </li>
                      <?php }else{
                          ?>
                          <li>
                              <a href="ulogujSe.php">Uloguj se</a>
                          </li>
                          <li>
                              <a href="registrujSe.php">Registruj se</a>
                          </li>
                      <?php
                      } ?>
                  </ul>
                </nav>
              </div>
              <!-- end navigation -->
            </div>
          </div>
        </div>
      </div>
    </header>