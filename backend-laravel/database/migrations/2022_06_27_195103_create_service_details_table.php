<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id');
            $table->string('group');
            $table->string('description');
            $table->tinyInteger('mandatory');
            $table->bigInteger('sequence');
            $table->string('parent', 20);
            $table->string('type', 20);
            $table->tinyInteger('is_multiple');
            $table->string('remark', 100);
            $table->string('status', 100);
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
        Schema::dropIfExists('service_details');
    }
}
