<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>


  <style>
    body {
      font-family: arial, sans-serif;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    .first-tb {
      border-col
    }

    .hello {
      font-size: 17px;
    }

    .table-2 td {
      border: 1px solid #000000;
      padding: 8px;
      text-align: center;
    }

    .table-2 th {
      border: 1px solid #000000;
      text-align: center;
      padding: 8px;
    }

    hr.new1 {
      border-top: 2px dashed black;
    }
  </style>
</head>

<body>
  <img src="{{ public_path('assets/images/arctic-zone-logo.png') }}" align="left" height="70" width="160">
  <p style="margin-left: 11rem;"><b>Payment Voucher</b> <br>
    <small>Arctic Zone Thermo Solutions Inc.</small> <br>
    <small>Blk Lot 4, Consul St. South Fairview Park Q.C.</small></p>

  <h1> CLIENT'S COPY </h1>

  <table>
    <tr>
      <th>
        <img src="{{ public_path('assets/images/barcode_applicant.png') }}">
      </th>
    </tr>
    <tr>
      <td>
        Name: <b> 
          @if ($sr['client_contact_person'] === null) 
          {{ $sr['client']['firstname'] . ' ' . $sr['client']['lastname'] }}
          @else
          {{ $sr['client_contact_person']['firstname'] . ' ' . $sr['client_contact_person']['lastname'] }} 
          @endif
          
        </b> <br>
        Reference Number: <b> 2020-19 </b> <br>
        Mode of Payment: <b>
          {{ $sr['payment_mode']['name'] }}
        </b> <br>
      </td>
    </tr>
  </table>

  <br>
  <table>

    <tr>
      <td>

        Total Due Amount: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Php {{ number_format($sr['total_amount'], 2) }} <br>
        Bank Service Fee:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php 25.00
        <br><br>
        <b>TOTAL AMOUNT: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php 
          {{ number_format($sr['total_amount'] + 25, 2) }}
        </b>
      </td>
    </tr>
  </table>


  <br>



  <p>
    This is your copy. Keep the part in the safe place. Bank service fee is applicable only when you pay via landbank.
    This document is valid until <b> {{ date('F d, Y', strtotime($sr['service_date'] . '-1 day')) }}</b>.
  </p>


  <img src="{{ public_path('assets/images/cut_tracer.png') }}">
  <h1> BANK/CASHIER'S COPY </h1>

  <table>
    <tr>
      <th>
        <img src="{{ public_path('assets/images/barcode_cashier.png') }}">
      </th>
    </tr>
    <tr>
      <td>
        Name: <b> 
          @if ($sr['client_contact_person'] === null) 
          {{ $sr['client']['firstname'] . ' ' . $sr['client']['lastname'] }}
          @else
          {{ $sr['client_contact_person']['firstname'] . ' ' . $sr['client_contact_person']['lastname'] }} 
          @endif 
        </b> <br>
        Mode of Payment: <b> {{ $sr['payment_mode']['name'] }}</b> <br>
      </td>
    </tr>
  </table>

  <br>
  <table>

    <tr>
      <td>

        Total Due Amount: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php 
        {{ number_format($sr['total_amount'], 2) }} <br>
        Bank Service Fee:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php 25.00
      </td>
    </tr>
  </table>

  <br>

  <table class="table-2">
    <thead>
      <tr>
        <th>Account Number</th>
        <th>Reference Number</th>
        <th>Due Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <b>0682-2220-00</b><BR>
          <small>PLEASE USE THIS NUMBER TO PAY.</small>
        </td>
        <td>
          <b>2019-0006-5521</b><BR>
          <small>THIS IS YOUR REFERENCE NUMBER.</small>
        </td>
        <td>
          <b>{{ date('F d, Y', strtotime($sr['service_date'] . '-1 day')) }}</b><BR>
          <small>THIS VOUCHER IS VALID UNTIL THIS DATE.</small>
        </td>
      </tr>
    </tbody>
  </table>


  <p>
    Any branch of LANDBANK OF THE PHILIPPINES (LBP) is authorized to receive payments for Arctic Zone Thermo Solutions
    Inc. Service Request Payment.
  </p>
</body>

</html>