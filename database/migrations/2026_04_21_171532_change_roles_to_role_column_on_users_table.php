<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password');
        });

        $users = \App\Models\User::all();
        foreach ($users as $user) {
            if ($user->is_admin) {
                $user->role = 'admin';
            } elseif ($user->is_revisor) {
                $user->role = 'revisor';
            } elseif ($user->is_writer) {
                $user->role = 'writer';
            }
            $user->save();
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer', 'is_author']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->nullable()->default(false);
            $table->boolean('is_revisor')->nullable()->default(false);
            $table->boolean('is_writer')->nullable()->default(false);
            $table->boolean('is_author')->nullable()->default(false);
        });

        $users = \App\Models\User::all();
        foreach ($users as $user) {
            if ($user->role === 'admin') {
                $user->is_admin = true;
            } elseif ($user->role === 'revisor') {
                $user->is_revisor = true;
            } elseif ($user->role === 'writer') {
                $user->is_writer = true;
            }
            $user->save();
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
