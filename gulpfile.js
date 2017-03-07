var gulp = require('gulp');
var sass = require('gulp-sass');
var uglifycss = require('gulp-uglifycss');
var uglifyjs = require('gulp-uglify');

gulp.task('sass', function () {
	return gulp.src('./css/scss/template.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(uglifycss())
		.pipe(gulp.dest('./css'));
});

gulp.task('js', function(){
    return gulp.src('./js/src/template.js')
        .pipe(uglifyjs())
        .pipe(gulp.dest('./js'));
});
 
gulp.task('sass:watch', function(){
	gulp.watch('./css/scss/style.scss', ['sass']);
});

gulp.task('js:watch', function(){
    gulp.watch('./js/src/template.js', ['js']);
});

gulp.task('tasks:watch', function(){
    gulp.watch('./css/scss/style.scss', ['sass']);
    gulp.watch('./js/src/template.js', ['js']);
});
