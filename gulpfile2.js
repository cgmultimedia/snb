// --------------
// Instructions:
// --------------
//
// To build and watch for all files (including 'vendors.min.js'), run:
//      gulp fulldev
// 
// To build and watch (Not including 'vendors.min.js'), run:
//      gulp dev
//
// To minify/uglify css/js, run:
//      gulp min
//

// Modified from help of: https://gist.github.com/danharper/3ca2273125f500429945

//var browserify   = require('browserify');
var gulp         = require('gulp');
//var babelify     = require('babelify');
//var babel      = require('gulp-babel');
//var sourcemaps = require('gulp-sourcemaps');
var concat       = require('gulp-concat');
var gutil        = require('gulp-util');
var sass         = require('gulp-sass');
var uglify       = require('gulp-uglify');
var rename       = require('gulp-rename');
var minifyCSS    = require('gulp-minify-css');
var bourbon      = require('node-bourbon').includePaths;
//var reactToolTip = require('react-tooltip').includePaths;
var buffer       = require('vinyl-buffer');
var source       = require('vinyl-source-stream');
var transform    = require('vinyl-transform');
var watchify     = require('watchify');


//==================================================
// Start dev build and watch process
// gulp.task('dev', ['copy', 'sass', 'js', 'watch-src']);
// gulp.task('dev', ['sass', 'js', 'watch-src']);
gulp.task('dev',     ['sass', 'watch-src']);
gulp.task('fulldev', ['sass', 'watch-src', 'vendors']);
gulp.task('default', ['dev']);

// //--------------------------------------------------
// // React
// var reactBundler = watchify(browserify('./src/react/app.js', watchify.args));
//     //reactBundler.transform(babel); // ES6 transformation.
//     //reactBundler.transform('reactify');
//     reactBundler.transform('babelify');
//     reactBundler.on('update', bundleReactAndWatch);
//     reactBundler.on('log', gutil.log);

// // Watch for changes for bundle.js (react)
// function bundleReactAndWatch() {
//     return reactBundler.bundle()
//         .on('error', gutil.log.bind(gutil, 'Browserify Error'))
//         .pipe(source('bundle.js'))
//         .pipe(rename('react-app.js'))
//         .pipe(gulp.dest('./public/build/js/'));
// }

// // Javascript task
// gulp.task('react', bundleReactAndWatch);

//--------------------------------------------------
// Compile ES6 with Babel & Browserify
// https://gist.github.com/danharper/3ca2273125f500429945

//--------------------------------------------------
// Vendor minification
gulp.task('vendors', function() {
  return gulp.src([
        'src/js/vendors/jquery.1.11.1.min.js',
        'src/js/vendors/jquery.imagesloaded.js',
        'src/js/vendors/jquery.wookmark.min.js',
        'src/js/vendors/bootstrap.small/js/bootstrap.min.js',
        'src/js/vendors/fastclick.js',
        'src/js/vendors/velocity.1.2.1.min.js',
        //'src/js/vendors/audiojs/audiojs/audio.js',
        //'src/js/vendors/idangerous-swiper/idangerous.swiper.min.js',
        //'src/js/vendors/idangerous-swiper/idangerous.swiper.scrollbar.js',
        'src/js/vendors/Swiper-dist/js/swiper.jquery.min.js'
        //'src/js/vendors/moment.min.js',
        //'public/js/vendor_inits.js',
        //'public/js/isNonDragMouseClick.js',
    ])
    .pipe(concat('vendors.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./build/js/'));
});

// Main app.js
gulp.task('appjs', function() {
    return gulp.src([
        'src/js/custom/NavArea.js',
        'src/js/custom/vendor_inits.js',
        'src/js/custom/isNonDragMouseClick.js', 
        'src/js/custom/videoClick.js', 
        'src/js/custom/instagramClick.js', 
    ])
    .pipe(concat('app.js'))
    .pipe(gulp.dest('./build/js/'));
});

//--------------------------------------------------
// SASS build
gulp.task('sass', function () {
    // Build the single app.scss file. We can add more globs here if we need to. 
    return gulp.src('./src/scss/app.scss')
        .pipe(sass({
            includePaths: ['./src/scss', bourbon], 
            errLogToConsole: true
        }))
        .pipe(gulp.dest('./css/'));
});

// Watch for scss changes
gulp.task('watch-src', function () {
    gulp.watch(['./src/scss/**/*.scss'], ['sass','minify-css']);
    gulp.watch(['./build/js/app.js'], ['uglifyApp']);
});


//==================================================
// Minification / Uglification
gulp.task('min', ['minify-css','uglifyApp']);

//--------------------------------------------------
// Minify app.css
gulp.task('minify-css', function() {
    return gulp.src('./css/app.css')
        .pipe(minifyCSS({keepBreaks:true}))
        .pipe(rename('app.min.css'))
        .pipe(gulp.dest('./css/'));
});

//--------------------------------------------------
// Uglify (minify) app.js
gulp.task('uglifyApp', function() {
  return gulp.src('build/js/app.js')
    .pipe(uglify())
    .pipe(rename('app.min.js'))
    .pipe(gulp.dest('./build/js/'));
});
