<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->string('description')->nullable(false);
            $table->boolean('is_completed')->default(false);
            $table->string('completed_at')->default(null)->nullable(true);
            $table->string('due')->default(null)->nullable(true);
            $table->integer('urgency')->nullable(true);
            $table->string('updated_by')->nullable(true);
            $table->timestamps();
            $table->string('assignee_id')->nullable(true);
            $table->integer('task_id')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
