<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/PokemonController.php';
include 'Controller/HabilidadesController.php';
include 'Controller/PoderesController.php';
include 'Controller/DescricaoController.php';


switch($uri_parse)
{
    # ROTAS PARA POKEMON
    case '/pokemon':
        PokemonController::index();
    break;

    case '/pokemon/form':
        PokemonController::form();
    break;

    case '/pokemon/save':
        PokemonController::save();
    break;

    case '/pokemon/delete':
        PokemonController::delete();
    break;

    # ROTAS PARA HABILIDADES
    case '/habilidades':
        HabilidadesController::index();
    break;

    case '/habilidades/form':
        HabilidadesController::form();
    break;

    case '/habilidades/save':
        HabilidadesController::save();
    break;

    case '/habilidades/delete':
        HabilidadesController::delete();

    break;
    # ROTAS PARA PODERES
    case '/poderes':
        PoderesController::index();
    break;

    case '/poderes/form':
        PoderesController::form();
    break;

    case '/poderes/save':
        PoderesController::save();
    break;

    case '/poderes/delete':
        PoderesController::delete();
    break;

    # ROTAS PARA DESCRICAO
    case '/descricao':
        DescricaoController::index();
    break;

    case '/descricao/form':
        DescricaoController::form();
    break;

    case '/descricao/save':
        DescricaoController::save();
    break;

    case '/descricao/delete':
        DescricaoController::delete();
    break;




}













