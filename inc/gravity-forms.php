<?php
/**
 * Style Gravity Forms using gform_field_css_class https://docs.gravityforms.com/gform_field_css_class/.
 * Field Types are:
 *  textarea
 *  checkbox
 *  radio
 *  select
 *  text
 *  email
 *  number
 *  multiselect
 */
add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );
function custom_class( $classes, $field, $form ) {
    echo "Type = ".$field->type."<br/>";
    echo "Label = ".$field->label."<br/>";
    echo "Description = ".$field->description."<br/>";
    if ( $field->type == 'text' ) {
        $classes .= ' c-form-input';
    }
    if ( $field->type == 'textarea' ) {
        $classes .= ' c-form-input';
    }
    if ( $field->type == 'label' ) {
        $classes .= ' big';
    }
    return $classes;
}