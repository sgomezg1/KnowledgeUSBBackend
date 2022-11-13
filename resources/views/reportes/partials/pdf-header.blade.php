<table border="0" width = "100%">
    <tr>
        <td width = "50%">
            <img src = "{{ public_path('images/logo.png') }}" class = "logo-usb">
        </td>
        <td width = "10%"></td>
        <td width = "40%">
            <label style="font-size: 12px;"><b>INFORMACIÓN NO OFICIAL</b></label><br>
            <label style="font-size: 12px;"><b>{{ $dataHeader['nombreReporte'] }}</b></label><br>
            <label style="font-size: 12px;"><b>GENERADO POR: {{ $dataHeader['nombreGeneraReporte'] }}</b></label><br>
            <label style="font-size: 12px;"><b>ROL: {{ $dataHeader['rolGeneraReporte'] }}</b></label><br>
            <label style="font-size: 12px;"><b>CÓDIGO: {{ $dataHeader['codigoGeneraReporte'] }}</b></label><br>
            <label style="font-size: 12px;"><b>FECHA: {{ $dataHeader['fechaActual'] }}</b></label>
        </td>
    </tr>
</table>
