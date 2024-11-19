<?php

namespace App\Console\Commands;

use File;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try {
            $google2fa      = app('pragmarx.google2fa');
            $NewSecretKey   = $google2fa->generateSecretKey();
            $result     = User::select('id')->whereLevel(1)->first();
            $username   = !$this->option('username') ? 'ibnudirsan' : $this->option('username');
            $email      = !$this->option('email') ? 'admin@Raungdev.net' : $this->option('email');
            $password   = !$this->option('password') ? 'Raungdev@123' : $this->option('password');
            if($result) {
                $this->components->error('Superadmin is already in the Database.');
                $this->line('<bg=black;fg=white>..:: Created by Raungdev ::..</>');
            } elseif (!$result){
                $user = User::create([
                    'name'              => $username,
                    'email'             => $email,
                    'level'             => 1,
                    'email_verified_at' => Carbon::now()->format('Y-m-d h:i:s'),
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
                            'user_id'   => $user->id,
                            'secret2Fa' => $NewSecretKey
                        ]);
                            $user->assignRole("SuperAdmin");
                            if(!File::exists(public_path('assets/images/profile/'))) {
                                File::makeDirectory(public_path('assets/images/profile/'));
                            }
                                $this->components->info('Aready Created User '.$username);
                                $this->line('<bg=black;fg=white>..:: Created by Raungdev ::..</>');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $this->components->error('An error occurred in Superadmin account setup.');
            $this->line('<bg=black;fg=white>..:: Created by Raungdev ::..</>');
        } finally {
            DB::commit();
        }
    }
}
