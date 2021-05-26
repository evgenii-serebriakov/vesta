const mix = require('laravel-mix');
const configWebpack = require('./build/webpack.config');
const { PATHS, isEnvProduction, isHmr } = require('./build/variables');

require('laravel-mix-webp');
require('laravel-mix-polyfill');
require('laravel-mix-clean');
require('laravel-mix-blade-reload');

// Loader options
const additionalData = `
  @import "${PATHS.src}/scss/mixins/_media.scss";
  @import "${PATHS.src}/scss/utils/_variables.scss";
  `;

// Config
const config = mix
    .js(
        `${PATHS.src}/js/main.js`,
        `${PATHS.dist}/js`
    ).vue()
    // Используем полифиллы
    .polyfill({
        enabled: true,
        useBuiltIns: 'entry',
        targets: false, // Используем настройки browserslist из package.json
        // debug: true, // Выкидывает ошибку
        corejs: '3.8',
        entryPoints: 'all'
    })
    .sass(`${PATHS.src}/scss/main.scss`,
        `${PATHS.dist}/css`, {
            additionalData
        }
    )
    .alias({
        '@': PATHS.src
    })
    // Переопределяем параметры mix
    .options({
        processCssUrls: false, // Отключаем автоматическое обновление URL в CSS
        postCss: [
            // Добавляем вендорные префиксы в CSS
            require('autoprefixer')({
                cascade: false, // Отключаем выравнивание вендорных префиксов
            }),
            // Группируем стили по медиа-запросам
            require('postcss-sort-media-queries'),
        ],
    })
    // Настраиваем webpack для обработки изображений
    .webpackConfig(configWebpack)
    // .override((webpackConfig) => {
    //     console.log(webpackConfig)
    // })
    // .copy(`${PATHS.views}/*.html`, PATHS.dist)
    .browserSync('http://vesta.loc:80')
    .clean({
        dry: isHmr,
        cleanOnceBeforeBuildPatterns: [
            PATHS.dist
        ]
    })
    // .ImageWebp({ // Создаем WEBP версии картинок
    //     // disable: !isEnvProduction,
    //     from: 'resources/assets/images',
    //     to: 'resources/assets/images',
    //     imageminWebpOptions: {
    //         quality: 70
    //     }
    // });
   

if (isEnvProduction) {
    config.version();
} else {
    config.sourceMaps().bladeReload();
}
