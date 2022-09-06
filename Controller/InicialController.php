<?php

// Pokemon -> Inicial

/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class InicialController 
{

    public static function telaInicial()
    {
        include 'View/modules/Inicial/tela-inicial.php';
    }


    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
        include 'Model/InicialModel.php';

        $model = new InicialModel();
        $model->getAllRows();

        include 'View/modules/Inicial/ListaInicial.php';
    }

   /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {

        include 'Model/InicialModel.php'; // inclusão do arquivo model.
        $model = new InicialModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
			// se existir ele vai no banco de dados buscar o acesso a ela
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
			// Typecast: eu to pegando o que ta vindo da barra do navegador: $_GET['id'] e estou convertendo pra (int) 
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/

        include 'View/modules/Inicial/FormInicial.php'; // Include da View. Note que a variável $model está disponível na View.
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() {

        include 'Model/InicialModel.php'; // inclusão do arquivo model.

        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $model = new InicialModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->numero = $_POST['numero'];
        $model->lv = $_POST['lv'];
        $model->hp = $_POST['hp'];
        $model->estado = $_POST['estado'];

        $model->save();  // chamando o método save da model.

        header("Location: /inicial"); // redirecionando o usuário para outra rota.
    }


    /**
     * Método para tratar a rota delete. 
     */
    public static function delete()
    {
        include 'Model/InicialModel.php'; // inclusão do arquivo model.

        $model = new InicialModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /inicial"); // redirecionando o usuário(localização) para outra rota.
    }



}