<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'super:admin {--username=} {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user Superadmin.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $result     = User::select('id')->whereLevel(1)->first();
        $username   = !$this->option('username') ? 'ibnudirsan' : $this->option('username');
        $email      = !$this->option('email') ? 'admin@rumahdev.net' : $this->option('email');
        $password   = !$this->option('password') ? 'Rumahdev@123' : $this->option('password');
        if($result) {
            $this->components->error('Superadmin is already in the Database.');
        } elseif (!$result){
            $user = User::create([
                'name'     => $username,
                'email'    => $email,
                'level'    => 1,
                'password' => bcrypt($password)
            ]);
                $user->profile()->create([
                    'user_id'       => $user->id,
                    'fullName'      => 'Fulan',
                    'imageName'     => 'FulanImage',
                    'pathImage'     => 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y',
                    'numberPhone'   => '0',
                    'TeleID'        => '0',
                ]);
                    $user->secret()->create([
                        'user_id'   => $user->id
                    ]);
                        $this->components->info('Aready Created User '.$username);
        }
    }
}
