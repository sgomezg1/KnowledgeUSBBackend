<?php

namespace App\Console\Commands;

use App\Models\Clase;
use App\Models\Proyecto;
use Illuminate\Console\Command;

class AsignarClaseATodosLosProyectos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clases:proyectos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asignamos una clase a cada una de los proyectos de nuestro sistema.';

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
        $proyecto = Proyecto::all();
        foreach($proyecto as $p) {
            $idClase = Clase::inRandomOrder()->first()->numero;
            $p->clases()->attach($idClase);
        }
        $this->info("Clases asignadas a todos los proyectos con éxito.");
        return 0;
    }
}
