<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'h1');
function h1()
{
    $arrPostTypes = ['posts', 'page', 'casino', 'game'];
    /*--------------------------Add fields on posts----------------------------------------*/
    Container::make('post_meta', 'H1')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('text', 'h1', 'H1')
        ));
}