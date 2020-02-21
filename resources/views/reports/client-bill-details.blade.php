<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>

  <style>
    .table-2 {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    p {
      font-family: arial, sans-serif;
    }

    .table-1 {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    .table-1 th {
      font-weight: 50%;
    }

    h4 {
      font-family: arial, sans-serif;
    }

    img {
      margin-left: 14.5rem;
      margin-top: 0.5rem;
    }

    .table-2 td {
      border: 1px solid #000000;
      padding: 8px;
    }

    .table-2 th {
      border: 1px solid #000000;
      text-align: center;
      padding: 8px;
    }
  </style>
</head>
<img src="{{ public_path('assets/images/arctic-zone-logo.png') }}" 
  height="85" width="240">

<body>

  <center>
    <h4 style="margin: 0">Billing Invoice</h4>
  </center>


  <br>

  <table class="table-1">
    <tr>
      <th>
        <br>
        {{ $client['firstname'] . ' ' . $client['lastname'] }} <br>
        {{ $client['service_requests'][0]['service_address'] }} <br>
        {{ $client['service_requests'][0]['property']['name'] }}
      </th>
      <th>
        <br>
        <b>Reference No.:</b> AZT-9012-9921 <br>
        <b>Service ID: </b>SR{{ $client['service_requests'][0]['id'] }}<br>
        <b>Terms:</b> Cash

      </th>

    </tr>
  </table>

  <table class="table-2">
    <thead>
      <tr>
        <th><b>QTY.</b></th>
        <th><b>DESCRIPTION</b></th>
        <th><b>UNIT PRICE</b></th>
        <th><b>TOTAL AMOUNT</b></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="center">2</td>
        <td>Installation;
          Window (2) Non-inverter / Samsung Inverter / Koppel</td>
        <td align="right">{{ $client['total_amount'] }}.00</td>
        <td align="right">{{ $client['total_amount'] }}.00</td>
      </tr>
    </tbody>


    <p align="right">
      @if ($client['service_requests'][0]['payment_mode']['name']  !== 'Full Payment')
        <b>Downpayment:</b> {{ $client['total_amount'] / 2 }} <br>
      @endif
      
      <b>Grand Total Amount:</b> <u> {{ $client['total_amount'] }}.00</u>
    </p>

  </table>

  <br>
  <p>Amount in words: <u><b> One Hundred Fifty Three Thousand Seven Hundred and 00/100 Pesos Only</p>
  <p>Please make check payable to: <b> Arctic Zone Thermosolutions Inc.</p>
  <br>
  <br>
  <br>
  <br>


  <table class="table-1">
    <tr>
      <th>
        <p>Noted By: <br><br></p>
        <hr width="40%" align="left" noshade="solid black">
        <p>Sonia T. Balasta
          <br>
          <i>AZTInc</i>
      </th>
      <th>
        <p>Received By: <br><br>
        </p>
        <hr width="45%" align="left" noshade="solid black">
        <p align="left">
          Name & Date
        </p>
      </th>

    </tr>
  </table>




</body>

</html>