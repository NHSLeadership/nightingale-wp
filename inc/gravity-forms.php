<?php
/**
 * Style Gravity Forms
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

// Use gform_get_form_filter to style main form elements
// See https://docs.gravityforms.com/gform_get_form_filter/
add_filter( 'gform_get_form_filter', function ( $form_string, $form ) {

   // Style ul
   $form_string = str_replace( "class='gform_fields", "class='c-form-list gform_fields", $form_string );

   // Replace h3 with h2
   $form_string = str_replace( "<h3", "<h2", $form_string );
   $form_string = str_replace( "/h3>", "/h2>", $form_string );

   return $form_string;
}, 10, 2 );

// Use gform_field_content to style individual fields
// See https://docs.gravityforms.com/gform_field_content/
add_filter( 'gform_field_content', function ( $field_content, $field ) {

    // Text inputs
    if ( $field->type == 'text' ) {
      $field_content = str_replace( "type='text' value='' class='", "type='text' value='' class='c-form-input ", $field_content );
    }
    
    // Selects
    if ( $field->type == 'select' ) {
      $field_content = str_replace( "ginput_container ginput_container_select", "c-form-dropdown", $field_content );
      $field_content = str_replace( "gfield_select", "c-form-dropdown__select  c-form-input", $field_content );
    }

    // Emails
    if ( $field->type == 'email' ) {
      $field_content = str_replace( "type='email' value='' class='", "type='email' value='' class='c-form-input ", $field_content );
    }
    
    // Numbers
    if ( $field->type == 'number' ) {
      // Only change class of <input> elements, preserving all other values
      $field_content = preg_replace("#<input(.*?)class='#i", "<input$1class='c-form-input ", $field_content);
    }
    
    return $field_content;
}, 10, 2 );