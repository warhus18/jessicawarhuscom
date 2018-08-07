const autoprefixer = require('gulp-autoprefixer'),
      babel = require('gulp-babel'),
      cleancss = require('gulp-clean-css'),
      concat = require('gulp-concat'),
      data = require('gulp-data'),
      eslint = require('gulp-eslint'),
      gulp = require('gulp'),
      imagemin = require('gulp-imagemin'),
      notify = require('gulp-notify'),
      nunjucksrender = require('gulp-nunjucks-render'),
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
            ignore: ['styles/global/_base.scss', 'styles/global/_functions.scss', 'styles/global/_mixins.scss', 'styles/global/_variables.scss', 'styles/partial/_iconography.scss']
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

gulp.task('svg-sprite-build', gulp.series(function() {
    const config = {
        mode: {
            symbol: { // symbol mode to build the SVG
                render: {
                    scss: {
                        dest: '../../../../styles/partial/_iconography.scss'
                    }
                },
                prefix: '.u-icon-%s',
                sprite: '../../../../images/sprite-ui.svg', //generated sprite name
                example: {
                    template: 'style-guide/templates/icon-template/symbol.tpl.html',
                    dest: 'iconography.njk'
                },
                dest: 'style-guide/templates/pages/elements/'
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
}));

gulp.task('svg-sprite-copy', gulp.series(['svg-sprite-build'], function() {
    return gulp.src('images/sprite-ui.svg')
        .pipe(gulp.dest('style-guide/templates/assets'))
        .pipe(notify({
            message: '"sprite-ui.svg" Copied to Design System',
            onLast: true
        }));
}));

gulp.task('svg-sprite', gulp.series(['svg-sprite-build', 'svg-sprite-copy']));

gulp.task('styles-styleguide', gulp.series(function() {
    return sass([
        'styles/style-guide.scss'
    ], {
        noCache: true,
        style: 'compact',
        sourcemap: true
    })
    .pipe(plumber())
    .pipe(autoprefixer({
        browsers: ['last 2 versions', 'IE 11', 'Safari 8']
    }))
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
        message: '"Styles - Style Guide" Task Completed',
        onLast: true
    }));
}));

gulp.task('nunjucks', gulp.series(function() {
    return gulp.src('style-guide/templates/pages/**/*.+(html|njk)')
    .pipe(data(function() {
        return require('./style-guide/data.json');
    }))
    .pipe(nunjucksrender({
        path: ['style-guide/templates']
    }))
    .pipe(gulp.dest('style-guide'))
    .pipe(notify({
        message: '"Nunjucks" Task Completed'
    }));
}));

gulp.task('watch', gulp.series(function() {
    gulp.watch(['styles/**/*.scss', 'styles/*.scss'], gulp.parallel(['styles-site', 'styles-styleguide', 'styles-sass-lint']));
    gulp.watch('images/svg/*.svg', gulp.parallel(['svg-sprite']));
    gulp.watch(['scripts/source/vendor/**/**/*.js', 'scripts/source/vendor/**/*.js', 'scripts/source/vendor/*.js'], gulp.parallel(['scripts-plugins']));
    gulp.watch('scripts/source/functionality/*.js', gulp.parallel(['scripts', 'scripts-js-lint']));
    gulp.watch('style-guide/templates/**/*.+(html|njk)', gulp.parallel(['nunjucks']));    
}));

gulp.task('default', gulp.series(['styles-site', 'styles-sass-lint', 'scripts', 'scripts-js-lint', 'scripts-plugins']));
