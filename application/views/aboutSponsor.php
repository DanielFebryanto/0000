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


      <?php $this->load->view('header') ?>
        <!-- content company -->
        <div class="container bor #fafafa grey lighten-5">
        <?php foreach ($det->result_array() as $row) { ?>
          <div class="row section">
            <div class="col s8 l8 offset-l1">
              <h4><?php echo $row['nama_sponsor'] ?></h4>

              <div class="divider"></div>

              <div class="title">
                <h5>About Company</h5>
              </div>
              <div class="content-about">
                <ul class="browser-default">
                  <li>
                    <p>
                      <?php echo $row['about_sponsor'] ?>
                    </p>
                  </li>
                </ul>
              </div>


              <div class="title">
                <h5>Industri Sponsor</h5>
              </div>
              <div class="content-about">
                <ul class="browser-default">
                  <li>
                    <p>
                      <?php echo $row['nama_si'] ?>
                    </p>
                  </li>
                </ul>
              </div>


              <div class="title">
                <h5>Email</h5>
              </div>
              <div class="content-about">
                <ul class="browser-default">
                  <li>
                    <p>
                      <?php echo $row['email'] ?>
                    </p>
                  </li>
                </ul>
              </div>

              <div class="title">
                <h5>Website</h5>
              </div>
              <div class="content-about">
                <ul class="browser-default">
                  <li>
                    <p>
                      <?php echo $row['website'] ?>
                    </p>
                  </li>
                </ul>
              </div>


              <div class="reg-button-about right">
                <a href="maincontent.html" class="waves-effect waves-light btn-large" href="maincontent.html">Back</a>
                <?php if($this->session->userdata('username')){ ?>
                <a href="<?php echo base_url() ?>member/formProposal.html" class="waves-effect waves-light yellow btn-large black-text">Propose</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- end of row login company -->
          <?php } ?>
        </div><!-- end of content company -->

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/myjs.js"></script>
      <script type="text/javascript">
      $(function(){
        $(".button-collapse").sideNav();
      });
      </script>
    </body>
  </html>
