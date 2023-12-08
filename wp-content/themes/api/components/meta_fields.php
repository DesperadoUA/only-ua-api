<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'meta_fields');
function meta_fields()
{
    $arrPostTypes = ['posts', 'page', 'casino', 'blog', 'payment', 'vendor'];
    /*--------------------------Add fields on posts----------------------------------------*/
    Container::make('post_meta', 'Post Meta')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('text', 'meta_title', 'Meta title'),
            Field::make('text', 'meta_description', 'Meta description'),
            Field::make('text', 'meta_keywords', 'Meta keywords')
        ));
}

add_action('carbon_fields_register_fields', 'headers_meta_lang');
function headers_meta_lang()
{
    $arrPostTypes = ['posts', 'page', 'casino', 'blog', 'payment', 'vendor'];
    /*--------------------------Add fields on posts----------------------------------------*/
    Container::make('post_meta', 'Headers Meta Lang')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'complex', 'headers_meta_lang' )
                ->add_fields( array(
                        Field::make( 'select', 'headers_lang', 'Headers lang' )
                            ->add_options( array('ru-UA' => 'ru-UA', 'uk-UA' => 'uk-UA') ),
                        Field::make('text', 'headers_link', 'Ссылка на страницу'),
                    )
                )
        ));
}