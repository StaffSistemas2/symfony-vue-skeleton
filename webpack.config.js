var Encore = require('@symfony/webpack-encore');
const { VueLoaderPlugin } = require('vue-loader');

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .cleanupOutputBeforeBuild()
  .enableSourceMaps(!Encore.isProduction())
  // .enableVersioning(Encore.isProduction())
  .addEntry('js/app', './assets/js/index.js')
  .addStyleEntry('css/style', './assets/css/custom.scss')
  .enableSassLoader()
  .enablePostCssLoader()
  .enableVueLoader()
// .addPlugin(new VueLoaderPlugin())
// .addAliases({
//   vue: 'vue/dist/vue.js'
// });

module.exports = Encore.getWebpackConfig();