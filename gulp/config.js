"use strict";

var root = __dirname;
var theme = root.replace("/gulp", "");
var src = theme + "/src";
var dest = theme + "/assets";

module.exports = {
    root : root,
    tasks: root + "/tasks",
    theme: theme,
    src  : src,
    dest : dest,
    img : {
        src : src + "/img/**/*.+(jpg|jpeg|png|gif|svg)",
        dest: dest + "/img"
    },
    scss : {
        src : [ src + "/scss/**/*.scss", "!" + src + "/scss/**/_*.scss"],
        dest: dest + "/css"
    },
    js : {
        src : src + ["/js/**/*.js", "!/js/**/*.min.js"],
        dest: dest + "/js"
    }
};
