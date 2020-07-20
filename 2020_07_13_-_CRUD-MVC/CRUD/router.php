<?php
    // Variáveis que serão encaminhadas pela view

    // Variável para identificar qual a controller será instanciada
    $controller = null;

    // Variável para identificar qual a ação da controller (inserir, atualizar, excvluir)
    $modo = null;

    //Valida se a controller está chegando pelo GET
    if(isset($_GET['controller'])){
        // Recebe qual a controller será instanciada
        $controller = strtoupper($_GET['controller']);

        switch($controller){
            case 'CONTATOS':

                // Valida se a variável modo existe
                if(isset($_GET['modo'])){
                    // Recebe a variável modo enviada pela view
                    $modo = strtoupper($_GET['modo']);

                    // Import do arquivo da controller
                    require_once('controller/contatoController.php');

                    // Instância da classe Contato Controller
                    $contatoController = new ContatoController();

                    // Valida qual a ação será chamada na controller (INSERIR, EDITAR, EXCLUIR)
                    switch($modo){
                        case 'INSERIR':
                            // Chama o método para inserir um contato
                            $contatoController->inserirContato();
                        break;

                        case 'EDITAR':
                            // Chama o método para editar um contato
                            $contatoController->atualizarContato();
                        break;

                        case 'EXCLUIR':
                            // Recebe o id do registro que foi encaminhado na view
                            $id = $_GET['id'];

                            // Chama o método para excluir um contato
                            $contatoController->excluirContato($id);
                        break;
                    }
                }
            break;
        }
    }

?>