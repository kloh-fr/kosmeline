//=================================================
// Fichier qui sert à compiler le scss en css
// Pour utiliser gulp:
// 1. Avoir node / npm installé en local
// 2. Lancer "npm install" dans le cmd/bash
// 3. Après tous les installs, lancer "gulp" ou "npm run dev"
//=================================================
const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');

function compilecss() {
    return gulp
        .src('assets/sass/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({}))
        .pipe(minify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('app/public/wp-content/themes/kosmeline/css'))
}

gulp.task('watch', function() {
    gulp.watch('./assets/sass/**/*.scss', ['sass']);
});

//=================================================
// Watch tasks
//=================================================
function watchFiles() {
    gulp.watch('./assets/sass/**/*.scss', compilecss);
}
const watch = gulp.parallel(watchFiles);

//=================================================
// Default task
//=================================================
exports.default = gulp.parallel(watch, compilecss);
