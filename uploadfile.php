<?php
//文件夹
for($i=0; $i<count($_FILES['upload']['name']); $i++) {
	$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
	
	if ($tmpFilePath != ""){
	$newFilePath = "upload/" . $_FILES['upload']['name'][$i];
	if (file_exists("upload/" . $_FILES["upload"]["name"][$i])){
		echo $_FILES["upload"]["name"][$i] . " 文件已经存在.<br/><br/>";
	}
	else{
		echo "文件名: " . $_FILES["upload"]["name"][$i] . "已上传<br/>";
		echo "类型: " . $_FILES["upload"]["type"][$i] . "<br/>";
		echo "大小: " . ($_FILES["upload"]["size"][$i] / 1024) . " Kb<br/><br/>";
	}
	if(move_uploaded_file($tmpFilePath, $newFilePath)) {
		}
	}
}
/*
if ($_FILES["file"]["error"] > 0)
{
echo "错误: " . $_FILES["file"]["error"] . "<br />";  
}
else
{
echo "文件名: " . $_FILES["file"]["name"] . "<br />";  
echo "类型: " . $_FILES["file"]["type"] . "<br />";  
echo "大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";   
}
if (file_exists("upload/" . $_FILES["file"]["name"]))  
{
	echo $_FILES["file"]["name"] . " 文件已经存在. ";  
}
else
{
	
	move_uploaded_file($_FILES["file"]["tmp_name"],  
	"upload/" . $_FILES["file"]["name"]);  
	echo "文件已经被存储到: " . "upload/" . $_FILES["file"]["name"];  
}

?>
 */

