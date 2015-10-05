
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            LOGIN
                        </h1>

                         <?php if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger">
                          <?php echo $this->session->flashdata('error') ?>
                      </div>
                      <?php } ?>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo base_url() ?>admin/authenticate" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required name="name" placeholder="Enter the name">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Password</label>
                                <input type="password" class="form-control" required name="password" placeholder="Enter the password">
                            </div>


                            <div class="form-group col-md-6">
                                <input type="submit" class="btn btn-md btn-success" name="action_log" value="LOGIN">
                            </div>

                        </form>
                    </div>
                </div>

                <div style="padding:100px 0px;"></div>