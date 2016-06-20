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

        settings: {
            facebook : true,
            twitter  : true,
            analytics: true
        },

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
            // Store object in new var
            var self = this;
            var settings = $.extend({}, self.settings, VISUALIVE.settings);

            self.cache = {
                $        : $,
                $$       : $$,
                $window  : $(window),
                window   : window,
                $document: $(document),
                document : document,
                settings : settings,
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
                self.canopy();
                self.getWebFont();
                self.getPluginScripts();
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
            var queue;
            var filePlace;

            if (0 < self.cache.wp.queue.length) {
                for (var i = 0; i < self.cache.wp.queue.length; i++) {
                    queue = self.cache.wp.queue[i];
                    filePlace = true == self._isUrl(queue) ? self._removeDomain(queue) : queue;

                    $script(filePlace);
                }
            }

            if (true === self.cache.settings.facebook) {
                $script('//connect.facebook.net/ja_JP/sdk.js');
            }

            if (true === self.cache.settings.twitter) {
                $script('//platform.twitter.com/widgets.js');
            }

            if (true === self.cache.settings.analytics) {
                $script('//www.google-analytics.com/analytics.js');
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
        },

        /**
         * Is url
         * @param   {string}  url
         * @returns {boolean}
         * @private
         * @since 1.0.0
         */
        _isUrl: function (url) {
            var result = false;

            if (url !== undefined || url !== null) {
                var match = url.match(/^([\w]+:\/\/|\/\/)[^\/]+$/i);

                result = (match !== null);
            }

            return result;
        },

        /**
         * Remove domain
         * @param   {string} url
         * @returns {string}
         * @private
         * @since 1.0.0
         */
        _removeDomain: function (url) {
            // Store object in new var
            var self = this;
            var isUrl = self._isUrl(url);
            var result = url;

            if (isUrl) {
                result = url.replace(/^([\w]+:\/\/|\/\/)[^\/]+$/i, '');
            }

            return result;
        }
    };

    // Get things going
    VisuAlive.init();
})(window.jQuery, window.$$, window.script, window, document, undefined);
