<link rel="stylesheet" type="text/css" href="../css/reset.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="shortcut icon" href="../imagens/crud.png" type="image/x-icon">
<script src="../js/jquery.js"></script>
<script src="../js/jquery.form.js"></script>

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

        // Function para visualizar a imagem antes de enviar para o banco
            // Estamos utilizando o efeito live com a opção change "live('change')" que significa
            //quando o objeto troca do estado de vazio para preenchido
        $('#foto').live('change', function(){
            $('#frmFoto').ajaxForm({
                target: '#imagemFoto' // Callback do submit para upload de arquivos (upload.php)
            }).submit();
            // alert('foi');
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