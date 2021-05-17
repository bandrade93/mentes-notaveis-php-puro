<?php
include 'model/State.php';
include 'config/Validation.php';

class StateController
{
	function find($id = null)
    {   
		$state = new State();
		$validation = new Validation();

		$data = $state->find($id);

		echo json_encode($validation->utf8EncodeDeep($data));
	}

	function findAll()
    {
		$state = new State();
		$validation = new Validation();

		$data = $state->findAll();

		echo json_encode($validation->utf8EncodeDeep($data));
	}

}

?>