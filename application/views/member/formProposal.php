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

    <body>


      <!-- navbar-top -->
        <?php $this->load->view('header') ?>
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
             <form class="col s12">
               <div class="row">
                 <div class="input-field col s12">
                   <input id="text" type="text" class="validate">
                   <label for="nama">Nama</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <input id="text" type="email" class="validate">
                   <label for="email">Email</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <input id="text" type="text" class="validate">
                   <label for="tlp">No Telepon</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <input id="text" type="url" class="validate">
                   <label for="url">Website</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <input id="text" type="text" class="validate">
                   <label for="alamat">Alamat</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <input id="text" type="text" class="validate">
                   <label for="portofolio">Portofolio</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <textarea id="textarea1" class="materialize-textarea"></textarea>
                   <label for="about">About</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <input id="text" type="text" class="validate">
                   <label for="username">Username</label>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <input id="password" type="text" class="validate">
                   <label for="password">Password</label>
                 </div>
               </div>
             </form>
           </div>
           <!-- end of form -->
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action waves-effect waves-green btn">Register</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>


<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// content ///////////////////////////////////////////////////////////////////////////-->

        <!-- content company -->
        <div class="container bor #fafafa grey lighten-5" style="border:0">

          <!--<h4>Proposal</h4>-->
          <div class="row section valign-wrapper">
            <div class="col s12 l8 pull-l2">
              <div class="log-wrapper">
          <form action="<?php echo base_url() ?>member/do_upload" method="post"enctype="multipart/form-data">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    <span class="card-title">Propose To Sponsor</span>
                    <div class="divider"></div>
                    <div class="section">
                    <!-- form login here -->
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input id="" type="text" class="validate" name="judul_proposal" required>
                          <label for="">Judul Proposal</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <select name="ke_ID">
                            <option hidden selected>Choose your option</option>
                            <?php foreach ($Kat->result_array() as $row) { ?>
                             <option value="<?php echo $row['id_ke'] ?>"><?php echo $row['nama_ke'] ?></option>
                            <?php } ?>
                            </select>
                          <label>Kategori Event</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input id="" type="text" class="validate" name="project_manajer" required>
                          <label for="">Project Manajer</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input id="" type="text" class="validate" name="deskripsi" required>
                          <label for="">Event Konten</label>
                        </div>
                      </div>
					  <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <select name="industri_ID">
                            <option hidden selected>Choose your option</option>
                            <?php foreach ($ind->result_array() as $in) { ?>
                             <option value="<?php echo $in['id_si'] ?>"><?php echo $in['nama_si'] ?></option>
                            <?php } ?>
                            </select>
                          <label>Kategori Event</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input id="" type="text" class="datepicker" name="tgl_mulai" required>
                          <label for="">Tanggal Mulai</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input id="" type="text" class="datepicker" name="tgl_selesai" required>
                          <label for="">Tanggal Selesai</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="file-field input-field col s10 offset-s1">
                          <div class="btn">
                            <span>File</span>
                            <input type="file" name="dokumen" required> 
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="docName">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action" style="padding: 30px">
                    <a href="<?php echo base_url() ?>member/home" class="waves-effect waves-light btn-large">Back</a>
                    <button class="waves-effect waves-light yellow btn-large black-text">Propose</button>
                  </div>
                </div>
          </form>
              </div>
            </div>
          </div>
          <!-- end of row login company -->
        </div><!-- end of content company -->

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/myjs.js"></script>
      <script type="text/javascript">
      $(function(){
        $(".button-collapse").sideNav();
      });
      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      });
      </script>
    </body>
  </html>
