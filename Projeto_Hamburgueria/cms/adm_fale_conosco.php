<?php
    require_once("./modulos/conexaoBD.php");
    $conexao = conexaoMysql();

    $dominio= $_SERVER['HTTP_HOST'];
    $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
    // echo($url);

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'filtrar'){
            if(isset($_POST['btnFiltrar'])){
                $filtro = $_POST['inputFiltro'];
                if($filtro != 'a'){
                    $sqlQuerySelect = "select * from tblFaleConosco where intuito = '" . $filtro . "'";    
                }
                else{
                    $sqlQuerySelect = "select * from tblFaleConosco";        
                }
                $select = mysqli_query($conexao, $sqlQuerySelect);
            }
        }
    }
    else{
        $sqlQuerySelect = "select * from tblFaleConosco";

        $select = mysqli_query($conexao, $sqlQuerySelect);
    }
    // while($rsSelect = mysqli_fetch_assoc($select)){
    //     echo($rsSelect['nome']);
    //     echo($rsSelect['telefone']);
    //     echo($rsSelect['celular']);
    //     echo($rsSelect['email']);
    //     echo($rsSelect['homePage']);
    //     echo($rsSelect['linkFacebook']);
    //     echo($rsSelect['profissao']);
    //     echo($rsSelect['intuito']);
    //     echo($rsSelect['mensagem']);
    //     echo($rsSelect['genero']);
    // }
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
                <form name="formAdmFaleConoscoFiltro" action="./adm_fale_conosco.php?modo=filtrar" method="post">
                    Filtro:
                    <input type="radio" name="inputFiltro" value="a" checked>Todos
                    <input type="radio" name="inputFiltro" value="c">Críticas
                    <input type="radio" name="inputFiltro" value="s">Sugestões

                    <input type="submit" value="FILTRAR" name="btnFiltrar">
                </form>
                
                <!-- <div class="conteinerSubmenuItem"></div> -->
                <div class="conteinerComentario">
                    <div class="comentarioNome">Nome</div>
                    <div class="comentarioCelular">Celular</div>
                    <div class="comentarioEmail">Email</div>
                    <div class="comentarioIntuito">Intuito</div>
                    <div class="comentarioMensagem">Mensagem</div>
                </div>

                <?php
                    while($rsSelect = mysqli_fetch_assoc($select)){
                        ?>
                            <div class="conteinerComentario">
                                <div class="comentarioNome"><?=$rsSelect['nome']?></div>
                                <div class="comentarioCelular"><?=$rsSelect['celular']?></div>
                                <div class="comentarioEmail"><?=$rsSelect['email']?></div>
                                <div class="comentarioIntuito"><?php
                                                                    if($rsSelect['intuito'] == 'c'){
                                                                        echo('Crítica');
                                                                    }
                                                                    else{
                                                                        echo('Sugestão');
                                                                    }
                                                                ?></div>
                                <div class="comentarioMensagem"><?=$rsSelect['mensagem']?></div>

                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="./modulos/deletar.php?modo=excluir&id=<?=$rsSelect['idFaleConosco']?>&tabela=tblFaleConosco&coluna=idFaleConosco&url=<?=$url?>">
                                    <div class="excluir"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarFaleConosco(<?=$rsSelect['idFaleConosco']?>);"></div>
                            </div>
                        <?php
                        // echo($rsSelect['nome']);
                        // echo($rsSelect['telefone']);
                        // echo($rsSelect['celular']);
                        // echo($rsSelect['email']);
                        // echo($rsSelect['homePage']);
                        // echo($rsSelect['linkFacebook']);
                        // echo($rsSelect['profissao']);
                        // echo($rsSelect['intuito']);
                        // echo($rsSelect['mensagem']);
                        // echo($rsSelect['genero']);
                    }
                ?>
            </div>

            <div id="rodape">
                Desenvolvido por João Meyer
            </div>
        </div>
    </body>
</html>