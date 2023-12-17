<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Мои настройки' ) )
        ->add_fields(array(
            Field::make('text', 'main_page_text', 'Текст в баннере главной страницы'),
            Field::make('text', 'footer_text', 'Текст в футере'),
            Field::make('rich_text', 'footer_desc', 'Описание в футере'),
            Field::make('image', 'logo', 'Лого')
                ->set_width(50)
                ->set_value_type( 'url' ),
            Field::make( 'complex', 'partners', 'Партнеры')
                ->add_fields( array(
                        Field::make('image', 'partners_img', 'Картинка для партнеров')
                            ->set_width(33)
                            ->set_value_type( 'url' ),
                        Field::make('text', 'partners_link', 'Ссылка')
                            ->set_width(33),
                        Field::make('text', 'partners_width', 'Ширина картинки')
                            ->set_width(33),
                    )
                ),
            Field::make( 'complex', 'header_menu', 'Меню в хедере')
                ->add_fields( array(
                        Field::make('image', 'header_menu_img', 'Иконка')
                            ->set_width(33)
                            ->set_value_type( 'url' ),
                        Field::make('text', 'header_menu_link', 'Ссылка')
                            ->set_width(33),
                        Field::make('text', 'header_menu_text', 'Якорь')
                            ->set_width(33),
                    )
                ),
        ));
}