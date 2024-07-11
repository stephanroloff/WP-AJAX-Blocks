<?php

namespace CreateCustomPostType;

if(! class_exists('CreateCustomPostType\CustomPostType')){
    class CustomPostType {

        private $cpt_name;
        private $cpt_name_singular;
        private $cpt_name_plural;
        private $post_title;

        function __construct($cpt_name, $cpt_name_plural, $cpt_name_singular){
            $this->cpt_name = $cpt_name;
            $this->cpt_name_singular = $cpt_name_singular;
            $this->cpt_name_plural = $cpt_name_plural;

            add_action( 'init', array($this, 'create_custom_post_type') );
        }

        function create_custom_post_type() {
            $cpt_name = $this->cpt_name;
            $cpt_name_singular = $this->cpt_name_singular;
            $cpt_name_plural = $this->cpt_name_plural;

            // Set UI labels for Custom Post Type
                $labels = array(
                    'name'                => _x( $cpt_name_plural, 'Post Type General Name', 'default-theme' ),
                    'singular_name'       => _x( $cpt_name_singular, 'Post Type Singular Name', 'default-theme' ),
                    'menu_name'           => __( $cpt_name_plural, 'default-theme' ),
                    'parent_item_colon'   => __( "Parent $cpt_name_singular", 'default-theme' ),
                    'all_items'           => __( "All $cpt_name_plural", 'default-theme' ),
                    'view_item'           => __( "View $cpt_name_singular", 'default-theme' ),
                    'add_new_item'        => __( "Add New $cpt_name_singular", 'default-theme' ),
                    'add_new'             => __( "Add New", 'default-theme' ),
                    'edit_item'           => __( "Edit $cpt_name_singular", 'default-theme' ),
                    'update_item'         => __( "Update $cpt_name_singular", 'default-theme' ),
                    'search_items'        => __( "Search $cpt_name_singular", 'default-theme' ),
                    'not_found'           => __( 'Not Found', 'default-theme' ),
                    'not_found_in_trash'  => __( 'Not found in Trash', 'default-theme' ),
                );
                
            // Set other options for Custom Post Type
                
                $args = array(
                    'label'               => __( $cpt_name_plural, 'default-theme' ),
                    'description'         => __( "$cpt_name_singular news and reviews", 'default-theme' ),
                    'labels'              => $labels,
                    // Features this CPT supports in Post Editor
                    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                    // You can associate this CPT with a taxonomy or custom taxonomy.
                    'taxonomies'          => array( 'genres', 'category' ),
                    /* A hierarchical CPT is like Pages and can have
                    * Parent and child items. A non-hierarchical CPT
                    * is like Posts.
                    */
                    'hierarchical'        => false,
                    'public'              => true,
                    'show_ui'             => true,
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => true,
                    'show_in_admin_bar'   => true,
                    'menu_position'       => 5,
                    'menu_icon'           => 'dashicons-portfolio',
                    'can_export'          => true,
                    'has_archive'         => true, // Para agregar un archivo archive.html
                    // 'rewrite' => array('slug' => 'projekte'),
                    'exclude_from_search' => false,
                    'publicly_queryable'  => true,
                    'capability_type'     => 'post',
                    'show_in_rest' => true,
                    'template' => array(
                    array( 'core/pattern', array(
                        'slug' => 'theme-slug/el-patron',
                    ) ),
                    )
                );
                
                // Registering your Custom Post Type
                register_post_type( $cpt_name, $args );
        }

        function create_new_post($title) {

            add_action('wp_loaded', function() use ($title) {
                // Verifica si ya existe un post con el mismo título
                $existing_post = get_page_by_title($title, OBJECT, 'events');
        
                if (!$existing_post) {
                    $new_post = array(
                        'post_title'    => $title,
                        'post_content'  => 'This is a test event content.',
                        'post_status'   => 'publish', // o 'draft' si prefieres
                        'post_type'     => 'events',
                        // 'post_author'   => 1, // Asegúrate de que es un ID de usuario válido
                    );
        
                    // Insertar el post en la base de datos
                    $post_id = wp_insert_post($new_post);
        
                    if (!is_wp_error($post_id)) {
                        // Mensaje opcional para depuración
                        error_log('Post created successfully. Post ID: ' . $post_id);
                    }
                } else {
                    // Mensaje opcional para depuración
                    error_log('Post with this title already exists.');
                }
            });
        }

        function get_all_custom_post_types(){

            $cpt_name = $this->cpt_name;

            $args = array(
                'post_type' => $cpt_name, // Gibt den Post-Typ an
                'posts_per_page' => -1   // Ruft alle Posts ab
            );
            $all_posts = get_posts($args);

            return $all_posts;
        }

        function get_custom_post_types_by_id($post_id){
            $post = get_post($post_id);
            return $post;
        }
        
        //Meta Data
        function create_post_meta_data($post_id, $key_metadata, $value_metadata){
            update_post_meta( $post_id, $key_metadata, $value_metadata );
        }
        
        function update_post_meta_data($post_id, $key_metadata, $value_metadata){
            update_post_meta( $post_id, $key_metadata, $value_metadata );
        }

        function get_post_meta_data($post_id, $key_metadata){
            return get_post_meta( $post_id, $key_metadata, true );
        }
        
        function delete_post_meta_data($post_id, $key_metadata){
            return delete_post_meta( $post_id, $key_metadata );
        }

        //Array Meta Data
        function create_array_post_meta_data($post_id, $key_metadata){
            update_post_meta( $post_id, $key_metadata, array() );
        }

        function add_new_value_array_post_meta_data($post_id, $key_metadata, $array_value='', $array_key_name = '' ){
            $post_meta = get_post_meta( $post_id, $key_metadata, true );
            if(!$post_meta) return;

            if(is_array($post_meta)){

                if($array_key_name){
                    $post_meta[$array_key_name] = $array_value;
                }else{
                    array_push($post_meta, $array_value);
                }
            }else{
                echo '<p>Post meta data is not an array</p>';
            }
            update_post_meta( $post_id, $key_metadata, $post_meta );
        }

        function get_value_array_post_meta_data_by_key($post_id, $key_metadata, $array_key_name){
            $get_post_meta = get_post_meta( $post_id, $key_metadata, true ); 
            if(!$post_meta) return;

            return $get_post_meta[$array_key_name];  
        }

        function update_value_array_post_meta_data_by_key($post_id, $key_metadata, $array_key_name, $new_value){

            $post_meta = get_post_meta( $post_id, $key_metadata, true ); 
            if(!$post_meta) return;

            $post_meta[$array_key_name] = $new_value; 
            update_post_meta( $post_id, $key_metadata, $post_meta );

        }

        function delete_value_array_post_meta_data_by_key($post_id, $key_metadata, $array_key_name){
            $post_meta = get_post_meta( $post_id, $key_metadata, true ); 
            unset($post_meta[$array_key_name]);
            update_post_meta( $post_id, $key_metadata, $post_meta );
        }

        //all
        function get_all_post_meta_data($post_id){
            $all_meta = get_post_meta($post_id);
            return $all_meta;
        }
    }
}




