<?php
class Walker_Nightingale_Menu extends Walker_Nav_Menu {
    
    private $menuID;  // Store menu id so that sub-menus can reference their parent menus
    
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
      // start sub-menus
      $item_output = $args->before;
      $id = $this->menuID;  // retrieve the menu ID
      $item_output .= '<nav class="c-nav-primary__sub jsNavSub" id="menu-item-'.$id.'-sub" role="group" aria-label="submenu">';
      $item_output .= '<div class="o-wrapper">';
      $item_output .= '<div class="o-layout">';
      $item_output .= $args->after;
  		$output .= apply_filters( 'walker_nav_menu_start_lvl', $item_output, $depth, $args );
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
      // end sub-menus
      $item_output = $args->before;
      $item_output .= '</div><!-- .o-layout__item -->';
      $item_output .= '</div><!-- .o-layout -->';
      $item_output .= '</div><!-- .o-wrapper -->';
      $item_output .= '</nav>';
      $item_output .= $args->after;
  		$output .= apply_filters( 'walker_nav_menu_end_lvl', $item_output, $depth, $args );
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $classes = array();
      if( !empty( $item->classes ) ) {
          $classes = (array) $item->classes;
      }

      $url = '';
      if( !empty( $item->url ) ) {
          $url = $item->url;
      }
      
      $item_output = $args->before;

      // Open sub-menu panel
      if( in_array('subnav-header', $classes) ) {
        $item_output .= '<div class="o-layout__item  u-6/12@lg">';
      }
      
      if( $depth == 0 && $args->walker->has_children ) {
        // parent-menus
        $item_output .= '<li class="c-nav-primary__item"><button class="c-nav-primary__link" data-expands=#menu-item-'.$item->ID.'-sub data-popup="" role="button" aria-expanded="false" aria-haspopup="true">'.$item->title.'</button></li><!-- .c-nav-primary__item -->';
      }
      else {
        // menus without childen (including sub-menus)
        if( in_array('subnav-header', $classes) ) {
          // if css classes include text 'subnav-header' then display sub-menu panel header
          $item_output .= '<h4 class="u-margin-bottom-small">' . $item->title . '</h4>';
        } else if( in_array('subnav-description', $classes) ) {
          // if css classes include text 'subnav-description' then display sub-menu panel description
          $item_output .= '<p class="u-margin-bottom-small"><small>' . $item->title . '</small></p>';
        } else if( in_array('subnav-button', $classes) ) {
          // if css classes include text 'subnav-button' then display sub-menu panel button
          $item_output .= '<p class="u-margin-bottom-small"><a href="' . $url . '" class="c-btn  c-btn--primary  c-btn--full">'. $item->title .'</a></p>';
        } else {
          // standard menu item
          $item_output .= '<li class = "c-nav-primary__item"><a href="' . $url . '" class = "c-nav-primary__link" >' . $item->title . '</a></li><!-- .c-nav-primary__item -->';
        }
      }

      $this->menuID = $item->ID;  // store the menu ID

      // Close sub-menu panel and open next div
      if( in_array('subnav-button', $classes) ) {
        $item_output .= '</div><!-- .o-layout__item -->';
        $item_output .= '<div class="o-layout__item  u-6/12@lg">';
        $item_output .= '<ul class="c-nav-primary__sub-links">';
      }

      $item_output .= $args->after;
  		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }

} // Walker_Nav_Menu