<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'casino_fields');
function casino_fields():void {
    $arrPostTypes = ['casino'];
    /*--------------------------Add fields on posts----------------------------------------*/
    Container::make('post_meta', 'Fields')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'text', 'bonus_value', 'Размер бонуса'),
            Field::make( 'text', 'min_dep', 'Минимальный депозит'),
            Field::make( 'text', 'wager', 'Wager'),
            Field::make( 'color', 'color', 'Background' )
                ->set_alpha_enabled( true ),
            Field::make( 'complex', 'advantages', 'Advantages')
                ->add_fields( array(
                        Field::make('text', 'advantages', 'Преимущества'),
                    )
                ),
            Field::make( 'text', 'rating', 'Rating max 100'),
        ));
    Container::make('post_meta', 'Bonuses')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'complex', 'bonuses' )
                ->add_fields( array(
                    Field::make( 'text', 'bonuses_title', 'Title'),
                    Field::make( 'text', 'bonuses_value', 'Value'),
                    Field::make( 'text', 'bonuses_sub_title', 'Sub Title'),
                ))
        ));
}