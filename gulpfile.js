var gulp = require('gulp')
var jshint = require('gulp-jshint')
var uglify = require('gulp-uglify')
var pump = require('pump')
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var webserver = require('gulp-webserver');

/* paths */
var mainjs = './src/js/main.js';
var mainscss = './src/css/style.scss'
var images = './src/images/*'
var vendor = './src/lib/*'

/* 检查代码 */
gulp.task('lint', function() {
    return gulp.src(mainjs)
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

/* 压缩混淆js */
gulp.task('script', ['lint'], function (cb) {
    pump([
            gulp.src(mainjs),
            uglify(),
            gulp.dest('dist/js')
        ],
        cb
    );
});

/* compile sass */
gulp.task('stylesheet', function () {
    return gulp.src(mainscss)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest('dist/css'));
});

/* move images */
gulp.task('images', function () {
    return gulp.src(images)
        .pipe(gulp.dest('dist/images'));
})

/* move jquery and * */
gulp.task('vendor', function () {
    return gulp.src(vendor)
        .pipe(gulp.dest('dist/vendor'));
})

/* 监控js和scss */
gulp.task('watch', ['script', 'stylesheet', 'images', 'vendor'], function () {
    gulp.watch(mainjs, ['script']);
    gulp.watch('src/css/*.scss', ['stylesheet']);
    gulp.watch('src/images/*.*', ['images'])
    gulp.watch('src/lib/*.*', ['vendor'])
})

gulp.task('default', ['watch'], function () {
    gulp.src('./')
        .pipe(webserver({
            host: '192.168.2.254',
            livereload: true,
            directoryListing: true,
            open: true
        }));
});