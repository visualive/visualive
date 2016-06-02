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
(function ($, $$, $script, window, document, undefined) {
    'use strict';

    var VisuAlive = {
        /**
         * Define cache var.
         *
         * @since 1.0.0
         */
        cache: {},

        /**
         * Main Function.
         *
         * @since 1.0.0
         */
        init: function () {
            this.cacheElements();
            this.bindEvents();
        },

        /**
         * Cache Elements.
         *
         * @since 1.0.0
         */
        cacheElements: function () {
            this.cache = {
                $        : $,
                $script  : $script,
                $window  : $(window),
                window   : window,
                $document: $(document),
                document : document,
                wp       : VISUALIVE
            };
        },

        /**
         * Bind Events.
         *
         * @since 1.0.0
         */
        bindEvents: function () {
            // Store object in new var
            var self = this;

            // Run on document ready
            self.cache.$document.ready(function () {
                self.getVendor();
            });
        },

        /**
         * Get vendor scripts.
         *
         * @since 1.0.0
         */
        getVendor: function () {
            // Store object in new var
            var self = this;
        }
    };

    // Get things going
    VisuAlive.init();
})(window.jQuery, window.$$, window.script, window, document, undefined);
