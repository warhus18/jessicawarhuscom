const autoprefixer = require('gulp-autoprefixer'),
      babel = require('gulp-babel'),
      cleancss = require('gulp-clean-css'),
      concat = require('gulp-concat'),
      data = require('gulp-data'),
      eslint = require('gulp-eslint'),
      gulp = require('gulp'),
      imagemin = require('gulp-imagemin'),
      notify = require('gulp-notify'),
      plumber = require('gulp-plumber'),
      rename = require('gulp-rename'),
      sass = require('gulp-ruby-sass'),
      sasslint = require('gulp-sass-lint'),
      sourcemaps = require('gulp-sourcemaps'),
      svgsprite = require('gulp-svg-sprite'),
      uglify = require('gulp-uglify');

gulp.task('scripts-js-lint', gulp.series(function() {
    return gulp.src([
        'scripts/source/functionality/*.js',
        '!scripts/source/functionality/utility.js'
    ])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError())
    .on('error', notify.onError({
        message: 'ESLint Errors',
        onLast: true
    }));
}));

gulp.task('scripts', gulp.series(function() {
    return gulp.src([
        'scripts/source/functionality/*.js'
    ])
    .pipe(plumber())
    .pipe(concat('scripts.js'))
    .pipe(babel({
        presets: ['es2015']
    }))
    .pipe(uglify())
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('scripts'))
    .pipe(notify({
        message: 'Scripts Compiled',
        onLast: true
    }));
}));

gulp.task('scripts-plugins', gulp.series(function() {
    return gulp.src([
        'scripts/source/vendor/**/*.js',
        'scripts/source/vendor/**/**/*.js'
    ])
    .pipe(plumber())
    .pipe(concat('plugins.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('scripts'))
    .pipe(notify({
        message: 'Plugins Compiled',
        onLast: true
    }));
}));

gulp.task('styles-site', gulp.series(function() {
    return sass([
        'styles/styles.scss'
    ], {
        noCache: true,
        style: 'compact',
        sourcemap: true
    })
    .pipe(plumber())
    .pipe(cleancss({
        keepSpecialComments: false,
        processImport: false
    }))
    .pipe(autoprefixer({
        browsers: ['last 2 versions', 'IE 11', 'Safari 8']
    }))
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(sourcemaps.write('maps', {
        includeContent: false,
        sourceRoot: '/styles'
    }))
    .pipe(gulp.dest('styles'))
    .pipe(notify({
        message: '"Styles - Site" Task Completed'
    }));
}));

gulp.task('styles-sass-lint', gulp.series(function() {
    return gulp.src('styles/**/*.s+(a|c)ss')
    .pipe(sasslint({
        options: {
            formatter: 'stylish',
            'merge-default-rules': true
        },
        files: {
            ignore: ['styles/vendor/*.scss', 'styles/vendor/**/*.scss', 'styles/global/_fonts.scss', 'styles/partial/_iconography.scss']
        },
        configFile: '.sass-lint.yml'
    }))
    .pipe(sasslint.format())
    .pipe(sasslint.failOnError())
    .on('error', notify.onError({
        message: 'SASS Lint Errors',
        onLast: true
    }));
}));

gulp.task('svg-sprite-build', function() {
    const config = {
        mode: {
            symbol: { // symbol mode to build the SVG
                render: {
                    scss: {
                        dest: '../../../../styles/partial/_iconography.scss'
                    }
                },
                inline: true,
                prefix: '.u-icon-%s',
                sprite: '../../../../images/sprite-ui.svg' //generated sprite name
            }
        }
    };

    var svgStream = gulp.src('images/svg/*.svg', {
        cwd: ''
    })
    .pipe(plumber())
    .pipe(imagemin())
    .pipe(svgsprite(config))
    .pipe(gulp.dest(''))
    .pipe(notify({
        message: '"SVG Sprite Build" Task Completed'
    }));
    return svgStream;
});

gulp.task('svg-sprite', gulp.series(['svg-sprite-build']));

gulp.task('watch', gulp.series(function() {
    gulp.watch(['styles/**/*.scss', 'styles/*.scss'], gulp.parallel(['styles-site', 'styles-sass-lint']));
    gulp.watch('images/svg/*.svg', gulp.parallel(['svg-sprite']));
    gulp.watch(['scripts/source/vendor/**/**/*.js', 'scripts/source/vendor/**/*.js', 'scripts/source/vendor/*.js'], gulp.parallel(['scripts-plugins']));
    gulp.watch('scripts/source/functionality/*.js', gulp.parallel(['scripts', 'scripts-js-lint']));
}));

gulp.task('default', gulp.series(['styles-site', 'styles-sass-lint', 'scripts', 'scripts-js-lint', 'scripts-plugins']));
