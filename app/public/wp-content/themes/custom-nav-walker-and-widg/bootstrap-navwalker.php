<?php
class Bootstrap_Navwalker extends Walker_Nav_Menu 
{
    public function start_lvl( &$output, $depth = 0, $args = null ) 
    {
        $indent = str_repeat( "\t", $depth );
        $submenu = ( $depth > 0 ) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) 
    {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
        // echo $class_names;
        
        // echo $item->ID;
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        // echo $id;
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        // echo $id;
        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
        

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

       

        $attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
       
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        // echo $item_output;
        $item_output .= ( $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        
        $item_output .= $args->after;
        

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    //fallback function if gthere is no menu found in the mentioned location
    // public function fallback() 
    // {
    //     echo '<ul class="nav">';
    //     echo '<li class="nav-item"><a class="nav-link" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">';
    //     echo esc_html__('Add a menu', 'text-domain');
    //     echo '</a></li>';
    //     echo '</ul>';
    // }

    public static function fallback( $args ) 
    {
        if ( ! current_user_can( 'edit_theme_options' ) ) {
            return;
        }

        // Initialize var to store fallback html.
        $fallback_output = '';

        // Menu container opening tag.
        $show_container = false;
        if ( $args['container'] ) {
            /**
             * Filters the list of HTML tags that are valid for use as menu containers.
             *
             * @since WP 3.0.0
             *
             * @param array $tags The acceptable HTML tags for use as menu containers.
             *                    Default is array containing 'div' and 'nav'.
             */
            $allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
            if ( is_string( $args['container'] ) && in_array( $args['container'], $allowed_tags, true ) ) {
                $show_container   = true;
                $class            = $args['container_class'] ? ' class="menu-fallback-container ' . esc_attr( $args['container_class'] ) . '"' : ' class="menu-fallback-container"';
                $id               = $args['container_id'] ? ' id="' . esc_attr( $args['container_id'] ) . '"' : '';
                $fallback_output .= '<' . $args['container'] . $id . $class . '>';
            }
        }

        // The fallback menu.
        $class            = $args['menu_class'] ? ' class="menu-fallback-menu ' . esc_attr( $args['menu_class'] ) . '"' : ' class="menu-fallback-menu"';
        $id               = $args['menu_id'] ? ' id="' . esc_attr( $args['menu_id'] ) . '"' : '';
        $fallback_output .= '<ul' . $id . $class . '>';
        $fallback_output .= '<li class="nav-item"><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" class="nav-link" title="' . esc_attr__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '">' . esc_html__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '</a></li>';
        $fallback_output .= '</ul>';

        // Menu container closing tag.
        if ( $show_container ) {
            $fallback_output .= '</' . $args['container'] . '>';
        }

        // if $args has 'echo' key and it's true echo, otherwise return.
        if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $fallback_output;
        } else {
            return $fallback_output;
        }
    }
}
?>
