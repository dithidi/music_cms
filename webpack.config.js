var webpack = require('webpack');

Elixir.webpack.mergeConfig({
  module: {
    loaders: [
      { test: require.resolve('jquery'), loader: 'expose?jQuery!expose?$' },
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      }
    ] 
  },
  plugins: [
    new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
    'window.jQuery': 'jquery',
    'window.$' : 'jquery'
    })
  ],
  resolve: {
    alias: {
      'vue': 'vue/dist/vue.js'
    }
  }
});