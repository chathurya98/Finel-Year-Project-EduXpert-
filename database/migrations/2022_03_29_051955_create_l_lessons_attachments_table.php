<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLLessonsAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_lessons_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('lesson_id');
            $table->integer('type');
            $table->string('attachment');
            $table->string('drive_id');
            $table->string('attachment_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_lessons_attachments');
    }
}
