<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->tinyInteger('type')->comment('1=ship,2=aircraft,3=amateur');
            #For Ship
            $table->text('device_name')->nullable()->comment('for both(ship)');

            $table->text('registered_port')->nullable()->comment('for 1(ship)');
            $table->text('gross_tonnage')->nullable()->comment('for 1(ship)');
            $table->text('route')->nullable()->comment('for 1(ship)');
            $table->text('no_normal_crew')->nullable()->comment('for 1(ship)');
            $table->text('no_passengers_certificate')->nullable()->comment('for 1(ship)');
            $table->text('no_operators_watchers')->nullable()->comment('for 1(ship)');
            $table->text('no_service')->nullable()->comment('for 1(ship)');
            $table->text('ship_station_class')->nullable()->comment('for 1(ship)');
            $table->text('service_hours')->nullable()->comment('for 1(ship)');
            $table->text('wireless_telegraph_used')->nullable()->comment('for 1(ship)');
            $table->text('transmitter_description')->nullable()->comment('for 1(ship)');
            $table->text('receiver_description')->nullable()->comment('for 1(ship)');
            $table->text('max_power')->nullable()->comment('for 1(ship)');
            $table->text('total_power_taken')->nullable()->comment('for 1(ship)');
            #For Aircraft
            $table->text('call_sign_nationality')->nullable()->comment('for 2(aircraft)');
            $table->text('make_type')->nullable()->comment('for 2(aircraft)');
            $table->text('name_address_owner')->nullable()->comment('for 2(aircraft)');
            $table->text('name_address_operating_company')->nullable()->comment('for 2(aircraft)');
            $table->text('nature_services')->nullable()->comment('for 2(aircraft)');
            $table->text('customary_home_route')->nullable()->comment('for 2(aircraft)');
            $table->text('no_crew')->nullable()->comment('for 2(aircraft)');
            $table->text('no_passengers_carried')->nullable()->comment('for 2(aircraft)');
            $table->text('make_type_wireless_transmitter')->nullable()->comment('for 2(aircraft)');
            $table->text('transmitting_frequencies')->nullable()->comment('for 2(aircraft)');
            $table->text('max_power_input')->nullable()->comment('for 2(aircraft)');
            $table->text('type_receivers')->nullable()->comment('for 2(aircraft)');
            $table->text('type_navigational_requirement')->nullable()->comment('for 2(aircraft)');
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
        Schema::dropIfExists('device_equipment');
    }
}
