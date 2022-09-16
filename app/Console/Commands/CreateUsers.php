<?php

namespace App\Console\Commands;

use App\Models\TipoUsuarios;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:rol {--cantidadRoles=1 : Cantidad de roles a asignar}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un usuario de prueba con X cantidad de roles asignados';

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
        $cantidad = $this->option('cantidadRoles');
        $roles = TipoUsuarios::all()->random($cantidad);
        User::factory()->hasAttached($roles)->create();
        echo "Usuario creado exitosamente con {$cantidad} roles\nPor favor revisa la base de datos.\nNo olvides que la contraseña siempre será 'password' para pruebas";
        return 0;
    }
}
