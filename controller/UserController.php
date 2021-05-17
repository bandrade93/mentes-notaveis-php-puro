<?php
include 'model/User.php';
include 'config/Validation.php';

class UserController
{
	function insert($obj)
    {
		$user = new User();
        $validation = new Validation();

        $input = $this->mountFields($obj);
        if(!$validation->validationData($input)) {
            echo json_encode(["message" => "Fill in the fields correctly."]);
            exit;
        }

        $user->insert($input);

        echo json_encode(["message" => "Data saved successfully."]);
	}

	function update($id, $obj)
    {
		$user = new User();
        $validation = new Validation();

        $input = $this->mountFields($obj);
        if(!$validation->validationData($input)) {
            echo json_encode(["message" => "Fill in the fields correctly."]);
            exit;
        }

		$user->update($input, $id);

        echo json_encode(["message" => "Data updated successfully."]);
	}

	function delete($id)
    {
		$user = new User();
        if($user->delete($id)) {
            echo json_encode(["message" => "Data removed successfully."]);
        }
	}

	function find($id = null)
    {   
		$user = new User();
        $validation = new Validation();

        $data = $user->find($id);

		echo json_encode($validation->utf8EncodeDeep($data));
	}

	function findAll()
    {
		$user = new User();
        $validation = new Validation();

        $data = $user->findAll();

		echo json_encode($validation->utf8EncodeDeep($data));
	}

    function findUsersByState($state_id = null)
    {   
        $user = new User();
		echo json_encode($user->findUsersByState($state_id));
    }

    function findUsersByCity($city_id = null)
    {
        $user = new User();
		echo json_encode($user->findUsersByCity($city_id));
    }

    public function mountFields($request)
    {
        $input = array(
            'name' => $request->name ?? '',
            'address_id' => $request->address_id ?? '',
            'date' => $request->date ?? '',
            'phone' => $request->phone ?? '',
            'email' => $request->email ?? '',
            'password' => $request->password ?? '',
        );

        return (object) $input;
    }
}

?>