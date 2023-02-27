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
        $rol = $this->ask('Ingrese el tipo de rol a asignar a este usuario
            1. Administrador
            2. Biblioteca
            3. Coordinador Investigacion Facultad
            4. Director de programa
            5. Docente
            6. Docente investigador
            7. Docente lider semillero
            8. Lider de grupo de investigacion
            9. Profesional de investigacion
            10. Visitante
        ');
        $roles = TipoUsuario::where('nombre', $rol)->first();
        Usuario::factory()->hasAttached($roles)->create();
        $this->info("Usuario creado exitosamente.\nPor favor revisa la base de datos.\nNo olvides que la contraseña siempre será 'password' para pruebas");
        return 0;
    }
}
