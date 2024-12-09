const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require('path');

let scripts = {
  ...defaultConfig,
  entry: {
    'blocks': './src/js/blocks.js',
    'main': './src/js/main.js'
  },
  devtool: "source-map",
  resolve: {
    modules: [
      path.resolve(__dirname + '/node_modules'),
      path.resolve(__dirname + '/src')
    ]
  },
  output: {
    path: path.join(__dirname, 'dist/js'),
    filename: '[name].js'
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /(node_modules|bower_components)/,
        loader: 'babel-loader',
        options: { presets: ['@babel/env', '@babel/preset-react'] },
      },
    ]
  },
}
module.exports = [scripts]
