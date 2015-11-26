<?php
/*this file will be the handler that communicate between ajax and php class 
*/
error_reporting(E_ALL);
ini_set("display_errors", "On");

include_once('info.class.php');

$send_method = $_SERVER['REQUEST_METHOD'];// getting Global post varible
if(strtolower($send_method) == 'post'){ // checking if method useis post
	//echo $send_method;
	

	$get_info = new GetInfo(); // instanciate class
    echo $get_info->file_data(); // getting response data

}

?>
