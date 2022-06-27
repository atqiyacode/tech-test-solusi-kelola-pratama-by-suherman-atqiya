<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_headers', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->tinyInteger('mandatory');
            $table->bigInteger('package_id');
            $table->bigInteger('debitur_type_id');
            $table->decimal('service_price_amount');
            $table->decimal('service_discount_amount');
            $table->string('status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_headers');
    }
}
