var elixir = require('laravel-elixir');

elixir.config.publicPath = '../../public-jquery';
elixir.config.assetsPath = 'src';


elixir(function (mix) {
    mix.browserify('app.js')
        .less('../../../less/app.less');
});
