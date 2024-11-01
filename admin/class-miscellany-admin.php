<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rahulkumar.website
 * @since      1.0.0
 *
 * @package    Miscellany
 * @subpackage Miscellany/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Miscellany
 * @subpackage Miscellany/admin
 * @author     Rahul Kumar <rahulverma.rkv@gmail.com>
 */
class Miscellany_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Miscellany_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Miscellany_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/miscellany-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Miscellany_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Miscellany_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/miscellany-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register Post Type on plugin init
	 * 
	 * @since    1.0.0
	 */
	public function mslny_register_post_type() {
        // Set UI labels for Miscellany Post Type
        $labels = array(
            'name'                => _x( 'Miscellanies', 'Post Type General Name', 'miscellany' ),
            'singular_name'       => _x( 'Miscellany', 'Post Type Singular Name', 'miscellany' ),
            'menu_name'           => __( 'Miscellany', 'miscellany' ),
            'parent_item_colon'   => __( 'Parent Miscellany', 'miscellany' ),
            'all_items'           => __( 'All', 'miscellany' ),
            'view_item'           => __( 'View Miscellany', 'miscellany' ),
            'add_new_item'        => __( 'Add New Miscellany', 'miscellany' ),
            'add_new'             => __( 'Add New', 'miscellany' ),
            'edit_item'           => __( 'Edit Miscellany', 'miscellany' ),
            'update_item'         => __( 'Update Miscellany', 'miscellany' ),
            'search_items'        => __( 'Search Miscellany', 'miscellany' ),
            'not_found'           => __( 'Not Found', 'miscellany' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'miscellany' ),
        );
          
        // Set other options for Miscellany Post Type
        $args = array(
            'label'               => __( 'Miscellany', 'miscellany' ),
            'description'         => __( 'make your collection', 'miscellany' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
            'taxonomies'          => array('miscellany_category', 'tools_used', 'miscellany_tag'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest'        => true,
      
        );
          
        // Registering your Miscellany Post Type
        register_post_type( 'miscellany', $args );
        
        // Registering category taxonomy for Miscellany Post Type
        register_taxonomy('miscellany_category','miscellany',array(
            'hierarchical' => true,
            'labels' => array(
                'name' => _x( 'Category', 'taxonomy general name' ),
                'singular_name' => _x( 'Category', 'taxonomy singular name' ),
                'menu_name' => __( 'Categories' ),
                'all_items' => __( 'All Category' ),
                'edit_item' => __( 'Edit Category' ), 
                'update_item' => __( 'Update Category' ),
                'add_new_item' => __( 'Add Category' ),
                'new_item_name' => __( 'New Category' ),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
        ));
        
        // Registering tags taxonomy for Miscellany Post Type
        register_taxonomy('miscellany_tag','miscellany',array(
            'hierarchical' => false,
            'labels' => array(
                'name' => _x( 'Tags', 'taxonomy general name' ),
                'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
                'menu_name' => __( 'Tags' ),
                'all_items' => __( 'All Tags' ),
                'edit_item' => __( 'Edit Tag' ), 
                'update_item' => __( 'Update Tag' ),
                'add_new_item' => __( 'Add Tag' ),
                'new_item_name' => __( 'New Tag' ),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
        ));
        
        // Registering tools-used taxonomy for Miscellany Post Type
        register_taxonomy('tools_used','miscellany',array(
            'hierarchical' => false,
            'labels' => array(
                'name' => _x( 'Tools/Language Used', 'taxonomy general name' ),
                'singular_name' => _x( 'Tools/Language Used', 'taxonomy singular name' ),
                'menu_name' => __( 'Tools/Language' ),
                'all_items' => __( 'All Tools' ),
                'edit_item' => __( 'Edit Tools' ), 
                'update_item' => __( 'Update Tools' ),
                'add_new_item' => __( 'Add Tools/Language' ),
                'new_item_name' => __( 'New Tools' ),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
        ));
        
    }

}
