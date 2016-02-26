var elixir = require('laravel-elixir');

elixir.config.publicPath = '../../public-vue';
elixir.config.assetsPath = 'src';


elixir(function (mix) {
    mix.browserify('app.js');
});
