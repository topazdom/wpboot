var gulp = require('gulp');

// gulp-concat gulp-uglify gulp-sourcemaps gulp-autoprefixer gulp-minify-css gulp-sass gulp-watch --save-dev
// include js 
var concat      = require('gulp-concat');
var uglify      = require('gulp-uglify');
var sourcemaps  = require('gulp-sourcemaps');

// // include  style
var autoprefix  = require('gulp-autoprefixer');
var minifyCSS   = require('gulp-minify-css');
var sass        = require('gulp-sass');
var watch       = require('gulp-watch');

/**************************************************************************************************
 MAIN JS AND CSS 
*************************************************************************************************/
gulp.task('main-engine', function() {
	gulp.src([
			'./src/vendors/bootstrap-sass/assets/javascripts/bootstrap.min.js', 
			'./src/js/libs//modernizr-3.3.1.min.js',
			'./src/js/engine.js', 
			])
	.pipe(sourcemaps.init())
	.pipe(concat('assets/js/engine.min.js')) 
	.pipe(uglify())
    .on('error', function(err) { console.error(err.message); this.end(); })
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('./'))
});

gulp.task('main-style', function() {
	return gulp.src([
				'./src/scss/main-style.scss',
				])
	.pipe(sass())
	.pipe(sourcemaps.init())
	.pipe(concat('assets/css/main-style.min.css'))
    .on('error', function(err) { console.error(err.message); this.end(); })
	.pipe(minifyCSS({keepSpecialComments:0}))
	.pipe(autoprefix('last 2 versions'))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('./'))
});

gulp.task('copyfonts', function() {
   return gulp.src('./src/vendors/bootstrap-sass/assets/fonts/**/*.{ttf,woff,woff2,eof,svg,eot}')
   .pipe(gulp.dest('./assets/fonts'));
});


// default gulp task
gulp.task('default', [
	'main-engine', 
	'main-style',
	'copyfonts'
	
	], function() {

	// watch for MAIN resource
	gulp.watch('./src/js/**/*.js', ['main-engine']);
	gulp.watch('./src/scss/**/*.scss', ['main-style']);
});