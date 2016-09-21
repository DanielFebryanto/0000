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
  <h3 style="margin-left:20px;">Proposal Disetujui oleh Sponsor </h3>
  <hr/>
    <div class="container">
      <div class="col s12 m12 l12">
               <table id="example" class="display table" cellspacing="0" width="100%">
                 <thead class="#000000 black">
                          <tr class="white-text">
                              <th data-field="id">#</th>
                              <th data-field="name">Judul Proposal</th>
                              <th data-field="price">Project Manager</th>
                              <th data-field="price">status</th>
                              <th data-field="price">Edit</th>
                          </tr>
                        </thead>
                  <tbody>
                   <?php 
                    $no = 1; 
                    foreach($list->result_array() as $row){?>
                   <tr>
                   <td> <?php echo $no ?></td>
                   <td> <?php echo $row['judul_proposal'] ?></td>
                   <td> <?php echo $row['project_manajer'] ?></td>
                   <td> <?php echo $row['status'] ?></td>
                   <td><a class="waves-effect waves-light btn" href="<?php echo base_url() ?>member/ApproveDetail/<?php echo $row['id_proposal'] ?>.html">Lihat</a></td>
                    </tr>
                   <?php 

                    $no++; } ?>
                  </tbody>
          </table>
            </div>        
      </div><!-- end of content company -->
  </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/myjs.js"></script>
       <!--  <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/js/jquery-1.12.3.js"></script> -->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/js/jquery.dataTables.min.js"></script>
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
      </script>
    </body>
  </html>
