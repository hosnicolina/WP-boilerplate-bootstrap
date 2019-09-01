import gulp from 'gulp';
import sass from 'gulp-sass';
import browserSync from "browser-sync";
import cssnano from 'cssnano';
import plumber from "gulp-plumber";
import postcss from "gulp-postcss";
import sourcemaps from "gulp-sourcemaps";

import browserify from "browserify";
import babelify from "babelify";
import source from "vinyl-source-stream";
import buffer from "vinyl-buffer";
import uglify from "gulp-uglify";

const server = browserSync.create()


// Server BroserSyc

const serverInit = (done) => {
  server.init({
    proxy: 'http://127.0.0.1:8080/anchor/'
  });
  done();
}

// BrowserSync Reload
const browserSyncReload = () => server.reload();


const postcssPlugins = [
    cssnano({
      core: true,
      zindex: false,
      autoprefixer: {
        add: true,
        browsers: '> 1%, last 2 versions, Firefox ESR, Opera 12.1'
      },
      discardComments: { removeAll: true }
    })
  ]

gulp.task('init-project', (done)=>{
    gulp.src('./node_modules/bootstrap/scss/**/*.scss')
        .pipe(gulp.dest('./assets/src/sass/vendor/bootstrap4/bootstrap/'))
    done();
})

gulp.task('scripts-build', ()=>{
    return browserify('./assets/src/js/index.js')
        .transform(babelify)
        .bundle()
        .on('error', function(err){
            console.log(err)
            this.emit('end')
        })
        .pipe(source('scripts.js'))
        .pipe(buffer())
        .pipe(uglify())
        .pipe(gulp.dest('./assets/dist/js'));
});

gulp.task('scripts-dev', ()=>{
    return browserify('./assets/src/js/index.js')
        .transform(babelify)
        .bundle()
        .on('error', function(err){
            console.log(err)
            this.emit('end')
        })
        .pipe(source('scripts.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest('./assets/dist/js'));
});

gulp.task('style-dev', ()=>{
    return gulp.src('./assets/src/sass/style.scss')
    .pipe(sourcemaps.init({ loadMaps : true}))
    .pipe(plumber())
    .pipe(sass())
    .pipe(postcss(postcssPlugins))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./assets/dist/css/'))
})

gulp.task('style-build', ()=>{
  return gulp.src('./assets/src/sass/style.scss')
  .pipe(plumber())
  .pipe(sass())
  .pipe(postcss(postcssPlugins))
  .pipe(gulp.dest('./assets/dist/css/'))
})

gulp.task('style-dev-sync', ()=>{
  return gulp.src('./assets/src/sass/style.scss')
  .pipe(sourcemaps.init({ loadMaps : true}))
  .pipe(plumber())
  .pipe(sass())
  .pipe(postcss(postcssPlugins))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('./assets/dist/css/'))
  .pipe(server.stream())
})

function watchFiles(){
  gulp.watch("./assets/src/sass/**/**", gulp.series('style-dev'));
  gulp.watch("./assets/src/js/**/**", gulp.series("scripts-dev"));
}

function watchFilesSycn(){
  gulp.watch( "./assets/src/sass/**/**", gulp.series('style-dev-sync') );
  gulp.watch( "./assets/src/js/**/**", gulp.series("scripts-dev") );
  gulp.watch("./**/*.php").on('change', browserSyncReload );
}

gulp.task('dev', gulp.series('style-dev', 'scripts-dev', watchFiles) );

gulp.task('browser-sync', gulp.series(serverInit, watchFilesSycn));


