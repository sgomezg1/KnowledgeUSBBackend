<?php

namespace App\Console\Commands;

use App\Models\Materium;
use Illuminate\Console\Command;

class CrearMateriaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:materias
        { --cantidad=1 : Cantidad de roles a asignar }
        { --programa=  : ID del programa }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear una o más materias. En este caso, enviamos la cantidad de materias a crear y el programa al cual pertenece';

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
        $programa = $this->option('programa');
        if (!$programa) {
            $this->error('Debes ingresar el ID de un programa para crear las materias.\nVerifica los programas en la base de datos.');
            return 0;
        }
        Materium::factory($cantidad)->create([
            'programa' => $programa
        ]);
        $this->info("{$cantidad} Materia(s) creada(s) exitosamente \nPor favor revisa la base de datos");
        return 0;
    }
}
