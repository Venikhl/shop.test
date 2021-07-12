<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\User;
use \App\Models\Product;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Product::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('amount')
                ->default(0);

            $table->timestamps();

            $userFK = (new User)->getForeignKey(); // user_id
            $productFK = (new Product)->getForeignKey(); // product_id

            $table->unique([$userFK, $productFK]);
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}