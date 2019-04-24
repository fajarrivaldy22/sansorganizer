
<link rel="icon" href="<?php echo base_url('assets/img/logo.png')?>">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url('assets/img/logo.png')?>" width="30" height="30" alt="">
    </a>
    <a class="navbar-brand text-white" href="#">Sans Organizer</a>
    <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <!--isi -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-item nav-link active text-white" href="#">Home <span class="sr-only">(current)</span></a>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="<?php echo site_url().'/welcome/rentaleventequipment'; ?>">Rental Event Equipment</a>
                                <a class="dropdown-item " href="#">Event Maker</a>
                                <a class="dropdown-item " href="#">Consultant</a>
                        </div>
                    </li>
                <li class="nav-item">
                    <a class="nav-item nav-link text-white" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link text-white" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link text-white" href="#">About Us</a>
                </li>
            </ul>
            
            
        </div>
            <!--modal -->
            <?php 
                if($this->session->userdata('login')==0){ ?>
                    <button type="button"  class="btn btn-primary btn-sm ml-auto p-2 bd-highlight" data-toggle="modal" data-target="#Login">Login</button>
                    <!-- Modal -->
                    <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method='post' action="<?php echo site_url().'/welcome/login'; ?>">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="LoginLabel">Login</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail" placeholder="E-mail" name='email'>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name='password'>
                                                </div>
                                            </div>
                                            <a href='<?php echo site_url().'/welcome/registrationform'; ?>' class="btn-sm btn-danger">Register</a>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-sm btn-danger" id="submit" name='submit' value='Login'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end of modal -->  
                    <?php
                }else{ ?>
                    
                    <div class="dropdown  ml-auto p-2 bd-highlight">
                        <a class="btn  btn-sm btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo 'hi, '.$this->session->userdata('name'); ?>
                        </a>
                    
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" data-toggle="modal" data-target="#Notif" style="cursor:pointer">Notification</a>
                            <a class="dropdown-item" href="#">Setting</a>
                            <a class="dropdown-item" href="<?php echo site_url().'/welcome/logout'; ?> ">Logout</a>
                        </div>
                    </div>
                    <!-- Modal Notification -->
                   <!-- Modal -->
                   <div class="modal fade" id="Notif" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="LoginLabel">Login</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--end of modal -->  
                    <!--end of modal -->   
                    <?php
                }
            ?>

             
    </div>
</nav>


    