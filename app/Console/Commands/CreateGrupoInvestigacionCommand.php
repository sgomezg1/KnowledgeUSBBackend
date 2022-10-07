<?php

namespace App\Console\Commands;

use App\Models\GrupoInvestigacion;
use Illuminate\Console\Command;

class CreateGrupoInvestigacionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:grupo-investigacion
        { --cantidad=1 : Cantidad de grupos a crear }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear grupos de investigación asignados a un leder de grupo por defecto';

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
        $cantidad = $this->option('cantidad');
        if (!is_numeric($cantidad) && $cantidad > 0) {
            $this->error('Debes ingresar un número valido para crear uno o más grupos de investigación.');
            return 0;
        }
        GrupoInvestigacion::factory($cantidad)->create();
        $this->info("{$cantidad} Grupo(s) de investigación creado(s) exitosamente \nPor favor revisa la base de datos");
    }
}
