 <?php 

require_once('connect.php');
if(isset($_POST['submit']))
{
	
	if(isset($_POST['sex'])&&isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['datenaissance'])&&isset($_POST['adress'])&&isset($_POST['tel'])&&isset($_POST['tel'])&&isset($_POST['ville'])&&isset($_POST['pays'])&&isset($_POST['lieu'])&&isset($_POST['taille'])&&isset($_POST['poids'])&&isset($_POST['sang'])&&isset($_POST['nomass'])&&isset($_POST['typeass'])&&isset($_POST['datevalid']))
	{
		
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$datenaissance=$_POST['datenaissance'];
		$sex=$_POST['sex'];
		$adress=$_POST['adress'];
		$ville=$_POST['ville'];
		$pays=$_POST['pays'];
		$nomass=$_POST['nomass'];
		$typeass=$_POST['typeass'];
		$datevalid=$_POST['datevalid'];
		$taille=$_POST['taille'];
		$sang=$_POST['sang'];
		$lieu=$_POST['lieu'];
		$tel=$_POST['tel'];
		$email =$_POST['email'];
	
		/// image 
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
		if(!empty($img_tmp)){
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
	
	}
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
	$typeimg=$t;
	
		echo $typeimg;
		echo $idp;
		
		$insert0=$bdd->prepare("INSERT INTO `patiant`  VALUES (NULL, :n1, :n2, :n3, :n4,:n5,:n6,:n7,:n8,:n9,:n10,:n11,:n13)");
	    $insert0->execute(array(':n1'=>$nom,':n2'=>$prenom,':n3'=>$datenaissance,':n4'=>$lieu,':n5'=>$sang,':n6'=>$sex,':n7'=>$tel,':n8'=>$email,':n9'=>$adress,':n10'=>$ville,':n11'=>$pays,':n13'=>$typeimg));
		
			
			
			$insert3=$bdd->prepare("INSERT INTO `assurance`  VALUES (NULL,:n17,:n18,:n19,:n20)");
		    $insert3->execute(array(':n17'=>$nomass,':n18'=>$typeass,':n19'=>$datevalid,':n20'=>$idp));
			
		header('Location: listpat.php');
	}
	else{
		header('Location: ajoutpatiant.php?err=1');
		}
	
	
}
if(isset($_POST['modifier'])&&isset($_GET['id'])){
	$idm=$_GET['id'];
	
	if(isset($_POST['sex'])&&isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['datenaissance'])&&isset($_POST['adress'])&&isset($_POST['tel'])&&isset($_POST['tel'])&&isset($_POST['ville'])&&isset($_POST['pays'])&&isset($_POST['lieu'])&&isset($_POST['taille'])&&isset($_POST['poids'])&&isset($_POST['sang']))
	{
	
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$datenaissance=$_POST['datenaissance'];
		$sex=$_POST['sex'];
		$adress=$_POST['adress'];
		$ville=$_POST['ville'];
		$pays=$_POST['pays'];
		$nomass=$_POST['nomass'];
		$typeass=$_POST['typeass'];
		$datevalid=$_POST['datevalid'];
		$taille=$_POST['taille'];
		$poids=$_POST['poids'];
		$sang=$_POST['sang'];
		$lieu=$_POST['lieu'];
		$email=$_POST['email'];
		$tel=$_POST['tel'];
		$img=$_FILES['img']['name'];
		$img_tmp=$_FILES['img']['tmp_name'];
		$t="png";
		/// image 
		if(isset($_POST['hidden_data'])&&isset($_FILES['img'])){
	    $sex=$_POST["sex"];
		echo $sex;
		$img2=$_FILES['img']['name'];
		$img_tmp=$_FILES['img']['tmp_name'];
	  
	if($_POST['hidden_data']=="" && empty($img_tmp)){
		echo "2 fergin";
		
		
       
	}
	if($_POST['hidden_data']=="" && !empty($img_tmp)){
		echo "taswira";
		if(!empty($img_tmp)){
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
				
				imagejpeg($image_final,'assets/patient/'.$idm.'.jpg');			
				
				
				
				}
			
			}else{echo 'het taswira';}
	
	}
    if($_POST['hidden_data']!="" && empty($img_tmp)){
		echo "ssssssssssssssssss";
		$upload_dir = "assets/patient/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $idm . ".png";

$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
$t="png";
echo $t;
		
	}
	}
	//$typeimg=$t;
	
		
		print_r($_POST);
		echo $t;	
		$update=$bdd->prepare("UPDATE `patiant` SET `nom` = :n1, `prenom` = :n2, `datenaissance` = :n3, `lieu` = :n4, `sang` =:n5,`sex` = :n6, `tel` =:n7, `email` = :n8, `adress` = :n9, `ville` = :n10, `pays` =:n11,typeimg= :n20  WHERE `id` = $idm");
		$update->execute(array(':n1'=>$nom,':n2'=>$prenom,':n3'=>$datenaissance,':n4'=>$lieu,':n5'=>$sang,':n6'=>$sex,':n7'=>$tel,':n8'=>$email,':n9'=>$adress,':n10'=>$ville,':n11'=>$pays,':n20'=>$t));
		$update2=$bdd->prepare("UPDATE `statp` SET `poids` = :n14, `taille` = :n15 WHERE `idp` = $idm");
		$update2->execute(array(':n14'=>$poids,':n15'=>$taille));
		
		
		header('Location: listpat.php');
	}
	else{
		header('Location: modpatiant.php?id='.$idm);
		echo "prob"
		;}
	
}

if(isset($_POST['anti'])){
	
	if(isset($_POST['uronephologiques'])&&isset($_POST['infectieuxparasitaires'])&&isset($_POST['cardiovasculaires'])&&isset($_POST['digestifs'])&&isset($_POST['rhumatologiques'])&&isset($_POST['autres'])&&isset($_POST['chirurgicaux'])&&isset($_POST['regles'])&&isset($_POST['groussesses'])&&isset($_POST['avortements'])&&isset($_POST['contraception'])&&isset($_POST['habitude'])&&isset($_POST['traitement'])&&isset($_POST['consanguiniteparental'])&&isset($_POST['ascendants'])&&isset($_POST['descendants'])&&isset($_POST['collateraux']))
	{
		
     $idp=$_GET['idp'];
     $idrdv=$_GET['id'];
     $uronephologiques=$_POST['uronephologiques'];
	 $infectieuxparasitaires=$_POST['infectieuxparasitaires'];
	 $cardiovasculaires=$_POST['cardiovasculaires'];
	 $digestifs=$_POST['digestifs'];
	 $rhumatologiques=$_POST['rhumatologiques'];
	 $autres=$_POST['autres'];
	 $chirurgicaux=$_POST['chirurgicaux'];
	 $regles=$_POST['regles'];
	 $groussesses=$_POST['groussesses'];
	 $avortements=$_POST['avortements'];
	 $contraception= $_POST['contraception'];
	 $habitude=$_POST['habitude'];
	 $traitement=$_POST['traitement'];
	 $consanguiniteparental=$_POST['consanguiniteparental'];
	 $ascendants=$_POST['ascendants'];
	 $descendants=$_POST['descendants'];
	 $collateraux=$_POST['collateraux'];
	 
	 $inser=$bdd->prepare("INSERT INTO `antecedent`  VALUES (NULL,:n1x,:n2x,:n3x,:n4x,:n5x,:n6x,:n7x,:n8x,:n9x,:n10x,:n11x,:n12x,:n13x,:n14x,:n15x,:n16x,:n17x,:n18x, NOW(),:n19x)");
	 $inser->execute(array(':n1x'=>$idp,':n2x'=>$uronephologiques,':n3x'=>$infectieuxparasitaires,':n4x'=>$cardiovasculaires,':n5x'=>$digestifs,':n6x'=>$rhumatologiques,':n7x'=>$autres,':n8x'=>$chirurgicaux,':n9x'=>$regles,':n10x'=>$groussesses,':n11x'=>$avortements,':n12x'=>$contraception,':n13x'=>$habitude,':n14x'=>$traitement,':n15x'=>$consanguiniteparental,':n16x'=>$ascendants,':n17x'=>$descendants,':n18x'=>$collateraux,':n19x'=>$idrdv))or die("ddddd");
	 header('Loaction: consultation.php?idp='.$idp.'&id='.$idrdv);
	
	}
}

if(isset($_POST['consulter'])){

	if(isset($_POST['pouls'])&&isset($_POST['temperature'])&&isset($_POST['tensionarterielle'])&&isset($_POST['traitementsactuels'])&&isset($_POST['traitementspasses'])&&isset($_POST['symptome'])&&isset($_POST['modedevie'])&&isset($_POST['poids'])&&isset($_POST['observation'])&&isset($_POST['maladie']))
	{
		
		$idp=$_GET['idp'];
		$id=$_GET['id'];
		$pouls=$_POST['pouls'];
		$temperature=$_POST['temperature'];
		$tensionarterielle=$_POST['tensionarterielle'];
		$traitementsactuels=$_POST['traitementsactuels'];
		$traitementspasses=$_POST['traitementspasses'];
		$symptome=$_POST['symptome'];
		$modedevie=$_POST['modedevie'];
		$poids=$_POST['poids'];
		$maladie=$_POST['maladie'];
		$taille=0;
		$observation=$_POST['observation'];
		$up=$bdd->query("UPDATE rdv set effectue='oui' where id=$id");
		$inser0=$bdd->prepare("INSERT INTO consultation values(NULL,:n1,:n2,:n3,:n4,:n5,:n6,:n7,:n8,:n9,:n10,:n11,NOW())");
	    $inser0->execute(array(':n1'=>$idp,':n2'=>$id,':n3'=>$pouls,':n4'=>$temperature,':n5'=>$tensionarterielle,':n6'=>$traitementsactuels,':n7'=>$traitementspasses,':n8'=>$symptome,':n9'=>$modedevie,':n10'=>$maladie,':n11'=>$observation));
		
		$inser=$bdd->prepare("INSERT INTO statp values(NULL,:n1,:n2,:n3,:n4,NOW())");
	    $inser->execute(array(':n1'=>$idp,':n2'=>$id,':n3'=>$poids,':n4'=>$taille))or die("ddddd");
		header("Location: consultation.php?idp=$idp");
	}
	
}
if(isset($_POST['rdv'])){
	echo "ddd";
	print_r($_POST);
if(isset($_POST['date'])&&isset($_POST['time'])&&isset($_POST['nature'])&&isset($_POST['type']))
	{
		
		$type=$_POST['rdv'];
		if($type=="Ajouter"){
			
			
		$idp=$_GET['idp'];
		echo $idp;
		$nom=$_GET['nom'];
		$date=$_POST['date'];
		$type=$_POST['type'];
		echo $date;
		$m=explode("/",$date);
		print_r($m);
		$d=$m[2].'/'.$m[0].'/'.$m[1];echo $d;
		$time=$_POST['time'];
		$nature=$_POST['nature'];
		$cc= $d.' '.$time.':00';
		
			$s=$bdd->query("select * from rdv WHERE   date BETWEEN  DATE_SUB('$cc', INTERVAL 25 MINUTE) AND DATE_ADD('$cc', INTERVAL 25 MINUTE)");
$d=$s->fetch();
if(!$d){
	
	echo "ffff";
	
	$inser2=$bdd->prepare("INSERT INTO rdv values(NULL,:n1,:n2,:n3,'non',:n4)");
	        $inser2->execute(array(':n1'=>$idp,':n2'=>$cc,':n3'=>$nature,':n4'=>$type))or die("ggggggggggggggggggg");
		    header("Location: nrdv.php?q=$nom");
}
else{
     header("Location: erreur.php?/&err=1");

	echo "nn";
}
			
			}
		if($type=="mise a jour"){
			$idp=$_GET['idp'];
	 $date=$_POST['date'];
	 $m=explode("/",$date);
		print_r($m);
		$d=$m[2].'/'.$m[0].'/'.$m[1];echo $d;
		$time=$_POST['time'];
		$nature=$_POST['nature'];
		$cc= $d.' '.$time.':00';
		//
		$s=$bdd->query("select * from rdv WHERE   date BETWEEN  DATE_SUB('$cc', INTERVAL 25 MINUTE) AND DATE_ADD('$cc', INTERVAL 25 MINUTE)");
$d=$s->fetch();
if(!$d){
	
	echo "ffff";
	print_r($_POST);
	$update=$bdd->prepare("UPDATE `consultation` SET `date` = :n1,nature= :n2 WHERE `id` = :n3 ");
	    $update->execute(array(':n1'=>$cc,':n2'=>$nature,':n3'=>$idp));
		header("Location: listrdv.php");
}
else{
    // header("Location: erreur.php?/&err=1");

	echo "nn";
}
		//
		
		}
		if($type=="Supprimer"){
		$idp=$_GET['idp'];
		$del=$bdd->query("DELETE FROM `consultation` where `id` = $idp");
		echo "sssssssssssssss";
		header("Location: listrdv.php");
		}
	 
	     if($type=="Ajouter+"){
			
			
		$idp=$_GET['idp'];
		echo $idp;
		
		$date=$_POST['date'];
		$type=$_POST['type'];
		echo $date;
		$m=explode("/",$date);
		print_r($m);
		$d=$m[2].'/'.$m[0].'/'.$m[1];echo $d;
		$time=$_POST['time'];
		$nature=$_POST['nature'];
		$cc= $d.' '.$time.':00';
		
			$s=$bdd->query("select * from rdv WHERE   date BETWEEN  DATE_SUB('$cc', INTERVAL 25 MINUTE) AND DATE_ADD('$cc', INTERVAL 25 MINUTE)");
$d=$s->fetch();
if(!$d){
	
	echo "ffff";
	
	$inser2=$bdd->prepare("INSERT INTO rdv values(NULL,:n1,:n2,:n3,'non',:n4)");
	        $inser2->execute(array(':n1'=>$idp,':n2'=>$cc,':n3'=>$nature,':n4'=>$type))or die("ggggggggggggggggggg");
		    header("Location: listcons.php");
}
else{
     header("Location: erreur.php?/&err=1");

	echo "nn";
}
			
			}
		
	    
	}
}
if(isset($_POST['rapide'])){
	
	if(isset($_POST['sex'])&&isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['date'])&&isset($_POST['time'])&&isset($_POST['nature']))
	{
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$sex=$_POST['sex'];
		$insert=$bdd->query("SELECT MAX(id) as imid FROM `patiant`");
		$ii=$insert->fetch();
		$idim=$ii['imid']+1;
		$t="png";
		header("Centent-type: image/png");
        $image=imagecreate(200,200);
		if($sex=="homme"){
			$image=imagecreatefrompng("assets/images/avatar/ten.png");
        imagepng($image,"assets/patient/".$idim.".png");
		}
		else{ $image=imagecreatefrompng("assets/images/avatar/six.png");
        imagepng($image,"assets/patient/".$idim.".png");}
		$insert=$bdd->prepare("INSERT INTO `patiant` (id,nom,prenom,sex,typeimg) VALUES (NULL, :n1, :n2, :n3, :n4)");
		$insert->execute(array(':n1'=>$nom,':n2'=>$prenom,':n3'=>$sex,':n4'=>$t));
		
		$date=$_POST['date'];
		echo $date;
		$m=explode("/",$date);
		print_r($m);
		$d=$m[2].'/'.$m[0].'/'.$m[1];echo $d;
		$time=$_POST['time'];
		$nature=$_POST['nature'];
		$cc= $d.' '.$time.':00';
		
			$inser2=$bdd->prepare("INSERT INTO consultation values(NULL,:n5,:n6,:n7)");
	        $inser2->execute(array(':n5'=>$idim,':n6'=>$cc,':n7'=>$nature));
			
	header("Location: listrdv.php");
	
	
}
}

if(isset($_POST['assur'])&&isset($_GET['id'])){
	
	if(isset($_POST['nomass'])&&isset($_POST['typeass'])&&isset($_POST['datevalid'])){
		$id=$_GET['id'];
		$nomass=$_POST['nomass'];
		$typeass=$_POST['typeass'];
		$datevalid=$_POST['datevalid'];
		print_r($_POST);
		$upda=$bdd->prepare("UPDATE `docteur`.`assurance` SET `nom` = :n1, `type` = :n2, `datevalid` = :n3 WHERE `assurance`.`id` = :n4");
	    $upda->execute(array(':n1'=>$nomass,':n2'=>$typeass,':n3'=>$datevalid,':n4'=>$id));
		header("Location: listass.php");
	
	}
	
}
if(isset($_POST['apm'])&&isset($_GET['idp'])){
	echo "bra";print_r($_POST);
	if(isset($_POST['code'])&&isset($_POST['act'])&&isset($_POST['priseencharge'])){
		
		$idp=$_GET['idp'];
		$code=$_POST['code'];
	    $act=$_POST['act'];
	    $prise=$_POST['priseencharge'];
			$inser=$bdd->prepare("INSERT INTO apm values(NULL,:n1,:n2,:n3,:n4)");
	        $inser->execute(array(':n1'=>$idp,':n2'=>$code,':n3'=>$act,':n4'=>$prise));
	        header("Loaction: consultation.php?idp=$idp");
	
	}
	
}
if(isset($_POST['assurance'])){
	echo "bra";print_r($_POST);
	if(isset($_POST['datevalid'])&&isset($_POST['typeass'])&&isset($_POST['nomass'])){
		
		$idp=25;
		$datevalid=$_POST['datevalid'];
	    $typeass=$_POST['typeass'];
	    $nomass=$_POST['nomass'];
			/*$inser=$bdd->prepare("INSERT INTO assurance values(NULL,:n1,:n2,:n3,:n4)");
	        $inser->execute(array(':n1'=>$idp,':n2'=>$nomass,':n3'=>$typeass,':n4'=>$datevalid));
	        header("Loaction: consultation.php?idp=$idp");*/
	
	}
	
}
?> 
