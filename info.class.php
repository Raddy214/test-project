<?php
/*this class will get data from txt file and json_decode as array to be able to manipulate it
and return the result
*/

class GetInfo{
	
	public $file;
	public $get_content;
	public $json;
	public	$result;
	public	$array_row1;
	public	$array_row;
	/*these hold infomation extracted from json file*/
	public	$product_title;
	public	$product_subtitle;
	public	$publisher;
	public	$language;
	

	public function file_data(){
	  
	  $this->file = 'ELSIO-Graph-Example.txt'; //json file"
	 
      $this->get_content = file_get_contents($this->file); //get file content 
      $this->result = json_decode($this->get_content, true); // decode to array
		
		if(!empty($this->result)){ // check if file is not empty
		
		    /*loop into file using worksById*/
			foreach($this->result['worksById'] as $product_key=>$product_entry){
					
					/*loop into next lower nested level of file*/
				foreach($product_entry as $line_key=>$line_entry){
         

					if($line_key == 'Title') //checking if key is title
						/*loop into next dipper nested level of file to get title*/
						foreach($line_entry as $title_key=>$title){
         
		 
							if($title_key == 'TitleText') //checking if key is title text
								$this->product_title = $title_key.' '.$title; //getting title
		
							if($title_key == 'Subtitle') //checking if subtitle exsit
								$this->product_subtitle = $title_key.' '.$title; //getting sub title
	    
						} 
		
					if($line_key == 'Language') //checking if key is language
						/*loop into next dipper nested level of file to get language*/
						foreach($line_entry as $title_key=>$Language){
         

							///if($linekey == 'LanguageCode')
								$this->language = $title_key.' '.$Language; //getting language
		 
		 
						}
					if($line_key == 'Publisher') //checking if key is publisher
					/*loop into next dipper nested level of file to get publisher*/
						foreach($line_entry as $title_key=>$Publisher){
         
								$this->publisher = $title_key.' '.$Publisher; // getting publisher
		 
		 
						}
		
		
				}
				     //putting retrived data into an array 
					$this->array_row[] = '<b>'.$this->product_title.'</b><br><font>'.$this->product_subtitle.'</font><br/>'.$this->language.'<br/>'.$this->publisher;
		
		
			}
			
		    return json_encode($this->array_row); // return encode json array
	
		}
	
	}

	/* search function */
public function searchItem($search){ 
	
	  $this->file = 'ELSIO-Graph-Example.txt'; //json file"
	 
      $this->get_content = file_get_contents($this->file); //get file content 
      $this->result = json_decode($this->get_content, true); // decode to array


     
		foreach($this->result['worksById'] as $product_key=>$product_entry){
         
		
				foreach($product_entry as $line_key=>$line_entry){
         
		
					if($line_key == 'Title')
						foreach($line_entry as $title_key=>$title){
         
		 
							if($title_key == 'TitleText'){
								if($title == $search){
								$this->product_title = $title_key.' '.$title;
		
								if($title_key == 'Subtitle'){
								$this->product_subtitle = $title_key.' '.$title;
							    }
								
								if($line_key == 'Language')
						          foreach($line_entry as $title_key=>$Language){
         

							///if($linekey == 'LanguageCode')
								$this->language = $title_key.' '.$Language;
		 
		 
						}
								
								if($line_key == 'Publisher')
						        foreach($line_entry as $title_key=>$Publisher){
         
								$this->publisher = $title_key.' '.$Publisher;
		 
		 
								}
								$this->array_row[] = '<b>'.$this->product_title.'</b><br><font>'.$this->product_subtitle.'</font><br/>'.$this->language.'<br/>'.$this->publisher;
								
								}else{
									
									$this->array_row = 'item not found';
								}
							}
						} 
		
		
				}
					//$this->array_row[] = '<b>'.$this->product_title.'</b><br><font>'.$this->product_subtitle.'</font><br/>'.$this->language.'<br/>'.$this->publisher;
		
		
			}
			
		    return json_encode($this->array_row);



	  echo 'am from php search function ';
}





}
?>
