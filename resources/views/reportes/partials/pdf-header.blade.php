<header class = "header-reporte-pdf">
    <table border="0" width = "100%">
        <tr>
            <td width = "75%">
                <img src = "{{ asset('images/logo.png') }}" class = "logo-usb">
            </td>
            <td width = "25%">
                <label style="font-size: 12px;"><b>INFORMACIÓN NO OFICIAL</b></label><br>
                <label style="font-size: 12px;"><b>{{ $data['nombreReporte'] }}</b></label><br>
                <label style="font-size: 12px;"><b>{{ $data['nombreGeneraReporte'] }}</b></label><br>
                <label style="font-size: 12px;"><b>{{ $data['rolGeneraReporte'] }}</b></label><br>
                <label style="font-size: 12px;"><b>{{ $data['codigoGeneraReporte'] }}</b></label><br>
                <label style="font-size: 12px;"><b>{{ $data['fechaActual'] }}</b></label>
            </td>
        </tr>
    </table>
</header>
