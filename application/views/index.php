<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>GilangCI/assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>GilangCI/assets/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>GilangCI/assets/css/mycss.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    <!-- navbar-top -->
      <nav>
        <div class="nav-wrapper container">
          <a href="#!" class="brand-logo">Logo</a>
          <!-- trigger mobile button -->
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <!-- main menu-->
          <ul class="right hide-on-med-and-down">
            <!-- Modal Trigger for sign in-->
            <li><a class="modal-trigger" href="#modal1">Sign In</a></li>
            <li><a class="modal-trigger" href="#modal2">Register</a></li>
            <li><a class="waves-effect waves-light btn" href="company.html">Company</a></li>
          </ul>
          <!-- mobile menu -->
          <ul class="side-nav" id="mobile-demo">
            <!-- Modal Trigger for sign in-->
            <li><a class="modal-trigger" href="#modal1">Sign In</a></li>
            <li><a class="modal-trigger" href="#modal2">Register</a></li>
            <li><a class="waves-effect waves-light btn">Company</a></li>
          </ul>
        </div>
      </nav>
      <!-- end of navbar top -->

      <!-- modal for sign in user -->
       <!-- Modal Structure -->
       <div id="modal1" class="modal">
         <div class="modal-content">
           <h4>Sign In</h4>
           <div class="divider"></div>
           <div class="section"></div>
           <!-- form -->
           <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <input id="text" type="text" class="validate">
                  <label for="email">Username</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
            </form>
          </div>
          <!-- end of form -->
         </div>
         <div class="modal-footer">
           <a href="#!" class="modal-action waves-effect waves-green btn">Login</a>
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
         </div>
       </div>

      <!-- modal for register user -->
      <div id="modal2" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Register</h4>
          <div class="divider"></div>
          <div class="section"></div>
          <!-- form -->
          <div class="row">
           <form action"<?php echo base_url() ?> GilangCI/index.php/Home/registerInsert" method="post" class="col s12">
             <div class="row">
               <div class="input-field col s12">
                 <input id="text" type="text" class="validate" name="">
                 <label for="nama">Nama</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="text" type="email" class="validate" name="">
                 <label for="email">Email</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="text" type="text" class="validate" name="">
                 <label for="tlp">No Telepon</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="text" type="url" class="validate" name="">
                 <label for="url">Website</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="text" type="text" class="validate" name="">
                 <label for="alamat">Alamat</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="text" type="text" class="validate" name="">
                 <label for="portofolio">Portofolio</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <textarea id="textarea1" class="materialize-textarea" name=""></textarea>
                 <label for="about">About</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="text" type="text" class="validate" name="">
                 <label for="username">Username</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="password" type="text" class="validate" name="">
                 <label for="password">Password</label>
               </div>
             </div>
           <!-- end of form -->
         </div>
         <!-- end of form -->
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action waves-effect waves-green btn">Register</a>
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
        </form>
      </div>


    <!-- banner -->
      <div class="carousel carousel-slider center" data-indicators="true">
        <div class="carousel-item valign-wrapper red white-text row" href="#one!">
          <div class="valign center-block col s12 m6 l4 #f48fb1 pink lighten-3">
              <h4>Sponsor Online Untuk EO</h4>
              <p>Buruan Daftar</p>
              <a class="waves-effect waves-light btn yellow black-text modal-trigger" href="#modal2">Daftar Gratis</a>
              <a class="waves-effect waves-light btn green" href="maincontent.html">Cari Sponsor</a>
              <div class="section"></div>
          </div>
        </div>
      </div>
  <!-- end of banner -->


  <!-- promotion -->
  <div class="container section pad">
    <div class="row">

          <div class="col s12 l4 center boxv">
            <!-- Promo Content 1 goes here -->
            <h4>Identitas Profesional</h4>
            <img src="<?php echo base_url()?>GilangCI/assets/img/pencarikerja.jpg"  />
            <br />
            <caption>
              <p class="presisi">
                Buat identitas event organizer anda secara online
                dan pastikan Anda selalu mendapatkan
                sponsor yang sesuai.
              </p>
            </caption>
          </div>
          <div class="col s12 l4 center boxv">
            <!-- Promo Content 2 goes here -->
            <h4>Profil Anda</h4>
            <img src="<?php echo base_url()?>GilangCI/assets/img/pencarikerja.jpg" />
            <br />
            <caption>
              <p class="presisi">
                Masuk ke halaman pribadi Anda dan lihat
                sponsor yang sesuai dengan Anda.
              </p>
            </caption>
          </div>
          <div class="col s12 l4 center boxv">
            <!-- Promo Content 3 goes here -->
            <h4>Iklan Sponsor Lengkap</h4>
            <img src="<?php echo base_url()?>GilangCI/assets/img/pencarikerja.jpg" />
            <br />
            <caption>
              <p class="presisi">
                Dapatkan sponsor dengan dana yang sesuai
                dan informasi sponsor.
              </p>
            </caption>
          </div>

      </div>
  </div>
  <!--end of promotion -->



<!-- footer -->
<footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>



      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>GilangCI/assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>GilangCI/assets/js/myjs.js"></script>
      <script type="text/javascript">
      $(function(){
        $(".button-collapse").sideNav();
      });
      </script>
    </body>
  </html>
