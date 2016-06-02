<?php
/**
 * Controlling the output of javascript.
 *
 * @package    WordPress
 * @subpackage VisuAlive
 * @author     KUCKLU <kuck1u@visualive.jp>
 *             Copyright (C) 2015  KUCKLU and VisuAlive.
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

class VisuAlive_Scripts {
	use VisuAlive_Trait_Functions;

	/**
	 * $to_do An array of script dependencies.
	 *
	 * @var null
	 */
	protected $to_do = [ ];

	/**
	 * Get instance.
	 *
	 * @since VisuAlive 1.0.0
	 * @return VisuAlive_Scripts
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new VisuAlive_Scripts;
		}

		return $instance;
	}

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ &$this, 'register_scripts' ], 10 );
		add_action( 'wp_enqueue_scripts', [ &$this, 'enqueue_scripts' ], 20 );
		add_filter( 'script_loader_tag', [ &$this, 'replace_script_tag' ] );
	}

	/**
	 * Register scripts.
	 *
	 * @since VisuAlive 1.0.0
	 */
	public function register_scripts() {
		$wp_scripts = wp_scripts();

		$wp_scripts->remove( 'jquery' );
		$wp_scripts->remove( 'jquery-core' );
		$wp_scripts->remove( 'jquery-migrate' );

		wp_register_script( 'jquery', false, [ 'jquery-core' ], false, true );
		wp_register_script( 'jquery-core', get_template_directory_uri() . '/assets/js/apps.js', [ ], false, true );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since VisuAlive 1.0.0
	 */
	public function enqueue_scripts() {
		$incs_dir  = '/' . WPINC;
		$theme_dir = preg_replace( '/^https?:\/\/[^\/]+/i', '', get_template_directory_uri() );
		$l10n      = [
			'incs_dir'   => $incs_dir,
			'theme_dir'  => $theme_dir,
			'assets_dir' => $theme_dir . '/assets',
			'queue'      => self::jquery_dependent_scripts(),
		];
		$files     = [
			get_template_directory() . '/assets/js/vendor/script.min.js',
		];
		$scripts   = self::files_comb( $files );
		$scripts   = self::simplified_minify_scripts( $scripts );

		wp_add_inline_script( 'jquery-core', $scripts, 'before' );
		wp_localize_script( 'jquery-core', 'VISUALIVE', $l10n );
		wp_enqueue_script( 'jquery' );
	}

	/**
	 * jQuery dependent scripts.
	 *
	 * @since VisuAlive 1.0.0
	 * @return array
	 */
	protected function jquery_dependent_scripts() {
		$wp_scripts = wp_scripts();
		$index      = 0;
		$scripts    = [ ];

		if ( isset( wp_scripts()->queue ) && ! empty( wp_scripts()->queue ) ) {
			foreach ( wp_scripts()->queue as $key => $handle ) {
				$deps = $wp_scripts->registered[ $handle ]->deps;

				if ( false !== array_search( 'jquery', $deps, true ) ) {
					$scripts[] = preg_replace( '/^https?:\/\/[^\/]+/i', '', $wp_scripts->registered[ $handle ]->src );
					if ( isset( $wp_scripts->registered[ $handle ]->extra ) && ! empty( $wp_scripts->registered[ $handle ]->extra ) ) {
						foreach ( $wp_scripts->registered[ $handle ]->extra as $ex_key => $ex_value ) {
							switch ( $ex_key ) {
								case 'before' :
									wp_add_inline_script( 'jquery-core', $ex_value[1], 'before' );
									break;
								case 'after' :
									wp_add_inline_script( 'jquery-core', $ex_value[1], 'after' );
									break;
								case 'data' :
									wp_add_inline_script( 'jquery-core', $ex_value, 'before' );
									break;
							}
						}
					}

					$wp_scripts->remove( $handle );
					$index ++;
				}
			}
		}

		return $scripts;
	}

	/**
	 * Filter the HTML script tag of an enqueued script.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $tag    The `<script>` tag for the enqueued script.
	 * @param string $handle The script's registered handle.
	 * @param string $src    The script's source URL.
	 *
	 * @return string
	 */
	public function replace_script_tag( $tag ) {
		$tag = preg_replace( '/\ssrc=([\'|"])(.*?)([\'|"])>/i', ' src=$1$2$3 async>', $tag );
		$tag = str_replace( home_url(), '', $tag );

		return $tag;
	}

	/**
	 * Compressing javascript.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $scripts
	 *
	 * @return string
	 */
	protected function simplified_minify_scripts( $scripts = '' ) {
		$scripts = preg_replace( [
			'/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/',
			'/\t+/',
			'/\s{2,}/',
			'/\n/'
		], '', $scripts );
		$scripts = preg_replace( '/\s{/', '{', $scripts );

		return sprintf( '%s', $scripts );
	}
}