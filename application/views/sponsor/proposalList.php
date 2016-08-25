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
        <?php $this->load->view('sponsor/sponsorHeader') ?>
        
    <div class="main-content" style="height:100vh">
    <div class="container bor">
      <div class="#fafafa grey lighten-5">
        <?php foreach($list->result_array() as $row){ ?>
        <div class="row section">
          <div class="col s8 l8 offset-l1">
            <h4 class="jud-main"><?php echo $row['judul_proposal'] ?></h4>
            <div class="content-main">
              <p>
                <?php echo $row['deskripsi'] ?>
              </p>
            </div>
            <div class="reg-button">
              <a class="waves-effect waves-light btn" href="<?php echo base_url() ?>sponsor/proposalDetail/<?php echo $row['id_proposal'] ?>">Lihat</a>
            </div>
          </div>
        </div>
        <div class="divider"></div>
        <?php } ?>

      </div><!-- end of content company -->
    </div>
  </div>
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
