<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('BDD', function () {

    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('illustration');
    Schema::dropIfExists('Langue');
    Schema::dropIfExists('traduction');
    Schema::enableForeignKeyConstraints();


    Schema::create('illustration', function (Blueprint $table) {

        $table->increments('id');
        $table->unsignedInteger('id_langue');
        $table->unsignedInteger('id_user');
        $table->string('titre')->unique();
        $table->string('path_illustration');
        $table->timestamps();
        $table->softDeletes();

    });

    Schema::create('langue', function (Blueprint $table) {

        $table->increments('id');
        $table->longText('langue');
        $table->timestamps();
        $table->softDeletes();

    });

    DB::table('langue')->insert([
        'langue' => 'Anglais',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Mandarin',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Hindi',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Espagnol',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Arabe',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Bengali',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Français',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Russe',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Portugais',
    ]);

    DB::table('langue')->insert([
        'langue' => 'Ourdou',
    ]);

    Schema::create('traduction', function (Blueprint $table) {

        $table->increments('id');
        $table->unsignedInteger('id_langue');
        $table->unsignedInteger('id_user');
        $table->unsignedInteger('id_illustration');
        $table->longText('composants_json');
        $table->tinyInteger('default')->default(0);
        $table->timestamps();
        $table->softDeletes();

    });

});


