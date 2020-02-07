<header>
      <div class="top">
        <div class="container">
          <div class="row">
        
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