<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:eliminar {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminamos usuario junto con sus roles asignado';

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
        $id = $this->ask('Por favor ingresa el ID del usuario a eliminar');
        if (is_numeric($id) && $id > 0) {
            $user = User::find($this->argument('userId'));
            $user->tipoUsuarios()->detach();
            $user->delete();
            $this->info('Usuario creado eliminado exitosamente');
            return 0;
        } else {
            $this->error('Debes ingresar un numero mayor a 0 para continuar');
        }
    }
}
