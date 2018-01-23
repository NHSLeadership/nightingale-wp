<?php
class Walker_Nightingale_Menu extends Walker_Nav_Menu {
    
    private $menuID;  // Store menu id so that sub-menus can reference their parent menus
    private $panel = False; // Indicates whether or not a submenu panel exists
    
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
      $item_output .= '</div><!-- .o-layout -->';
      $item_output .= '</div><!-- .o-wrapper -->';
      $item_output .= '</nav>';
      $item_output .= $args->after;
  		$output .= apply_filters( 'walker_nav_menu_end_lvl', $item_output, $depth, $args );
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      // start element output
      $classes = array();
      if( !empty( $item->classes ) ) {
          $classes = (array) $item->classes;
      }

      $url = '';
      if( !empty( $item->url ) ) {
          $url = $item->url;
      }
      
      $item_output = $args->before;
      
      if( $depth == 0 && $args->walker->has_children ) {
        // parent-menus
        $item_output .= '<li class="c-nav-primary__item"><button class="c-nav-primary__link" data-expands=#menu-item-'.$item->ID.'-sub data-popup="" role="button" aria-expanded="false" aria-haspopup="true">'.$item->title.'</button>';
      }
      else {

        // menus without childen (including sub-menus)
        if( in_array('subnav-header', $classes) ) {

          // if css class is 'subnav-header' then display sub-menu panel header
          $this->panel = True;  // Set panel flag (for layout)
          $item_output .= '<div class="o-layout__item  u-8/12@lg">';
          $item_output .= '<h4 class="u-margin-bottom-small">' . $item->title . '</h4>';

        } else if( in_array('subnav-description', $classes) ) {
          // if css class is 'subnav-description' then display sub-menu panel description
          $item_output .= '<p class="u-margin-bottom-small"><small>' . $item->title . '</small></p>';

        } else if( in_array('subnav-button--primary', $classes) ) {
          // if css class is 'subnav-button' then display sub-menu panel button
          $item_output .= '<p class="u-margin-bottom-small"><a href="' . $url . '" class="c-btn  c-btn--primary  c-btn--full">'. $item->title .'</a></p>';

        } else if( in_array('subnav-button--secondary', $classes) ) {
          // if css class is 'subnav-button' then display sub-menu panel button
          $item_output .= '<p class="u-margin-bottom-small"><a href="' . $url . '" class="c-btn  c-btn--secondary  c-btn--full">'. $item->title .'</a></p>';

        } else if( in_array('subnav-menu', $classes) ) {
          // if css class is subnav-menu then display links in columns

          if ($this->panel) {
            // If a submenu panel exists, close panel div and make menu list 1/4 width
            $item_output .= '</div><!-- .o-layout__item -->';
            $item_output .= '<div class="o-layout__item  u-4/12@lg">';
          } 
          else {
            // Otherwise, make menu list full width
            $item_output .= '<div class="o-layout__item">';
          }

          // Get menu named in custom link's Navigation Label
          $submenu_items = wp_get_nav_menu_items ($item->title);

          if($submenu_items) {
            // If custom link placeholder found, loop through items in named submenu

            $item_output .= '<div class="o-layout">';

            // Calculate column distribution based on number of submenu items & number of columns
            $columns = 2;
            $submenu_items_count = count($submenu_items);
            $max_column_items = ceil($submenu_items_count/$columns);

            // Loop though columns
            for ($x = 0 ; $x < $columns; $x++) { 

              // Size column based on how many 12ths it needs
              $item_output .= '<div class="o-layout__item  u-'.(12/$columns).'/12@lg">';

              // Output submenu items for this column
              $item_output .= '<ul class="c-nav-primary__sub-links">';
              $start_point = $max_column_items * $x;
              foreach( array_slice($submenu_items, $start_point, $max_column_items) as $submenu_item => $submenu_item_data ) {
                $item_output .= '<li class = "c-nav-primary__item"><a href="' . $submenu_item_data->url . '" class = "c-nav-primary__link" >' . $submenu_item_data->title . '</a></li><!-- .c-nav-primary__item -->';
              }
              $item_output .= '</ul><!-- .c-nav-primary__sub-links -->';
              $item_output .= '</div><!-- .o-layout__item -->';
            }

            $item_output .= '</div><!-- .o-layout -->';
            
          }
          $item_output .= '</div><!-- .o-layout__item -->';
        }

        else {
          // Display standard menu item
          $item_output .= '<li class = "c-nav-primary__item"><a href="' . $url . '" class = "c-nav-primary__link" >' . $item->title . '</a></li><!-- .c-nav-primary__item -->';
        }
      }

      $this->menuID = $item->ID;  // store the menu ID

      $item_output .= $args->after;
  		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }
    
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
      // end element output
      if( $depth == 0 && $args->walker->has_children ) {
        // parent-menus
        $output .= '</li><!-- .c-nav-primary__item -->';
      }
    }
    
} // Walker_Nav_Menu