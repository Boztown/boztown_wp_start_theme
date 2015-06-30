var gulp = require('gulp');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('compass', function() {
  gulp.src('./styles/*.scss')
    .pipe(compass({
      config_file: './config.rb',
      css: '',
      sass: 'styles'
    }))
    .pipe(gulp.dest('dist'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('dist'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('js/*.js', ['scripts']);
    gulp.watch('styles/*.scss', ['compass']);
});