<?php

$conect = mysqli_connect("localhost","id21209981_userpanel","@Ashad2023#@#$","id21209981_userpanel");

if($conect)
{
	echo "conected succesfully";
}else {

	echo "conect not succes";
}

if(isset($_POST['image']))
{
	$target_dir = "images/";
	$image = $_POST['image'];
	$image_store = rand()."_".time().".jpeg";
	$target_dir = $target_dir."".$image_store;

	file_put_contents($target_dir,base64_decode($image));

	$select = "  INSERT INTO ImagesUpload(id, images) VALUES (NULL,'$image_store') ";
	$response = mysqli_query($conect,$select);

	if($response)
	{
		echo "Image upload";
		mysqli_close($conect);
	}else{
		echo "faield";
	}

}
?>