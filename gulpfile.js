var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    jshint = require('gulp-jshint'),
    header = require('gulp-header'),
    rename = require('gulp-rename'),
    cssnano = require('gulp-cssnano'),
    sourcemaps = require('gulp-sourcemaps'),
    package = require('./package.json'),
    php = require('gulp-connect-php'),

    notify = require("gulp-notify");

gulp.task('bower', function () {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});

gulp.task('css', function () {
    return gulp.src('src/scss/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 4 version'))
        .pipe(gulp.dest('app/assets/css'))
        .pipe(cssnano())
        .pipe(rename({
            suffix: '.min'
        }))

        .pipe(sourcemaps.write())
        .pipe(gulp.dest('app/assets/css'))
        .pipe(browserSync.reload({
            stream: true
        }))

});

gulp.task('js', function () {
    gulp.src('src/js/scripts.js')
        .pipe(sourcemaps.init())
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter('default'))

        .pipe(gulp.dest('app/assets/js'))
        .pipe(uglify())

        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('app/assets/js'))
        .pipe(browserSync.reload({
            stream: true,
            once: true
        }));
});

gulp.task('php', function () {
    php.server({
        base: "app",
        port: 80,
        keepalive: true
    });
});

gulp.task('browser-sync', ['php'], function () {
    browserSync.init(["app"], {

        proxy: 'localhost/~dsagay/fastshell/app',
        open: true,
        notify: true
    });
});

// access url http://localhost:3000/~dsagay/fastshell/app/test.php

gulp.task('bs-reload', function () {
    browserSync.reload();
});

gulp.task('default', ['css', 'js', 'browser-sync'], function () {
    gulp.watch("src/scss/**/*.scss", ['css']);
    gulp.watch("src/js/*.js", ['js']);
    gulp.watch(["app/*.php", "app/*.html"], ['bs-reload']);
});
