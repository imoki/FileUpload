<?php
if($_POST['submit']){
	//打开文件
	$fh = fopen('./info.txt',"a");
	//写入内容
	if($fh){
		$length = fwrite($fh,$_POST['content']."\r\n");
		if($length){
			echo '写入成功';
		}else{
			echo '写入失败';
		}
		fclose($fh);
	}else{
		echo '打开文件出错了';
	}
}
?>