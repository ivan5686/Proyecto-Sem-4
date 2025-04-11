<?php get_header(); ?>

<main class="contenedor-proyectos">
    <h1>Proyectos</h1>
    <div class="proyectos-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="proyecto-tarjeta">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="imagen-proyecto"><?php the_post_thumbnail(size: 'medium'); ?></div>
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="resumen"><?php the_excerpt(); ?></div>
                </a>
            </article>
        <?php endwhile; else : ?>
            <p>No se encontraron proyectos.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
