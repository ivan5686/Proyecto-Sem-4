<?php get_header();

 ?>

<?php get_sidebar(); // crea?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
get_template_part(slug: "content", name: get_post_format() );
endwhile;
else :
    get_template_part(slug: "content", name: "none" );
endif;
?>

<main class="contenedor-categorias">
    <h1>Categoría: <?php single_cat_title(); ?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="post-categoria">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; else : ?>
        <p>No hay publicaciones en esta categoría.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
<?php
