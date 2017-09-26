<?php
/**
 * Style Gravity Forms using gform_field_css_class https://docs.gravityforms.com/gform_field_css_class/
 * which uses the field object https://docs.gravityforms.com/field-object/
 * Field Types are:
 *  text
 *  textarea
 *  checkbox
 *  radio
 *  email
 *  number
 *  select
 *  multiselect
 */
add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );
function custom_class( $classes, $field, $form ) {
    if ( $field->type == 'text' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'textarea' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'checkbox' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'radio' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'email' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'number' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'select' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'multiselect' ) {
        $classes .= ' ';
    }
    if ( $field->type == 'select' ) {
        $classes .= ' ';
    }
    return $classes;
}