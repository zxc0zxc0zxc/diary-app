<?php

namespace App\Providers;

use App\Modules\Authorization\Contracts\AuthorizationRepositoryContract;
use App\Modules\Authorization\Contracts\AuthorizationServiceContract;
use App\Modules\Authorization\Repositories\AuthorizationRepository;
use App\Modules\Authorization\Services\AuthorizationService;
use App\Modules\MoodDiary\Contracts\MoodDiaryRepositoryContract;
use App\Modules\MoodDiary\Contracts\MoodDiaryServiceContract;
use App\Modules\MoodDiary\Repositories\MoodDiaryRepository;
use App\Modules\MoodDiary\Services\MoodDiaryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            MoodDiaryRepositoryContract::class,
            MoodDiaryRepository::class
        );
        $this->app->bind(
            MoodDiaryServiceContract::class,
            MoodDiaryService::class
        );
        $this->app->bind(
            AuthorizationRepositoryContract::class,
            AuthorizationRepository::class
        );
        $this->app->bind(
            AuthorizationServiceContract::class,
            AuthorizationService::class
        );
    }
}
