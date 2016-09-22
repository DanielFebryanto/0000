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

    <body class="#ffebee red lighten-5">

    <div style="margin-top: 10%;">
      <div class="container">
        <div class="row">
        <?php if($this->session->flashdata('error')){ ?>
     <div class="card-panel #d50000 red accent-4 white-text"><?php echo $this->session->flashdata('error') ?></div>
    <?php } ?>
          <div class="col m6 offset-m3">
            <div class="card #00695c teal darken-3">
              <h4 style="color: #fff;" align="center">Admin Login Page </h4>
              <div class="card-content white-text">
                <div class="row" style="padding: 20px 20px;">
                  <form class="col m12" action="<?php echo base_url() ?>admin/doLogin" method="post">
                    <div class="row">
                      <div class="input-field col s12">
                        <input placeholder="Username" id="first_name" name="username" type="text" class="validate">
                        <label for="username">Username</label>
                      </div>
                    </div>  
                     <div class="row">
                      <div class="input-field col s12">
                        <input placeholder="Password" id="first_name" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="waves-effect waves-light btn">Login</button  >
                      </div>
                    </div>   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
      

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/myjs.js"></script>
       <!--  <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/js/jquery-1.12.3.js"></script> -->
      <!--<script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/js/dataTables.responsive.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/js/responsive.bootstrap.min.js"></script>
      <script type="text/javascript">
      $.extend( true, $.fn.dataTable.defaults, {
        "searching": true,
        "ordering": false,
        "paging":true,
        "info":   true
      } );
        $(document).ready(function() {
            $('#example').DataTable();
        } );
      </script>
      <script type="text/javascript">
        $('.button-collapse').sideNav('show');
      </script>-->
    </body>
  </html>
