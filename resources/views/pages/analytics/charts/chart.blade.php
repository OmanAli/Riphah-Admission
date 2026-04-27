<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spring Application Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --confirmed-color: #CCEEFF;
            --unconfirmed-color: #635BCA;
            --year-0: #00BAFF; /* Dynamic Year 1 */
            --year-1: #5A4FCF; /* Dynamic Year 2 */
            --year-2: #00E396; /* Dynamic Year 3 */
            --text-main: #2d3748;
            --text-muted: #718096;
            --border-color: #e2e8f0;
            --stage-apps: #38b6ff;
            --stage-fee: #5e54d1;
            --stage-tests: #00e676;
            --stage-final: #ff7043;
            --funnel-apps: #38b6ff;
            --funnel-fee: #5e54d1;
            --funnel-tests: #00e676;
            --funnel-final: #ff7043;
        }

        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: var(--text-main);
            padding: 2rem 1rem;
        }

        .main-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto 2rem auto;
            position: relative;
        }

        .header-section {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .header-section h1 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .header-section p {
            font-size: 0.875rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .menu-container {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
        }

        .menu-btn {
            background: none;
            border: none;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .menu-btn:hover { background-color: #f8fafc; }

        .menu-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 40px;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            min-width: 160px;
        }

        .menu-dropdown button {
            width: 100%;
            padding: 10px 16px;
            border: none;
            background: none;
            text-align: left;
            font-size: 0.875rem;
            color: var(--text-main);
        }

        .menu-dropdown button:hover { background-color: #f8fafc; }

        .chart-wrapper {
            position: relative;
            height: 400px;
            width: 100%;
        }

        .chart-wrapper-tall { height: 800px; }

        .chart-wrapper-funnel {
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-legend {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 1rem;
            font-size: 0.85rem;
            color: #64748b;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .funnel-container {
            width: 100%;
            max-width: 800px;
            position: relative;
        }

        .funnel-label {
            position: absolute;
            right: 1%;
            font-size: 0.65rem;
            font-weight: 600;
            color: #444;
            pointer-events: none;
            white-space: nowrap;
        }

        @media print {
            .menu-container { display: none !important; }
            .main-card { box-shadow: none; border: 1px solid #eee; margin-bottom: 0; page-break-after: always; }
        }
    </style>
</head>
<body>

    <!-- 1. Bar Chart Card (Confirmed vs Unconfirmed) -->
    <div id="bar-card" class="main-card">
        {{-- <div class="menu-container">
            <button class="menu-btn action-menu-trigger">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
            <div class="menu-dropdown">
                <button onclick="toggleFullscreen('bar-card')">Full Screen</button>
                <button onclick="window.print()">Print</button>
                <button onclick="downloadChart('appChart', 'comparison')">Download PNG</button>
            </div>
        </div> --}}

        <div class="header-section">
            <h1 style="text-align: left">ONLINE APPLICATIONS</h1>
            <hr>
            <h5>Unconfirmed Application vs Confirmed Application</h5>
            <p>Spring {{ implode(', ', $years) }}</p>
        </div>

        <div class="chart-wrapper">
            <canvas id="appChart"></canvas>
        </div>

        <div class="custom-legend">
            <div class="legend-item"><span class="legend-dot" style="background: #CCEEFF"></span>Confirmed Applications</div>
            <div class="legend-item"><span class="legend-dot" style="background: #635BCA"></span>Unconfirmed Applications</div>
        </div>
    </div>

    <!-- 2. Line Chart Card (Daily Applications) -->
    <div id="line-card" class="main-card">

        <div class="header-section">
             <h1 style="text-align: left">APPLICATIONS PER DAY</h1>
            <hr>
            <h5>Daily Online Applications</h5>
            <p>SPRING {{ implode(', ', $years) }}</p>
        </div>

        <div class="chart-wrapper">
            <canvas id="lineChart"></canvas>
        </div>

        <div class="custom-legend">
            @foreach($years as $index => $year)
                <div class="legend-item"><span class="legend-dot" style="background: var(--year-{{ $index }})"></span>{{ $year }}</div>
            @endforeach
        </div>
    </div>

    <!-- 3. Department Chart Card -->
    <div id="dept-card" class="main-card">

        <div class="header-section">
             <h1 style="text-align: left">APPLICATIONS PER DEPARTMENT</h1>
            <hr>
            <h5>Applications per Department</h5>
            <p>Spring {{ implode(', ', $years) }}</p>
        </div>

        <div class="chart-wrapper chart-wrapper-tall">
            <canvas id="deptChart"></canvas>
        </div>

        <div class="custom-legend">
            @foreach($years as $index => $year)
                <div class="legend-item"><span class="legend-dot" style="background: var(--year-{{ $index }})"></span>{{ $year }}</div>
            @endforeach
        </div>
    </div>

    <!-- 4. Applications Stages Chart Card (Leave logic, update Y axis labels) -->
    <div id="stages-card" class="main-card">
        <div class="header-section">
            <h1 style="text-align: left">APPLICATIONS,PROCESSING FEE,TESTS TAKEN,FINAL ADMISSION</h1>
            <hr>
            <h5>Applications per Department</h5>
            <h1>Applications, Processing Fee, Tests Taken and Final Admissions</h1>
            <p>Session: SPRING {{ $years[0] ?? '' }}</p>
        </div>

        <div class="chart-wrapper chart-wrapper-tall">
            <canvas id="stagesChart"></canvas>
        </div>

        <div class="custom-legend">
            <div class="legend-item"><span class="legend-dot" style="background: var(--stage-apps)"></span>Applications</div>
            <div class="legend-item"><span class="legend-dot" style="background: var(--stage-fee)"></span>Processing Fee</div>
            <div class="legend-item"><span class="legend-dot" style="background: var(--stage-tests)"></span>Tests Taken</div>
            <div class="legend-item"><span class="legend-dot" style="background: var(--stage-final)"></span>Final Admissions</div>
        </div>
    </div>

    <!-- Applicant Funnel Chart (Unchanged) -->
    <div id="funnel-card" class="main-card">
       
        <div class="header-section">
            <h1 style="text-align: left">APPLICATIONT FUNNEL CHART</h1>
            <hr>
            <h5>Applicant Funnel Chart</h5>
        </div>
        <div class="chart-wrapper-funnel">
            <div class="funnel-container">
                <svg viewBox="0 0 800 500" width="100%" height="100%" preserveAspectRatio="xMidYMid meet">
                    <polygon points="50,50 750,50 630,220 170,220" fill="var(--funnel-apps)" />
                    <polygon points="175,225 625,225 580,310 220,310" fill="var(--funnel-fee)" />
                    <rect x="225" y="315" width="350" height="85" fill="var(--funnel-tests)" />
                    <rect x="225" y="405" width="350" height="85" fill="var(--funnel-final)" />
                </svg>
                <div class="funnel-label" style="top: 25%;">Total Applicants (4)</div>
                <div class="funnel-label" style="top: 48%;">Processing Fee Submitted (1)</div>
                <div class="funnel-label" style="top: 67%;">Appeared in Test (1)</div>
                <div class="funnel-label" style="top: 85%;">Admission Offered (1)</div>
            </div>
        </div>
    </div>

    <script>
        function toggleFullscreen(id) {
            const el = document.getElementById(id);
            if (!document.fullscreenElement) el.requestFullscreen();
            else document.exitFullscreen();
        }

        function downloadChart(canvasId, name) {
            const link = document.createElement('a');
            link.download = `${name}.png`;
            link.href = document.getElementById(canvasId).toDataURL('image/png', 1.0);
            link.click();
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Data passed from Controller
            const years = @json($years);
            const confirmedData = @json($confirmedData);
            const unconfirmedData = @json($unconfirmedData);
            const dailyData = @json($dailyData);
            const departmentNames = @json(array_values($departments));
            const departmentIds = @json(array_keys($departments));
            const departmentDataRaw = @json($departmentData);

            // --- 1. Bar Chart (Confirmed vs Unconfirmed) ---
            const barCtx = document.getElementById('appChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [
                        { label: 'Confirmed', data: confirmedData, backgroundColor: '#CCEEFF', barThickness: 30 },
                        { label: 'Unconfirmed', data: unconfirmedData, backgroundColor: '#635BCA', barThickness: 30 }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { color: '#f1f5f9' }, ticks: { callback: v => v >= 1000 ? (v/1000) + 'k' : v } },
                        y: { grid: { display: false } }
                    }
                },
                plugins: [{
                    id: 'labels',
                    afterDatasetsDraw(chart) {
                        const { ctx } = chart;
                        ctx.save();
                        ctx.font = 'bold 10px Arial';
                        chart.data.datasets.forEach((ds, i) => {
                            chart.getDatasetMeta(i).data.forEach((bar, idx) => {
                                ctx.fillText(ds.data[idx].toLocaleString(), bar.x + 5, bar.y + 4);
                            });
                        });
                        ctx.restore();
                    }
                }]
            });

            // --- 2. Line Chart (Daily Trend) ---
            // Prepare unique dates for X-axis labels across all years
            const allDatesSet = new Set();
            Object.values(dailyData).forEach(yearRecords => {
                yearRecords.forEach(rec => allDatesSet.add(rec.date));
            });
            const sortedDates = Array.from(allDatesSet).sort();
            
            const lineDatasets = years.map((year, index) => {
                const yearColor = getComputedStyle(document.documentElement).getPropertyValue(`--year-${index}`).trim();
                const dataMap = new Map(dailyData[year].map(d => [d.date, d.total]));
                return {
                    label: year,
                    data: sortedDates.map(date => dataMap.get(date) || 0),
                    borderColor: yearColor,
                    backgroundColor: yearColor,
                    borderWidth: 2,
                    pointRadius: 2,
                    tension: 0.1
                };
            });

            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: sortedDates.map(d => {
                        const date = new Date(d);
                        return date.toLocaleDateString('en-GB', { day: 'numeric', month: 'short' });
                    }),
                    datasets: lineDatasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, title: { display: true, text: 'Applications' } },
                        x: { grid: { display: false }, ticks: { maxRotation: 45, autoSkip: true, maxTicksLimit: 20 } }
                    }
                }
            });

            // --- 3. Department Chart ---
            const deptDatasets = years.map((year, index) => {
                const yearColor = getComputedStyle(document.documentElement).getPropertyValue(`--year-${index}`).trim();
                return {
                    label: year,
                    data: departmentIds.map(id => departmentDataRaw[year][id] || 0),
                    backgroundColor: yearColor,
                    barThickness: 5
                };
            });

            const deptCtx = document.getElementById('deptChart').getContext('2d');
            new Chart(deptCtx, {
                type: 'bar',
                data: {
                    labels: departmentNames,
                    datasets: deptDatasets
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { color: '#f1f5f9' }, ticks: { callback: v => v >= 1000 ? (v/1000) + 'k' : v } },
                        y: { grid: { display: false }, ticks: { font: { size: 10 } } }
                    }
                },
                plugins: [{
                    id: 'deptLabels',
                    afterDatasetsDraw(chart) {
                        const { ctx } = chart;
                        ctx.save();
                        ctx.font = 'bold 9px Arial';
                        chart.data.datasets.forEach((ds, i) => {
                            chart.getDatasetMeta(i).data.forEach((bar, idx) => {
                                const val = ds.data[idx];
                                if (val > 0) {
                                    ctx.fillStyle = '#2d3748';
                                    ctx.fillText(val.toLocaleString(), bar.x + 5, bar.y + 4);
                                }
                            });
                        });
                        ctx.restore();
                    }
                }]
            });

            // --- 4. Application Stages (Static Logic, Dynamic Y Axis Labels) ---
            const stagesCtx = document.getElementById('stagesChart').getContext('2d');
            new Chart(stagesCtx, {
                type: 'bar',
                data: {
                    labels: departmentNames, // Updated to use dynamic department names
                    datasets: [
                        { label: 'Applications', data: [2, 1, 6, 1, 0, 0, 0, 0, 0, 0], backgroundColor: '#38b6ff', barThickness: 15 },
                        { label: 'Processing Fee', data: [0, 0, 1, 0, 0, 0, 0, 0, 0, 0], backgroundColor: '#5e54d1', barThickness: 15 },
                        { label: 'Tests Taken', data: [0, 0, 1, 0, 0, 0, 0, 0, 0, 0], backgroundColor: '#00e676', barThickness: 15 },
                        { label: 'Final Admissions', data: [0, 0, 1, 0, 0, 0, 0, 0, 0, 0], backgroundColor: '#ff7043', barThickness: 15 }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                        y: { grid: { display: false }, ticks: { font: { size: 10 } } }
                    }
                }
            });

            // Menu Handlers
            document.querySelectorAll('.action-menu-trigger').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const menu = btn.nextElementSibling;
                    const isOpen = menu.style.display === 'block';
                    document.querySelectorAll('.menu-dropdown').forEach(m => m.style.display = 'none');
                    menu.style.display = isOpen ? 'none' : 'block';
                });
            });
            document.addEventListener('click', () => {
                document.querySelectorAll('.menu-dropdown').forEach(m => m.style.display = 'none');
            });
        });
    </script>
</body>
</html>