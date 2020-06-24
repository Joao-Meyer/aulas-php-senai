<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="../imagens/reparar_icon.jpg">
<script src="./js/jimcarey.js"></script>

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
    function visualizarFaleConosco(idContato){
        // alert("Chamou a visualizarFaleConosco");
        $.ajax({
            type: "POST",
            url: "modulos/visualizar_fale_conosco.php",
            data: {
                modo: "visualizar",
                id: idContato 
            },
            success: function(dados){
                $('#modalConteudo').html(dados);
            }
        });
    }
    
    function visualizarUsuario(idUsuario){
        $.ajax({
            type: "POST",
            url: "modulos/visualizar_fale_conosco.php",
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