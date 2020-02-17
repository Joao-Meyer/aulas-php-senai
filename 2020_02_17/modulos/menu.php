<?php
    echo('
        <nav id="navMenu">
            <div id="containerMenu">
                <ul id="menu">
                    <li class="menuItem">
                        <a href="media.php" title="Link para a página do cálculo de média.">
                            <div class="menuText">Média</div>
                        </a>
                    </li>

                    <li class="menuItem">
                        <div class="menuText texto">Calculadoras
                            <ul class="submenu">
                                <li class="submenuItem">
                                    <a href="calculadora_if.php" title="Link para a página da calculadora com if.">
                                        <div class="menuText">If</div>
                                    </a>
                                </li>

                                <li class="submenuItem">
                                    <a href="calculadora_switch.php" title="Link para a página da calculadora com switch.">
                                        <div class="menuText">Switch</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menuItem">
                        <a href="tabuada.php" title="Link para a página da tabuada.">
                            <div class="menuText">Tabuada</div>
                        </a>
                    </li>

                    <li class="menuItem">
                        <a href="impar_par.php" title="Link para a página do par ou impar.">
                            <div class="menuText">Par ou Impar</div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    ');
?>