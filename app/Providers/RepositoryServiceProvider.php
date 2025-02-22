<?php

namespace App\Providers;

use App\Http\Interfaces\AuthorInterface;
use App\Http\Interfaces\BookInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\OrganizationInterface;
use App\Http\Interfaces\PublisherInterface;
use App\Http\Interfaces\UserInterface;
use App\Http\Repositories\AuthorRepository;
use App\Http\Repositories\BookRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\OrganizationRepository;
use App\Http\Repositories\PublisherRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Modules\FileManager\app\Http\Interfaces\FileInterface;
use Modules\FileManager\app\Http\Repositories\FileRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FileInterface::class, FileRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(OrganizationInterface::class, OrganizationRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(BookInterface::class, BookRepository::class);
        $this->app->bind(AuthorInterface::class, AuthorRepository::class);
        $this->app->bind(PublisherInterface::class, PublisherRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
