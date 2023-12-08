<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'relative_languages' );
function relative_languages() {
    $arrPostTypes = ['casino'];
    $languages = include(ROOT_DIR.'/configs/languages.php');
    $data = mapConfigForRelative($languages);
    Container::make( 'post_meta', __( 'Relative languages' ) )
        ->show_on_post_type($arrPostTypes)
        ->add_fields(array(
            Field::make('multiselect', 'relative_languages', 'Список языков')
                ->add_options($data)
        ));
}