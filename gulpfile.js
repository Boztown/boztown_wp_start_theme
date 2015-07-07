var gulp = require('gulp');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var browserSync = require('browser-sync').create();

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

gulp.task('default', ['serve']);