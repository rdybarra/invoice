// webpack.config.js
module.exports = {
  entry: './resources/assets/js/main.js',
  output: {
    filename: './public/js/main.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
        query: {
          presets: ['es2015']
        }
      }
    ]
  },
  resolve: {
    extensions: ['', '.js']
  }
};
