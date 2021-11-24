<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EV-Comply Task</title>


        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            table {
              border: 1px solid #ccc;
              border-collapse: collapse;
              margin: 0;
              padding: 0;
              width: 100%;
              table-layout: fixed;
            }

            table caption {
              font-size: 1.5em;
              margin: .5em 0 .75em;
            }

            table tr {
              background-color: #f8f8f8;
              border: 1px solid #ddd;
              padding: .35em;
            }

            table th,
            table td {
              padding: .625em;
              text-align: center;
            }

            table th {
              font-size: .85em;
              letter-spacing: .1em;
              text-transform: uppercase;
            }

            @media screen and (max-width: 600px) {
              table {
                border: 0;
              }

              table caption {
                font-size: 1.3em;
              }

              table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
              }

              table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
              }

              table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
              }

              table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
              }

              table td:last-child {
                border-bottom: 0;
              }
            }

        </style>
    </head>
    <body class="antialiased">
      @if(session()->has('success'))
      <span style="color:green; font-weight:bold">
        {{ session('success') }}
      </span>
      @endif
      <div class="add-customer">
        <h3>Add a Customer</h3>
        <form action="{{ url('/store') }}" method="POST">
          @csrf
          <div class="form-item">
            <label for="name">Customer Name : </label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div style="color:red">
              {{ $message }}
            </div>
            @enderror
          </div>
          <br>
          <div class="form-item">
            <label for="name">Customer Date of Birth : </label>
            <input type="date" name="date_of_birth"  value="{{ old('date_of_birth') }}" required>
            @error('date_of_birth')
            <div style="color:red">
              {{ $message }}
            </div>
            @enderror
          </div>
          <br>

          <button type="submit" name="button">Add</button>
        </form>
      </div>
      <div class="customer-table">
        <table>
          <caption>Customers Table</caption>
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Date Of Birth</th>
              <th scope="col">Recorded Added Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $customer)
            <tr>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->date_of_birth->format('m-d-Y') }}</td>
              <td>{{ $customer->created_at->format('m-d-Y') }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </body>
</html>
