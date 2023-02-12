<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Lead;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{


    private function create_user_with_role($type, $name, $email) {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        if($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        } elseif($type == 'Leads') {
            $role->givePermissionTo('lead-management');
        }

        // $user->assignRole($role);

        return $user;
    }










    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $defaultPermissions =['lead-management', 'create-admin', 'user-management'];
        foreach($defaultPermissions as $permission){
            Permission::create(['name'=>$permission]);
        }


        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $logistic = $this->create_user_with_role('logistic', 'logistic', 'logistic@lms.test');
        $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');





        //create lead

        Lead::factory()->count(100)->create();


        $product = Product::create([
           'name' => 'Offer of 1 liter',
           'namEe' => ' 1 liter',
            'slug' => 'Offer of 1 liter',
            'description' => '3 cans totaling 3 liters',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'user_id' => $logistic->id,
            'price' => 156

        ]);





    }


}
