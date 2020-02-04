const path = require('path')
    // const ExtractTextPlugin = require('extract-text-webpack-plugin');
const webpack = require('webpack')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin')

module.exports = {
    mode: 'production',
    entry: './app/src/app.js',
    output: {
        filename: 'js/main.js',
        path: path.resolve(__dirname, 'public/assets/')
    },


    module: {
        rules: [

            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            }

            // {
            //     test: /\.(scss)$/,
            //     use: [{
            //         loader: 'style-loader', // inject CSS to page
            //     }, {
            //         loader: 'css-loader', // translates CSS into CommonJS modules
            //     }, {
            //         loader: 'postcss-loader', // Run postcss actions
            //         options: {
            //             plugins: function() { // postcss plugins, can be exported to postcss.config.js
            //                 return [
            //                     require('autoprefixer')
            //                 ];
            //             }
            //         }
            //     }, {
            //         loader: 'sass-loader' // compiles Sass to CSS
            //     }]
            // }

            // {
            //     test: /\.s[ac]ss$/i,
            //     use: ExtractTextPlugin.extract({
            //         fallback: 'style-loader',
            //         use: ['css-loader', 'sass-loader']
            //     })
            // },
            // {
            //     test: /\.css$/,
            //     use: ['style-loader', 'css-loader']
            // }
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/style.css'
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        })
        // ,
        // new OptimizeCssAssetsPlugin({
        //     assetNameRegExp: /\.css$/g,
        //     cssProcessor: require('cssnano'),
        //     cssProcessorPluginOptions: {
        //         preset: ['default', { discardComments: { removeAll: true } }],
        //     },
        //     canPrint: true
        // })
    ]


}