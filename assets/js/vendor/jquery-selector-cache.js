/*!
 * jQuery selector cache
 * https://github.com/yaquawa/jquery-selector-cache
 *
 * @package   jQuery selector cache
 * @version   1.0.0
 * @author    Wang
 * @link      http://1design.jp/
 * @copyright Copyright (c) 2015, Wang.
 * @license   ISC License
 *
 *            Permission to use, copy, modify, and/or distribute this software for any
 *            purpose with or without fee is hereby granted, provided that the above
 *            copyright notice and this permission notice appear in all copies.
 *
 *            THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 *            WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 *            MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
 *            ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 *            WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
 *            ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
 *            OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */
(function () {
    function _factory($) {
        var selectorPool = {},
            objPool = [];

        return function $$(selector, update) {
            var $elem;

            // if selector is string
            if (typeof selector === 'string') {
                if (update) {
                    return selectorPool[selector] = $(selector);
                }

                $elem = selectorPool[selector];
                if ($elem === undefined) {
                    $elem = selectorPool[selector] = $(selector);
                }
                return $elem;
            }

            // if selector is DOM object or jQuery object

            var obj = objPool.find(function (obj) {
                return obj.elem === selector;
            });

            if (obj !== undefined) {
                return obj.$elem;
            }

            $elem = $(selector);
            objPool.push({
                elem : selector,
                $elem: $elem
            });

            return $elem;
        };
    }

    /*------------------------------------*\
     # UMD
     \*------------------------------------*/
    (function (root, factory) {
        if (typeof define === 'function' && define.amd) {
            // AMD. Register as an anonymous module.
            define(['module', 'jquery'], factory);
        } else if (typeof module === 'object' && typeof module.nodeName !== 'string') {
            // CommonJS
            factory(module, require('jquery'));
        } else {
            // Browser globals
            if (typeof root.jQuery !== 'function' || (root.$$ !== undefined)) {
                return false;
            }
            root.$$ = _factory(root.jQuery);
        }
    }(this, function (module, jQuery) {
        module.exports = _factory(jQuery);
    }));

})();
