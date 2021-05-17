<?php
include 'connection/Connection.php';

class State extends Connection
{
	private $name;
    private $uf;

    function getName() 
    {
        return $this->name;
    }

    function getUf() 
    {
        return $this->uf;
    }

    function setName($name) 
    {
        $this->name = $name;
    }

    function setUf($uf) 
    {
        $this->uf = $uf;
    }

	public function find($id = null)
    {
        $sql = "SELECT id, name, uf FROM states WHERE id = :id";
               
		$connection = Connection::prepare($sql);
		$connection->bindValue('id',$id);
		$connection->execute();
		return $connection->fetchAll();
	}

	public function findAll()
    {
		$sql = "SELECT id, name, uf FROM states";
                
		$connection = Connection::prepare($sql);
		$connection->execute();
		return $connection->fetchAll();
	}

}

?>