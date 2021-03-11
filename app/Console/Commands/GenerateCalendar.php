<?php

namespace App\Console\Commands;

use App\Models\Calendar;
use Illuminate\Console\Command;

class GenerateCalendar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generator:calendar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando generara semanalmente eventos especificos para la Agenda';

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
        $hoy = date('Y-m-d',time());

        $evento['nombre']='Seguimiento Presupuestos';
        $evento['inicio']=date('Y-m-d H:i:s', strtotime ('+9 hours', strtotime($hoy)));
        $evento['fin']=date('Y-m-d H:i:s', strtotime ('+10 hours', strtotime($hoy)));
        $evento['allDay']=0;

        $calendar=Calendar::create($evento);

        $calendar->usuario_id=3;
        $calendar->save();
    }
}
