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
                $$       : $$,
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

            // Ajax Cache
            jQuery.ajaxSetup({
                cache: true,
                async: true
            });

            // AOS - Animate on scroll library.
            AOS.init({
                easing  : 'ease',
                duration: 1000
                //once: true
            });

            // Run on document ready
            self.cache.$document.ready(function () {
                self.getWebFont();
                self.getPluginScripts();
                self.canopy();
            });
        },

        /**
         * Get web fonts.
         *
         * @since 1.0.0
         */
        getWebFont: function () {
            // Store object in new var
            var self = this;

            self.cache.window.WebFontConfig = {
                google: {
                    families: ['Lato:400,700,300:latin']
                },
                custom: {
                    families: ['Noto Sans JP'],
                    urls    : [
                        self.cache.wp.assets_dir + '/css/webfont.min.css'
                    ]
                }
            };

            if (typeof WebFont === 'object') {
                WebFont.load(WebFontConfig);
            }
        },

        /**
         * Get plugin scripts.
         *
         * @since 1.0.0
         */
        getPluginScripts: function () {
            // Store object in new var
            var self = this;

            self.cache.wp.queue.unshift('//platform.twitter.com/widgets.js');
            self.cache.wp.queue.unshift('//connect.facebook.net/ja_JP/sdk.js');
            self.cache.wp.queue.unshift('//www.google-analytics.com/analytics.js');

            for (var i = 0; i < self.cache.wp.queue.length; i++) {
                $script(self.cache.wp.queue[i]);
            }
        },

        canopy: function () {
            // Store object in new var
            var self = this;
            var timer = false;
            var height = self.cache.$$(window).height();

            self.cache.$$('.canopy').css({"height": height});

            //self.cache.$$(window).resize(function () {
            //    if (timer !== false) {
            //        clearTimeout(timer);
            //    }
            //
            //    timer = setTimeout(function () {
            //        height = self.cache.$$(window).height() + 60;
            //
            //        self.cache.$$('.canopy').css({"height": height});
            //    }, 200);
            //});
        }
    };

    // Get things going
    VisuAlive.init();
})(window.jQuery, window.$$, window.script, window, document, undefined);
