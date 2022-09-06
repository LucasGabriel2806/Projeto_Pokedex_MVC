<?php

// Poderes -> Squirtle

class SquirtleDAO
{

    private $conexao;


    public function __construct()
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_pokedex";
        $user = "root";
        $pass = "etecjau";


        $this->conexao = new PDO($dsn, $user, $pass);
    }


    public function insert(SquirtleModel $model)
    {
        $sql = "INSERT INTO squirtle
                (poder1, poder2, poder3, poder4)
                VALUES (?, ?, ?, ?)";


        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->poder1);
        $stmt->bindValue(2, $model->poder2);
        $stmt->bindValue(3, $model->poder3);
        $stmt->bindValue(4, $model->poder4);
        

        $stmt->execute();




    }


    public function update(SquirtleModel $model)
    {
        $sql = "UPDATE squirtle SET poder1=?, poder2=?, poder3=?, poder4=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->poder1);
        $stmt->bindValue(2, $model->poder2);
        $stmt->bindValue(3, $model->poder3);
        $stmt->bindValue(4, $model->poder4);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM squirtle ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/SquirtleModel.php';

        $sql = "SELECT * FROM squirtle WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("SquirtleModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM squirtle WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}