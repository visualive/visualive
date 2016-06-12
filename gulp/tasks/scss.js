"use strict";

var conf = require("../config.js");
var gulp = require("gulp");
var $ = require("gulp-load-plugins")();

gulp.task("scss", function () {
    return gulp.src(conf.scss.src)
        .pipe($.sass().on("error", $.sass.logError))
        .pipe($.autoprefixer({"browsers":"last 2 versions"}))
        .pipe($.if("*.css", $.mergeMediaQueries()))
        .pipe($.if("*.css", $.csscomb()))
        .pipe(gulp.dest(conf.scss.dest))
        .pipe($.rename({suffix: ".min"}))
        .pipe($.if("*.css", $.csso()))
        .pipe(gulp.dest(conf.scss.dest));
});
