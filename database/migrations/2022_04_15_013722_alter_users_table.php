<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function (Blueprint $table) {
           
            /** perfil */
            $table->boolean('lessor')->nullable();
            $table->boolean('lessee')->nullable();

            /** data */
            $table->string('genre')->nullable();
            $table->string('document')->unique();
            $table->string('document_secondary', 20)->nullable();
            $table->string('document_secondary_complement')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('driver_license', 11)->nullable();
            $table->string('cover')->nullable();

            /** income */
            $table->string('occupation')->nullable();
            $table->double('income', 10, 2)->nullable();
            $table->string('company_work')->nullable();

            /** address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /** contact */
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();

            /** access */
            $table->boolean('admin')->nullable();
            $table->boolean('client')->nullable();

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
           
            /** perfil */
            $table->dropColumn('lessor');
            $table->dropColumn('lessee')->nullable();

            /** data */
            $table->dropColumn('genre');
            $table->dropColumn('document');
            $table->dropColumn('document_secondary');
            $table->dropColumn('document_secondary_complement');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('civil_status');
            $table->dropColumn('driver_license');
            $table->dropColumn('cover');

            /** income */
            $table->dropColumn('occupation')->nullable();
            $table->dropColumn('income', 10, 2)->nullable();
            $table->dropColumn('company_work')->nullable();

            /** address */
            $table->dropColumn('zipcode');
            $table->dropColumn('street');
            $table->dropColumn('number');
            $table->dropColumn('complement');
            $table->dropColumn('district');
            $table->dropColumn('state');
            $table->dropColumn('city');

            /** contact */
            $table->dropColumn('telephone');
            $table->dropColumn('cell');

            /** access */
            $table->dropColumn('admin');
            $table->dropColumn('client');

        });
    }
}
