// Defining base paths
var basePaths = {
    js: './js/',
    node: './node_modules/',
    dev: './src/'
};


// browser-sync watched files
// automatically reloads the page when files changed
var browserSyncWatchFiles = [
    './css/*.min.css',
    './js/*.min.js',
    './**/*.php'
];


// browser-sync options
// see: https://www.browsersync.io/docs/options/
var browserSyncOptions = {
    proxy: "localhost/bwe/",
    notify: false,
    host: "0.0.0.0"
};


// Defining requirements
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var ignore = require('gulp-ignore');
var rimraf = require('gulp-rimraf');
var clone = require('gulp-clone');
var merge = require('gulp-merge');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var del = require('del');
var cleanCSS = require('gulp-clean-css');
var gulpSequence = require('gulp-sequence');


// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task('browser-sync', function(cb) {
    browserSync.init(browserSyncWatchFiles, browserSyncOptions);
    cb();
});

// Run:
// gulp sass + cssnano + rename
// Prepare the min.css for production (with 2 pipes to be sure that "theme.css" == "theme.min.css")
gulp.task('scss-for-prod', function(cb) {
    var source =  gulp.src('./sass/*.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sass());

    var pipe1 = source.pipe(clone())
        .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
        .pipe(gulp.dest('./css'))
        .pipe(rename('custom-editor-style.css'))


    var pipe2 = source.pipe(clone())
        .pipe(cleanCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./css'));

    merge(pipe1, pipe2);
    cb();
});


// Run:
// gulp sourcemaps + sass + reload(browserSync)
// Prepare the child-theme.css for the development environment
gulp.task('scss-for-dev', function(cb) {
    gulp.src('./sass/*.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sass())
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
        .pipe(gulp.dest('./css'));
    cb();
});

gulp.task('watch-scss', gulp.parallel('browser-sync', function () {
    gulp.watch('./sass/**/*.scss', gulp.series('scss-for-dev'));
}));


// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('sass', function () {
    var stream = gulp.src('./sass/*.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(gulp.dest('./css'))
        .pipe(rename('custom-editor-style.css'))
    return stream;
});

// Run:
// gulp cssnano
// Minifies CSS files
gulp.task('cssnano', function(){
  return gulp.src('./css/theme.css')
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano({discardComments: {removeAll: true}}))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./css/'))
});

gulp.task('minify-css', function() {
  return gulp.src('./css/theme.css')
  .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(cleanCSS({compatibility: '*'}))
    .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
    .pipe(rename({suffix: '.min'}))
     .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./css/'));
});

gulp.task('cleancss', function() {
  return gulp.src('./css/*.min.css', { read: false }) // much faster
    .pipe(ignore('theme.css'))
    .pipe(rimraf());
});

gulp.task('styles', function(callback){ gulpSequence('sass', 'minify-css')(callback) });

// Run: 
// gulp scripts. 
// Uglifies and concat all JS files into one
gulp.task('scripts', function() {
    var scripts = [

        // Start - All BS4 stuff
        basePaths.dev + 'js/bootstrap4/bootstrap.js',

        // End - All BS4 stuff

        basePaths.dev + 'js/skip-link-focus-fix.js'
    ];
  gulp.src(scripts)
    .pipe(concat('theme.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js/'));

  gulp.src(scripts)
    .pipe(concat('theme.js'))
    .pipe(gulp.dest('./js/'));
});

// Deleting any file inside the /src folder
gulp.task('clean-source', function () {
  return del(['src/**/*',]);
});

// Run:
// gulp copy-assets.
// Copy all needed dependency assets files from bower_component assets to themes /js, /scss and /fonts folder. Run this task after bower install or bower update

////////////////// All Bootstrap SASS  Assets /////////////////////////
gulp.task('copy-assets', function() {

////////////////// All Bootstrap 4 Assets /////////////////////////
// Copy all JS files

    //var stream = gulp.src(basePaths.node + 'bootstrap/dist/js/**/*.js')
    //   .pipe(gulp.dest(basePaths.dev + '/js/bootstrap4'));
  
// Copy all Bootstrap SCSS files
    //gulp.src(basePaths.node + 'bootstrap/scss/**/*.scss')
    //   .pipe(gulp.dest(basePaths.dev + '/sass/bootstrap4'));

////////////////// End Bootstrap 4 Assets /////////////////////////

// Copy all Font Awesome Fonts
    var stream = gulp.src(basePaths.node + 'font-awesome/fonts/**/*.{ttf,woff,woff2,eof,svg}')
        .pipe(gulp.dest('./fonts'));

// Copy all Font Awesome SCSS files
    gulp.src(basePaths.node + 'font-awesome/scss/*.scss')
        .pipe(gulp.dest(basePaths.dev + '/sass/fontawesome'));

// _s SCSS files
    gulp.src(basePaths.node + 'undescores-for-npm/sass/media/*.scss')
        .pipe(gulp.dest(basePaths.dev + '/sass/underscores'));

// _s JS files into /src/js
    gulp.src(basePaths.node + 'undescores-for-npm/js/skip-link-focus-fix.js')
        .pipe(gulp.dest(basePaths.dev + '/js'));

// _s JS files into /js
    gulp.src(basePaths.node + 'undescores-for-npm/js/skip-link-focus-fix.js')
        .pipe(gulp.dest(basePaths.js));

// Copy Popper JS files
    gulp.src(basePaths.node + 'popper.js/dist/umd/popper.min.js')
        .pipe(gulp.dest(basePaths.js));
        
    gulp.src(basePaths.node + 'popper.js/dist/umd/popper.js')
        .pipe(gulp.dest(basePaths.js));
    return stream;
});

// Deleting any file inside the /dist folder
gulp.task('clean-dist', function () {
  return del(['dist/**/*',]);
});

// Run
// gulp dist
// Copies the files to the /dist folder for distribution as simple theme
gulp.task('dist', gulp.series('clean-dist', function() {
    gulp.src(['**/*','!bower_components','!bower_components/**','!node_modules','!node_modules/**','!src','!src/**','!dist','!dist/**','!dist-product','!dist-product/**','!sass','!sass/**','!readme.txt','!readme.md','!package.json','!gulpfile.js','!CHANGELOG.md','!.travis.yml','!jshintignore', '!codesniffer.ruleset.xml', '*'])
    .pipe(gulp.dest('dist/'))
}));

// Deleting any file inside the /dist-product folder
gulp.task('clean-dist-product', function () {
  return del(['dist-product/**/*',]);
});

// Run
// gulp dist-product
// Copies the files to the /dist-prod folder for distribution as theme with all assets
gulp.task('dist-product', gulp.series('clean-dist-product', function() {
    gulp.src(['**/*','!bower_components','!bower_components/**','!node_modules','!node_modules/**','!dist','!dist/**','!dist-product','!dist-product/**', '*'])
    .pipe(gulp.dest('dist-product/'))
}));
