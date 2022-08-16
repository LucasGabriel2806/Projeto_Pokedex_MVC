<?php

/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class PoderesController 
{
    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
        include 'Model/PoderesModel.php';

        $model = new PoderesModel();
        $model->getAllRows();

        include 'View/modules/Poderes/ListaPoderes.php';
    }

   /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {

        include 'Model/PoderesModel.php'; // inclusão do arquivo model.
        $model = new PoderesModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
			// se existir ele vai no banco de dados buscar o acesso a ela
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
			// Typecast: eu to pegando o que ta vindo da barra do navegador: $_GET['id'] e estou convertendo pra (int) 
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/

        include 'View/modules/Poderes/FormPoderes.php'; // Include da View. Note que a variável $model está disponível na View.
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() {

        include 'Model/PoderesModel.php'; // inclusão do arquivo model.

        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $model = new PoderesModel();
        $model->id =  $_POST['id'];
        $model->poder1 = $_POST['poder1'];
        $model->poder2 = $_POST['poder2'];
        $model->poder3 = $_POST['poder3'];
        $model->poder4 = $_POST['poder4'];

        $model->save();  // chamando o método save da model.

        header("Location: /poderes"); // redirecionando o usuário para outra rota.
    }


    /**
     * Método para tratar a rota delete. 
     */
    public static function delete()
    {
        include 'Model/PoderesModel.php'; // inclusão do arquivo model.

        $model = new PoderesModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /poderes"); // redirecionando o usuário(localização) para outra rota.
    }



}