
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
                            BATTLE TAGS
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>admin">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Tag
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo base_url() ?>tags/action" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>The first tag for battle</label>
                                    <input class="form-control" required name="firsttag" value="<?php echo $tags->first_tag
                                     ?>" placeholder="Enter first tag">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>The secomd tag for battle</label>
                                <input class="form-control" required name="secondtag" value="<?php echo $tags->second_tag
                                 ?>" placeholder="Enter second tag">
                            </div>


                            <div class="form-group col-md-6">
                                <?php if(empty($tags)){ ?>
                                <input type="submit" class="btn btn-lg btn-success" name="action" value="ADD">
                                <?php } ?>
                                <input type="submit" class="btn btn-lg btn-primary" name="action" value="UPDATE">
                                <input type="hidden" name="id" value="<?php echo $tags->id ?>">
                            </div>

                        </form>
                    </div>
                </div>

                <div style="padding:100px 0px;"></div>