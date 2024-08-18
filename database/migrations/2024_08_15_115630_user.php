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
    Schema::create("customers", function (Blueprint $table) {
        $table->id();  // BIGINT primary key
        $table->integer("custom_id")->unique(); // Six-digit custom ID
        $table->string("fname");
        $table->string("lname");
        $table->string("contact");
        $table->string("email");
        $table->string("password");
        $table->string("address");
        $table->string("city");
        $table->string("province");
        $table->integer("zipcode");
        $table->string("image")->nullable();
        $table->timestamps();  // Automatically creates 'created_at' and 'updated_at' columns
    });

    Schema::create("products", function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger("customer_id")->nullable();
        $table->string("prod_category");
        $table->string("prod_name");
        $table->integer("price");
        $table->string("desc");
        $table->integer("stock");
        $table->text("main_img");
        $table->text("img1");
        $table->text("img2");
        $table->text("img3");
        $table->timestamps();

        // Define the foreign key relationship
        $table->foreign("customer_id")->references("id")->on("customers")->onDelete("set null");
    });

    Schema::create('cart_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id')->nullable();
        $table->string('prod_name');
        $table->integer('price_per_item');
        $table->string('main_img');
        $table->timestamps();

        // Define the foreign key relationship
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
    });

    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id')->nullable();
        $table->string('prod_name');
        $table->integer('quantity');
        $table->integer('price_per_item');
        $table->integer('total_price');
        $table->string('main_img');
        $table->timestamps();

        // Define the foreign key relationship
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
    });

    Schema::create('shipments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id')->nullable();
        $table->string('customer_name');
        $table->string('customer_address');
        $table->string('customer_contact');
        $table->string('prod_name');
        $table->integer('quantity');
        $table->integer('price');
        $table->integer('total_price');
        $table->timestamps();

        // Define the foreign key relationship
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::dropIfExists('shipments');
    Schema::dropIfExists('orders');
    Schema::dropIfExists('cart_items');
    Schema::dropIfExists('products');
    Schema::dropIfExists('customers');
}

};
