var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');
var watchLess = require('gulp-watch-less');

gulp.task('less', function () {
    return gulp.src(['less/*.less'])
        .pipe(less({
            paths: [ path.join('less') ]
        }))
        .pipe(gulp.dest('../web/css/'));
});


gulp.task('watch', function () {
    gulp.watch(['less/*.less'], ['less']);
});

gulp.task('default', ['less']);