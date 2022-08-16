<?php

class HabilidadesDAO
{

    private $conexao;


    public function __construct()
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_pokedex";
        $user = "root";
        $pass = "etecjau";


        $this->conexao = new PDO($dsn, $user, $pass);
    }


    public function insert(HabilidadesModel $model)
    {
        $sql = "INSERT INTO habilidades
                (ataque, defesa, velocidade, especial)
                VALUES (?, ?, ?, ?)";


        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->ataque);
        $stmt->bindValue(2, $model->defesa);
        $stmt->bindValue(3, $model->velocidade);
        $stmt->bindValue(4, $model->especial);
        

        $stmt->execute();




    }


    public function update(HabilidadesModel $model)
    {
        $sql = "UPDATE habilidades SET ataque=?, defesa=?, velocidade=?, especial=? WHERE id=? ";

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
        $sql = "SELECT * FROM habilidades ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    public function selectById(int $id)
    {
        include_once 'Model/HabilidadesModel.php';

        $sql = "SELECT * FROM habilidades WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("HabilidadesModel"); 
    }


    public function delete(int $id)// id é inteiro.
    {
        $sql = "DELETE FROM habilidades WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}