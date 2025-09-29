<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SetSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-superadmin {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command set role Super Admin by email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        if(!$email) {
            $email = $this->ask('Please enter your email');   
        }

        $user = User::where('email', $email)->first();
        if($user){
            $user->syncRoles('Super Admin');
            $this->info("Now {$user->name} ({$user->email}) is Super Admin");
        } else {
            $this->info("Email {$email} not found");
        }
    }
}
