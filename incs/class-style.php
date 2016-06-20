<?php
/**
 * Controlling the output of stylesheets.
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

class VisuAlive_Styles {
	use VisuAlive_Trait_Functions;

	/**
	 * Get instance.
	 *
	 * @since VisuAlive 1.0.0
	 * @return VisuAlive_Styles
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self;
		}

		return $instance;
	}

	private function __construct() {
		add_action( 'wp_enqueue_scripts', [ &$this, 'register_styles' ], 0 );
		add_action( 'wp_enqueue_scripts', [ &$this, 'enqueue_styles' ], 1 );
		add_filter( 'style_loader_tag', [ &$this, 'replace_style_tag' ] );
		add_filter( 'style_loader_src', [ &$this, 'remove_src_version' ] );
	}

	/**
	 * Register styles.
	 *
	 * @since VisuAlive 1.0.0
	 */
	public function register_styles() {
		wp_register_style( 'visualive', false );
	}

	/**
	 * Enqueue styles.
	 *
	 * @since VisuAlive 1.0.0
	 */
	public function enqueue_styles() {
		$styles = null;
		$files  = apply_filters( 'visualive_inline_styles', [
			get_template_directory() . '/assets/css/style.min.css',
		] );
		$styles = self::files_comb( $files );
		$styles = self::simplified_minify_styles( $styles );

		wp_add_inline_style( 'visualive', $styles );
		wp_enqueue_style( 'visualive' );
	}

	/**
	 * The rel attribute of the link tag is replaced.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $tag
	 *
	 * @return string
	 */
	public function replace_style_tag( $tag ) {
		$tag = preg_replace( '/rel=([\'|"])(.*?)([\'|"])(\s)/i', 'rel=$1$2 prefetch$3$4', $tag );
		$tag = str_replace( home_url(), '', $tag );

		return $tag;
	}

	/**
	 * Compressing stylesheets.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $styles
	 *
	 * @return string
	 */
	protected function simplified_minify_styles( $styles = '' ) {
		$styles = preg_replace( [
			'!/\*[^*]*\*+([^/][^*]*\*+)*/!',
			'/\t+/',
			'/\s{2,}/',
			'/\n/'
		], '', $styles );
		$styles = preg_replace( '/:\s/', ':', $styles );
		$styles = preg_replace( '/,\s/', ',', $styles );
		$styles = preg_replace( '/\s{/', '{', $styles );
		$styles = preg_replace( '/\.\.\//', self::remove_domain( get_template_directory_uri() ) . '/assets/', $styles );

		return sprintf( '%s', $styles );
	}
}