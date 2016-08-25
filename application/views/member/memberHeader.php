
      <div class="navbar-fixed">
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
              <li><a href="<?php echo base_url() ?>sponsor/sponsorList"><?php echo $this->session->userdata('username') ?></a></li>
              <li><a class="waves-effect waves-light btn" href="<?php echo base_url() ?>member/logout">Logout</a></li>
            </ul>
            <ul class="side-nav fixed #82b1ff blue accent-1" id="mobile-demo">
              <li class="logo"><a href="<?php echo base_url() ?>member/home" class="logo-container">E-Proposal</a></li>
              <li class="active"><a href="adminevent.html">Home</a></li>
              <li class="active"><a href="<?php echo base_url() ?>member/formProposal.html">Create</a></li>
              <li><a href="editprofile.html">Edit Profile</a></li>
              <li><a href="companyacc.html">Company Acc<!--<span class="new badge">4</span> --></a></li>
              <!--<li class="active"><a href="akuntansiform.html">Akuntansi</a></li>
              <li><a href="#">RK Distribusi</a></li>
              <li><a href="#">Grup Hukum</a></li>
              <li><a href="#">BS Distribusi</a></li>
              <li><a href="#">BS UBC</a></li>-->
            </ul>
          </div>
        </nav>
    </div>