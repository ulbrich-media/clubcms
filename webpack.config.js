const glob = require('glob-all');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const PurgecssPlugin = require('purgecss-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const TerserPlugin = require("terser-webpack-plugin");


module.exports =  (env, argv) => {
    const isProduction = argv.mode === 'production';

    return {

        entry: {
            "index": "./Resources/Private/JavaScript/index.js",
            "style": "./Resources/Private/Styles/style.css",
        },
        output: {
            filename: '[name].js',
            path: __dirname + "/Resources/Public",
        },


        plugins: isProduction ? [
            new MiniCssExtractPlugin({
                filename: '[name].css',
            }),
            new PurgecssPlugin({
                paths: glob.sync([
                    __dirname + '/Resources/Private/**/*.html',
                    __dirname + '/Resources/Private/JavaScript/**/*.js'
                ],  { nodir: true }),
                safelist: [
                    'html', 'body',
                    'img', 'a', 'form', 'input', 'textarea', 'select', 'option', 'optgroup', 'button', // these html tags are generated by ViewHelpers, so we need to safe them from purging
                    /^fa/, // preserve fontawesome classes
                ],
                extractors: [
                    {
                        extractor: content => content.match(/[^<>"'`\s]*[^<>"'`\s:]/g) || [],
                        extensions: ['html', 'js']
                    },
                ],
            }),
        ] : [
            new MiniCssExtractPlugin({
                filename: '[name].css',
            }),
            // new BrowserSyncPlugin({
            //     host: 'localhost',
            //     port: 3000,
            //     proxy: 'https://club-cms.ddev.site/',
            //     watch: false,
            //     files: [
            //         './web/typo3conf/ext/clubcms/Resources/Private/**/*',
            //     ]
            // }),
        ],


        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: "babel-loader"
                    }
                }, {
                    test: /\.css$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        {
                            loader: "css-loader",
                            options: {
                                importLoaders: 1, // run postcss-loader for all @import files
                            },
                        },
                        "postcss-loader",
                    ],
                }, {
                    test: /\.(woff|woff2|ttf|eot|svg)$/,
                    loader: 'file-loader',
                    options: {
                        name: 'fonts/[hash].[ext]',
                    },
                },
            ]
        },


        optimization: {
            splitChunks: {
                cacheGroups: {
                    styles: {
                        name: 'style',
                        type: 'css/mini-extract',
                        chunks: 'all',
                        enforce: true
                    }
                }
            },
            minimizer: [
                new TerserPlugin(),
                new CssMinimizerPlugin(),
            ],
        }


    }
}