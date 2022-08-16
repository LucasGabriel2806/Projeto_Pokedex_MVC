<?php

class PoderesDAO
{

    private $conexao;


    public function __construct()
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_pokedex";
        $user = "root";
        $pass = "etecjau";


        $this->conexao = new PDO($dsn, $user, $pass);
    }


    public function insert(PoderesModel $model)
    {
        $sql = "INSERT INTO poderes
                (poder1, poder2, poder3, poder4)
                VALUES (?, ?, ?, ?)";


        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->poder1);
        $stmt->bindValue(2, $model->poder2);
        $stmt->bindValue(3, $model->poder3);
        $stmt->bindValue(4, $model->poder4);
        

        $stmt->execute();




    }


    public function update(PoderesModel $model)
    {
        $sql = "UPDATE poderes SET poder1=?, poder2=?, poder3=?, poder4=? WHERE id=? ";

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
        $sql = "SELECT * FROM poderes ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/PoderesModel.php';

        $sql = "SELECT * FROM poderes WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PoderesModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM poderes WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}