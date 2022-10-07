<?php

namespace App\Console\Commands;

use App\Models\Semillero;
use Illuminate\Console\Command;

class AsignarProgramaASemillero extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'semillero:programa
        { --semillero= : ID de semillero a asignar }
        { --programa= : ID de programa a asignar }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asignamos un programa a un semillero';

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
     * @return int
     */
    public function handle()
    {
        $idSemillero = $this->option('semillero');
        if (!is_numeric($idSemillero) && $idSemillero > 0) {
            $this->error('Debes ingresar el ID de de un semillero para asignarle un programa.\nVerifica los semilleros en la base de datos.');
            return 0;
        }

        $programa = $this->option('programa');
        if (!is_numeric($programa) && $programa > 0) {
            $this->error('Debes ingresar el ID de de un programa para asignarlo a un semillero.\nVerifica los programas en la base de datos.');
            return 0;
        }
        $semillero = Semillero::where('id', $idSemillero)->first();
        $semillero->programasSemilleros()->attach($programa);
        $this->info("Semillero ({$idSemillero}) y programa ({$programa}) emparejados correctamente");
        return 0;
    }
}
