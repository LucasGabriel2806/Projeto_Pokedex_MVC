<?php

// Pokemon -> Inicial

class InicialDAO
{

    private $conexao;


    public function __construct()
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_pokedex";
        $user = "root";
        $pass = "etecjau";


        $this->conexao = new PDO($dsn, $user, $pass);
    }


    public function insert(InicialModel $model)
    {
        $sql = "INSERT INTO inicial
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


    public function update(InicialModel $model)
    {
        $sql = "UPDATE inicial SET nome=?, numero=?, lv=?, hp=?, estado=? WHERE id=? ";

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
        $sql = "SELECT * FROM inicial ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/InicialModel.php';

        $sql = "SELECT * FROM inicial WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("InicialModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM inicial WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}