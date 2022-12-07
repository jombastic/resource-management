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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(NULL);
            $table->string('resourceType')->nullable()->default(NULL);
            $table->string('pdfFile')->nullable()->default(NULL);
            $table->string('url')->nullable()->default(NULL);
            $table->string('snippetDescription')->nullable()->default(NULL);
            $table->tinyInteger('openLinkInNewTab')->nullable()->default(NULL);
            $table->longText('htmlSnippet')->nullable()->default(NULL);
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
        Schema::dropIfExists('resources');
    }
};
