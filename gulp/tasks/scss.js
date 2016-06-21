"use strict";

var conf = require("../config.js");
var gulp = require("gulp");
var $ = require("gulp-load-plugins")();
var browserSync = require("browser-sync");

gulp.task("scss", function () {
    return gulp.src(conf.scss.src)
        .pipe($.sass().on("error", $.sass.logError))
        .pipe($.if("*.css", $.autoprefixer({"browsers": "last 2 versions"})))
        //.pipe($.if("*.css", $.csscomb()))
        .pipe($.if("*.css", $.mergeMediaQueries()))
        .pipe(gulp.dest(conf.scss.dest))
        .pipe($.if("*.css", $.rename({suffix: ".min"})))
        .pipe($.if("*.css", $.csso()))
        .pipe(gulp.dest(conf.scss.dest))
        .pipe(browserSync.reload({
            stream: true,
            once: true
        }));
});
