<?php 
  
	function validateFormData( $formData ){

		$formData = trim(stripcslashes(htmlspecialchars($formData)));
		return $formData;
	}

 ?>