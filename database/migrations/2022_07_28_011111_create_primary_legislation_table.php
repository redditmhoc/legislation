<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('primary_legislation', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('region_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('bill_number')->index();
            $table->string('act_number')->index();
            $table->integer('act_year')->index();

            $table->string('title')->index();
            $table->string('reddit_url')->nullable();

            $table->text('introductory_text');

            $table->date('commencement_date')->nullable();
            $table->date('royal_assent_date')->nullable();

            $table->json('metadata');
            $table->text('explanatory_notes')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('primary_legislations');
    }
};
