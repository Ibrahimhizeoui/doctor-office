<?php 
session_start();
if(isset($_SESSION["user"])&&isset($_SESSION["user"])){
	$pass=$_SESSION["pass"]; $user=$_SESSION["user"];
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

  <title>Doctor Park</title>

  <!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
  <!-- Bootstrap CSS -->

  
        <!-- Hammer reload -->
          <script>
            setInterval(function(){
              try {
                if(typeof ws != 'undefined' && ws.readyState == 1){return true;}
                ws = new WebSocket('ws://'+(location.host || 'localhost').split(':')[0]+':35353')
                ws.onopen = function(){ws.onclose = function(){document.location.reload()}}
                ws.onmessage = function(){
                  var links = document.getElementsByTagName('link'); 
                    for (var i = 0; i < links.length;i++) { 
                    var link = links[i]; 
                    if (link.rel === 'stylesheet' && !link.href.match(/typekit/)) { 
                      href = link.href.replace(/((&|\?)hammer=)[^&]+/,''); 
                      link.href = href + (href.indexOf('?')>=0?'&':'?') + 'hammer='+(new Date().valueOf());
                    }
                  }
                }
              }catch(e){}
            }, 1000)
          </script>
        <!-- /Hammer reload -->
      
  <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
<link rel='stylesheet' href='assets/css/material.css'>
<link rel='stylesheet' href='assets/css/style.css'>
<link rel='stylesheet' href='assets/css/animated-masonry-gallery.css'>
<link rel='stylesheet' href='assets/css/rotated-gallery.css'>
<link rel='stylesheet' href='assets/css/sweet-alerts/sweetalert.css'>
<link rel='stylesheet' href='assets/css/jtree.css'>
  <script src='assets/js/jquery.js'></script>
<script src='assets/js/app.js'></script>
  <script>
    jQuery(window).load(function () {
      $('.piluku-preloader').addClass('hidden');
    });
  </script>
</head>
<body>
  <div class="piluku-preloader text-center">
  <!-- <div class="progress">
      <div class="indeterminate"></div>
  </div> -->
  <div class="loader">Loading...</div>
</div>
<div class="wrapper ">

  
<?php require_once('header.php');?>
	
	<div class="main-content">
       <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 nopad-right">
            <div class="dashboard-stats">
                <div class="left">
				<?php 
				$s1=$bdd->query("SELECT count(id) as num FROM `patiant`");
				$ss1=$s1->fetch();
				?>
                    <h3 class="flatBluec counter" data-to="<?php echo $ss1['num']?>" data-speed="4000"><?php echo $ss1['num']?></h3>
                    <h4>Nombre de patients</h4>
                </div>
                <div class="right flatBlue">
                    <i class="ion ion-ios-heart-outline"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 nopad-right">
            <div class="dashboard-stats">
                <div class="left">
				<?php 
				$s2=$bdd->query("SELECT count(id) as num FROM `rdv` where date=DATE_FORMAT(NOW(),'%m-%d-%Y')");
				$ss2=$s2->fetch();
				?>
                    <h3 class="flatGreenc counter" data-to="<?php echo $ss2['num']?>" data-speed="4000"><?php echo $ss2['num']?></h3>
                    <h4>RDVs (aujourd'hui)</h4>
                </div>
                <div class="right flatGreen">
				 <i class="ion ion-ios-alarm-outline"></i>
                   
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 nopad-right">
            <div class="dashboard-stats">
                <div class="left">
                    <h3 class="flatRedc counter" data-to="0" data-speed="4000">0</h3>
                    <h4>Tâche(s) à faire</h4>
                </div>
                <div class="right flatRed">
                <i class="ion ion-ios-color-filter-outline"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 nopad-right">
            <div class="dashboard-stats">
                <div class="left">
				<?php 
				$si3=$bdd->query("SELECT count(id) as num FROM `rdv` where date>DATE_FORMAT(NOW(),'%m-%d-%Y') AND `type`='domicile'");
				$ssi3=$si3->fetch();
				?>
                    <h3 class="flatOrangec counter" data-to="<?php echo $ssi3['num']?>" data-speed="8000"><?php echo $ssi3['num']?></h3>
                    <h4>Consultation à domicile</h4>
                </div>
                <div class="right flatOrange">
                    <i class="ion ion-ios-analytics-outline"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 nopad-right">
            <!-- panel -->
            <div class="panel panel-piluku">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Monthly Earnings
                        <span class="panel-options">
                           <a href="#" class="panel-refresh">
                              <i class="icon ti-reload"></i> 
                          </a>
                          <a href="#" class="panel-minimize">
                              <i class="icon ti-angle-up"></i> 
                          </a>
                          <a href="#" class="panel-close">
                              <i class="icon ti-close"></i> 
                          </a>
                      </span>
                  </h3>
              </div>
              <div class="panel-body">
                <div class="row main-chart-parent">
                    <div class="ct-chart ct-golden-section  chart-height" id="main_chart"></div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <!-- /panel -->
    </div>
    <!-- col-md-6 -->

    <div class="col-md-6 nopad-right">
        <!-- panel -->
        <div class="panel panel-piluku">
            <div class="panel-heading">
                <h3 class="panel-title">
                    DP Mail
                    <span class="panel-options">
                       <a href="#" class="panel-refresh">
                          <i class="icon ti-reload"></i> 
                      </a>
                      <a href="#" class="panel-minimize">
                          <i class="icon ti-angle-up"></i> 
                      </a>
                      <a href="#" class="panel-close">
                          <i class="icon ti-close"></i> 
                      </a>
                  </span>
              </h3>
          </div>
          <div class="panel-body mail_widget">
            <ul class="tabs">
                <li class="tab col-md-3"><a href="#test12" class="active">Reçus</a>
                </li>
                <li class="tab col-md-3"><a href="#test13">Envoyés</a>
                </li>
                <li class="tab col-md-3"><a href="#test14">Suivis</a>
                </li>
                <li class="tab col-md-3"><a href="#test15">Personales</a>
                </li>
            </ul>
            <div class="content-holder">
                <div id="test12" class="col-md-12 no_padding">
                    <div class="mail_list">
                        <ul class="list-unstyled mails_holder">
                            <li>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/two.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Henry richards</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Research have been going on the project will report the results asap in a few days.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/one.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Hola fan</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/seven.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Nemo</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/eight.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Tupakula Vijay</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/nine.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">lucky</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/one.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">venky</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="test13" class="col-md-12 no_padding">
                    <div class="mail_list">
                        <ul class="list-unstyled mails_holder">
                            <li>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/two.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Mila kunis</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Research have been going on the project will report the results asap in a few days.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/one.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">rescort</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/three.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">deal buzz</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/four.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">carlson</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/five.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">richie rich</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/one.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Tupakula Vijay</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="test14" class="col-md-12 no_padding">
                    <div class="mail_list">
                        <ul class="list-unstyled mails_holder">
                            <li>
                                <a href="#">
                                    <div class="message_list_block starred">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/two.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Henry richards</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Research have been going on the project will report the results asap in a few days.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block starred">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/ten.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Romeo roadie</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>waiting for your approval, many pending verifications!!</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block starred">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/eight.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Jonny</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Help me urgent.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block starred">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/six.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">pretty</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>login have been going on the project will report the results asap in a few days.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block starred">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/two.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Henry richards</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Research have been going on the project will report the results asap in a few days.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- mail_list -->
                </div>
                <div id="test15" class="col-md-12 no_padding">
                    <div class="mail_list">
                        <ul class="list-unstyled mails_holder">
                            <li>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/two.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Henry richards</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatRedc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Research have been going on the project will report the results asap in a few days.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/one.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Hola fan</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/seven.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Nemo</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/eight.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">Tupakula Vijay</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/nine.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">lucky</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message_list_block">
                                        <div class="left">
                                            <div class="avatar_holder">
                                                <img src="assets/images/avatar/one.png" alt="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="name">venky</span>
                                            <div class="pull-right right_details">
                                                <ul class="list-unstyled list-inline">
                                                    <li>12:30</li>
                                                    <li><i class="ion ion-record flatGreenc status"></i>
                                                    </li>
                                                    <li><i class="ion-android-attach"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4>Searching for the best cafe around ?? come to meet at given location.</h4>
                                        </div>
                                        <!-- right -->
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- mail-list -->
                </div>
            </div>
        </div>
    </div>
    <!-- /panel -->
</div>
<!-- col-md-6 -->
<?php 
$s0=$bdd->query("SELECT maladie,count(id) as nb FROM `consultation` GROUP BY maladie ORDER BY nb DESC limit 3");
$r=$s0->fetchAll();
if(!$r){?>
<div class="col-md-4 nopad-right">
    <div class="piluku-panel no-pad panel">
        <div class="sparkline-widget">
            <div class="heading-info flatRed">
			
                <p class="pull-left">
                    <br>
                </p>
                <p class="pull-right right"> </i>
                </p>
            </div>
            <div class="svg-holder flatRed">
                <div class="line"></div>
                <svg id="chart1" class="sparkline"></svg>
            </div>
			 <div class="info-bottom">
                <div class="col-md-4 left">
                  Maladie  
                    <p class="flatRedc">La maladie n° 1</p>
                </div>
                <div class="col-md-4 left">
                    Patients
                    <p class="flatRedc">
				    N° des patiants
				 </p>
                </div>
				 <div class="col-md-4 left">
                    %
                    <p class="flatRedc"></p>
                </div>
            </div>
           </div>
        <!-- sparkline-widget -->
    </div>
    <!-- panel -->
</div>
<!-- col-md-6 -->

<div class="col-md-4 nopad-right">
    <div class="piluku-panel no-pad panel">
        <div class="sparkline-widget">
            <div class="heading-info flatGreen">
                <p class="pull-left">
                    <br>
                </p>
                <p class="pull-right right"> </i>
                </p>
            </div>
            <div class="svg-holder flatGreen">
                <div class="line"></div>
                <svg id="chart2" class="sparkline"></svg>
            </div>
			 <div class="info-bottom">
                <div class="col-md-4 left">
                  Maladie  
                    <p class="flatGreenc"> La maladie n° 2</p>
                </div>
                <div class="col-md-4 left">
                    Patients
                    <p class="flatGreenc">
					 N° des patiants</p>
                </div>
				 <div class="col-md-4 left">
                    %
                    <p class="flatGreenc"></p>
                </div>
            </div>
			
            </div>
        <!-- sparkline-widget -->
    </div>
    <!-- panel -->
</div>
<!-- col-md-6 -->

<div class="col-md-4 nopad-right">
    <div class="piluku-panel no-pad panel">
        <div class="sparkline-widget">
            <div class="heading-info flatOrange">
                <p class="pull-left">
                    <br>
                </p>
                <p class="pull-right right"></i>
                </p>
            </div>
            <div class="svg-holder flatOrange">
                <div class="line"></div>
                <svg id="chart3" class="sparkline"></svg>
            </div>
			<div class="info-bottom">
                <div class="col-md-4 left">
                  Maladie  
                    <p class="flatOrangec">La maladie n° 3</p>
                </div>
                <div class="col-md-4 left">
                    Patients
                    <p class="flatOrangec"> N° des patiants</p>
                </div>
				 <div class="col-md-4 left">
                    %
                    <p class="flatOrangec"></p>
                </div>
            </div>
          </div>
        <!-- sparkline-widget -->
    </div>
    <!-- panel -->
</div>
<!-- col-md-6 -->


<?php 


}
else{
// chart1 print_r($r[0]);
// chart2 print_r($r[1]);
// chart3 print_r($r[2]);
if(isset($r[0])){$m1= $r[0]['maladie'];
$nb1= $r[0]['nb'];
}else {$m1="";$nb1="";}


if(isset($r[1])){$nb2= $r[1]['nb'];
$m2= $r[1]['maladie'];
}else {$m2="";$nb2="";}

if(isset($r[2])){
$nb3= $r[2]['nb'];
$m3= $r[2]['maladie'];
}
else {$m3="";$nb3="";}
$s00=$bdd->query("SELECT count(id) as nb FROM `patiant` ");
$r00=$s00->fetch();
$t=$r00['nb'];
$s00->closeCursor();
?>

<div class="col-md-4 nopad-right">
    <div class="piluku-panel no-pad panel">
        <div class="sparkline-widget">
            <div class="heading-info flatRed">
			
                <p class="pull-left"><?php echo $m1;?>
                    <br>
                </p>
                <p class="pull-right right"> <i class="ion-android-arrow-dropup flatGreenc"></i>
                </p>
            </div>
            <div class="svg-holder flatRed">
                <div class="line"></div>
                <svg id="chart1" class="sparkline"></svg>
            </div>
			 <div class="info-bottom">
                <div class="col-md-4 left">
                  Maladie  
                    <p class="flatRedc"><?php echo $m1;?></p>
                </div>
                <div class="col-md-4 left">
                    Patients
                    <p class="flatRedc"><?php 
                     $s01=$bdd->query("SELECT DISTINCT idp as ff FROM `consultation` WHERE maladie='$m1'");
                     $q=$s01->rowCount();
					 echo $q;
					 $s01->closeCursor();
				 ?></p>
                </div>
				 <div class="col-md-4 left">
                    %
                    <p class="flatRedc"><?php echo $q*100/$t;?></p>
                </div>
            </div>
           </div>
        <!-- sparkline-widget -->
    </div>
    <!-- panel -->
</div>
<!-- col-md-6 -->

<div class="col-md-4 nopad-right">
    <div class="piluku-panel no-pad panel">
        <div class="sparkline-widget">
            <div class="heading-info flatGreen">
                <p class="pull-left"><?php echo $m2;?>
                    <br>
                </p>
                <p class="pull-right right">4% <i class="ion-android-arrow-dropdown flatRedc"></i>
                </p>
            </div>
            <div class="svg-holder flatGreen">
                <div class="line"></div>
                <svg id="chart2" class="sparkline"></svg>
            </div>
			 <div class="info-bottom">
                <div class="col-md-4 left">
                  Maladie  
                    <p class="flatGreenc"><?php echo $m2;?></p>
                </div>
                <div class="col-md-4 left">
                    Patients
                    <p class="flatGreenc"><?php 
                     $s02=$bdd->query("SELECT DISTINCT idp as ff FROM `consultation` WHERE maladie='$m2'");
                     $q1=$s02->rowCount();
					 echo $q1;
					 $s02->closeCursor();
				 ?></p>
                </div>
				 <div class="col-md-4 left">
                    %
                    <p class="flatGreenc"><?php echo $q1*100/$t;?></p>
                </div>
            </div>
			
            </div>
        <!-- sparkline-widget -->
    </div>
    <!-- panel -->
</div>
<!-- col-md-6 -->

<div class="col-md-4 nopad-right">
    <div class="piluku-panel no-pad panel">
        <div class="sparkline-widget">
            <div class="heading-info flatOrange">
                <p class="pull-left"><?php echo $m3;?>
                    <br>
                </p>
                <p class="pull-right right">9% <i class="ion-android-arrow-dropup flatGreenc"></i>
                </p>
            </div>
            <div class="svg-holder flatOrange">
                <div class="line"></div>
                <svg id="chart3" class="sparkline"></svg>
            </div>
			<div class="info-bottom">
                <div class="col-md-4 left">
                  Maladie  
                    <p class="flatOrangec"><?php echo $m3;?></p>
                </div>
                <div class="col-md-4 left">
                    Patients
                    <p class="flatOrangec"><?php 
                     $s02=$bdd->query("SELECT DISTINCT idp as ff FROM `consultation` WHERE maladie='$m3'");
                     $q11=$s02->rowCount();
					 echo $q11;
					 $s02->closeCursor();
				 ?></p>
                </div>
				 <div class="col-md-4 left">
                    %
                    <p class="flatOrangec"><?php echo $q11*100/$t;?></p>
                </div>
            </div>
          </div>
        <!-- sparkline-widget -->
    </div>
    <!-- panel -->
</div>
<!-- col-md-6 -->

<?php }?>

<div class="col-md-4 col-sm-6 col-xs-12 nopad-right">
    <!-- panel -->
    <div class="panel panel-piluku">
        <div class="panel-heading">
            <h3 class="panel-title">
                Monthly Earnings
                <span class="panel-options">
                   <a href="#" class="panel-refresh">
                      <i class="icon ti-reload"></i> 
                  </a>
                  <a href="#" class="panel-minimize">
                      <i class="icon ti-angle-up"></i> 
                  </a>
                  <a href="#" class="panel-close">
                      <i class="icon ti-close"></i> 
                  </a>
              </span>
          </h3>
      </div>
      <div class="panel-body">
        <div class="row small-bar-chart">
            <div class="ct-chart ct-minor-seventh chart-height monthly-earning-chart" id="small_bar_chart"></div>
            <ul class="list-unstyled  info_section list-inline">
                <li>
                    <div class="circle flatBluec"></div>mobiles
                </li>
                <li>
                    <div class="circle flatBluec2"></div>Tabs
                </li>
                <li>
                    <div class="circle flatBluec3"></div>Laptops
                </li>
            </ul>
            <ul class="market_info_holder list-unstyled">
                <li>
                    <div class="col-md-4 market_info">
                        <h2>Apple inc</h2>
                        <div class="status flatRedc">101$ <i class="ion-arrow-down-b"></i> 
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col-md-4 market_info">
                        <h2>Sony inc</h2>
                        <div class="status flatGreenc">306$ <i class="ion-arrow-up-b"></i> 
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col-md-4 market_info">
                        <h2>Htc inc</h2>
                        <div class="status flatRedc">112$ <i class="ion-arrow-down-b"></i> 
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /row -->
    </div>
</div>
<!-- /panel -->
</div>
<!-- col-md-3 -->

<div class="col-md-4 col-sm-6 col-xs-12 nopad-right">
    <!-- panel -->
    <div class="panel panel-piluku">
        <div class="panel-heading">
            <h3 class="panel-title">
                Website visitors
                <span class="panel-options">
                   <a href="#" class="panel-refresh">
                      <i class="icon ti-reload"></i> 
                  </a>
                  <a href="#" class="panel-minimize">
                      <i class="icon ti-angle-up"></i> 
                  </a>
                  <a href="#" class="panel-close">
                      <i class="icon ti-close"></i> 
                  </a>
              </span>
          </h3>
      </div>
      <div class="panel-body">
        <div class="row small_pie_chart">
            <ul class="tabs light-tab">
                <li class="tab col-md-4"><a href="#market1" class="active">Graphical</a>
                </li>
                <li class="tab col-md-4"><a href="#market2">Progress</a>
                </li>
                <li class="tab col-md-4"><a href="#market3">Quote</a>
                </li>
            </ul>
            <div class="content-holder">
                <div id="market1" class="col-md-12 no_padding">
                    <div class="ct-chart ct-golden-section chart-height website-visits" id="small_pie_chart"></div>
                    <ul class="list-unstyled  info_section list-inline">
                        <li>
                            <i class="ion ion-record flatOrangec"></i> Motorola
                        </li>
                        <li>
                            <i class="ion ion-record flatRedc"></i> Keen labs
                        </li>
                        <li>
                            <i class="ion ion-record flatBluec"></i> Facebook
                        </li>
                    </ul>
                </div>
                <div id="market2" class="col-md-12 no_padding">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">January Result
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">Feb Result
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">March Result
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">April Result
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">May Result
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">Present Result
                        </div>
                    </div>
                </div>
                <div id="market3" class="col-md-12 no_padding">
                    <h4>Documented</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora at, aliquid porro, voluptate maiores fugiat? Tempore adipisci excepturi dolores provident doloremque, eum quis placeat, cupiditate laudantium ipsam atque repellendus, error.</p>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
</div>
<!-- /panel -->
</div>
<!-- col-md-3 -->

<div class="col-md-4 col-sm-6 col-xs-12 nopad-right">
    <div class="piluku-panel no-pad todo_widget panel">
        <div class="todo_heading">
            <div class="left-icon">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-all" id="todo">
                    <label for="todo"><span></span></label>
                </div>
            </div>
            Todo
            <a href="#" class="right-icon">
                <i class="ion-ios-bell"></i>
            </a>
        </div>
        <ul class="list-group list-todo">
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo1">
                    <label for="todo1"><span></span>Call Head branch</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo2">
                    <label for="todo2"><span></span>check the postings</label>
                </div>
                <div class="notification">
                    <i class="ion-ios-bell-outline"></i>
                </div>
            </li>
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo3">
                    <label for="todo3"><span></span>Recharge the Battery</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo4">
                    <label for="todo4"><span></span>Jog for 30 minutes</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo5">
                    <label for="todo5"><span></span>Check for updates</label>
                </div>
                <div class="notification">
                    <i class="ion-ios-bell-outline"></i>
                </div>
            </li>
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo6">
                    <label for="todo6"><span></span>call for tim</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo7">
                    <label for="todo7"><span></span>Fix bugs</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="ms-hover">
                    <input type="checkbox" class="mark-complete" id="todo8">
                    <label for="todo8"><span></span>Send mail</label>
                </div>
            </li>
            <li class="list-group-item add-to-input">
                <input type="text" class="form-control" name="add_todo" id="add_todo" placeholder="Add new task here...">
            </li>
        </ul>
    </div>
    <!-- panel -->
</div>
<!-- col-md-6 -->


</div>
<!-- row -->
</div>

</div>  

	<div class="side-bar right-bar ">
		<div class="contacts">
			<div class="col col-md-12">
				<ul class="tabs">
					<li class="tab col-md-3"><a href="#test1" class="active">Chat</a></li>
					<li class="tab col-md-3"><a href="#test2">Settings</a></li>
					<li class="tab col-md-3"><a href="#test3">Messages</a></li>
				</ul>
			</div>
			<div class="content-holder">
				<div id="test1" class="col-md-12 no_padding">					
					<div class="panel-body no_padding">
						<div class="panel-group piluku-accordion piluku-accordion-two" id="accordionOne" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingModalOne">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordionOne" href="#collapseModalOne" aria-expanded="true" aria-controls="collapseOne">
											Online <i class="chevron ti-angle-down"></i>
										</a>
									</h4>
								</div>
								<div id="collapseModalOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body no_padding">
										<ul class="list-group contacts-list">
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/one.png" alt="">
													</div>
													<span class="name">Richards carlson</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/two.png" alt="">
													</div>
													<span class="name">Firing Arc</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/three.png" alt="">
													</div>
													<span class="name">strapzen</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/four.png" alt="">
													</div>
													<span class="name">Reeves</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/five.png" alt="">
													</div>
													<span class="name">Bootstrap Guru</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/six.png" alt="">
													</div>
													<span class="name">Carlson</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/seven.png" alt="">
													</div>
													<span class="name">Paris hilton</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/eight.png" alt="">
													</div>
													<span class="name">Henry Richards</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/nine.png" alt="">
													</div>
													<span class="name">Richie Rich</span>
													<i class="ion ion-record online"></i>
												</a>
											</li>

										</ul>	
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingModalTwo">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordionOne" href="#collapseModalTwo" aria-expanded="false" aria-controls="collapseTwo">
											offline
										</a>
									</h4>
								</div>
								<div id="collapseModalTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo">
									
									<div class="panel-body no_padding">
										<ul class="list-group contacts-list">
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/one.png" alt="">
													</div>
													<span class="name">Richards carlson</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/two.png" alt="">
													</div>
													<span class="name">Firing Arc</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/three.png" alt="">
													</div>
													<span class="name">strapzen</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/four.png" alt="">
													</div>
													<span class="name">Reeves</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/five.png" alt="">
													</div>
													<span class="name">Bootstrap Guru</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/six.png" alt="">
													</div>
													<span class="name">Carlson</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/seven.png" alt="">
													</div>
													<span class="name">Paris hilton</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/eight.png" alt="">
													</div>
													<span class="name">Henry Richards</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/nine.png" alt="">
													</div>
													<span class="name">Richie Rich</span>
													<i class="ion ion-record offline"></i>
												</a>
											</li>

										</ul>	
									</div>
									
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingModalThree">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordionOne" href="#collapseModalThree" aria-expanded="false" aria-controls="collapseThree">
											Away
										</a>
									</h4>
								</div>
								<div id="collapseModalThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">									
									<div class="panel-body no_padding">
										<ul class="list-group contacts-list">
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/one.png" alt="">
													</div>
													<span class="name">Richards carlson</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/two.png" alt="">
													</div>
													<span class="name">Firing Arc</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/three.png" alt="">
													</div>
													<span class="name">strapzen</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/four.png" alt="">
													</div>
													<span class="name">Reeves</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/five.png" alt="">
													</div>
													<span class="name">Bootstrap Guru</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/six.png" alt="">
													</div>
													<span class="name">Carlson</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/seven.png" alt="">
													</div>
													<span class="name">Paris hilton</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/eight.png" alt="">
													</div>
													<span class="name">Henry Richards</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
											<li class="list-group-item">
												<a href="#">
													<div class="avatar">
														<img src="assets/images/avatar/nine.png" alt="">
													</div>
													<span class="name">Richie Rich</span>
													<i class="ion ion-record away"></i>
												</a>
											</li>
										</ul>	
									</div>
								</div>
							</div>
						</div>	
					</div> 
				</div>
				<div id="test2" class="col-md-12 no_padding">
				<br>										
					<div class="form-group">
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">Reminders</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">theme options</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch1" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch1"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">dark / light theme</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch2" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch2"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">Email Updates</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch3" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch3"><i></i>
									</label>
								</div>
							</div>
						</div>
						<div class="toggle-switch">
							<label class="col-sm-8 control-label">Notifications</label>
							<div class="col-sm-4">
								<input type="checkbox" class="mark-complete" id="toggle-switch4" name="" value="" checked="">
								<div class="toggle">
									<label for="toggle-switch4"><i></i>
									</label>
								</div>
							</div>
						</div>							

						<div class="form-group check-radio">
							<label class="col-sm-9 control-label">Loader animation</label>
							<div class="col-sm-3">
								<ul class="list-inline checkboxes-radio">
									<li class="ms-hover">
										<input type="checkbox" class="mark-complete" id="c1">
										<label for="c1"><span></span></label>
									</li>                                                                               
								</ul>
							</div>
						</div>
						<div class="form-group check-radio">
							<label class="col-sm-9 control-label">delay load</label>
							<div class="col-sm-3">
								<ul class="list-inline checkboxes-radio">
									<li class="ms-hover">
										<input type="checkbox" class="mark-complete" id="c2">
										<label for="c2"><span></span></label>
									</li>                                                                               
								</ul>
							</div>
						</div>
						<div class="form-group check-radio">
							<label class="col-sm-9 control-label">Graphs animations</label>
							<div class="col-sm-3">
								<ul class="list-inline checkboxes-radio">
									<li class="ms-hover">
										<input type="checkbox" class="mark-complete" id="c3" checked="">
										<label for="c3"><span></span></label>
									</li>                                                                               
								</ul>
							</div>
						</div>
					</div>						
				</div>
				<div id="test3" class="col-md-12 no_padding">
					<div class="heading no_border_bottom">
						Todays
						<div class="left"><a href="#"><i class="ion-android-refresh"></i></a></div>
						<div class="right"><a href="#"><i class="ion-gear-a"></i></a></div>						
					</div>
					<div class="list-group message-list">
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">henry richards</h4>
							<p class="list-group-item-text">has pushed all the code to github and saved some fixes too..</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">mary </h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto accusamus officiis vero magnam amet, quas corru</p>
						</a>							
					</div>	
					<div class="heading no_border_bottom">
						june 15 1990
						<div class="left"><a href="#"><i class="ion-android-refresh"></i></a></div>
						<div class="right"><a href="#"><i class="ion-gear-a"></i></a></div>						
					</div>
					<div class="list-group message-list">
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">henry richards</h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto accusamus officiis vero magnam amet, quas corru</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">mary </h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto accusamus officiis vero magnam amet, quas corru</p>
						</a>							
					</div>	
				</div>
			</div>
			<!-- content_holder -->
		</div>
	</div>
	<!-- /Right-bar -->
</div>
<!-- wrapper -->

<script src='assets/js/jquery-ui-1.10.3.custom.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src='assets/js/jquery.nicescroll.min.js'></script>
<script src='assets/js/wow.min.js'></script>
<script src='assets/js/jquery.loadmask.min.js'></script>
<script src='assets/js/jquery.accordion.js'></script>
<script src='assets/js/materialize.js'></script>
<script src='assets/js/chartist.min.js'></script>
<script>////////////////////////////////////////////////////////////////////////////// chart js
	var chart = new Chartist.Line('#main_chart', {
		<?php


$sel0=$bdd->query("SELECT DAY(LAST_DAY(NOW())) as nn");
$s0=$sel0->fetch();
$sel1=$bdd->query("SELECT month(NOW()) as nn");
$s1=$sel1->fetch();

$nbjour=$s0['nn'];
$moist=$s1['nn'];
$moisp=$s1['nn']-1;

$label="";
$serie1="";
$serie2="";
for($i=1;$i<=$nbjour;$i++){
$sel2=$bdd->query("select count(id) as v from rdv where date BETWEEN '2015-$moisp-$i 00:00:00' AND '2015-$moisp-$i 23:59:00'");
$s2=$sel2->fetch();

$label.='\''.$i.'\',';	
$serie1.=$s2['v'].',';	

$sel3=$bdd->query("select count(id) as v from rdv where date BETWEEN '2015-$moist-$i 00:00:00' AND '2015-$moist-$i 23:59:00'");
$s3=$sel3->fetch();

$serie2.=$s3['v'].',';
}
$label=substr($label,0,strlen($label)-1);
$serie1=substr($serie1,0,strlen($serie1)-1);
$serie2=substr($serie2,0,strlen($serie2)-1);



?>

		labels: [<?php echo $label; ?>],
		series: [
		[<?php echo $serie1; ?>],
		[<?php echo $serie2; ?>]
		]
	}, {
		low: 0
	});

// Let's put a sequence number aside so we can use it in the event callbacks
var seq = 0,
delays = 40,
durations = 200;

// Once the chart is fully created we reset the sequence
chart.on('created', function() {
	seq = 0;
});

// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
chart.on('draw', function(data) {
	seq++;

	if(data.type === 'line') {
    // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
    data.element.animate({
    	opacity: {
        // The delay when we like to start the animation
        begin: seq * delays + 1000,
        // Duration of the animation
        dur: durations,
        // The value where the animation should start
        from: 0,
        // The value where it should end
        to: 1
    }
});
} else if(data.type === 'label' && data.axis === 'x') {
	data.element.animate({
		y: {
			begin: seq * delays,
			dur: durations,
			from: data.y + 100,
			to: data.y,
        // We can specify an easing function from Chartist.Svg.Easing
        easing: 'easeOutQuart'
    }
});
} else if(data.type === 'label' && data.axis === 'y') {
	data.element.animate({
		x: {
			begin: seq * delays,
			dur: durations,
			from: data.x - 100,
			to: data.x,
			easing: 'easeOutQuart'
		}
	});
} else if(data.type === 'point') {
	data.element.animate({
		x1: {
			begin: seq * delays,
			dur: durations,
			from: data.x - 10,
			to: data.x,
			easing: 'easeOutQuart'
		},
		x2: {
			begin: seq * delays,
			dur: durations,
			from: data.x - 10,
			to: data.x,
			easing: 'easeOutQuart'
		},
		opacity: {
			begin: seq * delays,
			dur: durations,
			from: 0,
			to: 1,
			easing: 'easeOutQuart'
		}
	});
} else if(data.type === 'grid') {
    // Using data.axis we get x or y which we can use to construct our animation definition objects
    var pos1Animation = {
    	begin: seq * delays,
    	dur: durations,
    	from: data[data.axis + '1'] - 30,
    	to: data[data.axis + '1'],
    	easing: 'easeOutQuart'
    };

    var pos2Animation = {
    	begin: seq * delays,
    	dur: durations,
    	from: data[data.axis + '2'] - 100,
    	to: data[data.axis + '2'],
    	easing: 'easeOutQuart'
    };

    var animations = {};
    animations[data.axis + '1'] = pos1Animation;
    animations[data.axis + '2'] = pos2Animation;
    animations['opacity'] = {
    	begin: seq * delays,
    	dur: durations,
    	from: 0,
    	to: 1,
    	easing: 'easeOutQuart'
    };

    data.element.animate(animations);
}
});

// For the sake of the example we update the chart every time it's created with a delay of 10 seconds
chart.on('created', function() {
	if(window.__exampleAnimateTimeout) {
		clearTimeout(window.__exampleAnimateTimeout);
		window.__exampleAnimateTimeout = null;
	}
	window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 102000);
});


// second chart


new Chartist.Bar('#small_bar_chart', {
  labels: ['jan', 'Feb', 'Mar', 'Aprl','June','July','Aug', 'Oct'],
  series: [
    [800000, 1200000, 1400000, 1300000, 1000000,1300000,1300000],
    [200000, 400000, 500000, 300000, 1000000,1300000,1300000],
    [100000, 200000, 400000, 600000, 1000000,1300000,1300000]
  ]
}, {
  stackBars: true,
  axisY: {
    labelInterpolationFnc: function(value) {
      return (value / 1000) + 'k';
    }
  }
}).on('draw', function(data) {
  if(data.type === 'bar') {
    data.element.attr({
      style: 'stroke-width: 6px'
    });    
  }
});



// bar_chart
// var chart = new Chartist.Bar('#small_chart', {
//   labels: [1, 2, 3, 4, 5],
//   series: [[1, 2, 3, 4], [2, 3, 5, 2]]
// });

// chart.on('draw', function(data) {
//   if(data.type === 'bar') {
//     data.element.animate({
//       y2: {
//         dur: 1000,
//         from: data.y1,
//         to: data.y2,
//         easing: Chartist.Svg.Easing.easeOutQuint
//       },
//       opacity: {
//         dur: 1000,
//         from: 0,
//         to: 1,
//         easing: Chartist.Svg.Easing.easeOutQuint
//       }
//     });
//   }
// });


// sine chart
var data = {
  series: [5, 3, 4]
};

var sum = function(a, b) { return a + b };

new Chartist.Pie('#small_pie_chart', data, {
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  }
});



</script>
<script src='assets/js/build/d3.min.js'></script>
<script src='assets/js/nvd3/nv.d3.js'></script>
<script >
<?php 
$s0=$bdd->query("SELECT maladie,count(id) as nb FROM `consultation` GROUP BY maladie ORDER BY nb DESC limit 3");
$r=$s0->fetchAll();
// chart1 print_r($r[0]);
// chart2 print_r($r[1]);
// chart3 print_r($r[2]);
$m1= $r[0]['maladie'];
$nb1= $r[0]['nb'];

$nb2= $r[1]['nb'];
$m2= $r[1]['maladie'];

$nb3= $r[2]['nb'];
$m3= $r[2]['maladie'];


?>
function defaultChartConfig(containerId, data) {
    nv.addGraph(function() {

        var chart = nv.models.sparklinePlus()
        chart.margin({left:30})
        .x(function(d,i) { return i })
        .xTickFormat(function(d) {
            return d3.time.format('%x')(new Date(data[d].x))
        });

        d3.select(containerId)
        .datum(data)
        .transition().duration(250)
        .call(chart);

        return chart;
    });
}

defaultChartConfig("#chart1",sine());
defaultChartConfig("#chart2", volatileChart1(2, 0.02,2));
defaultChartConfig("#chart3", volatileChart2(1, 0.9,2));

function sine() {
    var sin = [];
    var now =new Date();
<?php 
$s1=$bdd->query("SELECT COUNT(id) as dd,DATE_FORMAT(date,'%m-%d-%Y') as ff,maladie FROM `consultation` where maladie='$m1' GROUP BY DATE_FORMAT(date,'%m-%d-%Y')");
while($r1=$s1->fetch()){ 

$x=$r1['ff'];
$y=$r1['dd'];
 

?>
         
        sin.push({ <?php echo "x: '$x'";?>, <?php echo "y: $y";?>});
                                                             

<?php } ?>
    

    return sin;
}

function volatileChart1(startPrice, volatility, numPoints) {
    var rval =  [];
    var now =new Date();
    numPoints = numPoints || 100;
   
	<?php 
$s1=$bdd->query("SELECT COUNT(id) as dd,DATE_FORMAT(date,'%m-%d-%Y') as ff,maladie FROM `consultation` where maladie='$m2' GROUP BY DATE_FORMAT(date,'%m-%d-%Y')");
while($r1=$s1->fetch()){ 

$x=$r1['ff'];
$y=$r1['dd'];
 

?>
         
        rval.push({ <?php echo "x: '$x'";?>, <?php echo "y: $y";?>});
                                                             

<?php } ?>
  
    return rval;
}
function volatileChart2(startPrice, volatility, numPoints) {
    var rval =  [];
    var now =new Date();
    numPoints = numPoints || 100;
   
	<?php 
$s1=$bdd->query("SELECT COUNT(id) as dd,DATE_FORMAT(date,'%m-%d-%Y') as ff,maladie FROM `consultation` where maladie='$m3' GROUP BY DATE_FORMAT(date,'%m-%d-%Y')");
while($r1=$s1->fetch()){ 

$x=$r1['ff'];
$y=$r1['dd'];
 

?>
         
        rval.push({ <?php echo "x: '$x'";?>, <?php echo "y: $y";?>});
                                                             

<?php } ?>
  
    return rval;
}
</script>
<script src='assets/js/bic_calendar.js'></script>
<script src='assets/js/widgets.js'></script>
<script src='assets/js/core.js'></script>

<script src="assets/js/jquery.countTo.js"></script>
</body>
</html>
<?php }
else {header("Location: signin.php");} ?>