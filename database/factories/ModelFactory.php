<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->name,
        'surname' => $faker->name,
        'phone_number' => $faker->e164PhoneNumber,
        'birth_day' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role'=>rand(1,2),
        'street_id' => function(){
            return factory(App\Models\Street::class)->create()->id;
        }
    ];
});

    /* this seeds the leaders of streets*/
$factory->define(App\Models\Leader::class,function (Faker\Generator $faker){
    return [
    'role' => rand(1,2),
        'user_id' => rand(1,50),
        'position_id' => rand(1,3)
    ];
});

        /*this seeds the Kayas*/
 $factory->define(App\Models\Kaya::class, function (Faker\Generator $facker){
     return [
         'name' => $facker->name,
         'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
         },
         'street_id' => function(){
             return factory(App\Models\Street::class)->create()->id;
         },

     ];
 });

    /*seeding streets details*/
   $factory->define(App\Models\StreetDetails::class, function (Faker\Generator $facker){
        $streets = ['Mlalakuwa','Changanyikeni','Survey','Chuo kikuu'];
       return [
           'name' => $streets[rand(0,3)],
           'city' =>'Dar Es Salaam',
           'municipal' =>'Kinondoni',
           'Ward' => 'Mwenge'


       ];
   });

   /*seeding street data*/
$factory->define(App\Models\Street::class, function (Faker\Generator $facker){

    return [
        'street_details_id' => function(){
            return factory(App\Models\StreetDetails::class)->create()->id;
        },
        'admin_id' => rand(1,2)

    ];
});

            /* seeding admins positions */
   $factory->define(App\Models\Admin::class, function(Faker\Generator $facker){

       $positions = ['manager','team member'];

       return [
           'name' => $facker->name,
           'role' =>rand(1,2),
           'position' => $positions[rand(0,1)]

       ];
   });

/* seeding street positions */
$factory->define(App\Models\Position::class, function(Faker\Generator $facker){

    $positions = ['Mwenyekiti','Afisa Mtendaji','Mjumbe'];

    return [
        'position_name' => $positions[rand(0,2)],

    ];
});
        /* seeding Reports */
 $factory->define(App\Models\Report::class, function (Faker\Generator $faker){
     return [
         'title' =>$faker->text(20),
         'description' =>$faker->text(200),
         'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
         }
     ];
 });

        /* seeding report comments */
     $factory->define(App\Models\ReportComment::class, function (Faker\Generator $faker){
         return [
             'likes' => $faker->numberBetween($min = 1, $max = 100),
             'body' => $faker->text,
             'user_id' => function(){
             return factory(App\Models\User::class)->create()->id;
         },
             'report_id' => function(){
                 return factory(App\Models\Report::class)->create()->id;
             }
         ];
     });

     $factory->define(App\Models\SelectedOpinion::class, function (Faker\Generator $faker){
         return [
             'user_id' => function(){
                return factory(App\Models\User::class)->create()->id;
             },
             'opinion_id' => function(){
                 return factory(App\Models\Opinion::class)->create()->id;
             }
         ];
     });


/* seeding Announcements */
$factory->define(App\Models\Announcement::class, function (Faker\Generator $faker){
    return [
        'title' =>$faker->text(20),
        'description' =>$faker->text(200),
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});

    /*seeding categories*/
 $factory->define(App\Models\UjumbeCategory::class, function (){

     $categories = ['Wazee','Vijana','Wanawake','Wanaume'];
     return [
         'category_name' => $categories[rand(0,3)],
         'user_id' => function(){
                return factory(App\Models\User::class)->create()->id;
         },
         'announcement_id' => function(){
             return factory(App\Models\Announcement::class)->create()->id;
         }
     ];
 });


/* seeding Opinions */
$factory->define(App\Models\Opinion::class, function (Faker\Generator $faker){
    return [
        'title' =>$faker->text(20),
        'description' =>$faker->text(200),
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});


      /*  seeding petition categories*/
      $factory->define(App\Models\PetitionCategory::class, function (Faker\Generator $faker){

          $categories = ['Afya','Miundo mbinu','Mengineyo'];
            return [
                'name' => $categories[rand(0,2)]
            ];
      });

/* seeding Opinions */
$factory->define(App\Models\Petition::class, function (Faker\Generator $faker){
    return [
        'title' =>$faker->text(20),
        'description' =>$faker->text(200),
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        },
        'petition_category_id' => function(){
            return factory(App\Models\PetitionCategory::class)->create()->id;
        }
    ];
});

/* seeding petition comments */
$factory->define(App\Models\PetitionComment::class, function (Faker\Generator $faker){
    return [
        'likes' => $faker->numberBetween($min = 1, $max = 100),
        'body' => $faker->text,
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        },
        'petition_id' => function(){
            return factory(App\Models\Petition::class)->create()->id;
        }
    ];
});


  /*  accepted petitions*/
$factory->define(App\Models\AcceptedPetition::class, function (Faker\Generator $faker){
    return [
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        },
        'petition_id' => function(){
            return factory(App\Models\Petition::class)->create()->id;
        }
    ];
});
