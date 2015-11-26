/*this is where ajax will send request and get respond when page load
*/
$(function(){ // function fire automatically on page load
$(document).ready(function(){ // trigger action once page is full loaded
		   
		   //get response data from handler.php
			$.post("./script/php/handler.php", {} , function(data){
				
				var result = $.parseJSON(data); // json parse
			var output = ''; //defind output
			
             for(var i in result ){ // loop into json data
			 var mySplitResult = result[i].split(','); // split data using comma seprator
				
		//outputing data in index page	 
 output += "<article>"+result[i]+"</article>";
 $("#output").html(output);
 
 
	}			
			});
		
   
   
   
   
   /*search implementation*/
   /*
   i wanted user to be able to search items as soon as alphabet 
   is entered in search field.
   this is not working yet as i want to submit this project as early as i can.
   i will explain what i have done so far
   */
   /*this check when the last alphabet is entered search commence*/
 $("main").delegate(".search", "change",function(){
		var item_name = $(".search:last").val(); // getting the search value
		if(item_name != ''){ // change if value is empty
		alert('search'); 
		
		// senting request to search handler and getting response
		$.post("./script/php/search_handler.php", {search_item:item_name} , function(data){
			
			alert(data);
			//document.write(data);
		    var search_result = $.parseJSON(data); // json parse
			
			var output = '';
			//alert(result);
			//document.write(result);
             for(var i in result ){
			 var mySplitResult = result[i].split(','); 
			 
			 //output result
			  output += "<article>"+result[i]+"</article>";
			  $("#output").html(output);
			 
			 }
		});
		}
		
    });
   
   /*i intend to extend the functionality to search as user press the keys 
   using keyup.
   */
   
   
   
   $('#submit').click(function(){
	   
	   alert('search by clicking button');
	   
	   var item_name = $("#search").val(); // getting the search value
	   alert(item_name);
	   
	   if(item_name != ''){ // change if value is empty
		alert('search'); 
		
		// senting request to search handler and getting response
		$.post("./script/php/search_handler.php", {search_item:item_name} , function(data){
			
			alert(data);
			//document.write(data);
		    var search_result = $.parseJSON(data); // json parse
			
			var output = '';
			//alert(result);
			//document.write(result);
             for(var i in result ){
			 var mySplitResult = result[i].split(','); 
			 
			 //output result
			  output += "<article>"+result[i]+"</article>";
			  $("#output").html(output);
			 
			 }
		});
		}
	   
   });
   
   
   
   
   
   
   
});
});
