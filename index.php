<!DOCTYPE html>
<html lang="en">
<?php require_once 'views/partial/head.php'; ?>
<body>

    <?php require_once 'views/partial/header.php';?>

    <main class="main-center-content">
        <h1>GreenLoop</h1>

        <section class="hero">
            <div class="hero-inner">
                <div class="hero-text">
                    <span class="hero-eyebrow">Economía circular vecinal</span>
                    <h1>Presta y toma prestado<br>de tus vecinos</h1>
                    <p>GreenLoop conecta a personas que quieren compartir objetos en lugar de comprar nuevos. Consume menos, comparte más, vive mejor.</p>
                    <div class="hero-btns">
                        <a href="/views/users/explorar.php" class="btn btn-hero-primary">Explorar artículos</a>
                        <a href="/views/users/registrar.php" class="btn btn-hero-secondary">Únete gratis</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <span class="stat-number">20+</span>
                            <span class="stat-label">Artículos disponibles</span>
                        </div>
                        <div class="hero-stat">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Vecinos activos</span>
                        </div>
                        <div class="hero-stat">
                            <span class="stat-number">4</span>
                            <span class="stat-label">Categorías</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
        <section class="how-section">
            <div class="section-inner">
                <h2 class="section-title">¿Cómo funciona?</h2>
                <p class="section-subtitle">Tres pasos simples para empezar a compartir en tu barrio</p>
                <div class="steps-row">
                    <div class="step-card">
                        <div class="step-icon">📝</div>
                        <div class="step-number">01</div>
                        <h3>Crea tu cuenta</h3>
                        <p>Regístrate gratis en segundos. Solo necesitas un nombre y un correo electrónico para unirte a la comunidad GreenLoop.</p>
                    </div>
                    <div class="step-arrow">→</div>
                    <div class="step-card">
                        <div class="step-icon">📦</div>
                        <div class="step-number">02</div>
                        <h3>Publica o explora</h3>
                        <p>¿Tienes algo que no usas? Súbelo en un minuto. ¿Necesitas algo? Explora los artículos de tus vecinos y solicítalo.</p>
                    </div>
                    <div class="step-arrow">→</div>
                    <div class="step-card">
                        <div class="step-icon">🤝</div>
                        <div class="step-number">03</div>
                        <h3>Presta y devuelve</h3>
                        <p>Queda con tu vecino, recoge el artículo y devuélvelo cuando hayas terminado. Sin pagos, sin complicaciones.</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="categories-section">
            <div class="section-inner">
                <h2 class="section-title">Explora por categoría</h2>
                <p class="section-subtitle">Encuentra exactamente lo que necesitas</p>
                <div class="cat-grid">
                    <a href="/views/users/explorar.php?category=herramientas" class="cat-card">
                        <span class="cat-icon">🔧</span>
                        <h3>Herramientas</h3>
                        <p>Taladros, sierras, escaleras y todo lo que necesitas para el hogar sin tener que comprarlo</p>
                        <span class="cat-link">Ver artículos →</span>
                    </a>
                    <a href="/views/users/explorar.php?category=ropa" class="cat-card">
                        <span class="cat-icon">👗</span>
                        <h3>Ropa</h3>
                        <p>Prendas de temporada, ropa de fiesta y accesorios que solo necesitas para una ocasión</p>
                        <span class="cat-link">Ver artículos →</span>
                    </a>
                    <a href="/views/users/explorar.php?category=libros" class="cat-card">
                        <span class="cat-icon">📚</span>
                        <h3>Libros</h3>
                        <p>Novelas, técnicos, de texto. Lee y devuelve — la biblioteca vecinal más cercana a ti</p>
                        <span class="cat-link">Ver artículos →</span>
                    </a>
                    <a href="/views/users/explorar.php?category=hogar" class="cat-card">
                        <span class="cat-icon">🏠</span>
                        <h3>Hogar</h3>
                        <p>Lámparas, decoración, utensilios de cocina y todo lo que hace falta solo por un tiempo</p>
                        <span class="cat-link">Ver artículos →</span>
                    </a>
                </div>
            </div>
        </section>


        <section class="ods-section">
            <div class="section-inner">
                <h2 class="section-title">Impacto real en el planeta</h2>
                <p class="section-subtitle">GreenLoop está alineado con los Objetivos de Desarrollo Sostenible de la ONU</p>

                <div class="ods-impact-layout">


                    <div class="ods-problem">
                        <div class="ods-problem-card">
                            <h3>El problema del sobreconsumo</h3>
                            <p>Cada año se fabrican millones de objetos que se usan pocas veces y acaban en la basura. El consumo innecesario es uno de los mayores impulsores del cambio climático y el agotamiento de recursos naturales.</p>
                            <div class="ods-data-bars">
                                <div class="ods-bar-row">
                                    <span class="ods-bar-label">Objetos que se usan menos de 5 veces</span>
                                    <div class="ods-bar-track"><div class="ods-bar-fill" style="width:80%">80%</div></div>
                                </div>
                                <div class="ods-bar-row">
                                    <span class="ods-bar-label">Reducción de residuos al compartir</span>
                                    <div class="ods-bar-track"><div class="ods-bar-fill ods-bar-green" style="width:65%">65%</div></div>
                                </div>
                                <div class="ods-bar-row">
                                    <span class="ods-bar-label">Emisiones evitadas por préstamo</span>
                                    <div class="ods-bar-track"><div class="ods-bar-fill ods-bar-green" style="width:45%">45%</div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                    <div class="ods-cards-col">
                        <div class="ods-goal-card">
                            <img src="/assets/images/ods12.jpg" alt="ODS 12 Producción y consumo responsables">
                            <div class="ods-goal-text">
                                <span class="ods-badge">ODS 12</span>
                                <h4>Producción y consumo responsables</h4>
                                <p>Al prestar en lugar de comprar reducimos la demanda de producción y la generación de residuos.</p>
                            </div>
                        </div>
                        <div class="ods-goal-card">
                            <img src="/assets/images/ods1.jpg" alt="ODS 1 Fin de la pobreza">
                            <div class="ods-goal-text">
                                <span class="ods-badge">ODS 1</span>
                                <h4>Fin de la pobreza</h4>
                                <p>Acceder a objetos sin comprarlos reduce el gasto de las familias con menos recursos.</p>
                            </div>
                        </div>
                        <div class="ods-goal-card">
                            <img src="/assets/images/ods2.jpg" alt="ODS 2">
                            <div class="ods-goal-text">
                                <span class="ods-badge">ODS 17</span>
                                <h4>Alianzas para los objetivos</h4>
                                <p>GreenLoop construye comunidades locales de colaboración y confianza entre vecinos.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="ods-cta">
                    <a href="/views/users/ods&impacto.php" class="btn">Ver análisis completo de ODS →</a>
                </div>
            </div>
        </section>
    </main>

    <?php require_once 'views/partial/footer.php'; ?>

</body>
</html>

