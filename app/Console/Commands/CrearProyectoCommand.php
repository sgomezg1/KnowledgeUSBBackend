<?php

namespace App\Console\Commands;

use App\Models\Proyecto;
use Illuminate\Console\Command;

class CrearProyectoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:proyecto
        { --cantidad=1: Cantidad de proyectos a crear }
        
        { areaConocimiento? }
        { --cantidadAreas= : Cantidad de proyectos a crear }

        { producto? }
        { --cantidadProductos: Cantidad productos a asignar }

        { antecedentes? }
        { --cantidadAntecedentes=: Cantidad de antecedentes a asignar }

        { presupuesto? }
        { --cantidadPresupuestos=: Cantidad de presupuestos a asignar }

        { participaciones? }
        { --cantidadPresupuestos=: Cantidad de presupuestos a asignar }

        { clase? }
        { --cantidadClases=: Cantidad de clases a asignar }

        { participantes? }
        { --cantidadParticipantes=: Cantidad de participantes a asignar }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear proyectos, es de vital importancia enviar los parámetros en la descripción para generar todos los datos que se necesiten';

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
        $arrPropiedades = array();
        $cantidad = $this->option('cantidad');
        if (!is_numeric($cantidad) && $cantidad > 0) {
            $this->error('Debes ingresar un número valido para crear uno o más proyectos.');
            return 0;
        }
        if ($this->argument('areaConocimiento')) {
            
        }

        // Proyecto::factory($cantidad)->make($arrPropiedades);
        $pro = Proyecto::factory($cantidad)->make();

        $pro->
        
        $this->info("{$cantidad} proyecto(s) creados correctamente");
        return 0;
    }
}
