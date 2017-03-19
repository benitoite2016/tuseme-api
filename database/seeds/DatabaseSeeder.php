<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       factory(App\Models\Admin::class,6)->create();
//       factory(App\Models\StreetDetails::class,4)->create();
        factory(App\Models\Report::class,10)->create();
        factory(App\Models\Street::class,4)->create();
        factory(App\Models\User::class, 50)->create();
        factory(App\Models\Position::class,5)->create();
        factory(App\Models\Leader::class,5)->create();
        factory(App\Models\Kaya::class,20)->create();
        factory(App\Models\ReportComment::class, 20)->create();
        factory(App\Models\UjumbeCategory::class, 20)->create();
        factory(App\Models\Announcement::class, 20)->create();
        factory(App\Models\Opinion::class, 20)->create();
        factory(App\Models\SelectedOpinion::class,10)->create();
        factory(App\Models\PetitionCategory::class, 10)->create();
        factory(App\Models\Petition::class, 10)->create();
        factory(App\Models\PetitionComment::class, 10)->create();
        factory(App\Models\AcceptedPetition::class, 10)->create();
    }
}


class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $fake = Faker::create();

        $positions = array("Mwenyekiti", "Afisa Mtendaji", "Mjumbe");
        for ($i=0; $i < sizeOf($positions); $i++) {
            DB::table('positions')->insert([
                'position_name' => $positions[$i],
                'created_at' => $fake->date('Y-m-d H:i:s'),
                'updated_at' => $fake->date('Y-m-d H:i:s')
            ]);
        }
    }
}
