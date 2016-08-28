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
      <h3>Add Addition Msg For EO</h3>
      <div class="divider"></div>

      <div class="section">
        <div class="row">
      <form action="<?php echo base_url() ?>sponsor/doApprove" method="post" class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <textarea required id="textarea1" class="materialize-textarea" length="120" name="message"></textarea>
            <label for="textarea1">Textarea</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input type="hidden" name="proposal_ID" value="<?php echo $id_proposal ?>">
            <input type="hidden" name="id_member" value="<?php echo $id_member ?>">
            <input type="hidden" name="idsponsor" value="<?php echo $idsponsor ?>">
            <a class="waves-effect waves-light btn red">Back</a>
            <button class="waves-effect waves-light btn"> Accept</button>
          </div>
        </div>
      </form>
    </div>
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
