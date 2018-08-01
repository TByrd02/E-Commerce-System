 <?php

class Item {


	var $product_id;
	var $display_name;
	var $price;
	var $size;
	



	function _construct($product_id, $display_name, $price, $size){

			$this->$product_id = $product_id;
			$this->$display_name = $display_name;
			$this->$price = $price;
			$this->$size = $size;
			

	}

}


?>