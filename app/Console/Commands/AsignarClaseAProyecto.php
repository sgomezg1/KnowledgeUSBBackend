<?php

namespace App\Console\Commands;

use App\Models\Proyecto;
use Illuminate\Console\Command;

class AsignarClaseAProyecto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proyecto:clase
        { --proyecto= : ID de proyecto a asignar una clase }
        { --clase= : ID de clase a asignar a un proyecto }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asignamos una clase a un proyecto creado.';

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
        $proyecto = null;
        if (!is_numeric($this->option('proyecto')) && $this->option('proyecto') > 0) {
            $proyecto = Proyecto::find($this->option('proyecto'));
        }
        if (!is_numeric($this->option('clase')) && $this->option('clase') > 0) {
            $proyecto->clases()->attach($this->option('clase'));
        }
        $this->info("Clase ({$this->option('clase')}) asignada a proyecto  ({$this->option('proyecto')}) correctamente");
        return 0;
    }
}
