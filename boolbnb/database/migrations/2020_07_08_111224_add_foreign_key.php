<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('apartments', function (Blueprint $table) {

        $table->foreign('user_id', 'user_apt')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
        // $table->foreign('category_id', 'category_apt')
        //       ->references('id')
        //       ->on('categories')
        //       ->onDelete('cascade');

      });

      Schema::table('messages', function (Blueprint $table) {

        $table->foreign('apartment_id', 'apart_mess')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');


      });

      Schema::table('sponsorships', function (Blueprint $table) {

        $table->foreign('apartment_id', 'apart_spons')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');
        $table->foreign('sponsorshipstype_id', 'sponsor')
              ->references('id')
              ->on('sponsorshipstypes')
              ->onDelete('cascade');

      });

      Schema::table('apartment_service', function (Blueprint $table) {

        $table->foreign('apartment_id', 'apart_serv')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');
        $table->foreign('service_id', 'service')
              ->references('id')
              ->on('services')
              ->onDelete('cascade');

      });

      Schema::table('views', function (Blueprint $table) {

        $table->foreign('apartment_id', 'apart_view')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {

          $table->dropForeign('user_apt');
        //   $table->dropForeign('category_apt');

        });

        Schema::table('messages', function (Blueprint $table) {

          $table->dropForeign('apart_mess');

        });

        Schema::table('sponsorships', function (Blueprint $table) {

          $table->dropForeign('apart_spons');
          $table->dropForeign('sponsor');

        });

        Schema::table('apartment_service', function (Blueprint $table) {

          $table->dropForeign('apart_serv');
          $table->dropForeign('service');

        });

        Schema::table('views', function (Blueprint $table) {

          $table->dropForeign('apart_view');
        });
    }
}
