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
	 * Is url.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $url
	 *
	 * @return bool
	 */
	public static function is_url( $url = '' ) {
		return (bool) preg_match( '/^https?:\/\/[-_.!~*\"()a-zA-Z0-9;\/?:\@&=+\$,%#]+$/i', $url );
	}

	/**
	 * Plugin name: Strip WP Version in Stylesheets/Scripts
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param string $src
	 *
	 * @return string
	 */
	public static function remove_src_version( $src ) {
		global $wp_version;

		$version_str        = 'ver=' . $wp_version;
		$version_str_offset = strlen( $src ) - strlen( $version_str );

		if ( substr( $src, $version_str_offset ) == $version_str ) {
			$src = substr( $src, 0, $version_str_offset );
			$src = rtrim( $src, '?' );
			$src = rtrim( $src, '&' );

			return $src;
		} else {
			return $src;
		}
	}

	/**
	 * Theme path.
	 *
	 * @since VisuAlive 1.0.0
	 * @return array
	 */
	public static function theme_path() {
		$theme_dir  = self::remove_domain( get_template_directory_uri() );
		$assets_dir = $theme_dir . '/assets';

		return apply_filters( 'visualive_theme_path', [
			'theme_dir'  => $theme_dir,
			'assets_dir' => $assets_dir,
		] );
	}

	/**
	 * Files combination.
	 *
	 * @since VisuAlive 1.0.0
	 *
	 * @param array $files
	 *
	 * @return null|string
	 */
	public static function files_comb( $files = [ ] ) {
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
	public static function remove_domain( $url = '' ) {
		if ( true === self::is_url( $url ) ) {
			$url = preg_replace( '/^[\w]+:\/\/[^\/]+/i', '', $url );
		}

		return sprintf( '%s', $url );
	}

	/**
	 * Output the locale, doing some conversions to make sure the proper Facebook locale is outputted.
	 * Yoast SEO Plugin Thanks ! https://yoast.com/wordpress/plugins/seo/
	 *
	 * @see  http://www.facebook.com/translations/FacebookLocales.xml for the list of supported locales
	 * @link https://developers.facebook.com/docs/reference/opengraph/object-type/article/
	 * @return string $locale
	 */
	public static function get_locale() {
		$locale     = apply_filters( 'visualive_locale', get_locale() );
		$locales    = apply_filters(
			'visualive_locales', array(
				'ca' => 'ca_ES',
				'en' => 'en_US',
				'el' => 'el_GR',
				'et' => 'et_EE',
				'ja' => 'ja_JP',
				'sq' => 'sq_AL',
				'uk' => 'uk_UA',
				'vi' => 'vi_VN',
				'zh' => 'zh_CN',
			)
		);
		$fb_locales = apply_filters(
			'visualive_fb_locales', array(
				'af_ZA', // Afrikaans.
				'ar_AR', // Arabic.
				'az_AZ', // Azerbaijani.
				'be_BY', // Belarusian.
				'bg_BG', // Bulgarian.
				'bn_IN', // Bengali.
				'bs_BA', // Bosnian.
				'ca_ES', // Catalan.
				'cs_CZ', // Czech.
				'cx_PH', // Cebuano.
				'cy_GB', // Welsh.
				'da_DK', // Danish.
				'de_DE', // German.
				'el_GR', // Greek.
				'en_GB', // English (UK).
				'en_PI', // English (Pirate).
				'en_UD', // English (Upside Down).
				'en_US', // English (US).
				'eo_EO', // Esperanto.
				'es_ES', // Spanish (Spain).
				'es_LA', // Spanish.
				'et_EE', // Estonian.
				'eu_ES', // Basque.
				'fa_IR', // Persian.
				'fb_LT', // Leet Speak.
				'fi_FI', // Finnish.
				'fo_FO', // Faroese.
				'fr_CA', // French (Canada).
				'fr_FR', // French (France).
				'fy_NL', // Frisian.
				'ga_IE', // Irish.
				'gl_ES', // Galician.
				'gn_PY', // Guarani.
				'gu_IN', // Gujarati.
				'he_IL', // Hebrew.
				'hi_IN', // Hindi.
				'hr_HR', // Croatian.
				'hu_HU', // Hungarian.
				'hy_AM', // Armenian.
				'id_ID', // Indonesian.
				'is_IS', // Icelandic.
				'it_IT', // Italian.
				'ja_JP', // Japanese.
				'ja_KS', // Japanese (Kansai).
				'jv_ID', // Javanese.
				'ka_GE', // Georgian.
				'kk_KZ', // Kazakh.
				'km_KH', // Khmer.
				'kn_IN', // Kannada.
				'ko_KR', // Korean.
				'ku_TR', // Kurdish.
				'la_VA', // Latin.
				'lt_LT', // Lithuanian.
				'lv_LV', // Latvian.
				'mk_MK', // Macedonian.
				'ml_IN', // Malayalam.
				'mn_MN', // Mongolian.
				'mr_IN', // Marathi.
				'ms_MY', // Malay.
				'nb_NO', // Norwegian (bokmal).
				'ne_NP', // Nepali.
				'nl_NL', // Dutch.
				'nn_NO', // Norwegian (nynorsk).
				'pa_IN', // Punjabi.
				'pl_PL', // Polish.
				'ps_AF', // Pashto.
				'pt_BR', // Portuguese (Brazil).
				'pt_PT', // Portuguese (Portugal).
				'ro_RO', // Romanian.
				'ru_RU', // Russian.
				'si_LK', // Sinhala.
				'sk_SK', // Slovak.
				'sl_SI', // Slovenian.
				'sq_AL', // Albanian.
				'sr_RS', // Serbian.
				'sv_SE', // Swedish.
				'sw_KE', // Swahili.
				'ta_IN', // Tamil.
				'te_IN', // Telugu.
				'tg_TJ', // Tajik.
				'th_TH', // Thai.
				'tl_PH', // Filipino.
				'tr_TR', // Turkish.
				'uk_UA', // Ukrainian.
				'ur_PK', // Urdu.
				'uz_UZ', // Uzbek.
				'vi_VN', // Vietnamese.
				'zh_CN', // Simplified Chinese (China).
				'zh_HK', // Traditional Chinese (Hong Kong).
				'zh_TW', // Traditional Chinese (Taiwan).
			)
		);

		// Convert locales like "en" to "en_US", in case that works for the given locale (sometimes it does).
		if ( isset( $locales[ $locale ] ) ) {
			$locale = $locales[ $locale ];
		} elseif ( strlen( $locale ) == 2 ) {
			$locale = strtolower( $locale ) . '_' . strtoupper( $locale );
		} else {
			$locale = strtolower( substr( $locale, 0, 2 ) ) . '_' . strtoupper( substr( $locale, 0, 2 ) );
		}

		// Check to see if the locale is a valid FB one, if not, use en_US as a fallback.
		if ( ! in_array( $locale, $fb_locales ) ) {
			$locale = 'en_US';
		}

		return $locale;
	}
}