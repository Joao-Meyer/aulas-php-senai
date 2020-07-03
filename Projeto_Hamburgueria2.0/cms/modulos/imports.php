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

        // $('.visibilidadeIcone').live('click', function( element ){
        //     const id = element.target.dataset.id;
        //     const visibilidadeAtual = element.target.dataset.visibilidadeAtual;
        //     const nomeForm = element.target.dataset.nomeForm;
        //     alert(id + visibilidadeAtual + nomeForm);
        //     $('#formVisibilidade').ajaxForm({
        //         // target: '#visualizarImagem' // Callback do submit para upload de arquivos (upload.php)
        //     }).submit();
        //     // alert('foi');
        // });
    });

    function mudarVisibilidade(id, visibilidadeAntiga, url){
        // $.ajax({
        //     type: "POST",
        //     url: "modulos/update_visibilidade.php",
        //     data: {
        //         id: id,
        //         visibilidadeAntiga: visibilidadeAntiga,
        //         nomeFormulario: nomeFormulario 
        //     }
        // });
        window.location=`modulos/update_visibilidade.php?id=${id}&visibilidadeAntiga=${visibilidadeAntiga}&url=${url}`;
    }

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