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


<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// content ///////////////////////////////////////////////////////////////////////////-->

        <!-- content company -->
        <div class="container bor #fafafa grey lighten-5" style="border:0">
        <?php if($this->session->userdata('error')){ ?>
          <div class="card-panel #d50000 red accent-4 white-text">Notif Gagal!!!</div>
        <?php } ?>
          <!--<h4>Proposal</h4>-->
          <div class="row section valign-wrapper">
            <div class="col s12 l8 pull-l2">
              <div class="log-wrapper">
              <?php foreach($edit->result_array() as $edi) { ?>
          <form action="<?php echo base_url() ?>member/editProposal" method="post">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    <span class="card-title">Form Edit Proposal</span>
                    <div class="divider"></div>
                    <div class="section">
                    <!-- form login here -->
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input type="text" value="<?php echo $edi['judul_proposal'] ?>" class="validate" name="judul_proposal">
                          <label for="">Judul Proposal</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <select name="ke_ID">
                            <option hidden value="<?php echo $edi['id_ke'] ?>" selected><?php echo $edi['nama_ke'] ?></option>
                            <?php foreach ($Kat->result_array() as $row) { ?>
                             <option value="<?php echo $row['id_ke'] ?>"><?php echo $row['nama_ke'] ?></option>
                            <?php } ?>
                            </select>
                          <label>Kategori Event</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input value="<?php echo $edi['project_manajer'] ?>" type="text" class="validate" name="project_manajer"/>
                          <label for="">Project Manajer</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input value="<?php echo $edi['deskripsi'] ?>" type="text" class="validate" name="deskripsi">
                          <label for="">Event Konten</label>
                        </div>
                      </div>
					  <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <select name="industri_ID">
                            <option hidden value="<?php echo $edi['id_si'] ?>" selected><?php echo $edi['nama_si'] ?></option>
                            <?php foreach ($ind->result_array() as $in) { ?>
                             <option value="<?php echo $in['id_si'] ?>"><?php echo $in['nama_si'] ?></option>
                            <?php } ?>
                            </select>
                          <label>Kategori Event</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input value="<?php echo $edi['tgl_mulai'] ?>" type="text" class="datepicker" name="tgl_mulai">
                          <label for="">Tanggal Mulai</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input value="<?php echo $edi['tgl_selesai'] ?>" type="text" class="datepicker" name="tgl_selesai">
                          <label for="">Tanggal Selesai</label>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div class="card-action" style="padding: 30px">
                    <a href="<?php echo base_url() ?>member/proposalList" class="waves-effect waves-light btn-large">Back</a>
                    <input type="hidden" name="idProp" value="<?php echo $edi['id_proposal'] ?>">
                    <button class="waves-effect waves-light yellow btn-large black-text">Save</button>
                  </div>
                </div>
          </form>
          <?php } ?>
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
