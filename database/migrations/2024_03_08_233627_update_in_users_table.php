<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name')->after('remember_token');
            $table->string('last_name')->after('first_name');
            $table->string('gender')->after('last_name');
            $table->string('birthday')->after('gender');
            $table->string('country')->after('birthday')->nullable();
            $table->string('province')->after('country')->nullable();
            $table->string('city')->after('province')->nullable();
            $table->string('district')->after('city')->nullable();
            $table->string('county')->after('district')->nullable();
            $table->string('address')->after('county')->nullable();
            $table->string('profile_intro', 250)->after('address')->nullable();
            $table->string('avatar_path')->after('profile_intro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('gender');
            $table->dropColumn('birthday');
            $table->dropColumn('country');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('county');
            $table->dropColumn('address');
            $table->dropColumn('profile_intro', 250);
            $table->dropColumn('avatar_path');
        });
    }
};
