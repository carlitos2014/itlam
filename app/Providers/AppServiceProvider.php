<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(120);

        $this->setBladeRinclude();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Directiva Blade para incluir una vista Blade desde otra vista.
     * A diferencia de @include, la ruta no es estática sino relativa al blade desde donde se llama.
     *
     * @return void
     */
    public function setBladeRinclude()
    {
        Blade::directive('rinclude', function($expression) {
            $viewBasePath = config('view.paths')[0];
            $curCompiledFilePath = Blade::getPath();
            $paths = explode('/', substr($curCompiledFilePath, strlen($viewBasePath)), -1);
            $basePath = '';

            foreach($paths as $path) {
                $basePath .= $path . '.';
            }

            $basePath = trim($basePath, '.');

            if (starts_with($expression, '('))
                $expression = substr($expression, 2, -2);

            $expression = str_replace("'", "", $expression);

            return "<?php echo \$__env->make('$basePath.$expression', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
        });
    }

}