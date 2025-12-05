<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brunei Postcode Explorer</title>
    <style>
        :root {
            --green: #1a9c55;
            --green-strong: #0f7c3a;
            --yellow: #f4c430;
            --red: #e04f42;
            --ink: #0f172a;
            --muted: #475569;
            --surface: #fdfcf7;
            --card: #ffffff;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at 12% 20%, rgba(26, 156, 85, 0.08), transparent 28%),
                        radial-gradient(circle at 82% 12%, rgba(244, 196, 48, 0.12), transparent 30%),
                        linear-gradient(145deg, #f9fafb, #fefcf4 45%, #f7f9fb);
            color: var(--ink);
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; }

        .page {
            max-width: 1180px;
            margin: 0 auto;
            padding: 2.5rem 1.25rem 3.25rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(26, 156, 85, 0.15);
            border-radius: 18px;
            padding: 1rem 1.25rem;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            backdrop-filter: blur(8px);
            position: sticky;
            top: 0.9rem;
            z-index: 5;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            background: conic-gradient(from 110deg, var(--green), var(--yellow), #fef9c3, var(--green));
            border-radius: 14px;
            border: 2px solid rgba(26, 156, 85, 0.2);
            box-shadow: 0 12px 28px rgba(26, 156, 85, 0.25);
            font-weight: 800;
            color: var(--ink);
        }

        .brand h1 {
            margin: 0;
            font-size: 1.25rem;
            color: var(--ink);
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
            font-weight: 650;
            border: 1px solid rgba(26, 156, 85, 0.16);
            background: rgba(26, 156, 85, 0.08);
            color: var(--ink);
            transition: transform 0.15s ease, background 0.15s ease, border 0.15s ease, box-shadow 0.15s ease;
        }

        .nav-links a:hover {
            background: rgba(244, 196, 48, 0.14);
            transform: translateY(-1px);
            border-color: rgba(244, 196, 48, 0.5);
            box-shadow: 0 10px 20px rgba(244, 196, 48, 0.22);
        }

        .hero {
            background: radial-gradient(circle at 18% 30%, rgba(26, 156, 85, 0.15), transparent 35%),
                        radial-gradient(circle at 80% 0%, rgba(244, 196, 48, 0.16), transparent 40%),
                        linear-gradient(120deg, #ffffff, #fefbf3);
            border-radius: 22px;
            padding: 2.25rem;
            border: 1px solid rgba(26, 156, 85, 0.18);
            box-shadow: 0 18px 38px rgba(15, 23, 42, 0.12);
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
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            font-weight: 750;
            letter-spacing: 0.01em;
            background: rgba(26, 156, 85, 0.16);
            color: var(--green-strong);
            border: 1px solid rgba(26, 156, 85, 0.4);
        }

        .title { color: var(--ink); margin: 0; font-size: 2.05rem; }
        .subtitle { color: var(--muted); margin: 0.35rem 0 0; max-width: 760px; line-height: 1.6; }

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
            border: 1px solid rgba(26, 156, 85, 0.18);
            background: rgba(26, 156, 85, 0.08);
            color: var(--ink);
            font-weight: 750;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .pill-btn:hover { transform: translateY(-1px); box-shadow: 0 14px 30px rgba(26, 156, 85, 0.2); }
        .pill-btn.primary { background: linear-gradient(120deg, var(--green), #9ae6b4); color: #06331d; border: none; box-shadow: 0 12px 25px rgba(26, 156, 85, 0.35); }
        .pill-btn.warning { border-color: rgba(244, 196, 48, 0.5); color: #b45309; background: rgba(244, 196, 48, 0.16); }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin-top: 1.25rem;
        }

        .path-grid {
            margin-top: 1.25rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 0.85rem;
        }

        .path-card {
            background: #ffffff;
            border: 1px solid rgba(26, 156, 85, 0.12);
            border-radius: 14px;
            padding: 0.85rem 1rem;
            display: grid;
            gap: 0.35rem;
            align-content: center;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.06);
        }

        .path-card strong { color: var(--ink); }
        .path-card span { color: var(--muted); font-size: 0.95rem; }

        .stat {
            background: #ffffff;
            border: 1px solid rgba(26, 156, 85, 0.12);
            border-radius: 14px;
            padding: 1.1rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }

        .stat::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 80% 20%, rgba(244, 196, 48, 0.16), transparent 40%);
            pointer-events: none;
        }

        .stat h3 { margin: 0; color: var(--ink); font-size: 1.1rem; }
        .stat p { margin: 0.15rem 0 0; color: var(--muted); }
        .stat .value { font-size: 1.75rem; font-weight: 800; margin-top: 0.35rem; color: var(--green-strong); }
        .stat.red .value { color: var(--red); }
        .stat.yellow .value { color: var(--yellow); }

        .panel {
            background: #ffffff;
            border: 1px solid rgba(26, 156, 85, 0.12);
            border-radius: 16px;
            padding: 1.35rem;
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .section-heading h2 { margin: 0; color: var(--ink); font-size: 1.35rem; }
        .section-heading span { color: var(--muted); }

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
            border: 1px solid rgba(26, 156, 85, 0.2);
            background: #f8fafc;
            color: var(--ink);
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .search-input:focus { border-color: rgba(26, 156, 85, 0.65); box-shadow: 0 0 0 3px rgba(26, 156, 85, 0.18); background: #fff; }

        .quick-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-top: 0.75rem;
        }

        .chip {
            padding: 0.5rem 0.85rem;
            border-radius: 999px;
            background: #fef9c3;
            border: 1px solid rgba(244, 196, 48, 0.45);
            color: #854d0e;
            font-weight: 650;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .chip:hover { background: rgba(26, 156, 85, 0.16); border-color: rgba(26, 156, 85, 0.5); color: var(--green-strong); }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid rgba(26, 156, 85, 0.12);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        }

        thead { background: linear-gradient(90deg, #ecfccb, #fef9c3); color: #0f172a; position: sticky; top: 72px; z-index: 2; }

        th, td {
            padding: 0.9rem 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
        }

        th { font-weight: 750; letter-spacing: 0.02em; font-size: 0.95rem; }

        tbody tr:nth-child(odd) { background: #f8fafc; }
        tbody tr:nth-child(even) { background: #fffef7; }
        tbody tr:hover { background: rgba(26, 156, 85, 0.08); }

        .mono { font-family: 'JetBrains Mono', ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace; color: var(--ink); }
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.65rem;
            border-radius: 999px;
            font-weight: 700;
            background: rgba(244, 196, 48, 0.18);
            color: #854d0e;
        }

        .pill.red { background: rgba(224, 79, 66, 0.15); color: #7f1d1d; }
        .pill.green { background: rgba(26, 156, 85, 0.18); color: var(--green-strong); }

        .helper {
            margin-top: 0.5rem;
            color: var(--muted);
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
                    <small style="color: var(--muted);">Navigate → Discover → Copy</small>
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

            <div class="path-grid" aria-label="Navigation shortcuts">
                <div class="path-card">
                    <strong>Guided search</strong>
                    <span>Type anything and the table scrolls with you. Filter by district, mukim, kampong, or postcode.</span>
                </div>
                <div class="path-card">
                    <strong>Quick anchors</strong>
                    <span>Use the top navigation or chips to jump straight to the search box or browse table.</span>
                </div>
                <div class="path-card">
                    <strong>Compact rows</strong>
                    <span>Sticky headers keep context visible while you skim with green and yellow highlights.</span>
                </div>
                <div class="path-card">
                    <strong>Copy-ready codes</strong>
                    <span>Postcodes are monospaced for easier selection and quick sharing with teams.</span>
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
                tableBody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding:1.2rem; color:var(--muted);">No matching records found.</td></tr>';
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
