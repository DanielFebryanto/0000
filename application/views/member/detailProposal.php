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
    <h3>Proposal Detail </h3>
      <div class="row section">
      <?php foreach($detail->result_array() as $row){ ?>
        <div class="col s8 l8 offset-l1">
          <h4>By : <?php echo $row['nama_member'] ?></h4>

          <div class="divider"></div>

          <div class="title">
            <h5><?php echo $row['judul_proposal'] ?></h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['deskripsi'] ?>
                </p>
              </li>
            </ul>
          </div>

          <div class="title">
            <h5>Kategori Event</h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['nama_ke'] ?>
                </p>
              </li>
            </ul>
          </div>


          <div class="title">
            <h5>Project Manajer</h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['project_manajer'] ?>
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


          <div class="title">
            <h5>Tanggal Mulai</h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['tgl_mulai'] ?>
                </p>
              </li>
            </ul>
          </div>



          <div class="title">
            <h5>Tanggal Selesai</h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <?php echo $row['tgl_selesai'] ?>
                </p>
              </li>
            </ul>
          </div>


          <div class="title">
            <h5>Proposal Download</h5>
          </div>
          <div class="content-about">
            <ul class="browser-default">
              <li>
                <p>
                  <a href="<?php echo base_url() ?>/docs/<?php echo $row['doc'] ?>">Download</a>
                </p>
              </li>
            </ul>
          </div>
          <?php if($row['status'] == 'Open'){ ?>
          <div class="reg-button-about right">
            <a class="waves-effect waves-light btn-large" href="<?php echo base_url() ?>member/proposalList.html">Back</a>
            <a href="<?php echo base_url() ?>member/formEditProposal/<?php echo $row['id_proposal'] ?>" class="waves-effect waves-light yellow btn-large black-text">Edit</a>
          </div>
        </div>
        <?php } else {?>

        <?php } ?>
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
 