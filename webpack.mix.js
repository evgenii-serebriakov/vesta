const mix = require('laravel-mix');
const path = require('path');

const webpack = require('webpack');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const imageminMozjpeg = require('imagemin-mozjpeg');
const StylelintPlugin = require('stylelint-webpack-plugin');

require('laravel-mix-webp');
require('laravel-mix-polyfill');
require('laravel-mix-clean');
require('laravel-mix-blade-reload');

const ENV = process.env.NODE_ENV;
const isEnvProduction = ENV !== 'development';

const isHmr = process.argv.includes('--hot');


const PATHS = {
    src: path.join(__dirname, 'resources/assets'),
    dist: path.join(__dirname, 'public/assets'),
    views: path.join(__dirname, 'resources/views')

}

// Loader options
const additionalData = `
  @import "${PATHS.src}/scss/mixins/_media.scss";
  `;
//   @import "${PATHS.src}/scss/utils/_variables.scss";

const plugins = [
    new webpack.DefinePlugin({
        __VUE_OPTIONS_API__: true,
        __VUE_PROD_DEVTOOLS__: false
      }),
    new ImageminPlugin({
        disable: !isEnvProduction,
        test: /\.(jpe?g|png|gif)$/i,
        plugins: [
            imageminMozjpeg({
                quality: 80,
                progressive: true,
            }),
        ],
    }),
    // Создаем svg-спрайт с иконками
    new SVGSpritemapPlugin(
        `${PATHS.src}/images/icons/*.svg`,
        {
            output: {
                filename: 'assets/images/sprites.svg', // Путь относительно каталога public/
                svg4everybody: false, // Отключаем плагин 'SVG for Everybody'
                svg: {
                    sizes: false // Удаляем инлайновые размеры svg
                },
                chunk: {
                    keep: true, // Включаем, чтобы при сборке не было ошибок из-за отсутствия spritemap.js
                },
                svgo: {
                    plugins : [
                        {
                            'removeStyleElement': false // Удаляем из svg теги <style>
                        },
                        {
                            'removeAttrs': {
                                attrs: ['fill', 'stroke'] // Удаляем часть атрибутов для управления стилями из CSS
                            }
                        },
                    ]
                },
            },
            sprite: {
                prefix: 'icon-', // Префикс для id иконок в спрайте, будет иметь вид 'icon-имя_файла_с_иконкой'
                generate: {
                    title: false, // Не добавляем в спрайт теги <title>
                },
            },
        }
    ),
    new CopyWebpackPlugin({
        patterns: [
            {
                from: `${PATHS.src}/images`,
                to: 'assets/images', // Путь относительно каталога public/,
                globOptions: {
                    ignore: ['**/icons/**'], // Игнорируем каталог с иконками
                },
            },
            {
                from: `${PATHS.src}/fonts`,
                to: 'assets/fonts'
            },
            {
                from: `${PATHS.src}/favicons`,
                to: 'assets/favicons'
            },
            {
                from: `${PATHS.views}/index.html`,
                to: 'assets'
            }
        ],
    }),
    new StylelintPlugin({
        fix: true,
        files: [
            './resources/assets/**/*.{vue,html,css,scss}'
        ]
    }),
    new ImageminPlugin({
        disable: !isEnvProduction,
        test: /\.(jpe?g|png|gif)$/i,
        plugins: [
            imageminMozjpeg({
                quality: 80,
                progressive: true,
            }),
        ],
    })
];

const rules = [
    {
        test: /\.m?js/,
        resolve: {
          fullySpecified: false
        }
    },
    {
        enforce: 'pre',
        test: /\.(js|vue)$/,
        loader: 'eslint-loader',
        exclude: /node_modules/,
        options: {
            fix: true
        }
    },
    {
        test: /\.pug$/,
        oneOf: [
          {
            resourceQuery: /^\?vue/,
            use: ['pug-plain-loader']
          },
          {
            use: ['raw-loader', 'pug-plain-loader']
          }
        ]
    },
];

// Config
const config = mix
    .js(
        `${PATHS.src}/js/main.js`,
        `${PATHS.dist}/js`
    ).vue()
    // Используем полифиллы
    .polyfill({
        enabled: true,
        useBuiltIns: 'usage',
        targets: false, // Используем настройки browserslist из package.json
        // debug: true, // Выкидывает ошибку
        corejs: '3.8'
    })
    .sass(`${PATHS.src}/scss/main.scss`,
        `${PATHS.dist}/css`, {
            additionalData
        }
    )
    .alias({
        '@': path.join(__dirname, 'resources/assets')
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
    .webpackConfig({
        module: {
            rules,
        },
        plugins
    })
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
    config.version().extract(['vue']);
} else {
    config.sourceMaps().bladeReload();
}
