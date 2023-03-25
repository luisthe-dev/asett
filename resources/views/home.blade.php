<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> Crypto Listings </title>
</head>

<body>
    <h3> Welcome To Crypto Listings </h3>
    <h6> Here's a couple of cryptocurriences we think you might be interested in! </h6>

    <table>
        <thead>
            <tr>
                <th>CryptoCurrency</th>
                <th> Latest Price </th>
                <th>Average Price Today</th>
                <th>Average Price Yesterday</th>
                <th>Average Price This Month</th>
                <th>Average Price All Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allCrypto as $crypto)
                <tr>
                    <td> {{ $crypto->crypto_currency }} </td>
                    <td> ${{ number_format($crypto->history[0]['amount'], 5) }} </td>
                    <td> ${{ number_format($crypto->today, 5) }} </td>
                    <td> ${{ number_format($crypto->yesterday, 5) }} </td>
                    <td> ${{ number_format($crypto->month, 5) }} </td>
                    <td> ${{ number_format($crypto->allTime, 5) }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <style type="text/css">
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h3 {
            font-size: 32px;
            margin: 12px auto;
        }

        h6 {
            font-size: 18px;
            margin: 6px auto;
            font-weight: 400;
        }

        table {
            width: 90%;
            border: 1px solid #121212;
        }

        thead {
            border-bottom: 2px solid #121212;
        }

        th {
            padding: 8px 0;
            text-align: center;
        }

        tbody tr {
            border-bottom: 1px solid #121212;
        }

        td {
            padding: 12px 0;
            text-align: center;
        }
    </style>
</body>

</html>
