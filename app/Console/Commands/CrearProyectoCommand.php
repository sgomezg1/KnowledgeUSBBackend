<?php

namespace App\Console\Commands;

use App\Models\Antecedente;
use App\Models\AreaConocimiento;
use App\Models\Clase;
use App\Models\Convocatorium;
use App\Models\Evento;
use App\Models\Presupuesto;
use App\Models\Producto;
use App\Models\Proyecto;
use App\Models\TipoProyecto;
use App\Models\Usuario;
use Illuminate\Console\Command;

class CrearProyectoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:proyecto

        { --semillero= : ID de semillero a asignar, no obligatorio }
        
        { --tipoProyecto=1 : Asignar o no un tipo de proyecto. }

        { --areasConocimiento= : Cantidad de areas de conocimiento a asignar }
        
        { --productos= : Cantidad productos a asignar }

        { --antecedentes= : ID de proyecto a asignar como antecedente }

        { --presupuestos= : Cantidad de presupuestos a asignar }

        { --participaciones= : Cantidad de participaciones del proyecto en un evento }

        { --clases= : Cantidad de clases a asignar }

        { --participantes= : Cantidad de participantes a asignar }
        
        { --convocatorias= : Cantidad de convocatorias a asignar }
        ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear proyectos, es de vital importancia enviar los parámetros en la descripción para generar todos los datos que se necesiten. TODOS SERÁN ALEATORIOS';

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

        if ($this->option('semillero')) {
            array_push($arrPropiedades, [
                'semillero' => $this->option('semillero')
            ]);
        }
        
        if ($this->option('tipoProyecto')) {
            array_push($arrPropiedades, [
                'tipo_proyecto' => TipoProyecto::inRandomOrder()->first()->nombre
            ]);
        }

        $pro = Proyecto::factory(1)->create();
        $proyectoCreado = $pro[0];
        
        if ($this->option('areasConocimiento')) {
            $areas = AreaConocimiento::inRandomOrder()->limit($this->option('areasConocimiento'))->get();
            foreach ($areas as $a) {
                $proyectoCreado->areaConocimientos()->attach($a->id);
            }
        }

        if ($this->option('productos')) {
            Producto::factory($this->option('productos'))->create([
                'proyecto' => $proyectoCreado->id
            ]);
        }

        if ($this->option('antecedentes')) {
            Antecedente::factory()->create([
                'proyecto' => $proyectoCreado->id,
                'ancedente' => $this->option('antecedentes')
            ]);
        }

        if ($this->option('presupuestos')) {
            Presupuesto::factory($this->option('presupuestos'))->create([
                'proyecto' => $proyectoCreado->id
            ]);
        }

        if ($this->option('participaciones')) {
            $eventos = Evento::inRandomOrder()->limit($this->option('participaciones'))->get();
            foreach ($eventos as $e) {
                $proyectoCreado->participaciones()->attach($e->id, [
                    'fecha_part' => date('Y-m-d'),
                    'reconocimientos' => 'Prueba'
                ]);
            }
        }

        if ($this->option('clases')) {
            $clases = Clase::inRandomOrder()->limit($this->option('clases'))->get();
            foreach ($clases as $c) {
                $proyectoCreado->clases()->attach($c->numero);
            }
        }

        if ($this->option('participantes')) {
            $participantes = Usuario::inRandomOrder()->limit($this->option('participantes'))->get();
            foreach ($participantes as $p) {
                $proyectoCreado->participantes()->attach($p->cedula, [
                    'fecha_inicio' => date('Y-m-d'),
                    'fecha_fin' => date('Y-m-d'),
                    'rol' => '',
                ]);
            }
        }
        
        if ($this->option('convocatorias')) {
            $convocatorias = Convocatorium::inRandomOrder()->limit($this->option('convocatorias'))->get();
            foreach ($convocatorias as $c) {
                $proyectoCreado->convocatorias()->attach($c->id, [
                    'id_proyecto' => $proyectoCreado->id
                ]);
            }
        }
        
        $this->info("Proyecto creado correctamente");
        return 0;
    }
}
