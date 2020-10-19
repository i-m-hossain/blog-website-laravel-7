<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Md Imran Hossain',
            'email' => 'imran@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);
        Profile::create([
             'user_id' => $user->id,
             'avatar' => 'uploads/avatar/1.jpg',
             'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
             'facebook'=> 'www.facebook.com/r.rudronil',
             'instagram' => 'www.instagram.com',
             'youtube' =>'www.youtube.com',
             'twitter' => 'www.twitter.com',

        ]);

    }
}
