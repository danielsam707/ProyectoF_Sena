<!-- <body>
    <!-- banner bg main start -->
<div class="banner_bg_main">
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <ul>
                            <li><a href="#">Best Sellers</a></li>
                            <li><a href="#">Gift Ideas</a></li>
                            <li><a href="#">New Releases</a></li>
                            <?php if (isset($_SESSION['nombre'])): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPerfil" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $_SESSION['nombre'] ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownPerfil">
                                        <li><a class="dropdown-item"
                                                href="<?php echo getUrl('Acceso', 'Acceso', 'logout'); ?>">Cerrar sesión</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>