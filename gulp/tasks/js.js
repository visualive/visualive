"use strict";

var conf = require("../config.js");
var gulp = require("gulp");
var $ = require("gulp-load-plugins")();
var browserSync = require("browser-sync");

gulp.task("js", function () {
    return gulp.src(conf.js.src)
        .pipe($.concat("apps.js"))
        .pipe($.crLfReplace({changeCode: "LF"}))
        .pipe(gulp.dest(conf.js.dest))
        .pipe($.rename({suffix: ".min"}))
        //.pipe($.uglify({preserveComments: "some"}))
        .pipe($.uglify())
        .pipe(gulp.dest(conf.js.dest))
        .pipe(browserSync.reload({
            stream: true,
            once: true
        }));
});

gulp.task("js:map", function () {
    return gulp.src(conf.js.map)
        .pipe(gulp.dest(conf.js.dest))
        .pipe(browserSync.reload({
            stream: true,
            once: true
        }));
});
