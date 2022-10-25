<?php

namespace App\Console\Commands;

use App\Models\Clase;
use Illuminate\Console\Command;

class ClaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:clases
        { --cantidad=1 : Cantidad de roles a asignar }
        { --materia=  : Nombre de la materia a asignar } 
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creamos clases asociadas a una materia y profesor';

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
        $materia = $this->option('materia');
        if (!$materia) {
            $this->error('Debes ingresar el ID de una facultad para crear las clases.\nVerifica las facultades en la base de datos.');
            return 0;
        }
        Clase::factory($cantidad)->create([
            'materia' => $materia
        ]);
        $this->info("{$cantidad} Clase(s) creada(s) exitosamente \nPor favor revisa la base de datos");
        return 0;
    }
}
