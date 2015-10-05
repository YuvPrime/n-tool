
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <?php if($this->session->flashdata('Success')){ ?>
                        <div class="alert alert-success">
                          <strong>Well done!</strong> <?php echo $this->session->flashdata('Success') ?>
                      </div>
                      <?php } ?>

                        <h1 class="page-header">
                            TWITTER APP KEYS
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin">Dashboard</a>
                            </li>
                            <li class="active">
                                 Tag
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo base_url() ?>keys/action" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>TWITTER CONSUMER KEY</label>
                                    <input class="form-control" required name="consumer_key" value="<?php echo $keys->TWITTER_CONSUMER_KEY
                                     ?>" placeholder="Enter TWITTER CONSUMER KEY">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>TWITTER CONSUMER SECRET</label>
                                <input class="form-control" required name="consumer_secret" value="<?php echo $keys->TWITTER_CONSUMER_SECRET
                                 ?>" placeholder="Enter TWITTER CONSUMER SECRET">
                            </div>


                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>TWITTER OAUTH_TOKEN</label>
                                    <input class="form-control" required name="oauth_token" value="<?php echo $keys->OAUTH_TOKEN
                                     ?>" placeholder="Enter OAUTH TOKEN">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>TWITTER OAUTH_SECRET</label>
                                <input class="form-control" required name="oauth_secret" value="<?php echo $keys->OAUTH_SECRET
                                 ?>" placeholder="Enter OAUTH SECRET">
                            </div>


                            <div class="form-group col-md-6">
                                <?php if(empty($keys)){ ?>
                                <input type="submit" class="btn btn-lg btn-success" name="action" value="ADD">
                                <?php } ?>
                                <input type="submit" class="btn btn-lg btn-primary" name="action" value="UPDATE">
                                <input type="hidden" name="id" value="<?php echo $keys->id ?>">
                            </div>

                        </form>
                    </div>
                </div>

                <div style="padding:100px 0px;"></div>