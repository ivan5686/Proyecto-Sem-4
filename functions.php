


<?php
get_header(); // header.php
?>  

<!-- sidebar.php -->
<aside class="sidebar">
    <h3>Menú Lateral</h3>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="blog.php">My Blog</a></li>
        <li><a href="page-contacto.php">Página de Contacto</a></li>
    </ul>
</aside>
<?php

if ( have_posts() ) : while ( have_posts() ) : the_post();
endwhile;
endif;
add_action(hook_name: 'init', callback: 'registrar_cpt_proyectos');
function registrar_cpt_proyectos(): void {
    $labels = array(
        'name' => 'Proyectos',
        'singular_name' => 'Proyecto',
        'add_new' => 'Añadir nuevo',
        'add_new_item' => 'Añadir nuevo proyecto',
        'edit_item' => 'Editar proyecto',
        'new_item' => 'Nuevo proyecto',
        'view_item' => 'Ver proyecto',
        'search_items' => 'Buscar proyectos',
        'not_found' => 'No se encontraron proyectos',
        'not_found_in_trash' => 'No se encontraron proyectos en la papelera',
        'menu_name' => 'Proyectos'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true, 
    );

    register_post_type(post_type: 'proyectos', args: $args);
}
add_action(hook_name: 'init', callback: 'registrar_cpt_proyectos');

function mostrar_proyectos(): void {
    // Verificamos si el usuario tiene permisos para ver los proyectos //
    if (!current_user_can(capability: 'read')) {
        return;
    }
    $args = array(
        'post_type' => 'proyectos',
        'posts_per_page' => 10,
    );
    $proyectos = new WP_Query(query: $args);

    if ($proyectos->have_posts()) {
        echo '<div class="proyectos-grid">';
        while ($proyectos->have_posts()) {
            $proyectos->the_post();
            echo '<article class="proyecto-tarjeta">';
            echo '<a href="' . get_permalink() . '">';
            if (has_post_thumbnail()) {
                echo '<div class="imagen-proyecto">' . get_the_post_thumbnail(null, 'medium') . '</div>';
            }
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<div class="resumen">' . get_the_excerpt() . '</div>';
            echo '</a>';
            echo '</article>';
        }
        echo '</div>';
    } else {
        echo '<p>No se encontraron proyectos.</p>';
    }
    wp_reset_postdata();

}

add_shortcode(tag: 'mostrar_proyectos', callback: 'mostrar_proyectos');
add_action(hook_name: 'wp_enqueue_scripts', callback: 'estilos_proyectos');  
function estilos_proyectos(): void {


    wp_enqueue_style(handle: 'estilos-proyectos', src: get_template_directory_uri() . '/css/estilos-proyectos.css');
}

function registrar_taxonomia_tipo_proyecto(): void {
    // Registramos una taxonomía personalizada para los tipos de proyecto//
    $labels = array(
        'name'              => 'Tipos de Proyecto',
        'singular_name'     => 'Tipo de Proyecto',
        'search_items'      => 'Buscar tipos',
        'all_items'         => 'Todos los tipos',
        'parent_item'       => 'Tipo padre',
        'parent_item_colon' => 'Tipo padre:',
        'edit_item'         => 'Editar tipo',
        'update_item'       => 'Actualizar tipo',
        'add_new_item'      => 'Añadir nuevo tipo',
        'new_item_name'     => 'Nuevo nombre de tipo',
        'menu_name'         => 'Tipo de Proyecto',
    );

    $args = array(
        'hierarchical'      => true, // como categorías
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'tipo-proyecto'),
        'show_in_rest'      => true, // para Gutenberg
    );

    register_taxonomy(taxonomy: 'tipo_proyecto', object_type: array('proyectos'), args: $args);
}
add_action(hook_name: 'init', callback: 'registrar_taxonomia_tipo_proyecto');

