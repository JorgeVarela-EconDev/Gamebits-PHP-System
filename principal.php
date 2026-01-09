<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMEBITS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <div class="content">
            <div class="menu container">
                <a href="principal.php" class="logo">GAMEBITS</a>
                <input type="checkbox" id="menu"/>
                <label for="menu">
                    <img src="images/menu.png" class="menu icono" alt="">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="principal.php">Inicio</a></li>
                        <li><a href="consulta_general.php">Consulta</a></li>
                        <li><a href="tipos.php">Tipos de juegos</a></li>
                        <li><a href="encuesta.php">Encuesta</a></li>
                        <li><a href="preguntas.php">Preguntas frecuentes</a></li>
                        <li><a href="index.php">Registro</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="fecha-sistema" class="fecha-sistema"></div>
        <div id="ultima-modificacion" class="ultima-modificacion"></div>
        
    </header>

    <main>
        <section id="Quiénes Somos">
            <h1>Quiénes Somos</h1>
            <p>
            En <strong>GAMESBITS</strong>,somos apasionados por los videojuegos. Nos dedicamos a explorar, analizar y compartir nuestra perspectiva sobre el vasto mundo de los videojuegos. Fundada con la misión de conectar a jugadores de todas las generaciones y géneros, Gamebits es más que una simple plataforma de reseñas: somos una comunidad para los amantes del gaming, donde la calidad, la objetividad y la pasión por los videojuegos son el centro de todo lo que hacemos.Gamebits nació del deseo de brindar a los jugadores una fuente confiable y detallada de análisis sobre videojuegos. Nuestros fundadores, un grupo de gamers con experiencia tanto en la industria como en el periodismo, identificaron la necesidad de un espacio que combinara información imparcial con una profunda comprensión del medio. Desde nuestros inicios, hemos trabajado para ofrecer contenido que no solo informe, sino que también inspire y motive a nuestros lectores a explorar nuevos mundos digitales. En Gamebits, creemos que los videojuegos son más que entretenimiento. Son una forma de arte, una herramienta de aprendizaje y un medio para conectar personas a través de historias, creatividad e innovación tecnológica. Por eso, nuestra filosofía se basa en:
                Ofrecer opiniones sinceras y fundamentadas, valorando tanto lo bueno como lo mejorable de cada título. No nos limitamos a calificaciones rápidas. Nuestras reseñas abarcan narrativa, jugabilidad, gráficos, sonido y otros aspectos clave. Cubrimos todos los géneros, plataformas y estilos, desde juegos AAA hasta indies que merecen ser descubiertos.
            </p>
        </section>

        <section id="a-que-nos-dedicamos">
            <h1>A Que Nos Dedicamos</h1>
            <p>
            En <strong>GAMESBITS</strong>, nos dedicamos a analizar y reseñar videojuegos de una manera clara, entretenida y detallada. Algunos de nuestros enfoques principales son: Reseñas detalladas en las que desglosamos cada juego en sus elementos esenciales para proporcionar una visión completa, a su vez contamos con artículos especiales en donde exploramos tendencias, historias detrás de los desarrolladores y aspectos culturales de los videojuegos, por ultimo ofrecemos una cobertura de eventos en donde informamos sobre los lanzamientos más esperados, ferias y conferencias como E3, Gamescom y más. Guías y Consejos: Ayudamos a los jugadores a superar desafíos en sus juegos favoritos. Nuestro equipo está compuesto por escritores, críticos y jugadores apasionados que entienden lo que significa ser gamer. Cada miembro de Gamebits aporta una perspectiva única, ya sea que disfrute de los shooters competitivos, las aventuras narrativas o los títulos retro. Esto nos permite ofrecer una visión rica y variada sobre los juegos que reseñamos
            </p>
        </section>

        <section id="Nuestra Comunidad y Vision">
            <h1>Nuestra Comunidad y Vision</h1>
            <p>
            <strong>GAMESBITS</strong> no existiría sin nuestra comunidad. Los jugadores son el núcleo de todo lo que hacemos, y por eso buscamos constantemente maneras de interactuar, escuchar sus opiniones y crear contenido que realmente les importe. A través de nuestras redes sociales, foros y secciones de comentarios, fomentamos un diálogo abierto y respetuoso entre gamers. Queremos ser más que una fuente de información. Aspiramos a convertirnos en una referencia para todos los amantes de los videojuegos, ofreciendo contenido de calidad que ayude a los jugadores a tomar decisiones informadas y a descubrir experiencias memorables. <strong>En GAMESBITS<strong>, entendemos que los videojuegos tienen el poder de transformar, inspirar y conectar. Nuestro objetivo es capturar ese poder en cada reseña, artículo y conversación que compartimos con nuestra audiencia
            </p>
        </section>
    </main>


    <Footer>
        <div id="navegador" class="navegador"></div>
    </Footer>
    
    <script>
        const fechaActual = new Date();
        const fechaFormateada = fechaActual.toLocaleDateString();
        document.getElementById('fecha-sistema').textContent = `Fecha del sistema: ${fechaFormateada}`;
    </script>

    <script>
        const ultimaModificacion = document.lastModified;
        document.getElementById('ultima-modificacion').textContent = `Última modificación: ${ultimaModificacion}`;
    </script>

    <script>
        const navegador = navigator.userAgent;
        document.getElementById('navegador').textContent = `Navegador: ${navegador}`;
    </script>

</body>
</html>