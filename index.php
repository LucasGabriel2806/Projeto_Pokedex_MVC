


<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/InicialController.php';
include 'Controller/CharmanderController.php';
include 'Controller/SquirtleController.php';
include 'Controller/BulbasauroController.php';


switch($uri_parse)
{
    case '/':
        InicialController::telaInicial();
    break;


    # ROTAS PARA POKEMON
    case '/inicial':
        InicialController::index();
    break;

    case '/inicial/form':
        InicialController::form();
    break;

    case '/inicial/save':
        InicialController::save();
    break;

    case '/inicial/delete':
        InicialController::delete();
    break;

    # ROTAS PARA CHARMANDER
    
    case '/charmander':
        CharmanderController::index();
    break;

    case '/charmander/form':
        CharmanderController::form();
    break;

    case '/charmander/save':
        CharmanderController::save();
    break;

    case '/charmander/delete':
        CharmanderController::delete();

    break;
    
    # ROTAS PARA SQUIRTLE
    case '/squirtle':
        SquirtleController::index();
    break;

    case '/squirtle/form':
        SquirtleController::form();
    break;

    case '/squirtle/save':
        SquirtleController::save();
    break;

    case '/squirtle/delete':
        SquirtleController::delete();
    break;

    # ROTAS PARA BULBASAURO
    case '/bulbasauro':
        BulbasauroController::index();
    break;

    case '/bulbasauro/form':
        BulbasauroController::form();
    break;

    case '/bulbasauro/save':
        BulbasauroController::save();
    break;

    case '/bulbasauro/delete':
        BulbasauroController::delete();
    break;
        



}

?>