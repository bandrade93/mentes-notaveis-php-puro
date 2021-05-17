<?php
include 'model/City.php';
include 'config/Validation.php';

class CityController
{
	function find($id = null)
    {   
		$city = new City();
		$validation = new Validation();

		$data = $city->find($id);

		echo json_encode($validation->utf8EncodeDeep($data));
	}

	function findAll()
    {
		$city = new City();
		$validation = new Validation();

		$data = $city->findAll();
		
		echo json_encode($validation->utf8EncodeDeep($data));
	}

}

?>