<?php
include 'connection/Connection.php';

class City extends Connection
{
    private $name;
    private $state_id;

    function getName() 
    {
        return $this->name;
    }

    function getStateId() 
    {
        return $this->state_id;
    }

    function setName($name) 
    {
        $this->name = $name;
    }

    function setStateId($state_id) 
    {
        $this->state_id = $state_id;
    }

	public function find($id = null)
    {
        $sql = "SELECT c.id as idCity, c.name as nameCity, 
                       s.uf, s.id as idState, s.name as nameState
                FROM cities c 
                INNER JOIN states s ON (s.id = c.state_id)
                WHERE c.id = :id";

        $connection = Connection::prepare($sql);
		$connection->bindValue('id',$id);
		$connection->execute();
		return $connection->fetchAll();
	}

	public function findAll()
    {
		$sql = "SELECT c.id as idCity, c.name as nameCity, 
                        s.uf, s.id as idState, s.name as nameState
                FROM cities c 
                INNER JOIN states s ON (s.id = c.state_id)";
                
		$connection = Connection::prepare($sql);
		$connection->execute();
		return $connection->fetchAll();
	}

}

?>