<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'relative_blog_main_page' );
function relative_blog_main_page() {
    $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'blog',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );

    $data = [];
    foreach ($posts as $item) $data[$item->ID] = $item->post_title;

    Container::make( 'theme_options', __( 'Relative Blog' ) )
        ->set_page_parent('crb_carbon_fields_container.php')
        ->add_fields(array(
            Field::make('multiselect', 'relative_blog', '')
                ->add_options($data)
        ));
}
