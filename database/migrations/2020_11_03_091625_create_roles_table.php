<?php
# @Date:   2020-11-03T09:16:26+00:00
# @Last modified time: 2020-11-03T09:19:21+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     //down method, dropping if it exists
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
