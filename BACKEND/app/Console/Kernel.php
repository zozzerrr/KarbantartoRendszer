<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use App\Models\Karbantartas;
use App\Models\Tool;
use Carbon\Carbon;
use App\Http\Controllers\KarbantartasController;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            //info('tudas');
            $karbantartasok = Karbantartas::all();
            foreach($karbantartasok as $k)
            {
                // NEM HIBA, ÉS MA VAN A HATÁRIDŐ
                if(!$k->hibaE && Carbon::now()->toDateString() == $k->idopont)
                {
                    info($k->eszkozid);
                    $tool = Tool::find($k->eszkozid);
                    info('Következő karbantartás: ');
                    $karbantartasIdopont = date_create($k->idopont)->modify("+".$tool->category->intervallum." day")->format("Y-m-d");
                    info($karbantartasIdopont);
                    KarbantartasController::ujKarbantartas($k->eszkozid, $karbantartasIdopont);
                }
            }
        })->dailyAt('21:02')->timezone('Europe/Budapest');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
