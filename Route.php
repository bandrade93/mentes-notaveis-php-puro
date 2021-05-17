<?php

class Route
{
    public function __construct()
    {
        $this->init();
    }

    //função para inicializar url amigaveis
    public function init()
    {
        $url = (isset($_GET['url'])) ? $_GET['url'] : '';
        $url = array_filter(explode('/', $url));

        if (count($url) < 1) {
            echo json_encode(["messege" => "Enter the desired method."]);
            exit;
        }

        if (!$this->getController($url)) {
            echo json_encode(["messege" => "Page not found."]);
            exit;
        }

        $controller = $this->getController($url);
        $method = $this->getMethod($url);

        include 'controller/' . $controller . '.php';

        $this->executeAction($controller, $method, $url);
    }

    //função para identificar controller através da url digitada
    public function getController($url)
    {
        switch ($url[0]) {
            case 'users':
                return 'UserController';
            case 'address':
                return 'AddressController';
            case 'cities':
                return 'CityController';
            case 'states':
                return 'StateController';
            default:
                return false;
        }
    }

    //função para pegar metodo
    public function getMethod($url)
    {
        $request = $_SERVER['REQUEST_METHOD'];

        switch ($request) {
            case 'POST':
                return 'insert';
            case 'PUT':
                return 'update';
            case 'DELETE':
                return 'delete';
            case 'PATCH':
                return 'update';
            case 'GET':
                return (count($url) > 1 ? 'find' : 'findAll');
        }
    }

    //função para executar ação
    public function executeAction($controller, $method, $url)
    {
        $data = file_get_contents('php://input');
        $obj =  json_decode($data);

        $objController = new $controller();

        switch (count($url)) {
            case 1:
                (!empty($data) ? $objController->$method($obj) : $objController->$method());
                break;
            case 2:
                (!empty($data) ? $objController->$method($url[1], $obj) : $objController->$method($url[1]));
                break;
            case 3:
                $newMethod = $url[1];
                $objController->$newMethod($url[2]);
                break;
            default:
                echo "Page does not exist.";
                exit;
        }
    }
}

?>