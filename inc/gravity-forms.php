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
      $field_content = preg_replace("#<input(.*?)class='#i", "<input$1class='c-form-input ", $field_content);
    }
    
    // Checkboxes
    if ( $field->type == 'checkbox' ) {

      // Replace main <label> elements with <strong>s
      $field_content = preg_replace("#<label class=(.*?)</label>#i", "<strong class=$1</strong>", $field_content);

      // Style <strong>s
      $field_content = str_replace("<strong class='gfield_label'", "<strong class='c-form-label'", $field_content);
      
      // Remove <div>s
      $field_content = preg_replace("#<div(.*?)>#i", "", $field_content);
      $field_content = str_replace("</div>", "", $field_content);

      // Remove <ul>s
      $field_content = preg_replace("#<ul(.*?)>#i", "", $field_content);
      $field_content = str_replace("</ul>", "", $field_content);

      // Replace <label>s with <span>s
      $field_content = preg_replace("#<label for=(.*?)>(.*?)</label>#i", "<span class='c-form-checkbox__faux'></span>$2", $field_content);
      
      // Replace <li> elements with <label>s
      $field_content = str_replace("<li class='", "<label class='c-form-checkbox ", $field_content);
      $field_content = str_replace("</li", "</label", $field_content);
      
      // Style <label>s
      $field_content = str_replace('gfield_checkbox', 'c-form-checkbox', $field_content);

      // Style <input>s
      $field_content = str_replace( "type='checkbox'", "type='checkbox' class='c-form-checkbox__input'", $field_content );

    }
    
    return $field_content;
}, 10, 2 );

// Use gform_get_form_filter to style main form elements
// See https://docs.gravityforms.com/gform_get_form_filter/
add_filter( 'gform_get_form_filter', function ( $form_string, $form ) {

   // Style <ul>
   $form_string = str_replace( "class='gform_fields", "class='c-form-list gform_fields", $form_string );

   // Replace <h3> with <h2>
   $form_string = str_replace( "<h3", "<h2", $form_string );
   $form_string = str_replace( "/h3>", "/h2>", $form_string );

   // Replace field description divs with <small> elements
   $form_string = preg_replace("#<div class='gfield_description'>(.*?)</div>#i", "<small>$1</small>", $form_string);

   return $form_string;
}, 10, 2 );