<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'blog_fields');
function blog_fields()
{
    $arrPostTypes = ['blog'];
    /*--------------------------Add fields on posts----------------------------------------*/

    Container::make('post_meta', 'Post Author')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('text', 'post_author', 'Автор поста')
        ));
}