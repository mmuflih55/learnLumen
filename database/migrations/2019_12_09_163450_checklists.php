<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Checklists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->string('object_domain')->nullable(false);
            $table->string('object_id')->nullable(false);
            $table->string('description')->nullable(false);
            $table->boolean('is_completed')->default(false)->nullable(true);
            $table->string('completed_at')->default(null)->nullable(true);
            $table->string('updated_by')->nullable(true);
            $table->timestamps();
            $table->string('due')->default(null)->nullable(true);
            $table->integer('urgency')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklists');
    }
}
