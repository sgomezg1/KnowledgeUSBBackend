<?php

namespace App\Console\Commands;

use App\Models\Compra;
use App\Models\Presupuesto;
use Illuminate\Console\Command;

class CreateCompraCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:compra
        { --cantidad=: Cantidad de productos a crear }
        { --presupuesto=: ID de presupuesto a asociar con la compra }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear compra nueva.\nNo olvides buscar un presupuesto en la base de datos.';

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
        $presupuesto = $this->option('presupuesto');
        if (!is_numeric($cantidad) && $cantidad > 0) {
            $this->error('Debes ingresar un número valido para crear uno o más productos.');
            return 0;
        }
        if (!Presupuesto::where('id', $presupuesto)->first()) {
            $this->error('Debes ingresar un ID de producto valido.');
            return 0;
        }

        Compra::factory($cantidad)->create([
            'presupuesto' => $presupuesto
        ]);
        $this->info("{$cantidad} Compra(s) creado(s) exitosamente \nPor favor revisa la base de datos");
        return 0;
    }
}
