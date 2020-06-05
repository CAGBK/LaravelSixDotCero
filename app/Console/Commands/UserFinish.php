<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ChallengeUser;
use App\Models\Challenge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UserFinish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:finish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All users are finished';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $challenges = Challenge::where('state_id','!=',2)->get();
        foreach ($challenges as $challenge) 
        {
            $userChallenges = json_decode($challenge->users);
            foreach ($userChallenges as $user) {
                $stateChallengeDetail = ChallengeUser::where('challenge_id',$challenge->id)->where('user_id', $user)->first();
                $array[] = $stateChallengeDetail->state_id;
            }
            $stateFinish[] = 2;
            $challengeEnded = array_diff(array_unique($array),$stateFinish);         
            if(empty($challengeEnded)) 
            {
                $challengeFinish = Challenge::find($challenge->id);
                $challengeFinish->state_id = 2;
                $challengeFinish->save();
            }
        }
    }
}
