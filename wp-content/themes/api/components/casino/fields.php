<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'casino_fields');
function casino_fields()
{

    $arr_country = [
        'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/Mask-Group-5-1.png' => 'Ua',
        'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/Mask-Group-6.png' => 'Ru',
        'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/Mask-Group-7.png' => 'En',
        'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/mask-group-9.png' => 'Pl',
    ];
    $arrPostTypes = ['casino'];
    /*--------------------------Add fields on posts----------------------------------------*/
    Container::make('post_meta', 'Fields')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'text', 'sub_title', 'Sub title'),
            Field::make( 'text', 'min_deposit', 'Минимальный депозит'),
            Field::make( 'text', 'min_payout', 'Минимальная выплата'),
            Field::make( 'text', 'valuta', 'Валюты'),
            Field::make( 'text', 'title_card_link', 'Тайтл ссылки карточки казино'),
            Field::make( 'text', 'title_stycky_left_link', 'Тайтл ссылки липких кнопок (левый)'),
            Field::make( 'text', 'title_stycky_right_link', 'Тайтл ссылки липких кнопок (правый)'),
            Field::make( 'complex', 'ref', 'Ref')
                ->add_fields( array(
                        Field::make('text', 'casino_ref', 'Реферальные ссылки'),
                    )
                ),
            Field::make( 'text', 'rating', 'Max 100'),
        ));

    Container::make('post_meta', 'Video')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'image', 'video_banner', 'Баннер')
                   ->set_default_value( 'https://media.onlinecasino.in.ua/wp-content/uploads/2021/04/no-img.png' )
                   ->set_value_type( 'url' ),
            Field::make( 'text', 'video_iframe', 'Ссылка на видео'),
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

    Container::make('post_meta', 'Currency')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'multiselect', 'currency' )
                ->add_options($arr_country)
        ));

    Container::make('post_meta', 'Reviews')
        ->show_on_post_type(['casino', 'blog'])
        ->add_fields(array(
            Field::make( 'complex', 'reviews_casino' )
            ->add_fields( array(
                Field::make('text', 'review_name', 'Имя'),
                Field::make( 'text', 'review_rating', 'Рейтинг, мак 100'),
                Field::make( 'text', 'review_date', 'Дата'),
                Field::make( 'textarea', 'review_text', 'Текст')
                )
            )
        ));

    Container::make('post_meta', 'Marker')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'radio_image', 'marker', 'Icon card' )
                ->add_options( array(
                    'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/recomended.png' => 'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/recomended.png',
                    'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/hot.png'  => 'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/hot.png',
                    'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/new.png'  => 'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/new.png',
                    'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/best.png' => 'https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/best.png'
                ) )
            ->set_default_value('https://media.onlinecasino.in.ua/wp-content/uploads/2021/03/recomended.png')
        ));

    Container::make( 'post_meta', 'FAQ' )
        ->show_on_post_type(['casino','blog', 'payment', 'vendor'])
        ->add_fields( array(
            Field::make('text', 'faq_title', 'Заголовок секции FAQ'),
            Field::make( 'complex', 'faq' )
                ->add_fields( array(
                    Field::make( 'text', 'question', 'Вопрос'),
                    Field::make( 'rich_text', 'answer', 'Ответ'),
                )),
        ));

    Container::make('post_meta', 'Licensed')
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make( 'multiselect', 'licensed', 'Licensed' )
                ->add_options( array(
                    'https://media.onlinecasino.in.ua/wp-content/uploads/2021/07/curacao_45.png' => 'curacao',
                    'https://media.onlinecasino.in.ua/wp-content/uploads/2021/07/mga_45.png' => 'mga',
                    'https://media.onlinecasino.in.ua/wp-content/uploads/2021/07/krail_45.png' => 'ua',
                ) )
        ));

    Container::make( 'post_meta', 'Event' )
        ->show_on_post_type(['casino'])
        ->add_fields( array(
            Field::make( 'complex', 'event', 'Event' )
                ->add_fields( array(
                    Field::make('text', 'event_title', 'Название события'),
                    Field::make('text', 'event_description', 'Описание события'),
                    Field::make('text', 'event_start', 'Начало события'),
                    Field::make('text', 'event_end', 'Конец события'),
                    Field::make('text', 'event_name', 'Имя'),
                    Field::make('text', 'event_site', 'Сайт казино'),
                    Field::make( 'complex', 'event_ref', 'Ref')
                        ->add_fields( array(
                                Field::make('text', 'event_ref', 'Реферальные ссылки'),
                            )
                        ),
                ))
        ));

    Container::make( 'post_meta', 'HowTo' )
        ->show_on_post_type(['casino'])
        ->add_fields( array(
            Field::make( 'complex', 'how_to_step', 'Step' )
                ->add_fields( array(
                    Field::make('text', 'how_to_step_title', 'Title step'),
                    Field::make('rich_text', 'how_to_step_description', 'Description step'),
                    Field::make('text', 'how_to_step_time_cod', 'Time cod'),
                    Field::make('text', 'how_to_step_time_front', 'Time Front'),
                    Field::make( 'complex', 'how_to_step_tools', 'Step tools' )
                        ->add_fields( array(
                            Field::make('text', 'how_to_step_tools_name', 'Step tools name'),
                            Field::make('text', 'how_to_step_tools_url', 'Step tools url'),
                        )),
                    Field::make( 'complex', 'how_to_step_links', 'Step links' )
                        ->add_fields( array(
                            Field::make('text', 'how_to_step_links_name', 'Step links name'),
                            Field::make('text', 'how_to_step_links_url', 'Step links url'),
                        )),
                    Field::make( 'complex', 'how_to_step_item', 'Step' )
                        ->add_fields( array(
                            Field::make('text', 'how_to_step_item_title', 'Title step'),
                            Field::make('rich_text', 'how_to_step_item_description', 'Description step'),
                            Field::make('image', 'how_to_step_item_thumbnail', 'Thumbnail')->set_value_type( 'url' )
                        ))
                ))
        ));
}