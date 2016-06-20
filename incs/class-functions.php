<?php
/**
 * VisuAlive functions.
 *
 * @package    WordPress
 * @subpackage VisuAlive
 * @author     KUCKLU <kuck1u@visualive.jp>
 *             Copyright (C) 2015 KUCKLU and VisuAlive.
 *             This program is free software: you can redistribute it and/or modify
 *             it under the terms of the GNU General Public License as published by
 *             the Free Software Foundation, either version 3 of the License, or
 *             (at your option) any later version.
 *             This program is distributed in the hope that it will be useful,
 *             but WITHOUT ANY WARRANTY; without even the implied warranty of
 *             MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *             GNU General Public License for more details.
 *             You should have received a copy of the GNU General Public License
 *             along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once dirname( dirname( __FILE__ ) ) . '/incs/class-style.php';
require_once dirname( dirname( __FILE__ ) ) . '/incs/class-script.php';
require_once dirname( dirname( __FILE__ ) ) . '/incs/class-jetpack.php';

class VisuAlive_Functions {
	/**
	 * Get instance.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @return VisuAlive_Functions
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self;
		}

		return $instance;
	}

	private function __construct() {
		/**
		 * Sets the content width in pixels, based on the theme's design and stylesheet.
		 * Priority 0 to make it available to lower priority callbacks.
		 */
		$GLOBALS['content_width'] = apply_filters( 'visualive_content_width', 840 );

		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Sixteen, use a find and replace
		 * to change 'visualive' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'visualive', get_template_directory() . '/langs' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Enqueues scripts and styles.
		 */
		VisuAlive_Styles::init();
		VisuAlive_Scripts::init();

		/**
		 * Jetpack Compatibility.
		 * See: http://jetpack.me/
		 */
		VisuAlive_Jetpack::init();

		/**
		 * Flush rewrite rules for Menus CPT on setup and switch.
		 */
		flush_rewrite_rules();
	}
}
