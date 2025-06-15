<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Article $article)
    {
        return $user->role === 'admin' || $user->id === $article->user_id;
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'reporter']);
    }

    public function update(User $user, Article $article)
    {
        return $user->role === 'admin' || 
               ($user->role === 'reporter' && $user->id === $article->user_id);
    }

    public function delete(User $user, Article $article)
    {
        return $user->role === 'admin';
    }
}