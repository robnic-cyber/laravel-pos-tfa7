<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('id');
            $table->string('full_name')->nullable()->after('name');
            $table->string('avatar')->nullable()->after('password');
        });

        foreach (DB::table('users')->get() as $user) {
            DB::table('users')->where('id', $user->id)->update([
                'username' => Str::slug(Str::before($user->email, '@'), '_') . '_' . $user->id,
                'full_name' => $user->name,
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'full_name', 'avatar']);
        });
    }
};
