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


      <div class="navbar-fixed">
      <?php $this->load->view('member/memberHeader') ?>
    </div>
  <div class="main-content" style="height:100vh">
    <div class="container">
      <div class="row section">
      <?php foreach($list->result_array() as $row){ ?>
        <div class="col s8 l8 offset-l1">
          <h4><?php echo $row['nama_member'] ?></h4>

          <div class="divider"></div>

          <div class="title">
            <h5><?php echo $row['website'] ?></h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['about_member'] ?>
                </p>
              </li>
            </ul>
          </div>

          <div class="title">
            <h5>Amail Address</h5>
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
            <h5>Alamat</h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['alamat'] ?>
                </p>
              </li>
            </ul>
          </div>

          <div class="title">
            <h5>Member Sejak</h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['tgl_gabung'] ?>
                </p>
              </li>
            </ul>
          </div>

          <div class="reg-button-about right">
            <!-- <a href="#" class="waves-effect waves-light btn-large" href="maincontent.html">Reject</a> -->
            <a href="<?php echo base_url() ?>member/formEditProfile/<?php echo''.$this->session->userdata('id').'';?>" class="waves-effect waves-light yellow btn-large black-text">Edit</a>
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- end of -->
    </div>
  </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/myjs.js"></script>
      <script type="text/javascript">
        $('.button-collapse').sideNav('show');
      </script>
    </body>
  </html>
