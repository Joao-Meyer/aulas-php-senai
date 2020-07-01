<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="../imagens/reparar_icon.jpg">
<script src="./js/jquery.js"></script>
<script src="./js/jquery.form.js"></script>

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

        $('#inputImagem').live('change', function(){
            // alert('entrou!');
            $('#formImagem').ajaxForm({
                target: '#visualizarImagem' // Callback do submit para upload de arquivos (upload.php)
            }).submit();
            // alert('foi');
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
            url: "modulos/visualizar_usuario.php",
            data: {
                modo: "visualizar",
                id: idUsuario 
            },
            success: function(dados){
                $('#modalConteudo').html(dados);
            }
        });
    }

    function visualizarNivelAcesso(idNivelAcesso){
        $.ajax({
            type: "POST",
            url: "modulos/visualizar_nivel_acesso.php",
            data: {
                modo: "visualizar",
                id: idNivelAcesso 
            },
            success: function(dados){
                $('#modalConteudo').html(dados);
            }
        });
    }
</script>