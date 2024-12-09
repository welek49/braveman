const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require("gulp-sourcemaps");
const autoprefixer = require("gulp-autoprefixer");
const csso = require("gulp-csso");
const babel = require('gulp-babel');
const browserSync = require('browser-sync').create();
const webpack = require('webpack-stream');
const webp = require('gulp-webp');

const style = function () {
    return gulp.src('./src/scss/**/*.scss')
        .pipe(sourcemaps.init()) // fire sourcemap before fun
        .pipe(sass({
            outputStyle: "compressed" // extended, compressed
        }).on("error", sass.logError)
        )
        .pipe(autoprefixer())
        .pipe(csso()) // minify css
        .pipe(sourcemaps.write(".")) //saving sourcemap after modifications
        .pipe(gulp.dest('./dist/css'))
        .pipe(browserSync.stream())
}

const img = function () {
    return gulp.src('./assets/img/**/*.{jpg,jpeg,webp,png}')
        .pipe(webp())
        .pipe(gulp.dest('./dist/img/'))
        .pipe(browserSync.stream())
}

const svg = function () {
    return gulp.src('./assets/img/**/*.svg')
        .pipe(gulp.dest('./dist/img/'))
        .pipe(browserSync.stream())
}

const minScript = function () {
    return gulp.src(['./src/js/**/*.js'])
        .pipe(webpack({
            entry: {
                'blocks': './dist/js/blocks.js',
                'main': './src/js/main.js'
            },
            mode: 'production',
            output: {
                filename: '[name].min.js'
            },
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules|bower_components)/,
                        use: {
                            loader: "babel-loader",
                            options: {
                                presets: ["@babel/preset-env"]
                            }
                        }
                    }
                ]
            }
        }))
        .pipe(gulp.dest('dist/js'))
        .pipe(browserSync.stream())
}

const watch = function () {
    browserSync.init({
        proxy: 'startplate.local',
    });
    gulp.watch('./inc/blocks/**/*.scss', { usePolling: true }, gulp.series(style));
    gulp.watch('./src/scss/**/*.scss', { usePolling: true }, gulp.series(style));
    gulp.watch('./*php').on('change', browserSync.reload);
    gulp.watch('./src/js/**/*.js', { usePolling: true }, gulp.series(minScript));
    gulp.watch("./assets/img/**/*.{jpg,jpeg,webp,png}", { usePolling: true }, gulp.series(img));
    gulp.watch("./assets/img/**/*.svg", { usePolling: true }, gulp.series(svg));
}
exports.default = gulp.series(style, minScript, img, svg, watch);
exports.style = style;
exports.minScript = minScript;
exports.watch = watch;
exports.img = img;
exports.svg = svg;
exports.build = gulp.series(style, img, svg, minScript);