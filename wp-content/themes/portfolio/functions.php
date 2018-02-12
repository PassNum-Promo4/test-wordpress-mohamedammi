<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'favicon_link' );
?>
<?php
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type(
  'projet',
  array(
    'label' => 'Projets',
    'labels' => array(
      'name' => 'Projets',
      'singular_name' => 'Projet',
      'all_items' => 'Tous les projets',
      'add_new_item' => 'Ajouter un projet',
      'edit_item' => 'Éditer le projet',
      'new_item' => 'Nouveau projet',
      'view_item' => 'Voir le projet',
      'search_items' => 'Rechercher parmi les projets',
      'not_found' => 'Pas de projet trouvé',
      'not_found_in_trash'=> 'Pas de projet dans la corbeille'
      ),
    'public' => true,
    'capability_type' => 'post',
    'supports' => array(
      'title',
      'editor',
      'thumbnail'
    ),
    'has_archive' => true
  )
);
    register_taxonomy(
  'type',
  'projet',
  array(
    'label' => 'Types',
    'labels' => array(
    'name' => 'Types',
    'singular_name' => 'Type',
    'all_items' => 'Tous les types',
    'edit_item' => 'Éditer le type',
    'view_item' => 'Voir le type',
    'update_item' => 'Mettre à jour le type',
    'add_new_item' => 'Ajouter un type',
    'new_item_name' => 'Nouveau type',
    'search_items' => 'Rechercher parmi les types',
    'popular_items' => 'Types les plus utilisés'
  ),
  'hierarchical' => true
  )
);
register_taxonomy(
  'couleur',
  'projet',
  array(
    'label' => 'Couleurs',
    'labels' => array(
    'name' => 'Couleurs',
    'singular_name' => 'Couleur',
    'all_items' => 'Toutes les couleurs',
    'edit_item' => 'Éditer la couleur',
    'view_item' => 'Voir la couleur',
    'update_item' => 'Mettre à jour la couleur',
    'add_new_item' => 'Ajouter une couleur',
    'new_item_name' => 'Nouvelle couleur',
    'search_items' => 'Rechercher parmi les couleurs',
    'popular_items' => 'Couleurs les plus utilisées'
  ),
  'hierarchical' => false
  )
);
register_taxonomy_for_object_type( 'type', 'projet' );
register_taxonomy_for_object_type( 'couleur', 'projet' );
}
?>
<?php add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {
 if ( is_home() )
 $query->set( 'post_type', array( 'produit' ) );

 return $query;
}
?>