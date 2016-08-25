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

      <?php $this->load->view('sponsor/sponsorHeader') ?>
    </div>
  <div class="main-content" style="height:100vh">
    <div class="container">
      <h3>Welcome To E-Proposal Online</h3>
      <div class="divider"></div>

      <div class="section">

        <p style="font-weight:700">Looking For a great Event Organizer?</p>

        <div class="section"></div>

        <p style="text-indent: 20px">
          Just Look at Propose menu to see event propose to our company
        </p>

      </div>
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
