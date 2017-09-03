'use strict';
var gulp = require('gulp'),
    gulpLoadPlugins = require('gulp-load-plugins'),
    del = require('del'),
		// spritesmith = require('gulp.spritesmith'),
    browserSync = require('browser-sync').create();

var $ = gulpLoadPlugins(),
    reload = browserSync.reload;

// var gulp = require('gulp'),
// 		pug = require('gulp-pug'),
// 		newer = require('gulp-newer'),
// 		plumber = require('gulp-plumber'),
// 		sass = require('gulp-sass'),
// 		autoprefixer = require('gulp-autoprefixer'),
// 		cssnano = require('gulp-cssnano'),
// 		sourcemaps = require('gulp-sourcemaps'),
// 		del = require('del'),
// 		bs = require('browser-sync').create(),
// 		sequence = require('gulp-sequence'),
// 		notify = require('gulp-notify'),
// 		gulpIf = require('gulp-if'),
// 		rename = require('gulp-rename'),
// 		concat = require('gulp-concat'),
// 		uglify = require('gulp-uglify'),
// 		sitemap = require('gulp-sitemap');


// Png-Sprite
gulp.task('sprite', function () {

  var spriteData = gulp.src(['app/img/*.png', '!app/img/icons.png'])
    .pipe($.spritesmith({
      imgName: 'sprite.png',
      cssName: '_png-sprite-positions.scss',
      cssTemplate: './app/sass/module/png-sprite/_png-sprite-tpl.scss',
      algorithm: 'top-down',
      padding: 5
    }));

  spriteData.img.pipe(gulp.dest('./dist/img'));
  spriteData.css.pipe(gulp.dest('./app/sass/module/png-sprite'));
});


// Pug
gulp.task('pug:dev', function () {
  return gulp.src(['./app/*.pug', '!./app/html/**/_*.pug'])
    .pipe($.plumber({
      errorHandler: $.notify.onError(function (err) {
        return {
          title: 'Pug',
          message: err.message
        };
      })
    }))
    .pipe($.newer('./app/**/*.pug'))
    .pipe($.pug({
      pretty: '\t' // false - default, true - space, '\t' - tab
    }))
    .pipe(gulp.dest('./dist'));
  // .pipe(reload({stream: true}));
});

// HTML minification for PRODUCTION
gulp.task('pug:prod', function () {
  return gulp.src(['./app/*.pug', '!./app/html/**/_*.pug'])
    .pipe($.pug({
      pretty: '\t'
    }))
    .pipe(gulp.dest('./prod'));
});


// SASS
gulp.task('sass:dev', function () {
  return gulp.src(['app/sass/vendor.scss', 'app/sass/main.scss'])
    .pipe($.plumber({
      errorHandler: $.notify.onError(function (err) {
        return {
          title: 'Sass Develop',
          message: err.message
        };
      })
    }))
    .pipe($.newer('app/sass/*.scss'))
    .pipe($.sourcemaps.init())
    .pipe($.sass()) // для SVG спрайтов import: process.cwd() + '/tmp/scss/svg-sprite'
    .pipe($.autoprefixer({
      browsers: ['last 10 versions'], // last 2 versions - default
      cascade: true // выравнивание префиксных свойств (false для минифицирования)
    }))
    .pipe($.concat('main.css'))
    .pipe($.sourcemaps.write())
    .pipe(gulp.dest('dist/css'))
    .pipe(reload({stream: true}));
});

gulp.task('sass:prod', function () {
  return gulp.src(['app/sass/vendor.scss', 'app/sass/main.scss'])
    .pipe($.sass())
    .pipe($.autoprefixer({
      browsers: ['last 15 versions'], // last 2 versions - default
      cascade: false // выравнивание префиксных свойств (false для минифицирования)
    }))
    .pipe($.concat('main.css'))
    .pipe($.cssnano())
    .pipe(gulp.dest('prod/css'))
});


// JavaScript
var plugJS = [
  'bower_components/jquery/dist/jquery.min.js',
  'bower_components/bootstrap/dist/js/bootstrap.min.js',
  'app/vendor/jq-timeTo-master/jquery.time-to.min.js',
  'app/vendor/smooth-scroll/smooth-scroll.min.js',
  'app/vendor/chrome-smooth-scroll/chrome-smoth-scroll.js',
  'app/vendor/share42/share42.js',
  'app/vendor/yandex/yandex_metrika.js',

  'app/js/common.js'
];

gulp.task('js:dev', function () {
  return gulp.src(plugJS)
    .pipe($.concat('main.js')) // Объединение в один main.js
    .pipe(gulp.dest('dist/js'));
});

gulp.task('js:prod', function () {
  return gulp.src(plugJS)
    .pipe($.concat('main.js'))
    .pipe($.uglify()) // Минификация
    .pipe(gulp.dest('prod/js'));
});


// Clean
gulp.task('clean:dist', function () {
  return del('dist');
});

gulp.task('clean:prod', function () {
  return del('prod');
});


// APP DEVELOP
// Images
gulp.task('img:dev', ['sprite'], function () {
  return gulp.src([
    'app/img/**/*.jpg',
    'app/img/icons.png'
    // '!app/img/favicon/*.*', '!app/img/favicon.*' // исключить favicon
  ], {base: 'app'})
    .pipe(gulp.dest('dist'));
});

// Fonts
gulp.task('fonts:dev', function () {
  return gulp.src([
    'app/fonts/**/*.{svg,ttf,woff}', // eot for ie8
    '!app/fonts/**/_*/*.*'
  ], {base: 'app'})
  // .pipe(rename(function (path) {
  // 	path.basename = path.basename.toLowerCase(); // названия файлов в нижнем регистре
  // }))
    .pipe(gulp.dest('dist'));
});


gulp.task('app:dev', ['fonts:dev', 'img:dev'], function () {
  return gulp.src([
    // 'app/download/**/*.*',
    'app/*.php',
    // 'app/.htaccess',
    // 'app/robots.txt'
  ], {base: 'app'})
    .pipe(gulp.dest('dist'));
});


// PRODUCTION
// app
gulp.task('app:prod', function () {
  return gulp.src([
    'dist/fonts/**/*.*',
    'dist/img/**/*.*',
    'dist/**/*.{php,xml}',
    // 'dist/.htaccess',
    // 'dist/robots.txt'
  ], {base: 'dist'})
    .pipe(gulp.dest('prod'));
});

gulp.task('sitemap', function () {
  gulp.src('prod/**/*.html', {
    read: false
  })
    .pipe($.sitemap({
      siteUrl: 'http://930920.ru'
    }))
    .pipe(gulp.dest('./prod'));
});


// BUILD
gulp.task('build:dev', $.sequence('clean:dist', 'app:dev', 'pug:dev', 'js:dev', 'sass:dev'));
gulp.task('build:prod', $.sequence('clean:prod', 'app:prod', 'pug:prod', 'js:prod', 'sass:prod', 'sitemap'));

gulp.task('default', $.sequence('build:dev', 'build:prod'));

// Server + Watch
gulp.task('server', ['build:dev'], function () {
  browserSync.init({
    notify: false,
    // port: 9000,
    server: 'dist'
  });

  gulp.watch([
    // 'dist/**/*.html',
    'app/img/**/*',
    'app/fonts/**/*'
  ]).on('change', reload);

  gulp.watch('app/**/*.scss', ['sass:dev']);
  gulp.watch('app/**/*.pug', ['pug:dev']);
  gulp.watch(['app/**/*.js', 'app/blocks/**/*.js'], ['js:dev']);
  gulp.watch('app/img/**/*.*', ['img:dev']);
  gulp.watch('app/fonts/**/*.*', ['fonts:dev']);
});