<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/authentication.php';
$currentUser = validarToken(); //(false) if the user is not logged in
?>

<header id="my-header">

        <div class="header-top">
            <div class="dark-mode">
                <span class="dark-mode-label">Modo Sostenible</span>
                <label class="toggle-switch">
                    <input type="checkbox" id="btn-dark">
                    <span class="toggle-thumb"></span>
                </label>
            </div>
            <nav class="top-links">
                <ul>
                    <li><a href="/index.php">INICIO</a></li>
                    <li><a href="/views/users/explorar.php">EXPLORAR</a></li>
                    <li><a href="/views/users/ods&impacto.php">ODS</a></li>
                    <li><a href="/footer.php">CONTACTO</a></li>
                </ul>
            </nav>
        </div>

        <div class="header-bottom">
            <div class="logo">
            <a href="/index.php"><img src="/assets/images/logoWhiteB.png"    class="logo-light" alt="logo"></a >
            <a href="/index.php"><img src="/assets/images/logoWhiteTrans.png" class="logo-dark"  alt="logo"></a>
        </div>

            <h1>GreenLoop</h1>
            <nav class="nav-bar">
                <ul class="nav-list">
                    <li class="dropdown">
                        <a href="">Quién somos <span class="chevron">&#9660;</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/views/users/informeEmpresa.php">Informe de la empresa</a></li>
                            <li><a href="/views/users/sobreNosotros.php">Sobre nosotros</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="">Qué hacemos <span class="chevron">&#9660;</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/views/users/prob&sol.php">Problema y Solución</a></li>
                            <li><a href="/views/users/ecoDevPractices.php">Prácticas de desarrollo sostenible</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="">Qué ofrecemos <span class="chevron">&#9660;</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/views/users/ods&impacto.php">ODS y El Impacto</a></li>
                            <li><a href="/views/users/explorar.php">Explorar Artículos</a></li>
                            <!-- <li><a href="/views/users/detalle.php">Detalles De Artículos</a></li> -->
                            <li><a href="/views/users/subirItem.php">Subir Artículos</a></li>
                        </ul>
                    </li>
                    <?php if($currentUser): ?>
                    <li class="dropdown">
                        <a href="">Área Personal <span class="chevron">&#9660;</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/views/users/misArticulos.php">Mis Artículos</a></li>
                            <li><a href="/proc/logout.proc.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                
                <?php if ($currentUser): ?>
                    <span class="btn-join" style="cursor:default;">Hola, <?= htmlspecialchars($currentUser['name']) ?></span>
                <?php else: ?>
                    <a href="/views/users/login.php" class="btn-join">Login</a>
                <?php endif; ?>
            </nav>
        </div>

</header>