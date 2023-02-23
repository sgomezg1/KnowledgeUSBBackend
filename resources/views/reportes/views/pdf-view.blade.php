@extends('reportes.layout.pdf-layout', $dataHeader)
@section('content')
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Clases</th>
            <th>Facultades</th>
            <th>Programas</th>
            <th>Nota</th>
            @if ($datosMostrar['presupuestos'] == true)
                <th>Presupuesto Total</th>
            @endif
            @if ($datosMostrar['convocatorias'] == true)
                <th>Convocatorias</th>
            @endif
            @if ($datosMostrar['semillero'] == true)
                <th>Semillero</th>
            @endif
        </thead>
        <tbody>
            @foreach ($data as $key => $d)
                <tr>
                    <td width="16%">
                        <span style="color: #6f6f6f; display: flex;">{{ $d->titulo }}</span>
                    </td>
                    <td width="16%">
                        <span style="color: #6f6f6f; display: flex;">{{ $d->estado }}</span>
                    </td>
                    <td width="16%">
                        <span style="color: #6f6f6f; display: flex;">
                            @if ($d->clases()->count() > 0)
                                @foreach ($d->clases as $cl)
                                    * {{ $cl->nombre }}<br>
                                @endforeach
                            @endif
                        </span>
                    </td>
                    <td width="16%">
                        <span style="color: #6f6f6f; display: flex;">
                            @if ($d->clases()->count() > 0)
                                @foreach ($d->clases as $cl)
                                    * {{ $cl->materium->programas->facultad->nombre }}<br>
                                @endforeach
                            @endif
                        </span>
                    </td>
                    <td width="16%">
                        <span style="color: #6f6f6f; display: flex;">
                            @if ($d->clases()->count() > 0)
                                @foreach ($d->clases as $cl)
                                    * {{ $cl->materium->programas->nombre }}<br>
                                @endforeach
                            @endif
                        </span>
                    </td>
                    <td width="16%">
                        @if ($d->estado === 'Finalizado')
                            <span style="color: #6f6f6f; display: flex;">NOTA</span>
                        @else
                            <span style="color: #6f6f6f; display: flex;">NO APLICA</span>
                        @endif
                    </td>
                    @if ($datosMostrar['presupuestos'] == true)
                        <td width="16%">
                            @if ($d->presupuestos()->exists())
                                <span style="color: #6f6f6f; display: flex;">$
                                    {{ str_replace(',', '.', number_format($d->presupuestos()->sum('monto'))) }}</span>
                            @else
                                <span style="color: #6f6f6f; display: flex;">NO DISPONIBLE</span>
                            @endif
                        </td>
                    @endif
                    @if ($datosMostrar['convocatorias'] == true)
                        <td width="16%">
                            @if ($d->convocatorias()->exists())
                                @foreach ($d->convocatorias as $con)
                                    <span style="color: #6f6f6f; display: flex;">{{ $con->nombre_convocatoria }}</span>
                                @endforeach
                            @else
                                <span style="color: #6f6f6f; display: flex;">NO DISPONIBLE</span>
                            @endif
                        </td>
                    @endif
                    @if ($datosMostrar['semillero'] == true)
                        <td width="16%">
                            <span style="color: #6f6f6f; display: flex;">{{ $d->semillero()->first()->nombre }}</span>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
