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
                        $sqlQuerySelect = "select tblUsuario.*, tblNivelAcesso.nomeNivel
                            from tblUsuario, tblNivelAcesso
                            where tblUsuario.idNivelAcesso = tblNivelAcesso.idNivelAcesso
                            and tblNivelAcesso.acessoConteudo = 1
                            order by tblUsuario.nome";
                    break;

                    case "f":
                        $sqlQuerySelect = "select tblUsuario.*, tblNivelAcesso.nomeNivel
                            from tblUsuario, tblNivelAcesso
                            where tblUsuario.idNivelAcesso = tblNivelAcesso.idNivelAcesso
                            and tblNivelAcesso.acessoFaleConosco = 1
                            order by tblUsuario.nome";
                    break;

                    case "p":
                        $sqlQuerySelect = "select tblUsuario.*, tblNivelAcesso.nomeNivel
                            from tblUsuario, tblNivelAcesso
                            where tblUsuario.idNivelAcesso = tblNivelAcesso.idNivelAcesso
                            and tblNivelAcesso.acessoProduto = 1
                            order by tblUsuario.nome";
                    break;

                    case "u":
                        $sqlQuerySelect = "select tblUsuario.*, tblNivelAcesso.nomeNivel
                            from tblUsuario, tblNivelAcesso
                            where tblUsuario.idNivelAcesso = tblNivelAcesso.idNivelAcesso
                            and tblNivelAcesso.acessoUsuarios = 1
                            order by tblUsuario.nome";
                    break;

                    default:
                        $sqlQuerySelect = "select tblUsuario.*, tblNivelAcesso.nomeNivel
                            from tblUsuario, tblNivelAcesso
                            where tblUsuario.idNivelAcesso = tblNivelAcesso.idNivelAcesso
                            order by tblUsuario.nome";
                    break;
                }
            }
        }
    }
    else{
        $sqlQuerySelect = "select tblUsuario.*, tblNivelAcesso.nomeNivel
                            from tblUsuario, tblNivelAcesso
                            where tblUsuario.idNivelAcesso = tblNivelAcesso.idNivelAcesso
                            order by tblUsuario.nome";
    }
    $select = mysqli_query($conexao, $sqlQuerySelect);

    $action = "modulos/inserir_usuario.php?modo=inserir&url=".$url;

    $nome = null;
    $login = null;
    $senha = null;
    $idNivelAcesso = null;
    $nomeNivel = null;

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $querySelectUsuario = "
                    select tblUsuario.*,
                    tblNivelAcesso.idNivelAcesso, tblNivelAcesso.nomeNivel
                    from tblUsuario, tblNivelAcesso
                    where tblUsuario.idNivelAcesso = tblNivelAcesso.idNivelAcesso
                    and tblUsuario.idUsuario = ".$id;
                
                $selectDados = mysqli_query($conexao, $querySelectUsuario);

                if($rsInfoUsuario = mysqli_fetch_assoc($selectDados)){
                    $idUsuario = $rsInfoUsuario['idUsuario'];
                    $nome = $rsInfoUsuario['nome'];
                    $login = $rsInfoUsuario['login'];
                    $senha = $rsInfoUsuario['senha'];
                    $idNivelAcesso = $rsInfoUsuario['idNivelAcesso'];
                    $nomeNivel = $rsInfoUsuario['nomeNivel'];

                    $action = "modulos/atualizar.php?modo=atualizar&id=".$rsInfoUsuario['idUsuario']."&url=".$url."&origem=pagina_usuarios";
                }
            }
        }
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
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
                <form action="<?=$action?>" name="formAdmCadastroUsuario" method="post">
                    <div class="conteinerCadastro">
                        <div class="tituloCadastro">Cadastro Usuário</div>

                        <div class="inputBox">
                            Nome usuário: <input type="text" name="txtNomeUsuario" value="<?=$nome?>" required>
                        </div>

                        <div class="inputBox">
                            Login: <input type="text" name="txtLogin" value="<?=$login?>" required>
                        </div>

                        <div class="inputBox">
                            Senha: <input type="password" name="txtSenha" value="<?=$senha?>" required>
                        </div>

                        <div class="inputBox">
                            Nivel Acesso:
                            <!-- <input type="radio" name="radioNivelAcesso" id="">Usar Existente
                            <input type="radio" name="radioNivelAcesso" id="">Criar novo
                            -->
                            <select name="slctNivelAcesso">
                                <?php
                                    if(isset($_GET['modo'])){
                                        if($_GET['modo'] == 'editar'){
                                            ?>
                                                <option value="<?=$idNivelAcesso?>"><?=$nomeNivel?></option>        
                                            <?php
                                            $sqlQuerySelectNiveisAcesso = "
                                                select * from tblNivelAcesso
                                                where not (idNivelAcesso = ".$idNivelAcesso.")
                                                order by nomeNivel;
                                            ";
                                        }
                                    }
                                    else{
                                ?>
                                        <option value="">Selecione um Nivel</option>
                                <?php
                                    }
                                    $sqlQuerySelectNiveisAcesso = "
                                        select * from tblNivelAcesso
                                        order by nomeNivel;
                                    ";
                                    
                                    $selectNiveisAcesso = mysqli_query($conexao, $sqlQuerySelectNiveisAcesso);

                                    while($rsNivelAcesso = mysqli_fetch_assoc($selectNiveisAcesso)){
                                ?>
                                        <option value="<?=$rsNivelAcesso['idNivelAcesso']?>">
                                            <?=$rsNivelAcesso['nomeNivel']?>
                                        </option>
                                <?php
                                    }
                                ?>
                            </select>
                        
                        </div>
                       
                        <div class="botaoRegistrar">
                            <input type="submit" name="btnSubmit" value="Registrar">
                        </div>
                    </div>
                </form>

                <form name="formAdmFaleConoscoFiltro" action="pagina_usuarios.php?modo=filtrar" method="post">
                    Filtro:
                    <input type="radio" name="inputFiltro" value="a" checked>Todos
                    <input type="radio" name="inputFiltro" value="c">Conteúdo
                    <input type="radio" name="inputFiltro" value="f">Fale Conosco
                    <input type="radio" name="inputFiltro" value="p">Produtos
                    <input type="radio" name="inputFiltro" value="u">Usuários

                    <input type="submit" value="filtrar" name="btnFiltrar">
                </form>
                
                <!-- <div class="conteinerSubmenuItem"></div> -->
                <div class="conteinerComentario">
                    <div class="usuarioNome">Nome</div>
                    <div class="usuarioLogin">Login</div>
                    <div class="usuarioSenha">Senha</div>
                    <div class="usuarioNivelAcesso">Nivel Acesso</div>
                </div>

                <?php
                    while($rsSelect = mysqli_fetch_assoc($select)){
                        ?>
                            <div class="conteinerComentario">
                                <div class="usuarioNome"><?=$rsSelect['nome']?></div>
                                <div class="usuarioLogin"><?=$rsSelect['login']?></div>
                                <div class="usuarioSenha"><?=$rsSelect['senha']?></div>
                                <div class="usuarioNivelAcesso"><?=$rsSelect['nomeNivel']?></div>

                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="./modulos/deletar.php?modo=excluir&id=<?=$rsSelect['idUsuario']?>&tabela=tblUsuario&coluna=idUsuario&url=<?=$url?>">
                                    <div class="excluir"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarUsuario(<?=$rsSelect['idUsuario']?>);"></div>

                                <a href="pagina_usuarios.php?modo=editar&id=<?=$rsSelect['idUsuario']?>">
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