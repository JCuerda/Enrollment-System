<?php 

	function validateFormData( $formData ){

		$formData = trim(stripcslashes(htmlspecialchars($formData)));
		return $formData;
	}

	function redirect($location){
		header("Location:{$location}");
	}
 ?>