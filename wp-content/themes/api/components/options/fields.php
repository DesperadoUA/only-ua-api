<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Мои настройки' ) )
        ->add_fields(array(
            Field::make('text', 'main_page_text', 'Текст в баннере главной страницы'),
            Field::make('text', 'footer_text', 'Текст в футере'),
            Field::make('image', 'security_logo', 'Лого безопасности')
                ->set_width(50)
                ->set_value_type( 'url' ),
            Field::make('image', 'logo', 'Лого')
                ->set_width(50)
                ->set_value_type( 'url' ),
            Field::make( 'complex', 'social', 'Соц сети')
                ->add_fields( array(
                        Field::make('image', 'social_img', 'Картинка для соц сети')
                              ->set_width(50)
                              ->set_value_type( 'url' ),
                        Field::make('text', 'social_link', 'Ссылка')
                              ->set_width(50),
                    )
                ),
            Field::make( 'complex', 'partners', 'Партнеры')
                ->add_fields( array(
                        Field::make('image', 'partners_img', 'Картинка для партнеров')
                            ->set_width(50)
                            ->set_value_type( 'url' ),
                        Field::make('text', 'partners_link', 'Ссылка')
                            ->set_width(50),
                    )
                ),
        ));
}