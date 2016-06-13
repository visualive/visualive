"use strict";

var conf = require("../config.js");
var gulp = require("gulp");
var $ = require("gulp-load-plugins")();
var runSequence = require("run-sequence");

gulp.task("default", ["clean", "del"], function (cb) {
    return runSequence(["scss", "img"], "browserSync", "watch", cb);
});
