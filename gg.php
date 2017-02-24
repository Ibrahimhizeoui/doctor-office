<?php 
require_once('connect.php');
$idp=$_GET['idp'];
$date=$_POST['date'];

$m=explode("/",$date);
		print_r($m);
		$d=$m[2].'/'.$m[0].'/'.$m[1];
		$time=$_POST['time'];
		$nature=$_POST['nature'];
		$cc= $d.' '.$time.':00';
echo $cc;
		$s=$bdd->query("select * from consultation WHERE   date BETWEEN  DATE_SUB('$cc', INTERVAL 45 MINUTE) AND DATE_ADD('$cc', INTERVAL 45 MINUTE)");
$d=$s->fetch();
if(!$d){
	print_r($d);
	echo "ffff";
	
	//header("Location: consultation.php?idp=$idp&amp;err");
}
else{
     header("Location: consultation.php?idp=$idp&err=1");

	echo "nn";
}
?>