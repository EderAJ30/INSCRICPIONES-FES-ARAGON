<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Comprobante de Reinscripción - {{ $comprobante->alumno->numero_cuenta }}</title>
  <style>
    @page {
      margin: 1.2cm;
    }

    body {
      font-family: 'Helvetica', 'Arial', sans-serif;
      font-size: 11px;
      color: #333333;
      line-height: 1.3;
    }

    .header-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 5px;
    }

    .header-logo {
      width: 15%;
      vertical-align: top;
    }

    .header-logo.right {
      text-align: right;
    }

    .header-text {
      width: 70%;
      text-align: center;
      vertical-align: top;
    }

    .header-text h1 {
      font-size: 14px;
      margin: 0 0 2px 0;
      color: #1A365D;
    }

    .header-text h2 {
      font-size: 11px;
      font-weight: bold;
      margin: 0 0 2px 0;
      color: #1A365D;
    }

    .header-text h3 {
      font-size: 10px;
      font-weight: bold;
      margin: 0 0 2px 0;
      color: #1A365D;
    }

    .header-text h4 {
      font-size: 9px;
      font-weight: normal;
      margin: 0;
      color: #555555;
    }

    .fecha-emision {
      text-align: right;
      font-size: 10px;
      font-weight: bold;
      color: #1A365D;
      margin-bottom: 10px;
    }

    .titulo-comprobante {
      text-align: center;
      font-size: 13px;
      font-weight: bold;
      color: #1A365D;
      margin-bottom: 12px;
      text-transform: uppercase;
    }

    .table-institucional {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 12px;
    }

    .table-institucional th {
      background-color: #2B6CB0;
      color: #ffffff;
      font-size: 9px;
      padding: 4px;
      border: 1px solid #2B6CB0;
    }

    .table-institucional td {
      border: 1px solid #CBD5E0;
      padding: 4px;
      text-align: center;
      font-size: 10px;
    }

    .table-institucional .left {
      text-align: left;
    }

    .table-materias {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }

    .table-materias th {
      background-color: #2B6CB0;
      color: #ffffff;
      font-size: 9px;
      padding: 5px;
      border: 1px solid #1A365D;
    }

    .table-materias td {
      border-left: 1px solid #CBD5E0;
      border-right: 1px solid #CBD5E0;
      border-bottom: 1px dotted #CBD5E0;
      padding: 4px;
      font-family: 'Courier', monospace;
      font-size: 10px;
    }

    .table-materias tr.filler td {
      color: #A0AEC0;
    }

    .footer-content {
      width: 100%;
      margin-top: 10px;
    }

    .notas-legal {
      width: 65%;
      float: left;
      font-size: 8.5px;
      color: #2D3748;
      text-align: justify;
    }

    .notas-legal ul {
      margin: 3px 0 0 0;
      padding-left: 12px;
    }

    .notas-legal li {
      margin-bottom: 3px;
      list-style-type: square;
    }

    .qr-zone {
      width: 30%;
      float: right;
      text-align: right;
    }

    .qr-box {
      display: inline-block;
      width: 110px;
      height: 110px;
      border: 1px solid #1A365D;
      padding: 3px;
    }

    .qr-box img {
      width: 100%;
      height: 100%;
    }

    .clear {
      clear: both;
    }

    .timestamp-footer {
      margin-top: 20px;
      font-size: 8px;
      color: #718096;
    }
  </style>
</head>

<body>

  @php
  $meses = [1=>'Enero', 2=>'Febrero', 3=>'Marzo', 4=>'Abril', 5=>'Mayo', 6=>'Junio', 7=>'Julio', 8=>'Agosto', 9=>'Septiembre', 10=>'Octubre', 11=>'Noviembre', 12=>'Diciembre'];
  $fechaObj = \Carbon\Carbon::parse($comprobante->fecha_emision);
  $fechaFormateada = $fechaObj->format('d') . ' de ' . $meses[$fechaObj->month] . ' del año ' . $fechaObj->format('Y');
  @endphp

  <table class="header-table">
    <tr>
      <td class="header-logo">
        <img src="{{ public_path('unam-azul.png') }}" alt="UNAM" style="height: 65px;">
      </td>
      <td class="header-text">
        <h1>UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO</h1>
        <h2>FACULTAD DE ESTUDIOS SUPERIORES ARAGÓN</h2>
        <h3>SECRETARÍA ACADÉMICA</h3>
        <h4>DEPARTAMENTO DE SERVICIOS ESCOLARES</h4>
      </td>
      <td class="header-logo right">
        <img src="{{ public_path('fes-aragon-azul.png') }}" alt="FES Aragón" style="height: 55px;">
      </td>
    </tr>
  </table>

  <div class="fecha-emision">
    FECHA: {{ $fechaFormateada }}
  </div>

  <div class="titulo-comprobante">
    Comprobante de Reinscripción al Semestre 2026-II
  </div>

  <table class="table-institucional">
    <thead>
      <tr>
        <th style="width: 50%;">Nombre del Alumno</th>
        <th style="width: 12%;">Generación</th>
        <th style="width: 13%;">No. de Cuenta</th>
        <th style="width: 25%;">Carrera-Plan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="left">{{ strtoupper($comprobante->alumno->apellido_paterno . ' ' . $comprobante->alumno->apellido_materno . ' ' . $comprobante->alumno->nombre) }}</td>
        <td>{{ $comprobante->alumno->anio_ingreso }}-I</td>
        <td style="font-weight: bold;">{{ $comprobante->alumno->numero_cuenta }}</td>
        <td class="left">INGENIERÍA EN COMPUTACIÓN (2119)</td>
      </tr>
    </tbody>
  </table>

  <table class="table-materias">
    <thead>
      <tr>
        <th style="width: 6%;">No.</th>
        <th style="width: 14%;">CVE.</th>
        <th style="width: 60%; text-align: left;">ASIGNATURA</th>
        <th style="width: 10%;">CRED.</th>
        <th style="width: 10%;">GRUPO</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1; @endphp
      @foreach($inscripciones as $inscripcion)
      <tr>
        <td style="text-align: center;">{{ str_pad($i++, 2, '0', STR_PAD_LEFT) }}</td>
        <td style="text-align: center;">{{ $inscripcion->grupo->asignatura->clave_asignatura }}</td>
        <td>{{ strtoupper($inscripcion->grupo->asignatura->nombre_asignatura) }}</td>
        <td style="text-align: center;">{{ str_pad($inscripcion->grupo->asignatura->creditos_asignatura, 2, '0', STR_PAD_LEFT) }}</td>
        <td style="text-align: center; font-weight: bold;">{{ $inscripcion->grupo->nombre_grupo }}</td>
      </tr>
      @endforeach

      @for($f = $i; $f <= 12; $f++)
        <tr class="filler">
        <td style="text-align: center;">**</td>
        <td style="text-align: center;">****</td>
        <td>************************************************************</td>
        <td style="text-align: center;">****</td>
        <td style="text-align: center;">****</td>
        </tr>
        @endfor
    </tbody>
  </table>

  <div class="footer-content">
    <div class="notas-legal">
      <strong>NOTAS:</strong>
      <ul>
        <li>Toda reinscripción está sujeta a validación por parte de DGAE.</li>
        <li>Una vez finalizada la reinscripción y generado este comprobante, no se podrán realizar cambios.</li>
        <li>Toda reinscripción está sujeta al Reglamento General de Inscripciones (R.G.I.).</li>
        <li>Ningún alumno podrá ser inscrito más de dos veces en una misma asignatura.</li>
        <li>Este comprobante te servirá para cualquier trámite ante el Departamento de Servicios Escolares.</li>
      </ul>
    </div>

    <div class="qr-zone">
      <div class="qr-box">
        <img src="/public/qrcode_generico.png" alt="">
      </div>
    </div>
  </div>

  <div class="clear"></div>

  <div class="timestamp-footer">
    FECHA DE IMPRESIÓN: {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}
  </div>

</body>

</html>