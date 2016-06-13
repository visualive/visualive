"use strict";

var root = __dirname;
var gulpTasks = root + "/tasks";
var theme = root.replace("/gulp", "");
var themeName = "visualive";
var wpPath = root.replace("/wp-content/themes/" + themeName + "/gulp", "");
var wpURI = "https://www.visualive.jp";
var wpSSL = true;
var src = theme + "/src";
var dest = theme + "/assets";

module.exports = {
    root     : root,
    gulpTasks: gulpTasks,
    wpPath   : wpPath,
    wpURI    : wpURI,
    wpSSL    : wpSSL,
    theme    : theme,
    src      : src,
    dest     : dest,
    html     : [
        theme + "/**/*.html",
        theme + "/**/*.php"
    ],
    img      : {
        src : src + "/img/**/*.+(jpg|jpeg|png|gif|svg)",
        dest: dest + "/img"
    },
    scss     : {
        src : [
            src + "/scss/**/*.scss",
            "!" + src + "/scss/**/_*.scss"
        ],
        dest: dest + "/css"
    },
    js       : {
        map : src + "/js/**/*.map",
        src : [
            src + "/js/**/*.js",
            "!" + src + "/js/**/_*.js"
        ],
        dest: dest + "/js"
    },
    del    : [
        dest + "/img/**/*.+(jpg|jpeg|png|gif|svg)",
        dest + "/css/**/*.css",
        dest + "/js/**/*.+(js|map)",
        "!" + dest + "/css/vendor/**/*.css"
    ]
};
