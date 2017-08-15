<?php
class Walker_Nightingale_Menu extends Walker_Nav_Menu {
    
    private $menuID;  // Store menu id so that sub-menus can reference their parent menus
    
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
      // start sub-menus
      $id = $this->menuID;  // retrieve the menu ID
      $output .= '<nav class="c-nav-primary__sub jsNavSub" id="menu-item-'.$id.'-sub" role="group" aria-label="submenu">';
      $output .= '<div class="o-wrapper">';
      $output .= '<div class="o-layout">';
      $output .= '<ul class="c-nav-primary__sub-links">';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
      // end sub-menus
      $output .= '</ul>';
      $output .= '</div>';  // o-layout
      $output .= '</div>';  // o-wrapper
      $output .= '</nav>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $classes = array();
      if( !empty( $item->classes ) ) {
          $classes = (array) $item->classes;
      }

      $active_class = '';
      if( in_array('current-menu-item', $classes) ) {
          $active_class = ' class="active"';
      } else if( in_array('current-menu-parent', $classes) ) {
          $active_class = ' class="active-parent"';
      } else if( in_array('current-menu-ancestor', $classes) ) {
          $active_class = ' class="active-ancestor"';
      }

      $url = '';
      if( !empty( $item->url ) ) {
          $url = $item->url;
      }

      $output .= '<li class="c-nav-primary__item"';
      if ( $depth == 0 && $args->walker->has_children ) {
        // parent-menus
        $output .= '><button class="c-nav-primary__link" data-expands=#menu-item-'.$item->ID.'-sub data-popup="" role="button" aria-expanded="false" aria-haspopup="true">'.$item->title.'</button>';
      }
      else {
        // menus without childen (including sub-menus)
        if( in_array('subnav-header', $classes) ) {
          // if css classes include text 'subnav-header' then display sub-menu panel header
          $output .= '<h4 class="u-margin-bottom-small">' . $item->title . '</h4>';
        } elseif( in_array('subnav-description', $classes) ) {
          // if css classes include text 'subnav-description' then display sub-menu panel description
          $output .= '<p class="u-margin-bottom-small"><small>' . $item->title . '</small></p>';
        } elseif( in_array('subnav-button', $classes) ) {
          // if css classes include text 'subnav-button' then display sub-menu panel button
          $output .= '<p class="u-margin-bottom-small"><a href="' . $url . '" class="c-btn  c-btn--primary  c-btn--full">'. $item->title .'</a></p>';
        } else {
          // standard menu item
          $output .= $active_class . '><a href="' . $url . '">' . $item->title . '</a>';
        }
      }
      $output .= '</li>';

      $this->menuID = $item->ID;  // store the menu ID

    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= '</li>';
    }

} // Walker_Nav_Menu