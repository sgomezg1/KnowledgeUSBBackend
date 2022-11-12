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
                @if (isset($finalizado) && $finalizado == true) <th>Nota</th> @endif
                @if (isset($presupuestos) && $presupuestos == true)
                    <th>Presupuesto Total</th>
                @endif
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td width="16%">
                            <span class="texto-resultado">{{ $d->titulo }}</span>
                        </td>
                        <td width="16%">
                            <span class="texto-resultado">{{ $d->descripcion }}</span>
                        </td>
                        <td width="16%">
                            <span class="texto-resultado">{{ $d->estado }}</span>
                        </td>
                        <td width="16%">
                            <span class="texto-resultado">{{ $d->nombre_facultad }}</span>
                        </td>
                        <td width="16%">
                            <span class="texto-resultado">{{ $d->nombre_programa }}</span>
                        </td>
                        @if ($d->estado === 'Finalizado')
                            <td width="16%">
                                NOTA
                            </td>
                        @endif
                        @if (isset($presupuestos) && $presupuestos == true)
                            <td width="16%">
                                @if ($d->presupuestos()->exists())
                                    <span class="texto-resultado">$
                                        {{ str_replace(',', '.', number_format($d->presupuestos()->sum('monto'))) }}</span>
                                @else
                                    <span class = "texto-resultado">NO DISPONIBLE</span>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
