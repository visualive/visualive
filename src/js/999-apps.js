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
(function ($, $script, window, document, undefined) {
    "use strict";

    var VisuAlive = {
        /**
         * Define cache var.
         *
         * @since 1.0.0
         */
        cache: {},

        settings: {
            locale         : "en_US",
            facebookAppID  :"",
            facebook       : true,
            twitter        : true,
            googleAnalytics: true
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
            self.cache.$.ajaxSetup({
                cache: true,
                async: true
            });

            // AOS - Animate on scroll library.
            AOS.init({
                easing  : "ease",
                duration: 1000
                //once: true
            });

            // Run on document ready
            self.cache.$document.ready(function () {
                self.canopy();
                self.getWebFont();
                self.getSocialSDK();
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
                    families: ["Lato:400,700,300:latin"]
                },
                custom: {
                    families: ["Noto Sans JP"],
                    urls    : [
                        self._removeDomain(self.cache.wp.assets_dir) + "/css/webfont.min.css"
                    ]
                }
            };

            if (typeof WebFont === "object") {
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
        },

        /**
         * Get Social SDK.
         *
         * @since 1.0.0
         */
        getSocialSDK: function () {
            // Store object in new var
            var self = this;

            if (true === self.cache.settings.facebook) {
                self._sdkInitFacebook();
            }

            if (true === self.cache.settings.twitter) {
                self._sdkInitTwitter();
            }

            if (true === self.cache.settings.googleAnalytics) {
                self._sdkInitGoogleAnalytics();
            }
        },

        canopy: function () {
            // Store object in new var
            var self = this;
            var height = self.cache.$window.height();

            self.cache.$(".canopy").css({"height": height});
        },

        /**
         * Is url.
         *
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
         * Is number.
         *
         * @param   {number|string} num
         * @returns {boolean}
         * @private
         */
        _isNumber: function (num) {
            var result = false;

            if ("number" === typeof num || "string" === typeof num) {
                result = (num === parseFloat(num) && isFinite(num));
            }

            return result;
        },

        /**
         * Remove domain.
         *
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
                result = url.replace(/^([\w]+:\/\/|\/\/)[^\/]+$/i, "");
            }

            return result;
        },

        /**
         * Facebook SDK Init.
         *
         * @private
         * @since 1.0.0
         */
        _sdkInitFacebook: function () {
            // Store object in new var
            var self = this;

            if (typeof FB === "undefined") {
                $script("//connect.facebook.net/" + self.cache.settings.locale + "/sdk.js", function () {
                    var fb_init = {
                        version: "v2.6",
                        status : true,
                        cookie : true,
                        xfbml  : true
                    };
                    var appID = self.cache.settings.facebookAppID;

                    if ("" !== appID && true === self._isNumber(appID)) {
                        fb_init.appId = appID;
                    }

                    self.cache.window.fbAsyncInit = function () {
                        FB.init(fb_init);
                    };
                }, self);
            }
        },

        /**
         * Twitter SDK Init.
         *
         * @private
         * @since 1.0.0
         */
        _sdkInitTwitter: function () {
            if (typeof twttr === "undefined") {
                $script("//platform.twitter.com/widgets.js", function () {
                    twttr.widgets.load();
                });
            }
        },

        /**
         * Google Analytics Init.
         *
         * @private
         * @since 1.0.0
         */
        _sdkInitGoogleAnalytics: function () {
            // Store object in new var
            var self = this;
            var analytics = self.cache.window.GoogleAnalyticsObject;

            if (typeof analytics === "undefined" || "ga" !== analytics) {
                $script("//www.google-analytics.com/analytics.js", function () {
                }, self);
            }
        }
    };

    // Get things going
    VisuAlive.init();
})(window.jQuery, window.script, window, document, undefined);
