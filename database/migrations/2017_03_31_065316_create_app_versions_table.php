<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppVersionsTable extends Migration
{
    protected $table = 'app_versions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('platform')->index();
            $table->string('version', 100);
            $table->string('title', 100)->nullable();   // Update title.
            $table->text('detail');                     // Update note.
            $table->string('url')->nullable();          // New app's url.
            $table->string('level')->nullable();        // Update notice level. eg: force, positive...
            $table->json('options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->table);
    }
}
