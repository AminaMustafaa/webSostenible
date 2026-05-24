<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">

        <section class="page-section">
            <h1>Prácticas de Desarrollo Sostenible</h1>
            <p class="intro-text">Como desarrolladores, nuestras decisiones del día a día también tienen impacto ambiental. Estas son las prácticas que aplicamos durante la creación de GreenLoop.</p>

            <div class="cards-grid">
                <div class="info-card">
                    <h3>Herramientas en la nube</h3>
                    <p>Usamos GitHub, Google Docs y herramientas online para trabajar sin necesidad de desplazamientos ni de imprimir ningún documento. Todo el código y la documentación es digital.</p>
                </div>
                <div class="info-card">
                    <h3>Cero papel</h3>
                    <p>No hemos impreso código, apuntes ni documentación en ningún momento del proyecto. Todo se gestiona digitalmente, desde los requisitos hasta las revisiones finales.</p>
                </div>
                <div class="info-card">
                    <h3>Equipos apagados</h3>
                    <p>Apagamos los ordenadores cuando terminamos de trabajar en lugar de dejarlos en suspensión. Un equipo apagado consume entre 10 y 40 veces menos energía que uno en standby.</p>
                </div>
                <div class="info-card">
                    <h3>Dark mode en desarrollo</h3>
                    <p>Usamos temas oscuros en VS Code y en el navegador durante el desarrollo, reduciendo el consumo energético de las pantallas OLED durante largas horas de trabajo.</p>
                </div>
            </div>
        </section>

        <section class="page-section">
            <h2>Optimización técnica del sitio</h2>
            <p class="intro-text">La tecnología también contamina. Los servidores consumen energía y las páginas web pesadas gastan más batería y datos. Estas son las decisiones técnicas que tomamos para reducir el impacto de GreenLoop.</p>

            <div class="cards-grid">
                <div class="info-card">
                    <h3>Imágenes optimizadas</h3>
                    <p>Las imágenes se sirven con parámetros de tamaño (<code>?w=400</code>) para cargar solo la resolución necesaria, reduciendo el peso de cada petición entre un 60 y un 80%.</p>
                </div>
                <div class="info-card">
                    <h3>Peticiones API eficientes</h3>
                    <p>Los artículos se cargan una sola vez desde la API y los filtros de búsqueda y categoría se aplican en el cliente sin hacer nuevas peticiones al servidor, reduciendo el tráfico de red.</p>
                </div>
                <div class="info-card">
                    <h3>Modo Fosc (Dark Mode)</h3>
                    <p>GreenLoop incluye un modo oscuro accesible desde cualquier página. En pantallas OLED, los píxeles negros no emiten luz, lo que puede reducir el consumo energético hasta un 40%.</p>
                </div>
                <div class="info-card">
                    <h3>Sin dependencias innecesarias</h3>
                    <p>Evitamos importar librerías pesadas como jQuery o Bootstrap cuando el mismo resultado se consigue con CSS y JavaScript estándar, manteniendo el proyecto ligero y rápido.</p>
                </div>
            </div>
        </section>

        <section class="page-section">
            <h2>Lo que podríamos mejorar</h2>
            <div class="note-box">
                <p>No hemos implementado caché en el servidor ni una auditoría formal de rendimiento con herramientas como Lighthouse. Las imágenes se sirven desde URLs externas en lugar de estar alojadas localmente con compresión WebP. Estos serían los primeros pasos en una versión futura del proyecto.</p>
            </div>
        </section>

    </main>

    <?php require_once '../partial/footer.php'; ?>
</body>
</html>
