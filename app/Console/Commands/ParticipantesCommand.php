<?php

namespace App\Console\Commands;

use App\Models\Participantes;
use Illuminate\Console\Command;

class ParticipantesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:participantes {--cantidad=1 : Cantidad de participantes a crear}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear participantes de proyectos. ES NECESARIO CREAR PREVIAMENTE USUARIOS Y PROYECTOS PARA ESTO.';

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
        Participantes::factory($cantidad)->create();
        echo "{$cantidad} Participante(s) creado(s) exitosamente \nPor favor revisa la base de datos";
        return 0;
    }
}
