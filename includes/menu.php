<div class="clearfix"></div>

<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <?php
            // MENU DINÂMICO
            $menu = [
                'Cadastro' => [
                    'Cliente',
                    'Fornecedor',
                    'Perfil de acesso',
                    'Produtos',
                    'Usuário'
                ],
                'Relatório' => [
                    'Cliente',
                    'Faturamento',
                    'Produtos'
                ]
            ];

            // Ordenar os submenus
            foreach ($menu as &$submenus) {
                sort($submenus, SORT_STRING | SORT_FLAG_CASE);
            }
            unset($submenus);

            // Ordenar o menu principal
            ksort($menu, SORT_STRING | SORT_FLAG_CASE);
            ?>

            <ul class="page-sidebar-menu">
                <!-- ITEM INICIAL -->
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler hidden-phone">
                    </div>
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                </li>
                <li class="sidebar-search-wrapper">
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                    <form class="sidebar-search" action="#" method="POST">
                        <div class="form-container">
                            <div class="input-box">
                                <a href="javascript:;" class="remove"></a>
                                <input type="text" placeholder="Search..."/>
                                <input type="button" class="submit" value=" "/>
                            </div>
                        </div>
                    </form>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
                <li class="start active">
                    <a href="index.php">
                        <i class="fa fa-home"></i> <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>

                <?php foreach ($menu as $titulo => $subitens): ?>
                    <li>
                        <a href="javascript:;">
                            <i class="fa <?= $titulo === 'Cadastro' ? 'fa-file-text' : 'fa-bar-chart-o' ?>"></i>
                            <span class="title"><?= $titulo ?></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php foreach ($subitens as $item): ?>
                                <li><a href="#"><?= $item ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!-- END SIDEBAR -->
