<?php


require_once('connect.php');

$sel=$bdd->prepare("select max(id) as mid from patiant");
$sel->execute();
$s=$sel->fetch();
$mid=$s['mid']+1;
    $upload_dir = "upload/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $mid . ".png";
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';

header("Location: ajoutpatiant.php")

	
	
?>