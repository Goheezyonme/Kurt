<!-- Email HTML body -->
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sus assessments</title>
    <style>
        /* Estilos mínimos y seguros para e-mail (evitar reglas complejas) */
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f6;
            font-family: Arial, sans-serif;
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        table {
            border-collapse: collapse;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
        }

        .pad {
            padding: 20px;
        }

        h1 {
            font-size: 20px;
            margin: 0 0 12px 0;
            color: #111827;
        }

        p {
            margin: 0 0 12px 0;
            color: #374151;
            line-height: 1.4;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            background: #0d6efd;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
        }

        .muted {
            color: #6b7280;
            font-size: 13px;
        }

        .list {
            margin: 12px 0;
            padding-left: 18px;
            color: #374151;
        }

        .footer {
            font-size: 12px;
            color: #9ca3af;
            padding: 16px 20px;
            text-align: center;
        }

        /* Mobile small tweaks */
        @media only screen and (max-width:420px) {
            .pad {
                padding: 14px;
            }

            .btn {
                padding: 10px 14px;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Contenedor principal -->
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="padding:24px 12px;">
                <table class="container" cellpadding="0" cellspacing="0" role="presentation">
                    <!-- Header -->
                    <tr>
                        <td class="pad" style="border-bottom:1px solid #eef2f7;">
                            <h1>Documentos de evaluación disponibles</h1>
                            <p class="muted">Enviado por: <strong>{{clinicianName}}</strong></p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="pad">
                            <p>Hola <strong>{{patientName}}</strong>,</p>

                            <p>Gracias por su contacto. A continuación están los formularios/assessments que se han
                                generado para usted:</p>

                            <!-- Lista de assessments (reemplazar por HTML generado dinámicamente) -->
                            <ul class="list">
                                {{assessmentsList}}
                                <!-- Ejemplo de elemento:
                <li>PHQ-9 — <span class="muted">Evaluación de depresión</span></li>
                -->
                            </ul>

                            <p>Puede acceder a ellos desde el siguiente enlace:</p>

                            <p style="text-align:center; margin:18px 0;">
                                <a class="btn" href="{{ctaUrl}}" target="_blank" rel="noopener">Ver mis assessments</a>
                            </p>

                            <p class="muted">Si no reconoce esta solicitud o cree que hay un error, por favor responda a
                                este correo o contacte a <a href="mailto:{{clinicEmail}}">{{clinicEmail}}</a>.</p>
                        </td>
                    </tr>

                    <!-- Footer / contact -->
                    <tr>
                        <td style="background:#fafafa; border-top:1px solid #eef2f7;">
                            <div class="footer">
                                <div>Clínica Ejemplo • Tel: +1 (555) 123-4567</div>
                                <div style="margin-top:6px;">© <span id="year">2025</span> Todos los derechos reservados
                                </div>
                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <!-- Plain-text fallback: algunos clientes ignoran estilos, así que incluye una versión en texto
       Si usas PHPMailer puedes set AltBody con el texto plano equivalente -->
</body>

</html>