<?php
# @Date:   2020-12-15T10:29:17+00:00
# @Last modified time: 2020-12-15T10:38:59+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorIdAndPatientIdToVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->dropColumn('doctor');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id');

            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['patient_id']);
            $table->dropColumn('doctor_id');
            $table->dropColumn('patient_id');

            $table->string('doctor');
        });
    }
}
