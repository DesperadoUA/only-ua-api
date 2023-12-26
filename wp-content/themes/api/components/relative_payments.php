<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'relative_pay_out' );
function relative_pay_out():void {
    $payments = include(ROOT_DIR.'/configs/payment.php');
    $arrPostTypes = ['casino'];
    $data = mapConfigForRelative($payments);
    Container::make( 'post_meta', __( 'Relative Pay Out' ) )
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('multiselect', 'relative_pay_out', 'Список платежных для вывода')
                ->add_options($data)
        ));
}
