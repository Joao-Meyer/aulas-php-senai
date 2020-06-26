<?php
    require_once('modulos/conexaoBD.php');
    $conexao = conexaoMysql();

    $dominio= $_SERVER['HTTP_HOST'];
    $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];

    if(isset($_POST['btnFiltrar'])){
        if($_GET['modo']){
            if($_GET['modo'] == 'filtrar'){
                $filtro = $_POST['inputFiltro'];

                switch($filtro){
                    case "c":
                        $sqlQuerySelectNiveis = "select tblNivelAcesso.*
                            from tblNivelAcesso
                            where tblNivelAcesso.acessoConteudo = 1
                            order by tblNivelAcesso.nomeNivel";
                    break;

                    case "f":
                        $sqlQuerySelectNiveis = "select tblNivelAcesso.*
                            from tblNivelAcesso
                            where tblNivelAcesso.acessoFaleConosco = 1
                            order by tblNivelAcesso.nomeNivel";
                    break;

                    case "p":
                        $sqlQuerySelectNiveis = "select tblNivelAcesso.*
                            from tblNivelAcesso
                            where tblNivelAcesso.acessoProduto = 1
                            order by tblNivelAcesso.nomeNivel";
                    break;

                    case "u":
                        $sqlQuerySelectNiveis = "select tblNivelAcesso.*
                            from tblNivelAcesso
                            where tblNivelAcesso.acessoUsuarios = 1
                            order by tblNivelAcesso.nomeNivel";
                    break;

                    default:                    
                        $sqlQuerySelectNiveis = "select * from tblNivelAcesso 
                        order by tblNivelAcesso.nomeNivel";
                    break;
                }
            }
        }
    }
    else{
        $sqlQuerySelectNiveis = "select * from tblNivelAcesso order by tblNivelAcesso.nomeNivel";
    }

    $querySelectNiveis = mysqli_query($conexao, $sqlQuerySelectNiveis);

    $action = "modulos/inserir_nivel_acesso.php?modo=inserir&url=" .$url;

    $idNivelAcesso = null;
    $nomeNivel = null;
    $acessoConteudo = null;
    $acessoFaleConosco = null;
    $acessoProdutos = null;
    $acessoUsuarios = null;

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $querySelectNivel = "
                    select tblNivelAcesso.*
                    from tblNivelAcesso
                    where tblNivelAcesso.idNivelAcesso = ".$id;
                
                $selectDados = mysqli_query($conexao, $querySelectNivel);

                if($rsInfoNivelAcesso = mysqli_fetch_assoc($selectDados)){
                    $idNivelAcesso = $rsInfoNivelAcesso['idNivelAcesso'];
                    $nomeNivel = $rsInfoNivelAcesso['nomeNivel'];
                    $acessoConteudo = $rsInfoNivelAcesso['acessoConteudo'];
                    $acessoFaleConosco = $rsInfoNivelAcesso['acessoFaleConosco'];
                    $acessoProdutos = $rsInfoNivelAcesso['acessoProduto'];
                    $acessoUsuarios = $rsInfoNivelAcesso['acessoUsuarios'];

                    $action = "modulos/atualizar.php?modo=atualizar&id=".$rsInfoNivelAcesso['idNivelAcesso']."&url=".$url."&origem=pagina_niveis_acesso";
                }
            }
        }
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS</title>

        <?php
            require_once('modulos/imports.php');
        ?>
    </head>

    <body>
        <div id="modal">
            <div id="modalConteudo">
            </div>
        </div>

        <div id="conteinerCMS">
            <div id="conteinerCabecalho">
                <div id="conteinerNomeSistema" class="fonte2">
                    CMS - Sistema de Gerenciamento do Site
                </div>

                <div id="conteinerImagemSistema">
                    <img src="./imagens/gerencia_logo_sem_fundo.png" alt="Logo do Sistema">
                </div>
            </div>

            <div id="conteinerMenusGerenciamento">
                <div id="conteinerMenuItens">
                    <div class="conteinerMenuItem">
                        <a href="adm_conteudo.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/gerencia_icone_preto_sem_fundo.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Conteúdo</div>
                        </a>
                    </div>

                    <div class="conteinerMenuItem">
                        <a href="adm_produtos.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/comida-rapida.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Produtos</div>
                        </a>
                    </div>

                    <div class="conteinerMenuItem">
                        <a href="adm_usuarios.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/reparar_icon.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Usuários</div>
                        </a>
                    </div>

                    <div class="conteinerMenuItem">
                        <a href="adm_fale_conosco.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/mensagem.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Fale conosco</div>
                        </a>
                    </div>
                </div>

                <div id="conteinerMensagemBemVindoLogout">
                    <div id="conteinerMensagemBemVindo" class="fonte1">
                        Bem vindo, [XXXX]
                    </div>

                    <div id="conteinerLogout" class="fonte1">
                        <a href="../super.php">Logout</a>
                    </div>
                </div>
            </div>

            <div id="conteinerSubmenusGerenciamento">
                <form name="formAdmCadastroNivelAcesso" action="<?=$action?>" method="post">
                    <div class="conteinerCadastro">
                        <div class="tituloCadastro">Cadastro Nivel</div>

                        <div class="inputBox">
                            Nome do novo nível:
                            <input type="text" name="txtNomeNivel" required value="<?=$nomeNivel?>">
                        </div>

                        <div class="inputBox">
                            <!-- <input type="checkbox" name="cbxAdmConteudo" value="1" checked> -->
                            Acesso ao adm. Conteúdo:
                        </div>

                        <div class="inputBox">
                            <input type="radio" name="rdoAdmConteudo" value="1" 
                                <?php
                                    if($acessoConteudo == '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Sim

                            <input type="radio" name="rdoAdmConteudo" value="0" 
                                <?php
                                    if($acessoConteudo != '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Não
                        </div>

                        <div class="inputBox">
                            <!-- <input type="checkbox" name="cbxAdmFaleConosco" value="1" checked> -->
                            Acesso ao adm. Fale Conosco:
                        </div>

                        <div class="inputBox">
                            <input type="radio" name="rdoAdmFaleConosco" value="1"
                                <?php
                                    if($acessoFaleConosco == '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Sim
                            <input type="radio" name="rdoAdmFaleConosco" value="0" 
                                <?php
                                    if($acessoFaleConosco != '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Não
                        </div>

                        <div class="inputBox">
                            <!-- <input type="checkbox" name="cbxAdmProduto" value="1" checked>Acesso ao adm. Produto -->
                            Acesso ao adm. Produto:
                        </div>

                        <div class="inputBox">
                            <input type="radio" name="rdoAdmProduto" value="1"
                                <?php
                                    if($acessoProdutos == '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Sim
                            <input type="radio" name="rdoAdmProduto" value="0" 
                                <?php
                                    if($acessoProdutos != '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Não
                        </div>

                        <div class="inputBox">
                            <!-- <input type="checkbox" name="cbxAdmUsuario" value="1" checked> -->
                            Acesso ao adm. Usuário:
                        </div>

                        <div class="inputBox">
                            <input type="radio" name="rdoAdmUsuario" value="1"
                                <?php
                                    if($acessoUsuarios == '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Sim
                            <input type="radio" name="rdoAdmUsuario" value="0" 
                                <?php
                                    if($acessoUsuarios != '1'){
                                        echo("checked");
                                    }
                                ?>
                            >Não
                        </div>

                        <div class="botaoRegistrar">
                            <input type="submit" name="btnSubmit" value="Registrar">
                        </div>
                    </div>
                </form>

                <form name="formAdmNiveisAcessoFiltro" action="pagina_niveis_acesso.php?modo=filtrar" method="post">
                    Filtro:
                    <input type="radio" name="inputFiltro" value="a" checked>Todos
                    <input type="radio" name="inputFiltro" value="c">Conteúdo
                    <input type="radio" name="inputFiltro" value="f">Fale Conosco
                    <input type="radio" name="inputFiltro" value="p">Produtos
                    <input type="radio" name="inputFiltro" value="u">Usuários

                    <input type="submit" value="filtrar" name="btnFiltrar">
                </form>
                
                <div class="conteinerComentario">
                    <div class="nivelAcessoNome">Nome Nivel</div>
                    <div class="nivelAcessoPermissao">Acesso Conteúdo</div>
                    <div class="nivelAcessoPermissao">Acesso Fale Conosco</div>
                    <div class="nivelAcessoPermissao">Acesso Produto</div>
                    <div class="nivelAcessoPermissao">Acesso Usuário</div>
                </div>

                <?php
                    while($rsSelect = mysqli_fetch_assoc($querySelectNiveis)){
                        ?>
                            <div class="conteinerComentario">
                                <div class="nivelAcessoNome"><?=$rsSelect['nomeNivel']?></div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoConteudo'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoFaleConosco'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoProduto'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoUsuarios'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <a onclick="return confirm('Deseja realmente excluir o registro? Todos os usuários que utilizam este nível de acesso também serão excluídos!    ');"
                                href="modulos/deletar_nivel_acesso.php?modo=excluir&id=<?=$rsSelect['idNivelAcesso']?>&url=<?=$url?>">
                                    <div class="excluir"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarNivelAcesso(<?=$rsSelect['idNivelAcesso']?>);"></div>

                                <a href="pagina_niveis_acesso.php?modo=editar&id=<?=$rsSelect['idNivelAcesso']?>">
                                    <div class="editar"></div>
                                </a>
                            </div>
                        <?php
                    }
                ?>
            </div>

            <div id="rodape">
                Desenvolvido por João Meyer
            </div>
        </div>
    </body>
</html>