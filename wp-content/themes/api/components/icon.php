<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'icon' );
function icon() {
    $arrPostTypes = ['casino'];
    Container::make( 'post_meta', __( 'Icon' ) )
    ->show_on_post_type($arrPostTypes)
    ->add_fields(array(
        Field::make('image', 'icon', 'Icon')->set_value_type( 'url' )
    ));
}