const webpack = require('webpack');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const imageminMozjpeg = require('imagemin-mozjpeg');
const StylelintPlugin = require('stylelint-webpack-plugin');

const { PATHS, isEnvProduction } = require('./variables');

module.exports = [
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
            // {
            //     from: `${PATHS.views}/index.html`,
            //     to: 'assets'
            // }
        ],
    }),
    new StylelintPlugin({
        fix: true,
        files: [
            './resources/assets/**/*.{vue,html,css,scss}'
        ]
    })
];
