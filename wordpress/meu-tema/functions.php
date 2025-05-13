<?php
// Registrar Custom Post Type para Documentos
function registrar_cpt_documentos() {
    $labels = array(
        'name'               => _x('Documentos', 'Post Type General Name', 'textdomain'),
        'singular_name'      => _x('Documento', 'Post Type Singular Name', 'textdomain'),
        'menu_name'          => __('Documentos', 'textdomain'),
        'name_admin_bar'     => __('Documento', 'textdomain'),
        'add_new'            => __('Adicionar Novo', 'textdomain'),
        'add_new_item'       => __('Adicionar Novo Documento', 'textdomain'),
        'new_item'           => __('Novo Documento', 'textdomain'),
        'edit_item'          => __('Editar Documento', 'textdomain'),
        'view_item'          => __('Ver Documento', 'textdomain'),
        'all_items'          => __('Todos os Documentos', 'textdomain'),
        'search_items'       => __('Buscar Documentos', 'textdomain'),
        'not_found'          => __('Nenhum documento encontrado.', 'textdomain'),
        'not_found_in_trash' => __('Nenhum documento encontrado na lixeira.', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'documentos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'thumbnail'), // Suporte a título e imagem destacada
        'show_in_rest'       => true, // Habilita Gutenberg
        'taxonomies'         => array('categoria_documento'),
    );

    register_post_type('documento', $args);
}
add_action('init', 'registrar_cpt_documentos');

// Registrar Taxonomia Personalizada para Documentos
function registrar_taxonomia_documentos() {
    $labels = array(
        'name'              => _x('Categorias de Documentos', 'Taxonomy General Name', 'textdomain'),
        'singular_name'     => _x('Categoria de Documento', 'Taxonomy Singular Name', 'textdomain'),
        'search_items'      => __('Buscar Categorias', 'textdomain'),
        'all_items'         => __('Todas as Categorias', 'textdomain'),
        'parent_item'       => __('Categoria Pai', 'textdomain'),
        'parent_item_colon' => __('Categoria Pai:', 'textdomain'),
        'edit_item'         => __('Editar Categoria', 'textdomain'),
        'update_item'       => __('Atualizar Categoria', 'textdomain'),
        'add_new_item'      => __('Adicionar Nova Categoria', 'textdomain'),
        'new_item_name'     => __('Nome da Nova Categoria', 'textdomain'),
        'menu_name'         => __('Categorias', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // Como categorias, permite hierarquia
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-documento'),
        'show_in_rest'      => true,
    );

    register_taxonomy('categoria_documento', array('documento'), $args);
}
add_action('init', 'registrar_taxonomia_documentos');

// Adicionar Campo Personalizado para URL do Documento
function adicionar_metabox_documento() {
    add_meta_box(
        'documento_url_download',
        __('URL do Documento', 'textdomain'),
        'render_metabox_documento_url',
        'documento',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'adicionar_metabox_documento');

function render_metabox_documento_url($post) {
    wp_nonce_field('salvar_documento_url', 'documento_url_nonce');
    $url = get_post_meta($post->ID, '_documento_url', true);
    ?>
    <label for="documento_url"><?php _e('URL para Download do Documento', 'textdomain'); ?></label>
    <input type="url" name="documento_url" id="documento_url" value="<?php echo esc_url($url); ?>" style="width: 100%;" placeholder="https://exemplo.com/documento.pdf" />
    <?php
}

function salvar_documento_url($post_id) {
    if (!isset($_POST['documento_url_nonce']) || !wp_verify_nonce($_POST['documento_url_nonce'], 'salvar_documento_url')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['documento_url'])) {
        update_post_meta($post_id, '_documento_url', esc_url_raw($_POST['documento_url']));
    }
}
add_action('save_post', 'salvar_documento_url');






//--- MUDAR A LOGO DO WORDPRESS
function custom_login_logo() {
    echo '
    <style>
        .login h1 a {
            background-image: url(' . get_stylesheet_directory_uri() . '/images/logo.png);
            width: 300px; /* Ajuste conforme necessário */
            height: 80px;
            background-size: contain;
        }
    </style>';
}
add_action('login_head', 'custom_login_logo');
