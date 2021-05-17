<?php
include 'model/Address.php';
include 'config/Validation.php';

class AddressController
{
	function find($id = null)
    {   
		$address = new Address();
        $validation = new Validation();

        $data = $address->find($id);

		echo json_encode($validation->utf8EncodeDeep($data));
	}

	function findAll()
    {
		$address = new Address();
        $validation = new Validation();

        $data = $address->findAll();

		echo json_encode($validation->utf8EncodeDeep($data));
	}

}

?>