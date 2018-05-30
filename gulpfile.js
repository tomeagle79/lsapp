// Add gulp
var gulp = require("gulp");

// Add plugins
var sass = require("gulp-sass");
var sourcemaps = require("gulp-sourcemaps");
var autoprefixer = require("gulp-autoprefixer");

//var browserSync = require("browser-sync").create();

// var babel = require("gulp-babel");
// var concat = require("gulp-concat");
// var uglify = require("gulp-uglify");
// var rename = require("gulp-rename");
// var gutil = require("gulp-util");

// var imageResize = require("gulp-image-resize");

// const imagemin = require("gulp-imagemin");

gulp.task("scripts", () => {
  gulp
    .src("src/*.js")
    .pipe(sourcemaps.init())
    .pipe(
      babel({
        presets: ["env"]
      })
    )
    .pipe(concat("all.js"))
    .pipe(gulp.dest("dist"))
    .pipe(rename("all.min.js"))
    .pipe(uglify())
    .on("error", function(err) {
      gutil.log(gutil.colors.red("[Error]"), err.toString());
    })
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("../sites/all/themes/tastybone/www/js"));
});

// Reduce image widths to reduce filesize

gulp.task("width", function() {
  gulp
    .src("src/heroes/*")
    .pipe(
      imageResize({
        width: 1200
      })
    )
    .pipe(gulp.dest("img"));
});

// reduce image filesize

gulp.task("imageMin", () =>
  gulp
    .src("src/heroes/*")
    .pipe(imagemin())
    .pipe(gulp.dest("img"))
);

gulp.task("sass", function() {
  return gulp
    .src("resources/assets/sass/app.scss")
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        outputStyle: "compressed"
      }).on("error", sass.logError)
    )
    .pipe(autoprefixer())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("public/css"));
  // .pipe(browserSync.reload({ stream: true }));
});

// Sync browser with the code
gulp.task("browserSync", function() {
  browserSync.init({
    server: {
      baseDir: ""
    }
  });
});

// Watch the code for updates then update the dist folder while updating the browser
gulp.task("watch", function() {
  gulp.watch("resources/assets/sass/*.scss", ["sass"]);
  //   gulp.watch("src/*.js", ["scripts"]);
  //   gulp.watch("*.html", browserSync.reload);
  //   gulp.watch("css/*.css", browserSync.reload);
});

// set default to tasks above
gulp.task("default", ["sass", "watch", "scripts", "browserSync"]);

// test comment
