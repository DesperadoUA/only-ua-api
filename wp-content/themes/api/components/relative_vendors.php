<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'relative_vendors' );
function relative_vendors() {
    $arrPostTypes = ['casino'];
    $vendors = include(ROOT_DIR.'/configs/vendors.php');
    $data = mapConfigForRelative($vendors);
    Container::make( 'post_meta', __( 'Relative Vendors' ) )
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('multiselect', 'relative_vendor', 'Список производителей')
                ->add_options($data)
        ));
}