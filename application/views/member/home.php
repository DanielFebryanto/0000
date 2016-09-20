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
    <?php $this->load->view('member/memberHeader') ?>

  <div class="main-content" style="height:100vh">
      <div class="container">

        <h3>Welcome To E-Proposal Online</h3>
        <div class="divider"></div>

        <div class="section">

          <p style="font-weight:700">Looking For New Acc Company Or Propose To Another Company?</p>

          <div class="section"></div>

          <p style="text-indent: 20px">
            Here's For Get a new Sponsor
          </p>

          <div class="butt-event">
            <a href="<?php echo base_url() ?>member/SponsorList" class="waves-effect waves-light btn">Lihat Sponsor Kami</a>
            <br>
            <span style="font-size:12px; font-style:italic">Note: you only propose 5 times until you got a new acc sponsor</span>
          </div>

        </div>

      </div><!-- end of content company -->
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
