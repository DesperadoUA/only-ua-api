<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'amp_content');
function amp_content()
{
    $arrPostTypes = ['posts', 'page', 'casino', 'blog', 'payment', 'vendor'];
    /*--------------------------Add fields on posts----------------------------------------*/
    Container::make('post_meta', 'AMP content')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('rich_text', 'amp_content', 'AMP content'),
        ));
}