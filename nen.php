<?php 
require_once('connect.php');
/*
if(isset($_POST['hidden_data'])&&isset($_FILES['img'])){
	    $sex=$_POST["sex"];
		echo $sex;
		$img2=$_FILES['img']['name'];
		$img_tmp=$_FILES['img']['tmp_name'];
	    $insert=$bdd->query("SELECT MAX(id) as imid FROM `patiant`");
		$ii=$insert->fetch();
		$idp=$ii['imid']+1;
	if($_POST['hidden_data']=="" && empty($img_tmp)){
		echo "2 fergin";
		
		$t="png";
		header("Centent-type: image/png");
        $image=imagecreate(200,200);
		if($sex=="homme"){
			$image=imagecreatefrompng("assets/images/avatar/ten.png");
        imagepng($image,"assets/patient/".$idp.".png");
		}
		else{ $image=imagecreatefrompng("assets/images/avatar/six.png");
        imagepng($image,"assets/patient/".$idp.".png");}
       
	}
	if($_POST['hidden_data']=="" && !empty($img_tmp)){
		echo "taswira";
		/*if(!empty($img_tmp)){
			$image=explode('.',$img2);
			$image_ext=end($image);
			if(in_array(strtolower($image_ext),array('png','jpg','jpeg'))===false){ header('Location: ajoutpatiant.php?err=2');}else{
				$image_size=getimagesize($img_tmp);
				if($image_size['mime']=='image/jpeg')
				{$image_src=imagecreatefromjpeg($img_tmp);
			      $t="jpg";}
				
				elseif($image_size['mime']=='image/png')
				{$image_src=imagecreatefrompng($img_tmp);
				 $t="png";}
				else{$image_src=false;
				echo 'entrer uneimage valide';}
				$image_final=$image_src;
				
				imagejpeg($image_final,'assets/patient/'.$idp.'.jpg');			
				
				
				
				}
			
			}else{echo 'het taswira';}
	*/
/*	}
    if($_POST['hidden_data']!="" && empty($img_tmp)){
		echo "ssssssssssssssssss";
		$upload_dir = "assets/patient/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $idp . ".png";

$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
$t="png";
echo $t;
		
	}
	}
	
	
	
	 $select=$bdd->prepare("SELECT * FROM `patiant` ");
								 $select->execute();
								 while($s1=$select->fetch()){
	
								 if($s1['typeimg']=='jpg'){echo '<img height="250" width="270" src=assets/patient/'.$s1['id'].'.jpg />';}else{echo '<img  height="250" width="270" src=assets/patient/'.$s1['id'].'.png />';}}
*/

$idp=38;
$y="";
$x="";
$a="";
$r=$bdd->query("SELECT * FROM statp where idp = $idp");
while($rr=$r->fetch()){
	$y .=$rr["poids"].',';
	$x++;
	
	
	
}
$y =  substr($y,0,strlen($y)-1);
echo $y;
echo $x;
for($i=0;$i<$x;$i++){
	$a.=$i.',';
}

$a =  substr($a,0,strlen($a)-1);

echo $a;

?>