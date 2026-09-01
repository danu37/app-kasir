<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi #{{ $transaction->id }}</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 20px;
            width: 300px;
            font-size: 14px;
            color: #000;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        h2,
        h3 {
            margin: 5px 0;
        }

        .divider {
            border-bottom: 1px dashed #000;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        td {
            vertical-align: top;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
            }
        }

        .btn-print {
            display: block;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #1976D2;
            color: white;
            text-align: center;
            text-decoration: none;
            font-family: sans-serif;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            width: 100%;
        }
    </style>
</head>

<body>
    <button class="no-print btn-print" onclick="window.print()">🖨️ Cetak Struk</button>

    <div class="text-center">
        <h2>KASIR MINI</h2>
        <p style="margin:0;">Jl. Contoh Kasir No. 123</p>
        <p style="margin:0;">Telp: 08123456789</p>
    </div>

    <div class="divider"></div>

    <table>
        <tr>
            <td>ID</td>
            <td>: #{{ str_pad($transaction->id, 6, '0', STR_PAD_LEFT) }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ \Carbon\Carbon::parse($transaction->tanggal)->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <td>Kasir</td>
            <td>: {{ $transaction->user->name ?? 'Kasir' }}</td>
        </tr>
    </table>

    <div class="divider"></div>

    <table>
        @if($transaction->details && $transaction->details->count() > 0)
        @foreach($transaction->details as $detail)
        <tr>
            <td colspan="3">{{ $detail->product->name ?? 'Produk Umum' }}</td>
        </tr>
        <tr>
            <td>{{ $detail->quantity }}x</td>
            <td class="text-right">Rp{{ number_format($detail->price, 0, ',', '.') }}</td>
            <td class="text-right font-bold">Rp{{ number_format($detail->total, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="3">Penjualan Langsung / Custom</td>
        </tr>
        <tr>
            <td>1x</td>
            <td class="text-right">Rp{{ number_format($transaction->total, 0, ',', '.') }}</td>
            <td class="text-right font-bold">Rp{{ number_format($transaction->total, 0, ',', '.') }}</td>
        </tr>
        @endif
    </table>

    <div class="divider"></div>

    <table>
        <tr>
            <td><strong>Total</strong></td>
            <td class="text-right font-bold">Rp{{ number_format($transaction->total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Bayar</td>
            <td class="text-right">Rp{{ number_format($transaction->bayar, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Kembali</td>
            <td class="text-right">Rp{{ number_format($transaction->kembalian, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="divider"></div>

    <div class="text-center footer">
        <p>Terima Kasih Atas Kunjungan Anda!</p>
        <p>Kritik & Saran: info@kasirmini.com</p>
    </div>

    <script>
        // Auto print on page load
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>