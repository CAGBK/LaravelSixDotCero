<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ChallengeUser;
use App\Models\Challenge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FinishChallenge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'challenge:finish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Finaliza todos los desafíos que ya culminaron su tiempo';

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
        $challenges = Challenge::all();
        $date = Carbon::now()->format('Y-m-d');
        foreach ($challenges as $challenge) {
            if($date === $challenge->end_date)
            {
                $stateChallenge = Challenge::find($challenge->id);
                $stateChallenge->state_id = 2;
                $stateChallenge->save();
                $userChallenges = json_decode($stateChallenge->users);
                foreach ($userChallenges as $userChallenge) 
                {
                    $stateChallengeDetail = ChallengeUser::where('challenge_id','=',$stateChallenge->id)->where('user_id','=', $userChallenge)->first();
                    $stateChallengeDetail->state_id = 2;
                    $stateChallengeDetail->save(); 
                }
            }
        }
        Log::info('Cambio de estado ok');
    }
}
