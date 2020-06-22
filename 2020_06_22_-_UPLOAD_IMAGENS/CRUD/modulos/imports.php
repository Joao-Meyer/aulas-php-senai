<link rel="stylesheet" type="text/css" href="../css/reset.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="shortcut icon" href="../imagens/crud.png" type="image/x-icon">
<script src="../js/jimcarey.js"></script>

<script>
    // Devemos, sempre, iniciar o JQuery por essa function
    $(document).ready(function(){
        // alert('foi');

        // Function que será acionada com o click do botáo visualizar
        $('.visualizar').click(function(){
            // Chama a div modal pelo efeito fadeIn
            $('#modal').fadeIn(1000);
        });

        $('.fechar').click(function(){
            $('#modal').fadeOut(500);
        });
    });

    // Function para abrir um arquivo dentro da modal
    function visualizarContato(idContato){
        $.ajax({
            type: "POST",
            url: "../modulos/visualizar_contato.php",
            data: {
                modo: "visualizar",
                id: idContato 
            },
            success: function(dados){
                $('#modalConteudo').html(dados);
            }
        });
    }
</script>