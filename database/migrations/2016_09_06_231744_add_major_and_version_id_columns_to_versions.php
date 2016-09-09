<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMajorAndVersionIdColumnsToVersions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('versions', function($table) {
           $table->char('major', 1)->default('0');
            $table->integer('version_id')->unsigned()->after('entry_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('versions', function($table) {
            $table->dropColumn('major');
            $table->dropColumn('version_id');
        });
    }
}
