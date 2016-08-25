<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/mycss.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="#e0e0e0 grey lighten-2">

    <!-- navbar-top -->
      <nav>
        <div class="nav-wrapper container">
          <a href="index.html" class="brand-logo">Logo</a>
          <ul class="right hide-on-med-and-down">
            <!-- Modal Trigger for sign in-
            <li><a class="modal-trigger" href="#modal1">Sign In</a></li>
            <li><a class="modal-trigger" href="#modal2">Register</a></li>
            <li><a class="waves-effect waves-light btn">Company</a></li>-->
          </ul>
        </div>
      </nav>
      <!-- end of navbar top -->
      <!-- content company -->
      <div class="container bor #fafafa grey lighten-5">
      <div class="notif">
      <?php if($this->session->flashdata('error')){ ?>
          <span style="color:red;"><?php echo $this->session->flashdata('error') ?></span>
        <?php } ?>
      </div> 
      <div class="notif">
      <?php if($this->session->flashdata('sukses')){ ?>
          <span style="color:green;"><?php echo $this->session->flashdata('sukses') ?></span>
        <?php } ?>
      </div>
        <!-- this for login company -->
        <div class="row section valign-wrapper">
          <div class="col s12 l6">
            <div class="log-wrapper">
            <form action="<?php echo base_url() ?>sponsor/sponsorLogin" method="post">
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <span class="card-title">Company Login Here</span>

                  <div class="divider"></div>
                  <div class="section">
                  <!-- form login here -->
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input id="" type="text" class="validate" name="username">
                      <label for="username">Username</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input id="password" type="password" class="validate" name="password">
                      <label for="password">Password</label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="card-action">
                <button class="waves-effect waves-light btn">Login</button>
               
                </div>
              </div>
              </form>
            </div>
          </div>
          <div class="col s12 l6 center">
            <div class="log-wrapper valign center-block">
              <h4>Login here if you have ID</h4>
              <p>
                Atau mendaftar di bawah sebagai sponsor
              </p>
            </div>
          </div>
        </div>
        <!-- end of row login company -->

        <div class="divider"></div>

        <div class="row section" style="margin-top:30px;">
          <div class="col s12 l6">
            <div class="log-wrapper">
            <form action="<?php echo base_url() ?>sponsor/sponsorRegister" method="post">
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <span class="card-title">Company register Here</span>
                  <div class="divider"></div>
                  <div class="section">
                  <!-- form login here -->
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input type="text" class="validate" name="nama_sponsor">
                      <label for="name">Sponsor Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input id="text" type="email" name="email" class="validate">
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input id="text" type="url" class="validate" name="website">
                      <label for="website">Website</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <select name="industri_sponsor">
                        <option value="" disabled selected>Choose your option</option>
                        <?php foreach ($Industri->result_array() as $row) { ?>
                         <option value="<?php echo $row['id_si'] ?>"><?php echo $row['nama_si'] ?></option>
                        <?php } ?>
                      </select>
                      <label>Sponsor Industri</label>
                    </div>
                  </div>

                 <div class="row">
                   <div class="input-field col s10 offset-s1">
                     <textarea id="textarea1" name="about_sponsor" class="materialize-textarea" ></textarea>
                     <label for="about">About</label>
                   </div>
                 </div>
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input id="text" type="text" class="validate" name="username">
                      <label for="username">Username</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10 offset-s1">
                      <input id="password" type="password" class="validate" name="password">
                      <label for="password">Password</label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="card-action">
                <button class="waves-effect waves-light btn">Register</button>
                </div>
              </div>
              </form>
            </div>
          </div>
          <div class="col s12 l6 center">
            <!--<div class="log-wrapper valign center-block">
              <h4>Login here if you have ID</h4>
              <p>
                Atau mendaftar di bawah sebagai sponsor
              </p>
            </div>-->
          </div>
        </div>

      </div><!-- end of content company -->




      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/myjs.js"></script>
    </body>
  </html>
