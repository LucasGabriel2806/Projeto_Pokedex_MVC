<?php

class PokemonDAO
{

    private $conexao;


    public function __construct()
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_pokedex";
        $user = "root";
        $pass = "etecjau";


        $this->conexao = new PDO($dsn, $user, $pass);
    }


    public function insert(PokemonModel $model)
    {
        $sql = "INSERT INTO pokemon
                (nome, numero, lv, hp, estado)
                VALUES (?, ?, ?, ?, ?)";


        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->numero);
        $stmt->bindValue(3, $model->lv);
        $stmt->bindValue(4, $model->hp);
        $stmt->bindValue(5, $model->estado);


        $stmt->execute();




    }


    public function update(PokemonModel $model)
    {
        $sql = "UPDATE pokemon SET nome=?, numero=?, lv=?, hp=?, estado=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->numero);
        $stmt->bindValue(3, $model->lv);
        $stmt->bindValue(4, $model->hp);
        $stmt->bindValue(5, $model->estado);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM pokemon ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/PokemonModel.php';

        $sql = "SELECT * FROM pokemon WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PokemonModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM pokemon WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}