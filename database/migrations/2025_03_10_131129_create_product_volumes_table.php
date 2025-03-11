<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVolumesTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_volumes', function (Blueprint $table) {
            $table->id();
            $table->string('volume');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_volumes');
    }
}

