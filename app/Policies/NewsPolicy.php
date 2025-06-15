<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;

class NewsPolicy
{
    /**
     * Tentukan apakah user boleh mengubah berita.
     */
    public function update(User $user, News $news): bool
    {
        return $user->id === $news->user_id;
    }

    /**
     * Tentukan apakah user boleh menghapus berita.
     */
    public function delete(User $user, News $news): bool
    {
        return $user->id === $news->user_id;
    }

    /**
     * (Opsional) Berita tidak bisa dibuat oleh orang lain selain reporter
     */
    public function create(User $user): bool
    {
        return $user->role === 'reporter'; // atau pakai method isReporter()
    }

    // Yang lainnya bisa dibiarkan false atau dihapus jika tidak dipakai
}
