<?php

// Descricao -> Bulbasauro

class BulbasauroDAO
{

    private $conexao;


    public function __construct()
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_pokedex";
        $user = "root";
        $pass = "etecjau";


        $this->conexao = new PDO($dsn, $user, $pass);
    }


    public function insert(BulbasauroModel $model)
    {
        $sql = "INSERT INTO bulbasauro
                (tipo1, tipo2, id_no, ot)
                VALUES (?, ?, ?, ?)";


        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->tipo1);
        $stmt->bindValue(2, $model->tipo2);
        $stmt->bindValue(3, $model->id_no);
        $stmt->bindValue(4, $model->ot);


        $stmt->execute();




    }


    public function update(BulbasauroModel $model)
    {
        $sql = "UPDATE bulbasauro SET tipo1=?, tipo2=?, id_no=?, ot=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo1);
        $stmt->bindValue(2, $model->tipo2);
        $stmt->bindValue(3, $model->id_no);
        $stmt->bindValue(4, $model->ot);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM bulbasauro ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/BulbasauroModel.php';

        $sql = "SELECT * FROM bulbasauro WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("BulbasauroModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM bulbasauro WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}