"use strict";

var conf = require("../config.js");
var gulp = require("gulp");
var $ = require("gulp-load-plugins")();

gulp.task("watch", function () {
    $.watch(conf.img.src, function () {
        return gulp.start(["img"]);
    });
    $.watch(conf.scss.src, function () {
        return gulp.start(["scss"]);
    });
});
