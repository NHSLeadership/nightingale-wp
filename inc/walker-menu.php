<?php
// Main menu
class Walker_Nightingale_Menu extends Walker_Nav_Menu {
  /**
   * Filter used to remove built in WordPress-generated classes
   * @param  mixed $var The array item to verify
   * @return boolean      Whether or not the item matches the filter
   */
   private $menuID;

  function filter_builtin_classes( $var ) {
  return ( FALSE === strpos( $var, 'item' ) ) ? $var : ''; 
  }

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    // retrieve the menu ID
    $id = $this->menuID;
    $indent = str_repeat("\t", $depth);
    $menuSuffix = $depth + 1;
    $output .= "\n$indent<nav class='c-nav-primary__sub  jsNavSub' id=menu-item-$id-$menuSuffix>\n";
  }
  
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $unfiltered_classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes = array_filter( $unfiltered_classes, array( $this, 'filter_builtin_classes' ) );

    if ( preg_grep("/^current/", $unfiltered_classes) ) {
      $classes[] = 'active';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names .= ' c-nav-primary__item';
    $class_names = $class_names ? ' class="' . ltrim(esc_attr( $class_names )) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

    $item_output = "\n<li class='c-nav-primary__item' id=menu-item-$item->ID>";
    if ( $depth == 0 && $args->walker->has_children ) {
      $menuSuffix = $depth + 1;
      $item_output .= sprintf( "<button class='c-nav-primary__link' data-expands=#menu-item-".$item->ID."-$menuSuffix data-popup='' role='button' aria-expanded='false' aria-haspopup='true'>".$item->title."</button>",
          $item->url,
          ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
          $item->title
      );
    } else
      $item_output .= sprintf( "<a href='%s'%s>%s</a>",
          $item->url,
          ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
          $item->title
      );
      $item_output .= "</li>\n";

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    // store the menu ID
    $this->menuID = $item->ID;
  }

} // Walker_Nav_Menu