<?php

namespace App\Console\Commands;

use App\Models\Comentario;
use App\Models\Producto;
use Illuminate\Console\Command;

class CreateComentarioCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $producto = $this->option('producto');
        if (!is_numeric($cantidad) && $cantidad > 0) {
            $this->error('Debes ingresar un número valido para crear uno o más productos.');
            return 0;
        }
        if (!Producto::where('id', $producto)->first()) {
            $this->error('Debes ingresar un ID de producto valido.');
            return 0;
        }

        Comentario::factory($cantidad)->create([
            'proyproducto_idecto' => $producto
        ]);
        $this->info("{$cantidad} Comentario(s) creado(s) exitosamente \nPor favor revisa la base de datos");
        return 0;
    }
}
