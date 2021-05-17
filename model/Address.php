<?php
include 'connection/Connection.php';

class Address extends Connection
{
	private $street;
    private $number;
    private $cep;
    private $state_id;
    private $city_id;

    function getStreet() 
    {
        return $this->street;
    }

    function getNumber() 
    {
        return $this->number;
    }

    function getCep() 
    {
        return $this->cep;
    }

    function getStateId() 
    {
        return $this->state_id;
    }

    function getCityId() 
    {
        return $this->city_id;
    }

    function setStreet($street) 
    {
        $this->street = $street;
    }

    function setNumber($number) 
    {
        $this->number = $number;
    }

    function setCep($cep) 
    {
        $this->cep = $cep;
    }

    function setStateId($state_id) 
    {
        $this->state_id = $state_id;
    }

    function setCity($city_id) 
    {
        $this->city_id = $city_id;
    }

	public function find($id = null)
    {
        $sql = "SELECT 
                        a.id as idAddress, a.street, a.number, a.cep, 
                        s.uf, s.name as stateName, c.name as cityName
                FROM address a 
                INNER JOIN cities c ON (c.id = a.city_id)
                INNER JOIN states s ON (s.id = c.state_id)
                WHERE a.id = :id";
               
		$connection = Connection::prepare($sql);
		$connection->bindValue('id',$id);
		$connection->execute();
		return $connection->fetchAll();
	}

	public function findAll()
    {
		$sql = "SELECT 
                        a.id as idAddress, a.street, a.number, a.cep, 
                        s.uf, s.name as stateName, c.name as cityName
                FROM address a 
                INNER JOIN cities c ON (c.id = a.city_id)
                INNER JOIN states s ON (s.id = c.state_id)";
                
		$connection = Connection::prepare($sql);
		$connection->execute();
		return $connection->fetchAll();
	}

}

?>