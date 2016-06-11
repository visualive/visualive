/*!
 * WordPress theme VisuAlive
 *
 * @package   VisuAlive
 * @version   1.0.0
 * @author    KUCKLU
 * @link      https://www.visualive.jp/
 * @copyright Copyright (c) 2016, VisuAlive & KUCKLU.
 * @license   GNU General Public License version 3
 *
 *            This program is free software: you can redistribute it and/or modify
 *            it under the terms of the GNU General Public License as published by
 *            the Free Software Foundation, either version 3 of the License.
 *
 *            This program is distributed in the hope that it will be useful,
 *            but WITHOUT ANY WARRANTY; without even the implied warranty of
 *            MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *            GNU General Public License for more details.
 *
 *            You should have received a copy of the GNU General Public License
 *            along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
$script = window.$script;

$script([
    VISUALIVE.assets_dir + '/js/vendor/webfontloader.min.js',
    VISUALIVE.assets_dir + '/js/vendor/jquery-3.0.0.min.js'
], 'bundle');

$script.ready('bundle', function () {
    // Ajax Cache
    jQuery.ajaxSetup({
        cache: true,
        async: true
    });

    // Google Fonts
    window.WebFontConfig = {
        google: {
            families: ['Lato:400,700,300:latin']
        },
        custom: {
            families: ['Noto Sans JP'],
            urls    : [
                VISUALIVE.theme_dir + '/webfont.css'
            ]
        }
    };

    if (typeof WebFont === 'object') {
        WebFont.load(WebFontConfig);
    }

    // jQuery dependent scripts.
    $script(VISUALIVE.assets_dir + '/js/vendor/jquery-selector-cache.js', 'jquery-selector-cache');
    $script.ready('jquery-selector-cache', function () {
        $script(VISUALIVE.theme_dir + '/assets/js/script.js');

        for (var i = 0; i < VISUALIVE.queue.length; i++) {
            $script(VISUALIVE.queue[i]);
        }
    });
});
