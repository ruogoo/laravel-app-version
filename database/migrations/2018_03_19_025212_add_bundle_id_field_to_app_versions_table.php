<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBundleIdFieldToAppVersionsTable extends Migration
{
    protected $table = 'app_versions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropIndex(['platform']);
            $table->string('bundle_id', 32)->after('id');
            $table->index(['platform', 'bundle_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('bundle_id');
            $table->dropIndex(['platform', 'bundle_id']);
            $table->index('platform');
        });
    }
}
