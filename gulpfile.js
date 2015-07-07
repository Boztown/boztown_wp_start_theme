var gulp = require('gulp');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var browserSync = require('browser-sync').create();
var rsync = require('gulp-rsync');
var cat  = require('gulp-cat');

gulp.task('serve', ['compass'], function() {

    browserSync.init({
        proxy: "startertheme.dev"
    });

    gulp.watch('styles/*.scss', ['compass']);
});

gulp.task('compass', function() {
  gulp.src('./styles/*.scss')
    .pipe(compass({
      config_file: './config.rb',
      css: '',
      sass: 'styles'
    }))
    .pipe(gulp.dest('dist'))
    .pipe(browserSync.stream());
});

gulp.task('vendor-css', function() {
    return gulp.src([
      'bower_components/fontawesome/css/font-awesome.min.css'
    ])
    .pipe(concat('vendor.css'))
    .pipe(gulp.dest('dist'))
    .pipe(minifyCSS())
    .pipe(rename('vendor.min.css'))
    .pipe(gulp.dest('dist'));
});

// Concatenate & Minify JS
gulp.task('vendor-scripts', function() {
    return gulp.src([
      'bower_components/picturefill/dist/picturefill.min.js'
    ])
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('dist'))
    .pipe(rename('vendor.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist'));
});

gulp.task('custom-scripts', function() {
    return gulp.src([
      'js/*.js'
    ])
    .pipe(concat('custom.js'))
    .pipe(gulp.dest('dist'))
    .pipe(rename('custom.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('js/*.js', ['custom-scripts']);
    gulp.watch('styles/*.scss', ['compass']);
});

gulp.task('init', ['vendor-scripts', 'vendor-css'], function() {
    return gulp.src('./build/welcome.txt')
        .pipe(cat());
});

gulp.task('default', ['serve']);