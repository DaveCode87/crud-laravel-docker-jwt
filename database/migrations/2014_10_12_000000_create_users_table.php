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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('uid')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('role', ['broker', 'agent'])->default('agent');
            $table->string('role_name')->default('Real Estate Sales Associate');
            $table->string('phone')->nullable();
            $table->string('prefix')->nullable();
            $table->string('password_reset_token')->nullable();
            $table->string('api_token')->nullable();
            $table->bigInteger('password_reset_expiration')->nullable();
            $table->integer('first_login')->default(1);
            $table->string('web_player_id')->nullable();
            $table->string('mobile_player_id')->nullable();
            $table->string('image_id')->nullable();
            $table->string('nrds')->nullable();
            $table->string('area')->nullable();
            $table->integer('blocked')->default(0);
            $table->integer('notifications_active')->default(1);
            $table->string('full_address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('business_type')->nullable();
            $table->string('ssn')->nullable();
            $table->string('ein')->nullable();
            $table->string('tax_id')->nullable();
            $table->integer('tier_id')->default(1);
            $table->bigInteger('tier_from')->nullable();
            $table->integer('ica')->nullable();
            $table->string('w9')->nullable();
            $table->integer('id_sede')->default(1);
            $table->string('mls_key')->nullable();
            $table->integer('pre_listing_agreed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
