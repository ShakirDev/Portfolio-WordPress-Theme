<?php
// Function to add a class to menu items that have submenus
function add_menu_parent_class($items)
{
    $parents = array();
    foreach ($items as $item) {
        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
            $parents[] = $item->menu_item_parent;
        }
    }
    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            $item->classes[] = 'menu-item-has-children';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'add_menu_parent_class');

// Custom Walker class for navigation menu
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $has_children = in_array('menu-item-has-children', $item->classes);
        $output .= "<li class='nav-item" . ($has_children ? " menu-item-has-children" : "") . "'>";
        $output .= '<a href="' . $item->url . '">';
        $output .= $item->title;
        if ($has_children) {
            $output .= '<i class="fas fa-chevron-down" data-icon="down"></i>';  // Added data-icon="down"
        }
        $output .= '</a>';
    }
}
