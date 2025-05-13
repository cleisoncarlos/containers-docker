<?php
// Template Name: Lista de Documentos

get_header();

// Query para documentos
$args = array(
    'post_type'      => 'documento',
    'posts_per_page' => 10, // Quantidade de documentos por página
    'tax_query'      => array(
        array(
            'taxonomy' => 'categoria_documento',
            'field'    => 'slug',
            'terms'    => 'livros', // Substitua pelo slug da categoria desejada
        ),
    ),
);

$documentos_query = new WP_Query($args);
?>

<div class="documentos-lista">
    <?php if ($documentos_query->have_posts()) : ?>
        <ul class="documentos-grid">
            <?php while ($documentos_query->have_posts()) : $documentos_query->the_post(); ?>
                <li class="documento-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="documento-thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <h2 class="documento-titulo"><?php the_title(); ?></h2>
                    <?php
                    $url = get_post_meta(get_the_ID(), '_documento_url', true);
                    if ($url) :
                    ?>
                        <a href="<?php echo esc_url($url); ?>" class="documento-link" target="_blank" rel="noopener noreferrer"><?php _e('Baixar Documento', 'textdomain'); ?></a>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php
        // Paginação
        the_posts_pagination(array(
            'prev_text' => __('Anterior', 'textdomain'),
            'next_text' => __('Próximo', 'textdomain'),
        ));
        ?>
    <?php else : ?>
        <p><?php _e('Nenhum documento encontrado.', 'textdomain'); ?></p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>