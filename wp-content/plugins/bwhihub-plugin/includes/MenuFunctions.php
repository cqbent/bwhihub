<?php


class MenuFunctions {

	/*
	 * Get Menu Parent: return parent menu item
	 */
	function get_menu_parent($objId, $type = 'post_type') {
		$locations = get_nav_menu_locations();
		$menu_id   = $locations['primary_navigation'];
		$menu_items = wp_get_nav_menu_items($menu_id);  // get the main menu items
		$object_menu_item = wp_filter_object_list($menu_items,array('object_id'=>$objId, 'type'=>$type));  // get menu object from post
		$object_menu_item = array_shift($object_menu_item);
		$parent_object = $this->check_for_parent($object_menu_item,$menu_items);
		return $parent_object;
	}

	/*
	 * Check for parent: check if menu item is a parent or not
	 */
	function check_for_parent ($menu_item,$menu_items) {
		/* if no menu parent id then return menu item id as value; otherwise call this function again with parent id */
		if(empty($menu_item->menu_item_parent) || get_field('menu_item_image',$menu_item->ID)){
			return $menu_item;
		}
		else {
			$menu_parent = wp_filter_object_list($menu_items,array('ID'=>$menu_item->menu_item_parent));
			$menu_parent = array_shift( $menu_parent );
			return $this->check_for_parent($menu_parent,$menu_items);
		}
	}

	function check_for_path_parent() {
		$path = wp_get_post_parent_id();
	}

	function wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
		if ( isset( $args->sub_menu ) ) {
			$root_id = 0;

			// find the current menu item
			foreach ( $sorted_menu_items as $menu_item ) {
				if ( $menu_item->current ) {
					// set the root id based on whether the current menu item has a parent or not
					$root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
					break;
				}
			}

			// find the top level parent
			if ( ! isset( $args->direct_parent ) ) {
				$prev_root_id = $root_id;
				while ( $prev_root_id != 0 ) {
					foreach ( $sorted_menu_items as $menu_item ) {
						if ( $menu_item->ID == $prev_root_id ) {
							$prev_root_id = $menu_item->menu_item_parent;
							// don't set the root_id to 0 if we've reached the top of the menu
							if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
							break;
						}
					}
				}
			}
			$menu_item_parents = array();
			foreach ( $sorted_menu_items as $key => $item ) {
				// init menu_item_parents
				if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
				if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
					// part of sub-tree: keep!
					$menu_item_parents[] = $item->ID;
				} else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
					// not part of sub-tree: away with it!
					unset( $sorted_menu_items[$key] );
				}
			}

			return $sorted_menu_items;
		} else {
			return $sorted_menu_items;
		}
	}

}
