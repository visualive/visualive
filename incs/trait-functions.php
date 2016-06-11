<?php
/**
 * Common features.
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

trait VisuAlive_Trait_Functions {
	/**
	 * Files combination.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param array $files
	 *
	 * @return string
	 */
	public function files_comb( $files = [ ] ) {
		$codes = null;

		if ( is_array( $files ) && ! empty( $files ) ) {
			ob_start();
			foreach ( $files as $file ) {
				if ( file_exists( $file ) ) {
					readfile( $file );
				}
			}
			$codes = ob_get_contents();
			ob_end_clean();
		}

		return sprintf( '%s', $codes );
	}

	/**
	 * Remove domain.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	public function remove_domain( $url = '' ) {
		if ( true === self::is_url( $url ) ) {
			$url = preg_replace( '/^https?:\/\/[^\/]+/i', '', $url );
		}

		return sprintf( '%s', $url );
	}

	/**
	 * Is url.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $url
	 *
	 * @return bool
	 */
	public function is_url( $url = '' ) {
		return (bool) preg_match( '/^https?:\/\/[-_.!~*\"()a-zA-Z0-9;\/?:\@&=+\$,%#]+$/i', $url );
	}
}