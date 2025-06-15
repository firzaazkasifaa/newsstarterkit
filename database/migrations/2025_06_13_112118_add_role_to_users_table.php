<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Jalankan migrasi untuk menambahkan kolom role.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom role jika belum ada
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')
                      ->default('reporter') // Ubah default dari 'test' ke 'reporter'
                      ->after('email')      // Letakkan kolom setelah email
                      ->comment('Role user: admin, reporter, editor');
            }
        });
    }

    /**
     * Rollback migrasi - hapus kolom role.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hanya hapus kolom jika ada
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
}
