<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<style>
    :root {
        --glass-bg: rgba(255, 255, 255, 0.9);
    }

    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
    }

    /* Metric Cards Styling */
    .stat-card {
        background: white;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.7);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.04), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08);
    }

    /* Icon Backgrounds */
    .icon-box {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.25rem;
    }

    .bg-soft-blue { background: #eff6ff; color: #3b82f6; }
    .bg-soft-orange { background: #fff7ed; color: #f97316; }
    .bg-soft-red { background: #fef2f2; color: #ef4444; }
    .bg-soft-green { background: #f0fdf4; color: #22c55e; }

    /* Typography */
    .stat-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.25rem;
    }

    .stat-trend {
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Decorative Circle */
    .stat-card::after {
        content: "";
        position: absolute;
        top: -20px;
        right: -20px;
        width: 80px;
        height: 80px;
        background: currentColor;
        opacity: 0.03;
        border-radius: 50%;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4 px-4">
    
    <div class="mb-5">
        <h2 class="fw-bold text-dark mb-1 tracking-tight">Dashboard Overview</h2>
        <p class="text-muted">Welcome back, <span class="text-primary fw-semibold">Admin</span>. Here is what's happening today.</p>
    </div>

    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="stat-card border-bottom border-primary border-4">
                <div class="icon-box bg-soft-blue">
                    <i class="fas fa-wallet"></i>
                </div>
                <span class="stat-label">Today's Revenue</span>
                <div class="stat-value">₱ <?= number_format($today_revenue, 2); ?></div>
                <div class="stat-trend text-success">
                    <i class="fas fa-arrow-up me-1"></i> Live <span class="text-muted fw-normal">from transactions</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card border-bottom border-warning border-4">
                <div class="icon-box bg-soft-orange">
                    <i class="fas fa-book"></i>
                </div>
                <span class="stat-label">Active Listahan (Debt)</span>
                <div class="stat-value"><?= $active_utang_count; ?></div>
                <div class="stat-trend text-muted">
                    <span class="fw-bold text-warning">Pending Collections</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card border-bottom border-danger border-4">
                <div class="icon-box bg-soft-red">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <span class="stat-label">Low Stock Alerts</span>
                <div class="stat-value"><?= $low_stock_count; ?></div>
                <div class="stat-trend text-danger">
                    <i class="fas fa-sync-alt me-1"></i> <a href="<?= base_url('stock') ?>" class="text-danger text-decoration-none">Check Inventory</a>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0"><i class="fas fa-chart-line me-2 text-primary"></i>Sales Analytics</h6>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-outline-primary active" id="btnDaily">Daily</button>
                        <button type="button" class="btn btn-outline-primary" id="btnWeekly">Weekly</button>
                        <button type="button" class="btn btn-outline-primary" id="btnMonthly">Monthly</button>
                    </div>
                </div>
                <div style="height: 300px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                <h6 class="fw-bold mb-3 border-bottom pb-2">Quick Actions</h6>
                <div class="d-grid gap-2">
                    <a href="<?= base_url('pos') ?>" class="btn btn-primary text-start p-3 rounded-3 shadow-sm border-0">
                        <i class="fas fa-cash-register me-2"></i> Open POS
                    </a>
                    <a href="<?= base_url('inventory/add') ?>" class="btn btn-light text-start p-3 rounded-3 border">
                        <i class="fas fa-plus me-2"></i> New Product
                    </a>
                    <a href="<?= base_url('listahan') ?>" class="btn btn-light text-start p-3 rounded-3 border">
                        <i class="fas fa-book me-2"></i> View Listahan
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const dailyData = <?= json_encode($daily_sales) ?>;
    const weeklyData = <?= json_encode($weekly_sales) ?>;
    const monthlyData = <?= json_encode($monthly_sales) ?>;

    let currentChart = null;

    function initChart(labels, data, title) {
        const ctx = document.getElementById('salesChart').getContext('2d');
        
        if (currentChart) {
            currentChart.destroy();
        }

        currentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sales (₱)',
                    data: data,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#3b82f6',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                return 'Revenue: ₱' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    function showDaily() {
        const labels = dailyData.map(d => {
            const date = new Date(d.date);
            return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        });
        const data = dailyData.map(d => d.total);
        initChart(labels, data, 'Daily Sales');
        setActiveButton('btnDaily');
    }

    function showWeekly() {
        const labels = weeklyData.map(d => 'Week ' + d.week.toString().slice(-2));
        const data = weeklyData.map(d => d.total);
        initChart(labels, data, 'Weekly Sales');
        setActiveButton('btnWeekly');
    }

    function showMonthly() {
        const labels = monthlyData.map(d => {
            const date = new Date(d.month + '-01');
            return date.toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
        });
        const data = monthlyData.map(d => d.total);
        initChart(labels, data, 'Monthly Sales');
        setActiveButton('btnMonthly');
    }

    function setActiveButton(id) {
        document.querySelectorAll('.btn-group .btn').forEach(btn => btn.classList.remove('active'));
        document.getElementById(id).classList.add('active');
    }

    document.getElementById('btnDaily').addEventListener('click', showDaily);
    document.getElementById('btnWeekly').addEventListener('click', showWeekly);
    document.getElementById('btnMonthly').addEventListener('click', showMonthly);

    // Initial load
    showDaily();
</script>
<?= $this->endSection() ?>