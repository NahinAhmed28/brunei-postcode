<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brunei Postcode Dashboard</title>
    <style>
        :root {
            color-scheme: light dark;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at top left, #e2f1ff, #eef2f7 40%, #f9fafb);
            color: #0f172a;
        }

        .page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1.5rem;
        }

        .card {
            background: #ffffff;
            max-width: 1200px;
            width: 100%;
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(15, 23, 42, 0.08);
            padding: 2.5rem;
            border: 1px solid #e2e8f0;
        }

        .header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            background: #e0f2fe;
            color: #0369a1;
            font-weight: 600;
            font-size: 0.85rem;
        }

        h1 {
            margin: 0;
            font-size: 1.8rem;
            color: #0f172a;
        }

        p {
            margin: 0;
            color: #475569;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            overflow: hidden;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        thead {
            background: linear-gradient(90deg, #0ea5e9, #2563eb);
            color: #f8fafc;
        }

        th, td {
            padding: 0.9rem 1rem;
            text-align: left;
        }

        th {
            font-weight: 700;
            letter-spacing: 0.02em;
            font-size: 0.95rem;
        }

        tbody tr:nth-child(odd) {
            background: #f8fafc;
        }

        tbody tr:nth-child(even) {
            background: #ffffff;
        }

        tbody tr:hover {
            background: #e0f2fe;
        }

        .mono {
            font-family: 'JetBrains Mono', ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
            color: #0f172a;
        }

        @media (max-width: 768px) {
            .card {
                padding: 1.5rem;
            }

            th, td {
                padding: 0.75rem 0.75rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="header">
                <div class="badge">Brunei · Postcodes</div>
                <div>
                    <h1>Postcode Dashboard</h1>
                    <p>District → Mukim → Kampong hierarchy with postcode lookup.</p>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">SL</th>
                        <th>District</th>
                        <th>Mukim</th>
                        <th>Kampong</th>
                        <th>Postcode</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($kampongs as $kampong)
                    <tr>
                        <td class="mono">{{ $loop->iteration }}</td>
                        <td>{{ $kampong->mukim->district->name }}</td>
                        <td>{{ $kampong->mukim->name }}</td>
                        <td>{{ $kampong->name }}</td>
                        <td class="mono">{{ $kampong->postcode }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
