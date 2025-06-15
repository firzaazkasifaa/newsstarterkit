<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;  // Import Model User
use App\Models\Article;  // Import Model Article
use App\Models\News;  // Import Model News
use App\Policies\ArticlePolicy;  // Import ArticlePolicy
use App\Policies\NewsPolicy;  // Import NewsPolicy

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Policy mappings untuk aplikasi.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        News::class => NewsPolicy::class,
        Article::class => ArticlePolicy::class,  // Mapping Policy untuk Article
    ];

    /**
     * Register layanan autentikasi/authorization.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Definisikan gate untuk roles
        Gate::define('admin', fn (User $user) => $user->role === 'admin');
        Gate::define('reporter', fn (User $user) => $user->role === 'reporter');
        Gate::define('editor', fn (User $user) => $user->role === 'editor');

        // Gate untuk manajemen profile
        Gate::define('update-profile', function (User $user, User $profileUser) {
            return $user->id === $profileUser->id || $user->role === 'admin';
        });
    }
}