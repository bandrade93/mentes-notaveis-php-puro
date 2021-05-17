<?php
include 'connection/Connection.php';

class User extends Connection
{
	private $name;
    private $date;
    private $phone;
    private $address_id;
    private $email;
    private $password;

    function getName() 
    {
        return $this->name;
    }

    function getDate() 
    {
        return $this->date;
    }

    function getPhone() 
    {
        return $this->phone;
    }

    function getAddressId() 
    {
        return $this->address_id;
    }

    function getEmail() 
    {
        return $this->email;
    }

    function getPassword() 
    {
        return $this->password;
    }

    function setName($name) 
    {
        $this->name = $name;
    }

    function setDate($date) 
    {
        $this->date = $date;
    }

    function setPhone($phone) 
    {
        $this->phone = $phone;
    }

    function setAddressId($address_id) 
    {
        $this->address_id = $address_id;
    }

    function setEmail($email) 
    {
        $this->email = $email;
    }

    function setPassword($password) 
    {
        $this->password = $password;
    }

    public function insert($obj)
    {
    	$sql = "INSERT INTO users(name, date, phone, address_id, email, password) 
        VALUES (:name, :date, :phone, :address_id, :email, :password)";
    	$connection = Connection::prepare($sql);
        $connection->bindValue('name',  $obj->name);
        $connection->bindValue('date', $obj->date);
        $connection->bindValue('phone' , $obj->phone);
        $connection->bindValue('address_id' , $obj->address_id);
        $connection->bindValue('email' , $obj->email);
        $connection->bindValue('password' , md5($obj->password));

    	return $connection->execute();

	}

	public function update($obj, $id = null)
    {   
		$sql = "UPDATE users SET name = :name, date = :date, phone = :phone, address_id = :address_id, email = :email, password = :password WHERE id = :id ";
    	$connection = Connection::prepare($sql);
        $connection->bindValue('name',  $obj->name);
        $connection->bindValue('date', $obj->date);
        $connection->bindValue('phone' , $obj->phone);
        $connection->bindValue('address_id' , $obj->address_id);
        $connection->bindValue('email' , $obj->email);
        $connection->bindValue('password' , md5($obj->password));
        $connection->bindValue('id', $id);
    	return $connection->execute();
	}

	public function delete($id = null)
    {
		$sql =  "DELETE FROM users WHERE id = :id";
		$connection = Connection::prepare($sql);
		$connection->bindValue('id',$id);
		$connection->execute();
        return true;
	}

	public function find($id = null)
    {
        $sql = "SELECT u.id, u.name, u.date, u.phone, u.email,
                        a.street, a.number, a.cep, s.uf,
                        s.name as stateName, c.name as cityName
                FROM users u 
                INNER JOIN address a ON (a.id = u.address_id)
                INNER JOIN cities c ON (c.id = a.city_id)
                INNER JOIN states s ON (s.id = c.state_id)
                WHERE u.id = :id";
               
		$connection = Connection::prepare($sql);
		$connection->bindValue('id',$id);
		$connection->execute();
		return $connection->fetchAll();
	}

	public function findAll()
    {
		$sql = "SELECT u.id, u.name, u.date, u.phone, u.email,
                       a.street, a.number, a.cep, s.uf,
                       s.name as stateName, c.name as cityName
                FROM users u 
                INNER JOIN address a ON (a.id = u.address_id)
                INNER JOIN cities c ON (c.id = a.city_id)
                INNER JOIN states s ON (s.id = c.state_id)";
                
		$connection = Connection::prepare($sql);
		$connection->execute();
		return $connection->fetchAll();
	}

    public function findUsersByState($state_id)
    {
        $sql = "SELECT count(u.id) as count_users
                FROM users u 
                INNER JOIN address a ON (a.id = u.address_id)
                INNER JOIN cities c ON (c.id = a.city_id)
                INNER JOIN states s ON (s.id = c.state_id)
                WHERE s.id = :state_id";
                
                $connection = Connection::prepare($sql);
                $connection->bindValue('state_id', $state_id);
                $connection->execute();
                return $connection->fetchAll();
    }

    public function findUsersByCity($city_id)
    {
        $sql = "SELECT count(u.id) as count_users
                FROM users u 
                INNER JOIN address a ON (a.id = u.address_id)
                INNER JOIN cities c ON (c.id = a.city_id)
                INNER JOIN states s ON (s.id = c.state_id)
                WHERE c.id = :city_id";
                
                $connection = Connection::prepare($sql);
                $connection->bindValue('city_id', $city_id);
                $connection->execute();
                return $connection->fetchAll();
    }

}

?>