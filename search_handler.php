<?php
/*this file will be search handler that communicate between ajax and php class 
*/
error_reporting(E_ALL);
ini_set("display_errors", "On");

include_once('info.class.php'); //include php class 

$send_method = $_SERVER['REQUEST_METHOD']; // getting Global post varible
if(strtolower($send_method) == 'post'){ // checking if method useis post
	//echo $send_method;
	$search = ($_POST['search_item']); // getting search input from ajax
	
  //echo $search;
	$search_info = new GetInfo(); // instanciate class
    $search_info->searchItem($search); // passing input to php class search function 

}

?>
