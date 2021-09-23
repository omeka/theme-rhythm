var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));

gulp.task('css', function() {
    var postcss = require('gulp-postcss');
    var autoprefixer = require('autoprefixer');

    return gulp.src('./css/sass/*.scss')
        .pipe(sass({
            includePaths: ['./node_modules/susy/sass']
        }).on('error', sass.logError))
        .pipe(postcss([
            autoprefixer()
        ]))
        .pipe(gulp.dest('./css'));
});

gulp.task('css:watch', function() {
    gulp.watch('./css/sass/*.scss', gulp.parallel('css'));
});
