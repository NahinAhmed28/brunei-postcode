<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brunei Postcode Explorer</title>
    <style>
        :root {
            --green: #16a34a;
            --green-strong: #15803d;
            --red: #dc2626;
            --yellow: #f59e0b;
            --black: #0f172a;
            --card: #0b1120;
            --muted: #cbd5e1;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at 15% 20%, rgba(34, 197, 94, 0.14), transparent 25%),
                        radial-gradient(circle at 80% 10%, rgba(248, 180, 0, 0.14), transparent 30%),
                        linear-gradient(145deg, #020617, #0b1224 50%, #020617);
            color: #e2e8f0;
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; }

        .page {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1.25rem 3rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(203, 213, 225, 0.1);
            border-radius: 16px;
            padding: 1rem 1.25rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(8px);
            position: sticky;
            top: 0.75rem;
            z-index: 5;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            background: conic-gradient(from 110deg, var(--green), var(--yellow), var(--red), var(--green));
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.16);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
            font-weight: 800;
            color: #0b1120;
        }

        .brand h1 {
            margin: 0;
            font-size: 1.25rem;
            color: #f8fafc;
        }

        .nav-links {
            display: flex;
            gap: 0.65rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            padding: 0.55rem 0.9rem;
            border-radius: 12px;
            font-weight: 600;
            border: 1px solid rgba(226, 232, 240, 0.12);
            background: rgba(255, 255, 255, 0.04);
            color: #e2e8f0;
            transition: transform 0.15s ease, background 0.15s ease, border 0.15s ease;
        }

        .nav-links a:hover { background: rgba(22, 163, 74, 0.15); transform: translateY(-1px); border-color: rgba(34, 197, 94, 0.35); }

        .hero {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.18), rgba(248, 180, 0, 0.2)),
                        radial-gradient(circle at 70% 10%, rgba(220, 38, 38, 0.12), transparent 40%),
                        #0b1224;
            border-radius: 22px;
            padding: 2rem;
            border: 1px solid rgba(226, 232, 240, 0.1);
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.4);
        }

        .hero-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1rem;
            align-items: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.4rem 0.85rem;
            border-radius: 999px;
            font-weight: 700;
            letter-spacing: 0.01em;
            background: rgba(22, 163, 74, 0.18);
            color: #bef264;
            border: 1px solid rgba(190, 242, 100, 0.4);
        }

        .title { color: #f8fafc; margin: 0; font-size: 2rem; }
        .subtitle { color: #cbd5e1; margin: 0.35rem 0 0; max-width: 760px; line-height: 1.6; }

        .hero-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .pill-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.7rem 1.05rem;
            border-radius: 12px;
            border: 1px solid rgba(226, 232, 240, 0.12);
            background: rgba(255, 255, 255, 0.06);
            color: #e2e8f0;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .pill-btn:hover { transform: translateY(-1px); }
        .pill-btn.primary { background: linear-gradient(120deg, var(--green), #22c55e); color: #022c1b; border: none; box-shadow: 0 10px 25px rgba(34, 197, 94, 0.35); }
        .pill-btn.warning { border-color: rgba(245, 158, 11, 0.3); color: #fbbf24; }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin-top: 1.25rem;
        }

        .stat {
            background: rgba(15, 23, 42, 0.75);
            border: 1px solid rgba(226, 232, 240, 0.08);
            border-radius: 14px;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        .stat::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.08), transparent 40%);
            pointer-events: none;
        }

        .stat h3 { margin: 0; color: #f8fafc; font-size: 1.1rem; }
        .stat p { margin: 0.15rem 0 0; color: #cbd5e1; }
        .stat .value { font-size: 1.75rem; font-weight: 800; margin-top: 0.35rem; color: #bef264; }
        .stat.red .value { color: #f87171; }
        .stat.yellow .value { color: #fbbf24; }

        .panel {
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(226, 232, 240, 0.08);
            border-radius: 16px;
            padding: 1.25rem;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.35);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .section-heading h2 { margin: 0; color: #f8fafc; font-size: 1.35rem; }
        .section-heading span { color: #cbd5e1; }

        .search-row {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 0.75rem;
            align-items: center;
            margin-top: 0.5rem;
        }

        .search-input {
            width: 100%;
            padding: 0.95rem 1.05rem;
            border-radius: 12px;
            border: 1px solid rgba(226, 232, 240, 0.18);
            background: rgba(255, 255, 255, 0.04);
            color: #e2e8f0;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-input:focus { border-color: rgba(34, 197, 94, 0.65); box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2); }

        .quick-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-top: 0.75rem;
        }

        .chip {
            padding: 0.5rem 0.85rem;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.65);
            border: 1px solid rgba(226, 232, 240, 0.14);
            color: #e2e8f0;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .chip:hover { background: rgba(34, 197, 94, 0.2); border-color: rgba(34, 197, 94, 0.45); }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: rgba(11, 17, 32, 0.9);
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.08);
        }

        thead { background: linear-gradient(90deg, #0f172a, #1e293b); color: #f8fafc; position: sticky; top: 72px; z-index: 2; }

        th, td {
            padding: 0.9rem 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(226, 232, 240, 0.08);
        }

        th { font-weight: 700; letter-spacing: 0.02em; font-size: 0.95rem; }

        tbody tr:nth-child(odd) { background: rgba(255, 255, 255, 0.02); }
        tbody tr:nth-child(even) { background: rgba(255, 255, 255, 0.05); }
        tbody tr:hover { background: rgba(34, 197, 94, 0.08); }

        .mono { font-family: 'JetBrains Mono', ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace; color: #e2e8f0; }
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.65rem;
            border-radius: 999px;
            font-weight: 700;
            background: rgba(248, 180, 0, 0.16);
            color: #fde68a;
        }

        .pill.red { background: rgba(220, 38, 38, 0.16); color: #fecdd3; }
        .pill.green { background: rgba(34, 197, 94, 0.2); color: #bbf7d0; }

        .helper {
            margin-top: 0.5rem;
            color: #cbd5e1;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .nav { position: static; }
            thead { position: static; }
            .search-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
@php
    $districts = $kampongs->map(fn($k) => $k->mukim->district->name)->unique()->values();
    $mukims = $kampongs->map(fn($k) => $k->mukim->name)->unique()->values();
@endphp
    <div class="page">
        <header class="nav" aria-label="Primary">
            <div class="brand">
                <div class="brand-icon">BP</div>
                <div>
                    <h1>Brunei Postcode</h1>
                    <small style="color: #94a3b8;">Navigate → Discover → Copy</small>
                </div>
            </div>
            <nav class="nav-links">
                <a href="#overview">Overview</a>
                <a href="#search">Search</a>
                <a href="#table">Browse</a>
            </nav>
        </header>

        <section id="overview" class="hero" aria-labelledby="overview-title">
            <div class="hero-header">
                <div>
                    <div class="badge">Live directory</div>
                    <h2 id="overview-title" class="title">Postcode Explorer for Brunei</h2>
                    <p class="subtitle">Find districts, mukims, and kampongs faster with guided navigation, color-coded highlights, and responsive search powered by the latest dataset.</p>
                </div>
                <div class="hero-actions">
                    <a class="pill-btn primary" href="#search">Start searching</a>
                    <a class="pill-btn warning" href="#table">Jump to results</a>
                </div>
            </div>

            <div class="grid">
                <div class="stat">
                    <h3>Registered kampongs</h3>
                    <p>Directly searchable from the directory</p>
                    <div class="value">{{ $kampongs->count() }}</div>
                </div>
                <div class="stat red">
                    <h3>Unique mukims</h3>
                    <p>Organized for quick skim reading</p>
                    <div class="value">{{ $mukims->count() }}</div>
                </div>
                <div class="stat yellow">
                    <h3>District coverage</h3>
                    <p>Green, yellow, red markers for fast scanning</p>
                    <div class="value">{{ $districts->count() }}</div>
                </div>
            </div>
        </section>

        <section id="search" class="panel" aria-labelledby="search-title">
            <div class="section-heading">
                <div>
                    <h2 id="search-title">Advanced navigation</h2>
                    <span>Search by district, mukim, kampong, or postcode. Use quick filters to jump around.</span>
                </div>
                <button class="pill-btn" id="clear-search" type="button">Reset</button>
            </div>

            <div class="search-row">
                <input
                    type="search"
                    id="search-input"
                    class="search-input"
                    placeholder="Start typing to filter… (e.g., Brunei Muara, Gadong, Sengkurong)"
                    aria-label="Search by district, mukim, kampong or postcode"
                    autocomplete="off"
                >
                <a class="pill-btn primary" href="#table">Go to table</a>
            </div>

            <p class="helper">Use the colored chips to pre-fill searches. Green for district anchors, yellow for mukims.</p>
            <div class="quick-filters" aria-label="Quick filters">
                @foreach ($districts as $district)
                    <button class="chip" data-term="{{ $district }}">{{ $district }}</button>
                @endforeach
                @foreach ($mukims->take(6) as $mukim)
                    <button class="chip" data-term="{{ $mukim }}">{{ $mukim }}</button>
                @endforeach
            </div>
        </section>

        <section id="table" class="panel" aria-labelledby="table-title">
            <div class="section-heading">
                <div>
                    <h2 id="table-title">Browse the directory</h2>
                    <span>Sorted view with sticky headers. Hover rows to spotlight locations.</span>
                </div>
                <div class="pill">Live · Updated</div>
            </div>

            <table aria-describedby="table-title">
                <thead>
                    <tr>
                        <th style="width: 70px;">#</th>
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
                        <td><span class="pill green">{{ $kampong->mukim->district->name }}</span></td>
                        <td><span class="pill">{{ $kampong->mukim->name }}</span></td>
                        <td>{{ $kampong->name }}</td>
                        <td class="mono">{{ $kampong->postcode }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <script>
        const searchInput = document.getElementById('search-input');
        const tableBody = document.querySelector('tbody');
        const searchUrl = @json(route('postcodes.search'));
        const chips = document.querySelectorAll('.chip');
        const clearButton = document.getElementById('clear-search');

        function renderRows(rows) {
            if (!rows.length) {
                tableBody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding:1.2rem; color:#cbd5e1;">No matching records found.</td></tr>';
                return;
            }

            const html = rows.map((row, index) => `
                <tr>
                    <td class="mono">${index + 1}</td>
                    <td><span class="pill green">${row.district}</span></td>
                    <td><span class="pill">${row.mukim}</span></td>
                    <td>${row.kampong}</td>
                    <td class="mono">${row.postcode}</td>
                </tr>
            `).join('');

            tableBody.innerHTML = html;
        }

        async function fetchResults(term) {
            try {
                const response = await fetch(`${searchUrl}?q=${encodeURIComponent(term)}`);
                if (!response.ok) throw new Error('Network response was not ok');
                const { data } = await response.json();
                renderRows(data);
            } catch (error) {
                console.error('Search error:', error);
            }
        }

        let debounceTimer;
        function handleSearch(term) {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => fetchResults(term), 200);
        }

        searchInput.addEventListener('input', (event) => handleSearch(event.target.value));

        chips.forEach((chip) => {
            chip.addEventListener('click', () => {
                const term = chip.getAttribute('data-term');
                searchInput.value = term;
                handleSearch(term);
                searchInput.focus();
            });
        });

        clearButton.addEventListener('click', () => {
            searchInput.value = '';
            handleSearch('');
            searchInput.focus();
        });
    </script>
</body>
</html>
