var gulp = require('gulp')
var jshint = require('gulp-jshint')
var uglify = require('gulp-uglify')
var pump = require('pump')
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var webserver = require('gulp-webserver');
var fs = require('fs');

/* paths */
var mainjs = './src/js/main.js';
var mainscss = './src/css/style.scss'
var images = './src/images/*'
var vendor = './src/lib/*'

var dest = './dist/'

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
            gulp.dest(dest + 'js')
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
        .pipe(gulp.dest(dest + 'css'));
});

gulp.task('cssWithoutMap', function () {
    return gulp.src(mainscss)
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest(dest + 'css'));
});

/* move images */
gulp.task('images', function () {
    return gulp.src(images)
        .pipe(gulp.dest(dest + 'images'));
});

/* move jquery and * */
gulp.task('vendor', function () {
    return gulp.src(vendor)
        .pipe(gulp.dest(dest + 'vendor'));
});

/* 监控js和scss */
gulp.task('watch', ['script', 'stylesheet', 'images', 'vendor'], function () {
    gulp.watch(mainjs, ['script']);
    gulp.watch('src/css/*.scss', ['stylesheet']);
    gulp.watch('src/images/*.*', ['images'])
    gulp.watch('src/lib/*.*', ['vendor'])
});

/* 删除文件夹 */
function deleteFolder(path) {
    var files = [];
    if( fs.existsSync(path) ) {
        files = fs.readdirSync(path);
        files.forEach(function(file,index){
            var curPath = path + "/" + file;
            if(fs.statSync(curPath).isDirectory()) { // recurse
                deleteFolder(curPath);
            } else { // delete file
                fs.unlinkSync(curPath);
            }
        });
        fs.rmdirSync(path);
    }
}

/* 删除dest */
gulp.task('deleteDist', function () {
    deleteFolder(dest);
})

/* 开发 */
gulp.task('default', ['watch']);

/* 打包 */
gulp.task('build', ['deleteDist', 'script', 'cssWithoutMap', 'images', 'vendor'])