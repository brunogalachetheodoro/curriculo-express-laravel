<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('curriculum_fields', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Personal information
            $table->string('name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();

            // Links
            $table->string('link_name')->nullable();
            $table->string('link')->nullable();
            $table->string('link_name_2')->nullable();
            $table->string('link_2')->nullable();
            $table->string('link_name_3')->nullable();
            $table->string('link_3')->nullable();

            // Hard skills
            $table->string('hard_skill_1')->nullable();
            $table->string('hard_skill_2')->nullable();
            $table->string('hard_skill_3')->nullable();
            $table->string('hard_skill_4')->nullable();
            $table->string('hard_skill_5')->nullable();

            // About
            $table->text('about')->nullable();

            // Professional experience
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('responsibilities')->nullable();

            $table->string('company_2')->nullable();
            $table->string('position_2')->nullable();
            $table->string('start_date_2')->nullable();
            $table->string('end_date_2')->nullable();
            $table->string('responsibilities_2')->nullable();

            // Education
            $table->string('course_name')->nullable();
            $table->string('education_institution')->nullable();
            $table->string('education_start_year')->nullable();
            $table->string('education_end_year')->nullable();

            // Additional information
            $table->string('info_1')->nullable();
            $table->string('info_2')->nullable();
            $table->string('info_3')->nullable();
            $table->string('info_4')->nullable();
            $table->string('info_5')->nullable();

            // Curriculum customization
            $table->string('font_size')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('curriculum_fields');
    }
};