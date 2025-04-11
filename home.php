<?php
include 'header.php'; 

// Inicia el bucle de WordPress
include 'functions.php'; // Asegúrate de que este archivo existe y contiene la función get_header()
if (have_posts()) : while (have_posts()) : the_post(); ?>   

    <!-- Contenedor de artículos -->
    <div class="articles-container">
        <article class="article">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <p><strong>Publicado el:</strong> <?php the_date(); ?></p>
        </article>

        <!-- Menú de navegación principal -->
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="home.php">Home</a></li>
                <li><a href="blog.php">My Blog</a></li>
                <li><a href="page-contacto.php">Página de Contacto</a></li>
            </ul>
<nav class="main-nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="home.php">Home</a></li>
                <li><a href="blog.php">My Blog</a></li>
                <li><a href="page-contacto.php">Página de Contacto</a></li>
            </ul>
        </nav>
    <?php endwhile;

 else : ?>
    <p>No hay artículos disponibles.</p>
<?php endif; ?>

else :
    echo '<p>No hay artículos disponibles.</p>';
endif;
?>

<!-- Sidebar lateral -->
<aside class="sidebar">
    <h3>Menú Lateral</h3>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="blog.php">My Blog</a></li>
        <li><a href="page-contacto.php">Página de Contacto</a></li>
    </ul>
</aside>

</div> <!-- Fin del contenedor de artículos -->

<?php
include "footer.php"; 
?>







