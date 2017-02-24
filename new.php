<?php 
require_once("connect.php");
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

$m1= $r[0]['maladie'];
$nb1= $r[0]['nb'];

$nb2= $r[1]['nb'];
$m2= $r[1]['maladie'];

$nb3= $r[2]['nb'];
$m3= $r[2]['maladie'];


$s00=$bdd->query("SELECT count(id) as nb FROM `patiant` ");
$r00=$s00->fetch();
$t=$r00['nb'];
$s00->closeCursor();}
?>
