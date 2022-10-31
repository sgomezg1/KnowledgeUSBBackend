<?php

namespace App\Console\Commands;

use App\Models\GrupoInvestigacion;
use App\Models\LineaInvestigacion;
use App\Models\LineasDeInvestigacion;
use App\Models\Semillero;
use Illuminate\Console\Command;

class CreateSemilleroCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:semillero
        { --cantidad=1 : Cantidad de semilleros a crear }
        { --grupoInvestigacion= : Grupo de investigación a asignar }
        { --lineaInvestigacion= : Linea de investigación a asignar }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para agregar semilleros.\n
        ES NECESARIO AGREGAR PREVIAMENTE GRUPOS DE INVESTIGACIÓN Y LINEAS DE INVESTIGACIÓN PARA QUE FUNCIONE.
    ';

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
        $cantidad = $this->ask('Ingresa la cantidad de semilleros que quieres crear.');
        
        if (!is_numeric($cantidad) && $cantidad > 0) {
            $this->error('Debes ingresar un número valido para crear uno o más semilleros.');
            return 0;
        }
        $grupoInvestigacion = $this->ask('Ingresa el ID de grupo de investigación a asignar.');

        if (!is_numeric($grupoInvestigacion) && $grupoInvestigacion > 0) {
            $this->error('Debes ingresar un número valido para asignar el grupo de investigación.');
            return 0;
        }
        $lineaInvestigacion = $this->ask('Ingresa el nombre de la linea de investigación a asignar.');

        if (!$lineaInvestigacion) {
            $this->error('Debes ingresar un nombre valido para asignar la linea de investigación.');
            return 0;
        }

        if (LineaInvestigacion::where('nombre', $lineaInvestigacion)->count() == 0) {
            $this->error('No existe la linea de investigacion a asignar.');
            return 0;
        }

        if (GrupoInvestigacion::where('id', $grupoInvestigacion)->count() == 0) {
            $this->error('No existe el grupo de investigación a asignar.');
            return 0;
        }

        Semillero::factory($cantidad)->create([
            'grupo_investigacion' => $grupoInvestigacion,
            'linea_investigacion' => $lineaInvestigacion
        ]);
        $this->info("{$cantidad} semillero(s) creado(s) exitosamente \nPor favor revisa la base de datos");
        return 0;
    }
}
