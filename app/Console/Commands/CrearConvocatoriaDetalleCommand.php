<?php

namespace App\Console\Commands;

use App\Models\Convocatorium;
use App\Models\DetalleConvocatorium;
use Illuminate\Console\Command;

class CrearConvocatoriaDetalleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:convocatoria
        { --detalle : Opción para validar si necesito detalle en la convocatoria }
        { --cantidadConvocatorias= : Cantidad convocatorias a crear junto a su detallle }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear convocatoria. Agregar opción detalle para agregar detalle a esa convocatoria.';

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
        $convocatorias = Convocatorium::factory($this->option('cantidadConvocatorias'))->create();
        if ($this->option('detalle')) {
            $convocatorias->each(function($item) {
                DetalleConvocatorium::factory()->create([
                    'convocatoria_id' => $item->id
                ]);
            });
        }
        $this->info("Convocatoria(s) creada(s) correctamente");
        return 0;
    }
}
