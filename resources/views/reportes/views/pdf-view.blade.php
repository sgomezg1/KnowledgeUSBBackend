@extends('reportes.layout.pdf-layout', $dataHeader)
@section('content')
    <div class="contenedor-proyectos-reporte">
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Facultad</th>
                <th>Programa</th>
                <th>Estado</th>
                {{-- @if ($data->estado === 'Finalizado') <th>Nota</th> @endif
                @if (count($data->presupuestos) > 0) <th>Presupuestos</th> @endif --}}
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>
                            <span class="texto-resultado">{{ $d->titulo }}</span>
                        </td>
                        <td>
                            <span class="texto-resultado">{{ $d->descripcion }}</span>
                        </td>
                        <td>
                            <span class="texto-resultado">{{ $d->estado }}</span>
                        </td>
                        <td>
                            <span class="texto-resultado">{{ $d->nombre_facultad }}</span>
                        </td>
                        <td>
                            <span class="texto-resultado">{{ $d->nombre_programa }}</span>
                        </td>
                        <td>
                            <span class="texto-resultado">{{ $d->estado }}</span>
                        </td>
                        {{--  @if ($data->estado === 'Finalizado')
                    <td>

                    </td>
                    @endif
                    @if (count($data->presupuestos) > 0)
                    <td>

                    </td>
                    @endif --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
