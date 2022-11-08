<?php

namespace App\Console\Commands;

use App\Models\TipoUsuario;
use App\Models\Usuario;
use Illuminate\Console\Command;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:rol';

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
        $roles = TipoUsuario::all();
        Usuario::factory()->hasAttached($roles)->create();
        $this->info("Usuario creado exitosamente con todos los roles\nPor favor revisa la base de datos.\nNo olvides que la contraseña siempre será 'password' para pruebas");
        return 0;
    }
}
