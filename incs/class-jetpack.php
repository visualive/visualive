<?php
/**
 * VisuAlive jetpack.
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

class VisuAlive_Jetpack {
	/**
	 * Get instance.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @return VisuAlive_Jetpack
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
		 * Add support for Testimonials CPT
		 */
		add_theme_support( 'jetpack-testimonial' );

		/**
		 * Add support for Portfolio CPT
		 */
		add_theme_support( 'jetpack-portfolio' );

		/**
		 * Add support for the Nova CPT (menu items)
		 */
		add_theme_support( 'nova_menu_item' );
	}
}
