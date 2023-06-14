<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('svma',10);
            $table->string('svten',50);
            $table->date('svngaysinh');
            $table->tinyInteger('svgioitinh');
            $table->string('svquequan',50);
            $table->string('lqlma',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinh_viens');
    }
};
