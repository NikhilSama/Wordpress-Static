<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hong Kong Express</title>

    <!-- Bootstrap Core CSS -->
    
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/font-awesome/css/font-awesome.min.css" type="text/css" /> 
    <!-- Custom CSS -->
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" /> 

    <!-- Custom Fonts -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>    
    
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header red_bg" style="border:none;">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body red_bg">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center logo-small"><img src="<?php bloginfo('template_directory'); ?>/img/hongkng-logo.png"></div>
                    <img src="<?php bloginfo('template_directory'); ?>/img/onload.jpg" class="img-responsive">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <a  class="btn btn-warning btn-lg hvr-float-shadow" data-toggle="modal" data-target="#myModal-order" 
                    data-dismiss="modal">
                      ORDER NOW
                    </a>
                </div>
                
                <div class="modal-footer red_bg"  style="border:none;">
                    
                </div>
            </div>
        </div>
    </div>



    <div class="delivery_pop">Minimum per order <br><i class="fa fa-inr"></i> 300 for distance > 3 Km. </div>
    <div class="">
        <div class="col-md-4 col-sm-4 col-xs-12 left_container">
                    
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <div class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/hongkng-logo.png"></div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 button_order">
                    
                    <a href="#" class="btn-white hvr-float-shadow" data-toggle="modal" data-target="#myModal-order">ORDER NOW</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="x_close">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                       <iframe src="http://ordering.snaplion.com/#/web/49887?app_id=2814" width="100%"  height="500px">
                        </iframe>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <a href="#" class="btn-tranparent hvr-float-shadow">CONTACT US</a>
                </div>

                
               <!--  <div class="location">
                    <b>Reservation recommended </b>
                    <h4><i class="fa fa-phone"></i> 011 33106110</h4>
                </div> -->


                <div class="location">
                    <b>Location <i class="fa fa-map-marker"> </i></b>
                    <p> <b>Vasant Kunj › </b>Shop 18-19, B 10 Market, <br>Vasant Kunj, New Delhi</p>
                </div>
               
                <div class="location location2">
                    <b>Location <i class="fa fa-map-marker"> </i></b>
                    <p> <b>Defence Colony › </b>127, Flyover Market, <br>Defence Colony, New Delhi </p>
                </div>

                <div class="location location2">
                    <b>Opening hours  <i class="fa fa-clock-o"></i></b>
                    <p> 11:30 Noon to 11:30 PM</p>
                </div>

                <div class="text-center"><img src="<?php bloginfo('template_directory'); ?>/img/offers.jpg"></div>
                <div class="col-md-12 col-sm-12 col-md-xs text-center"><span class="delivery_pop2">Minimum per order <i class="fa fa-inr"></i>449  </span></div>
        </div>

        <div class="col-md-8 col-sm-8 col-xs-12 right_container p0">
                <div class="upper_slider">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php bloginfo('template_directory'); ?>/img/hong_slider1.jpg" alt="..." class="w100">
                            </div>
                            <div class="item">
                                <img src="<?php bloginfo('template_directory'); ?>/img/hong_slider2.jpg" alt="..." class="w100">
                            </div>

                            <div class="item">
                                <img src="<?php bloginfo('template_directory'); ?>/img/hong_slider3.jpg" alt="..." class="w100">
                            </div>

                            <div class="item">
                                <img src="<?php bloginfo('template_directory'); ?>/img/hong_slider4.jpg" alt="..." class="w100">
                            </div>
                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> 
                    
                </div>


                <div class="lower_container">
                    <div class="col-md-12 col-sm-12 col-xs-12 p0">
                        <div class="col-md-4 col-sm-4 col-xs-12 p7 lower_image_small hvr-bob">
                            <img src="<?php bloginfo('template_directory'); ?>/img/lower1.jpg" class="img-responsive ">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 p7 hvr-bob">
                            <img src="<?php bloginfo('template_directory'); ?>/img/lower2.jpg" class="img-responsive ">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 p7 hvr-bob">
                            <img src="<?php bloginfo('template_directory'); ?>/img/lower3.jpg" class="img-responsive ">
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-12 p7 pt0">
                        <img src="<?php bloginfo('template_directory'); ?>/img/lower4.jpg" class="img-responsive w100">
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script>
        $('#myModal').modal('show');
    </script>

</body>
</html>