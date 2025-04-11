<?php get_header(); ?>

<main class="categoria-noticias">
    <h1>Últimas Noticias</h1>
    <ul class="lista-noticias">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
                <span class="fecha"><?php the_time('j M Y'); ?></span>
            </li>
        <?php endwhile; endif; ?>
    </ul>
</main>

<?php get_footer(); ?>
<?php
