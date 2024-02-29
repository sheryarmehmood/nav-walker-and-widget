<?php
class Practice_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = []) {
        // Change the submenu ul class
        $indent = str_repeat("\t", $depth);
        $output .= "\n{$indent}<ul class=\"dropdown-menu\">\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $output .= "<li class='" . implode(" ", $item->classes) . " nav-item";
        // Add dropdown class to li item that has children
        if ($args->walker->has_children) {
            $output .= ' dropdown';
        }
        $output .= "'>";
        $output .= '<a href="' . esc_url($item->url) . '"';
        if ($args->walker->has_children) {
            $output .= ' class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"';
        }
        // Add bootstrap classes to html a tags
        if ($depth === 0) {
            //add nav-link class to parent level a tags
            $output .= ' class="nav-link"';
        } else {
            //add dropdown-item class to submenu level items
            $output .= ' class="dropdown-item"';
        }
        $output .= '>';
        $output .= esc_html($item->title);
        $output .= '</a>';
        // ... (rest of the code remains unchanged)
    }
}//class Practice_Menu_Walker/