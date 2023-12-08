<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'marker' );
function marker() {
    $arrPostTypes = ['casino'];
    $markers = include(ROOT_DIR.'/configs/marker.php');
    $data = mapConfigForRelative($markers);
    Container::make( 'post_meta', __( 'Marker' ) )
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'radio', 'marker', 'Marker' )
            ->add_options($data)
        ));
}