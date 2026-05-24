<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">

        <section class="page-section">
            <h1>El Problema</h1>
            <p class="intro-text">El hogar europeo promedio acumula cientos de objetos que usa menos de una vez al mes. Una taladradora se usa aproximadamente 13 minutos a lo largo de toda su vida útil. Aun así, millones de personas compran una nueva cada año.</p>

            <div class="cards-grid">
                <div class="info-card">
                    <h3>Impacto Ambiental</h3>
                    <p>Fabricar objetos que apenas se usan consume materias primas, emite CO2 y genera residuos que acaban en vertederos o en el océano, contaminando el agua y amenazando la vida marina.</p>
                </div>
                <div class="info-card">
                    <h3>Impacto Social</h3>
                    <p>Las familias con menos recursos se ven obligadas a comprar artículos que solo necesitan una vez. Esto presiona la economía doméstica y profundiza la desigualdad entre quienes pueden permitírselo y quienes no.</p>
                </div>
                <div class="info-card">
                    <h3>Impacto Local</h3>
                    <p>En un mismo barrio hay decenas de taladradoras, escaleras y bicis sin usar. Si los vecinos pudieran compartirlas, nadie tendría que comprar algo que ya existe a tres calles de distancia.</p>
                </div>
            </div>
        </section>

        <section class="page-section">
            <h2>La Cadena de Consecuencias</h2>
            <div class="chain-row">
                <div class="chain-box">
                    <span class="chain-label">ODS 12</span>
                    <p>El consumo irresponsable genera residuos y sobreproducción</p>
                    <a href="/views/users/ods&impacto.php" class="btn">Más info</a>
                </div>
                <div class="chain-arrow">&#8594;</div>
                <div class="chain-box">
                    <span class="chain-label">ODS 6</span>
                    <p>Los residuos contaminan ríos, mares y acuíferos</p>
                    <a href="/views/users/ods&impacto.php" class="btn">Más info</a>
                </div>
                <div class="chain-arrow">&#8594;</div>
                <div class="chain-box">
                    <span class="chain-label">ODS 14</span>
                    <p>El agua contaminada destruye ecosistemas marinos</p>
                    <a href="/views/users/ods&impacto.php" class="btn">Más info</a>
                </div>
                <div class="chain-arrow">&#8594;</div>
                <div class="chain-box">
                    <span class="chain-label">ODS 1 y 2</span>
                    <p>La degradación ambiental agrava la pobreza y el hambre</p>
                    <a href="/views/users/ods&impacto.php" class="btn">Más info</a>
                </div>
            </div>
        </section>

        <section id="solution" class="page-section">
            <h2>La Solución: GreenLoop</h2>
            <p class="intro-text">GreenLoop propone un modelo directo: antes de comprar algo nuevo, busca si un vecino ya lo tiene y te lo puede prestar. Extendemos la vida útil de los objetos y reducimos el consumo innecesario a escala de barrio.</p>

            <div class="cards-grid">
                <div class="info-card">
                    <h4>Explorar artículos</h4>
                    <p>Busca lo que necesitas por categoría o condición antes de comprarlo. Si está disponible en tu barrio, puedes pedirlo prestado directamente.</p>
                </div>
                <div class="info-card">
                    <h4>Publicar artículos</h4>
                    <p>Comparte objetos que tienes en casa y apenas usas. Cada préstamo evita una compra nueva y el impacto ambiental que conlleva su fabricación.</p>
                </div>
                <div class="info-card">
                    <h4>Gestionar tus publicaciones</h4>
                    <p>Actualiza el estado de tus artículos cuando los prestes. El artículo queda marcado como no disponible para evitar confusiones entre vecinos.</p>
                </div>
                <div class="info-card">
                    <h4>Ver el impacto acumulado</h4>
                    <p>Cada artículo prestado cuenta. La plataforma registra los préstamos realizados como indicador del residuo que la comunidad ha evitado generar.</p>
                </div>
            </div>

            <div class="comparison-box">
                <div class="comparison-side">
                    <h4>Sin GreenLoop</h4>
                    <p>Necesitas una taladradora, compras una por 40 euros, la usas dos veces, ocupa espacio durante 5 años y acaba en el vertedero.</p>
                </div>
                <div class="comparison-divider">VS</div>
                <div class="comparison-side">
                    <h4>Con GreenLoop</h4>
                    <p>Necesitas una taladradora, la encuentras a 3 calles, la pides prestada, la devuelves. 0 euros gastados, 0 residuos generados.</p>
                </div>
            </div>
        </section>

    </main>

    <?php require_once '../partial/footer.php'; ?>
</body>
</html>
