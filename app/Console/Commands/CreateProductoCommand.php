<?php

namespace App\Console\Commands;

use App\Models\Producto;
use App\Models\Proyecto;
use Illuminate\Console\Command;

class CreateProductoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:producto
        { --cantidad=: Cantidad de productos a crear }
        { --proyecto=: ID de proyecto a asociar con el producto }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'COMANDO PARA CREAR PRODUCTO, ES NECESARIO PONER UN ID DE PROYECTO PARA ASOCIARLO.';

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
        $proyecto = $this->option('proyecto');
        if (!is_numeric($cantidad) && $cantidad > 0) {
            $this->error('Debes ingresar un número valido para crear uno o más productos.');
            return 0;
        }
        if (!Proyecto::where('id', $proyecto)->first()) {
            $this->error('Debes ingresar un ID de proyecto que exista.');
            return 0;
        }

        Producto::factory($cantidad)->create([
            'proyecto' => $proyecto
        ]);
        $this->info("{$cantidad} producto(s) creado(s) exitosamente \nPor favor revisa la base de datos");
        return 0;
    }
}
