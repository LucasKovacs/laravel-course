<?php

use App\Post;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();

        // SEEDS
        $this->call(RolesTableSeeder::class);

        // FACTORIES
        /*
        factory(App\User::class, 10)->create()->each(function ($user) {
        $user->posts()->save(factory(App\Post:class)->make());
        });*/

        //$roles = factory(App\Role::class, 3)->create();

        $users = factory(User::class, 10)->create()->each(function ($user) {
            $user->posts()->save(factory(Post::class)->make());
            $user->roles()->attach(Role::findOrFail(rand(1, 3)));
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
