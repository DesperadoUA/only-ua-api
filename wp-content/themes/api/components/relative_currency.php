<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'relative_currency' );
function relative_currency():void {
    $arrPostTypes = ['casino'];
    $currency = include(ROOT_DIR.'/configs/currency.php');
    $data = mapConfigForRelative($currency);
    Container::make( 'post_meta', __( 'Relative currency' ) )
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('multiselect', 'relative_currency', 'Список валют')
                ->add_options($data)
        ));
}