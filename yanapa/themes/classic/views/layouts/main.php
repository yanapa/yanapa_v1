<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo yii::app()->theme->baseUrl; ?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo yii::app()->theme->baseUrl; ?>/css/main.css">

        <script src="<?php echo yii::app()->theme->baseUrl; ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body class="color1">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#"><img src="<?php echo yii::app()->theme->baseUrl; ?>/img/logo1.png" class="adaptar"></a>
        </div>

        <div class="navbar-collapse collapse">
          <?php $this->widget('SApplicationLanguageSelectorWidget'); ?>
          <form class="navbar-form navbar-right" role="form">
            <a class="btn btn-success btn-large" data-placement="bottom" data-toggle="popover" data-title="Ingresar" data-container="body" type="button" data-html="true" href="#" id="ingresar"><span class="glyphicon glyphicon-user"></span>  Ingresar</a>
            <button type="submit" class="btn btn-warning">Donar</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>







  <div class="container-fluid">

    <!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo yii::app()->theme->baseUrl;?>/img/wallpaper4.jpg" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <h1>Quieres saber más sobre nosotros.</h1>
          <h1 class="text-center"><a href="#myModal" role="button" class="btn btn-lg btn-success" data-toggle="modal"><span class="glyphicon glyphicon-play"></span> Click Aquí</a></h1>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo yii::app()->theme->baseUrl;?>/img/lima.jpg">
      <div class="container">
        <div class="carousel-caption">
              
            <div class="row">
              <div class="col-lg-12">
                  <img src="<?php echo yii::app()->theme->baseUrl;?>/img/logo2.png" alt="">
              </div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-5">

                  </div>
                  <div class="col-lg-4">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-success" type="button">Ir!</button>
                        </span>
                      </div><!-- /input-group -->
                  </div>
                  <div class="col-lg-3">

                  </div>
                </div>
              </div>
            </div><br><br>


          <!--<h1>YANAPA</h1>
          <pthis is="" an="" example="" layout="xxx" with="" carousel="" that="" uses="" the="" bootstrap="" 3="" styles.<="" small=""><p></p>
          <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com">Learn More</a>
        </p></pthis>-->
      </div>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo yii::app()->theme->baseUrl;?>/img/nevado.jpg" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <h1>Quieres saber más sobre nosotros.</h1>
          <h1 class="text-center"><a href="#myModal" role="button" class="btn btn-lg btn-success" data-toggle="modal"><span class="glyphicon glyphicon-play"></span> Click Aquí</a></h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
<!-- /.carousel -->


  </div><!-- /container -->





<nav class="navbar navbar-default">
         <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
             <span class="sr-only">Cambiar Navegación</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
           <a href="#" class="navbar-brand"><span class="glyphicon glyphicon-home pull-right"></span>Yanapa   </a>
         </div>

         <div class="collapse navbar-collapse navbar-ex1-collapse">
          
          <?php
          $this->widget('zii.widgets.CMenu', array(
              'encodeLabel' => false,
              'htmlOptions' => array('class' => 'nav navbar-nav'),
              'items' => array(
                  array(
                      'label' => 'Home',
                      'url' => array('/site/index'),
                  ),
                  array(
                      'label' => 'Who We Are <b class="caret"></b>',
                      'url' => '#',
                      'submenuOptions' => array('class' => 'dropdown-menu'),
                      'items' => array(
                          array(
                              'label' => 'Submenu 1',
                              'url' => array('/user/create'),
                          ),
                          array(
                              'label' => 'Submenu 2',
                              'url' => array('/user/list'),
                          ),
                      ),
                      'itemOptions' => array('class' => 'dropdown'),
                      'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                  ),
                  array(
                      'label' => 'What We Do <b class="caret"></b>',
                      'url' => '#',
                      'submenuOptions' => array('class' => 'dropdown-menu'),
                      'items' => array(
                          array(
                              'label' => 'Submenu 1',
                              'url' => array('/user/create'),
                          ),
                          array(
                              'label' => 'Submenu 2',
                              'url' => array('/user/list'),
                          ),
                      ),
                      'itemOptions' => array('class' => 'dropdown'),
                      'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                  ),

                array('label'=>'Contact', 
                      'url'=>array('/site/contact')),
                array('label'=>'Login', 
                      'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 
                      'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
              ),
          ));
          ?>
           <form class="navbar-form navbar-left">
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Buscar">
              <input type="text" class="form-control" placeholder="Donde">
             </div>
             <button type="submit" class="btn btn-success">Buscar</button>
           </form>
          
         </div>
</nav>
     
     <?php echo $content; ?>

      <footer class="color3">
        <div class="container-fluid color5"><br>
          <div class="row">
            <div class="col-lg-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, asperiores nobis eius labore ea obcaecati officia animi commodi maiores iure illum voluptas nisi eveniet repellat quas eos saepe nihil fuga.
            </div>
            <div class="col-lg-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, odio maiores obcaecati repellat possimus perspiciatis saepe? Hic, ea distinctio numquam amet impedit expedita saepe. Consequuntur recusandae nobis earum rem fuga.
            </div>
            <div class="col-lg-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, facilis, neque sapiente veniam recusandae perspiciatis illum ad fugiat voluptas dolorem esse corporis culpa quo vitae quaerat deserunt nemo! Beatae, aspernatur.
            </div>
            <div class="col-lg-2">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-4">
                      <a href="www.facebook.com" target="_blank"><img src="<?php echo yii::app()->theme->baseUrl; ?>/img/iconos/facebook.png" alt=""></a>
                    </div>
                    <div class="col-lg-4">
                      <img src="<?php echo yii::app()->theme->baseUrl; ?>/img/iconos/twitter.png" alt="">
                    </div>
                    <div class="col-lg-4">
                      <img src="<?php echo yii::app()->theme->baseUrl; ?>/img/iconos/linkedin.png" alt="">
                    </div>
                  </div><br>
                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-4">
                      <img src="<?php echo yii::app()->theme->baseUrl; ?>/img/iconos/pinterest.png" alt="">
                    </div>
                    <div class="col-lg-4">
                      <img src="<?php echo yii::app()->theme->baseUrl; ?>/img/iconos/vimeo.png" alt="">
                    </div>
                    <div class="col-lg-4">
                      <img src="<?php echo yii::app()->theme->baseUrl; ?>/img/iconos/youtube.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container"><br>
            <p class="color4">Derechos Reservados @2015 Yanapa Volunteering</p>
          </br>
        </div>
      </footer>

             
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo yii::app()->theme->baseUrl; ?>/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="<?php echo yii::app()->theme->baseUrl; ?>/js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo yii::app()->theme->baseUrl; ?>/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>

    </body>    
</html>
