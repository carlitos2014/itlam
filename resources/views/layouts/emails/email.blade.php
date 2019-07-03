@extends('layouts.emails.layout')
@section('title', '- Ticket Autorizado')

@section('tituloMensaje')
  <td class="alert alert-warning" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #00FF04; margin: 0; padding: 20px;" align="center" bgcolor="#FF9F00" valign="top">
    {{ $subject }}
  </td>
@endsection

@section('mensaje')

  <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

    <tr>

      {{ $body }}

    </tr>

    <tr>
      <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
      *** esta es una notificación automática, por favor no responder este mensaje *** <strong style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"> 
      <!-- Botón Ver (show) -->
          </a>
      </strong>.
      </td>
    </tr>

  </table>

@endsection