<?php
$dashboard = $tags = $keys = "";
    switch ($this->uri->segment(2)) {
        case '':
            $dashboard = "active";
            break;

        case 'tags':
            $tags = "active";
            break;

        case 'keys':
            $keys = "active";
            break;
        
        default:
            $dashboard = "active";
            break;
    }



?>

<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php echo $dashboard ?>">
                        <a href="<?php echo base_url() ?>admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li class="<?php echo $tags ?>">
                        <a href="<?php echo base_url() ?>admin/tags"><i class="fa fa-fw fa-bar-chart-o"></i> Tags to Battle</a>
                    </li>

                    <li class="<?php echo $keys ?>">
                        <a href="<?php echo base_url() ?>admin/keys"><i class="fa fa-fw fa-key"></i> APP Keys</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
