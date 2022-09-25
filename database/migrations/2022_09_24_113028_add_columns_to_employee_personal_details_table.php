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
        Schema::table('employee_personal_details', function (Blueprint $table) {
            $table->string('pan_number')->nullable()->after('gender');
            $table->string('adhaar_number')->nullable()->after('gender');
            $table->string('esi_number')->nullable()->after('gender');
            $table->string('pf_account')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_personal_details', function (Blueprint $table) {
            $table->dropColumn(['pan_number','adhaar_number', 'esi_number', 'pf_account']);
        });
    }
};
