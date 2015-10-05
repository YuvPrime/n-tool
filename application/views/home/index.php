<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Welcome to the Battle</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo base_url() ?>assets/css/grayscale.css" rel="stylesheet">

  <link href="<?php echo base_url() ?>assets/css/bi-style.css" rel="stylesheet" />

<!--     <link rel="stylesheet"type="text/css" href="css/jquery.easy-pie-chart.css"/>
-->
<!-- Custom Fonts -->
<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>
      <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Intro Header -->
        <header class="intro">
          <div class="intro-body">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <h1 class="brand-heading">#HashBattle</h1>
                  <p class="intro-text">Let's begin the race.<br>#<?php echo $tag_name_one ?> Vs #<?php echo $tag_name_two; ?>.</p>
                  <a href="#about" class="btn btn-circle page-scroll brown-circle">
                    <i class="fa fa-angle-double-down animated"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </header>

        <!-- About Section -->
        <section id="about" class="container content-section text-center">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <h2>Battle statistics</h2>
              <hr>


              <h4>Total Tweets - <span class="total-to-load"><?php echo "loading..."; ?></span></h4>

              <p class="not-center">#<?php echo $tag_name_one ?> (<span class="f"><?php echo ""; ?></span>) <span class="firstcount"><?php echo "0"; ?></span></p>

              <p class="not-center">#<?php echo $tag_name_two ?> (<span class="s"><?php echo ""; ?></span>) <span class="secondcount"><?php echo "0"; ?></span></p>
              <br/><br/>
              <h3>Want to know more?</h3>

              <a href="#contact" class="btn btn-circle page-scroll brown-circle">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
              <br/><br/>
            </div>
          </div>
        </section>


        <!-- Contact Section -->
       <!--  <section id="contact">
          <div class="container content-section text-center">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <h2>Top 10 Tweeters</h2>

                <h3>#<?php echo $tag_name_one; ?></h3>                

                <div class="table">

                  <div class="table-row header">
                    <div class="cell">Screen Name</div>
                    <div class="cell">Tag</div>
                    <div class="cell">Total</div>
                  </div>

                  <?php

                  $query_b = "SELECT DISTINCT b.screen_name as name, b.profile_image_url as profile_image, 
                  b.created_at as created, a.tag as tag, COUNT(a.tag) as count FROM `tweet_tags` a JOIN tweets 
                  b ON a.tweet_id = b.tweet_id WHERE b.is_rt = 0 AND a.`tag` = N'$tag_name_one'  GROUP BY b.screen_name
                  ORDER BY count DESC LIMIT 0, 10";

                  $result_new = mysqli_query($connection,$query_b);

                  while($new_row = mysqli_fetch_assoc($result_new)) { ?>

                  <div class="table-row">
                    <div class="cell">
                      <?php echo $new_row['name']; ?>
                    </div>
                    <div class="cell">
                      <?php echo $tag_name_one ?>
                    </div>
                    <div class="cell">
                      <?php echo $new_row['count']; ?>
                    </div>

                  </div>
                  <?php } ?>

                </div>


                <h3>#<?php echo $tag_name_two; ?></h3>

                <div class="table">

                  <div class="table-row header blue">
                    <div class="cell">Screen Name</div>
                    <div class="cell">Tag</div>
                    <div class="cell">Total</div>
                  </div>

                  <?php


                  $query_c = "SELECT DISTINCT b.screen_name as name, b.profile_image_url as profile_image, 
                  b.created_at as created, a.tag as tag, COUNT(a.tag) as count FROM `tweet_tags` a JOIN tweets 
                  b ON a.tweet_id = b.tweet_id WHERE b.is_rt = 0 AND a.`tag` = N'$tag_name_two'  GROUP BY b.screen_name
                  ORDER BY count DESC LIMIT 0, 10";

                  $result_new_b = mysqli_query($connection,$query_c);
                  while($new_row_2 = mysqli_fetch_assoc($result_new_b)) { ?>

                  <div class="table-row">
                    <div class="cell">
                      <?php echo $new_row_2['name']; ?>
                    </div>
                    <div class="cell">
                      <?php echo $tag_name_two; ?>
                    </div>
                    <div class="cell">
                      <?php echo $new_row_2['count']; ?>
                    </div>

                  </div>
                  <?php } ?>

                </div>




              </div>
            </div>
          </section>
 -->
          <!-- Footer -->
          <footer>
            <div class="container text-center footer-extra">
              <p>Copyright &copy; Your Website 2014</p>
            </div>
          </footer>

          <!-- jQuery -->
          <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

          <!-- Bootstrap Core JavaScript -->
          <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


          <script src="<?php echo base_url() ?>assets/js/jquery-barIndicator.js"></script>

          <!-- Plugin JavaScript -->
          <script src="<?php echo base_url() ?>assets/js/jquery.easing.min.js"></script>

          <!-- Custom Theme JavaScript -->
          <script src="<?php echo base_url() ?>assets/js/grayscale.js"></script>

          <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.easypiechart.min.js"></script>


          <script>

            var opt = {
             colorRange:true,
             colorRangeLimits: {
              optimal: '0-20',
              newRangeOne: '21-40-#4aa64f',
              newRangeTwo: '41-60-green',
              newRangeThree: '61-90-rgb(241,144,40)',
              critical: '91-100'
            }
          };
          $('.firstcount').barIndicator(opt);
          $('.secondcount').barIndicator(opt);




          setInterval(function() 
          {

            var total, first_tag_total_count, second_tag_total_count,
            first_tag_percent, second_tag_percent;


            $.ajax({
              url: '<?php echo base_url(); ?>home/total',
             datatype: 'json',
             error: function() {
             // alert("error has occured");
           },
           success: function(data) {
            console.log(data);

            var json = JSON.parse(data);

            total = json.total.total_tweets;
            first_tag_total_count = json.first.first;
            second_tag_total_count = json.second.second;

            first_tag_percent = (first_tag_total_count * 100)/total;
            second_tag_percent = (second_tag_total_count * 100)/total;

            console.log(first_tag_percent);
            console.log(second_tag_percent);        

            $('.total-to-load').text(total);
            $('.f').text(first_tag_total_count);
            $('.s').text(second_tag_total_count);


            $('.firstcount').barIndicator('loadNewData', first_tag_percent);
            $('.secondcount').barIndicator('loadNewData', second_tag_percent);



          },
          type: 'GET'
        });


}, 5000);


</script>





<style type="text/css">


  .brown-circle
  {
    color:#00f;
  }

  .brown-circle:hover, .brown-circle:active, .brown-circle:focus
  {
    color: #00f;
  }    

  .footer-extra
  {
    padding: 200px 0px;
  }

  #contact
  {
    background-color: #eee;
    padding-bottom: 50px;
  }



  .table {
    margin: 0 0 40px 0;
    width: 100%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    display: table;
  }
  @media screen and (max-width: 580px) {
    .table {
      display: block;
    }
  }

  .table-row {
    display: table-row;
    background: #f6f6f6;
  }
  .table-row:nth-of-type(odd) {
    background: #e9e9e9;
  }
  .table-row.header {
    font-weight: 900;
    color: #ffffff;
    background: #ea6153;
  }
  .table-row.green {
    background: #27ae60;
  }
  .table-row.blue {
    background: #2980b9;
  }
  @media screen and (max-width: 580px) {
    .table-row {
      padding: 8px 0;
      display: block;
    }
  }

  .cell {
    padding: 6px 12px;
    display: table-cell;
  }
  @media screen and (max-width: 580px) {
    .cell {
      padding: 2px 12px;
      display: block;
    }

  </style>
</body>

</html>
