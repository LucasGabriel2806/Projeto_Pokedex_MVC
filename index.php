<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Pokédex</title>
</head>
<body>


    <div id="site">
        <div id="tela_esquerda">
            <img src="Img/logo_pokemon.png" width="600" height="200"><br>
                <p id="Disponiveis">Lista de Pokémons disponiveis:</p>
            
        
            <ul id="poke_lista">
                <li>(1) Bulbasauro</li>
                <li>(2) Charmander</li>
                <li>(3) Charmeleon</li>
                <li>(4) Charizard</li>
                <li>(5) Squirtle</li>
                <li>(6) Pikachu</li>
                <li>(7) Butterfree</li>
                <li>(8) Pidgeotto</li>
                <li>(9) Mew</li>
                <li>(10) Mewtwo</li>
            </ul>

        </div>
        <div id="tela_direita">
            <img src="Img/pokedex.png" width="1100" height="850">
            
        </div>
    </div>



    
</body>
</html>



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

?>