<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\PostCategoryResource;
use App\MoonShine\Resources\PostResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\VolumeResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\ImageResource;
use App\MoonShine\Resources\BannerResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                PostCategoryResource::class,
                PostResource::class,
                VolumeResource::class,
                CategoryResource::class,
                ProductResource::class,
                ImageResource::class,
                BannerResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
