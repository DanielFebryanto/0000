<nav>
        <div class="nav-wrapper container">
          <a href="<?php echo base_url() ?>" class="brand-logo">E-Proposal</a>
          <!-- trigger mobile button -->
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <!-- main menu-->
          <ul class="right hide-on-med-and-down">
            <!-- Modal Trigger for sign in-->
            <?php if($this->session->userdata('username')){ ?>
              <li><a class="modal-trigger" href="<?php echo base_url() ?>member/home"><?php echo $this->session->userdata('username') ?></a></li>
              <li><a class="waves-effect waves-light btn" href="<?php echo base_url() ?>member/logout">Logout</a></li>
            <?php }else{ ?>
            <li><a class="modal-trigger" href="#modal1">Sign In</a></li>
            <li><a class="modal-trigger" href="#modal2">Register</a></li>
            <li><a class="waves-effect waves-light btn" href="<?php echo base_url() ?>sponsor/registerPage">Company</a></li>
            <?php } ?>
          </ul>
          <!-- mobile menu -->
          <ul class="side-nav" id="mobile-demo">
            <!-- Modal Trigger for sign in-->

          </ul> 
        </div>
      </nav>
      <!-- MODAL LOGIN -->
      <div id="modal1" class="modal">
            <form class="col s12" action="<?php echo base_url() ?>member/loginMember" method="post">
         <div class="modal-content">
           <h4>Sign In</h4>
           <div class="divider"></div>
           <div class="section"></div>
           <div class="row">
              <div class="row">
                <div class="input-field col s12">
                  <input id="text" name="username" type="text" class="validate">
                  <label for="email">Username</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" name="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
          </div>
          <!-- end of form -->
         </div>
         <div class="modal-footer">
         <button class="modal-action waves-effect waves-green btn" type="submit">Login</button>
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
         </div>
            </form>
       </div>

       <!-- MODAL REGISTER -->

       <div id="modal2" class="modal modal-fixed-footer">

           <form action="<?php echo base_url() ?>/member/registerMember" method="post">
        <div class="modal-content">
          <h4>Register</h4>
          <div class="divider"></div>
          <div class="section"></div>
          <!-- form -->
          <div class="row">
             <div class="row">
               <div class="input-field col s12">
                 <input id="" name="nama_member" type="text" class="validate" />
                 <label for="nama">Nama</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="" name="email" type="email" class="validate"/>
                 <label for="email">Email</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="" name="phone" type="text" class="validate"/>
                 <label for="tlp">No Telepon</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="" name="website" type="url" class="validate" />
                 <label for="url">Website</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="" name="alamat" type="text" class="validate" />
                 <label for="alamat">Alamat</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <textarea id="textarea1" name="about_member" class="materialize-textarea" ></textarea>
                 <label for="about">About</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="" name="username" type="text" class="validate" />
                 <label for="username">Username</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <input name="password" type="password" class="validate" />
                 <label for="password">Password</label>
               </div>
             </div>
           <!-- end of form -->
         </div>
         <!-- end of form -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="modal-action waves-effect waves-green btn">Sign Up</button>
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
        </form>
      </div>