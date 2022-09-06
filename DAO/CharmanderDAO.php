<?php

// Habilidades -> Charmander


class CharmanderDAO
{

    private $conexao;


    public function __construct()
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_pokedex";
        $user = "root";
        $pass = "etecjau";


        $this->conexao = new PDO($dsn, $user, $pass);
    }


    public function insert(CharmanderModel $model)
    {
        $sql = "INSERT INTO charmander
                (ataque, defesa, velocidade, especial)
                VALUES (?, ?, ?, ?)";


        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->ataque);
        $stmt->bindValue(2, $model->defesa);
        $stmt->bindValue(3, $model->velocidade);
        $stmt->bindValue(4, $model->especial);
        

        $stmt->execute();




    }


    public function update(CharmanderModel $model)
    {
        $sql = "UPDATE charmander SET ataque=?, defesa=?, velocidade=?, especial=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->ataque);
        $stmt->bindValue(2, $model->defesa);
        $stmt->bindValue(3, $model->velocidade);
        $stmt->bindValue(4, $model->especial);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM charmander ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/CharmanderModel.php';

        $sql = "SELECT * FROM charmander WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CharmanderModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM charmander WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}