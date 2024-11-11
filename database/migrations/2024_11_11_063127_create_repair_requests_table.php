<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('repair_requests', function (Blueprint $table) {
            $table->id();
            $table->string('issue');
            $table->string('campus');
            $table->string('reporter');
            $table->string('internal_phone');
            $table->string('external_phone');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('repair_requests');
    }
    
};
