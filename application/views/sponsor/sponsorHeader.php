<nav class="#303f9f indigo darken-2 fixed">
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo" style="padding-left:250px">
                <!--<img src="../image/logobca1.png" width="300px">
                <span class="hide-on-med-and-down"><i>Welcome Admin Event</i></span>-->
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <!--<li><a href="#!">Sign In</a></li>
              <li><a href="#!">Register</a></li>-->
              <li><a href="<?php echo base_url() ?>sponsor/home"><?php echo $this->session->userdata('username') ?></a></li>
              <li><a class="waves-effect waves-light btn" href="<?php echo base_url() ?>member/logout">Logout</a></li>
            </ul>
            <ul class="side-nav fixed #82b1ff blue accent-1" id="mobile-demo">
              <li class="logo"><a href="#" class="logo-container">this is logo</a></li>
              <li class="active"><a href="main.html">Home</a></li>
              <li><a href="<?php echo base_url() ?>sponsor/offer/<?php echo $this->session->userdata('id') ?>">Propose<span id="newProp" class="new badge"> 7</span></a></li>
              <li><a href="<?php echo base_url() ?>sponsor/proposalDisetujui/<?php echo $this->session->userdata('id') ?>">Proposal Disetujui</a></li>
              <!--<li class="active"><a href="akuntansiform.html">Akuntansi</a></li>
              <li><a href="#">RK Distribusi</a></li>
              <li><a href="#">Grup Hukum</a></li>
              <li><a href="#">BS Distribusi</a></li>
              <li><a href="#">BS UBC</a></li>-->
            </ul>
          </div>
        </nav>
         <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.2.min.js"></script>
        <script>
        $(function(){
          var id = <?php echo $this->session->userdata('id') ?>;
          $("#myID").html(id);
          $.ajax({
            url : "<?php echo base_url() ?>requestJson/getOfferNotif/" + id,
            type:"GET",
            dataType:"JSON",
            success: function(data){
                  $("#newProp").html(data.notif);
                }
          });
        });
        </script>