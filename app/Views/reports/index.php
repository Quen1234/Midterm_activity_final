<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .analytics-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        height: 100%;
        transition: transform 0.3s ease;
    }
    .analytics-card:hover {
        transform: translateY(-5px);
    }
    .stat-label {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #64748b;
        margin-bottom: 0.5rem;
    }
    .stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        color: #1e293b;
    }
    .chart-container {
        position: relative;
        height: 300px;
        width: 100%;
    }
    .trend-badge {
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 10px;
        font-weight: 700;
    }
    .badge-up { background: #dcfce7; color: #166534; }
    .badge-down { background: #fee2e2; color: #991b1b; }
</style>

<div class="fade-in-up">
    <!-- Header -->
    <div class="d-flex align-items-center mb-4">
        <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
            <i class="bi bi-graph-up-arrow fs-3 text-primary"></i>
        </div>
        <div>
            <h2 class="fw-bold text-dark mb-0">Sales Reports & Analytics</h2>
            <p class="text-muted small mb-0">Deep dive into your store's performance and trends</p>
        </div>
    </div>

    <!-- Overview Row -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="analytics-card">
                <div class="stat-label">Total Potential Sales</div>
                <div class="stat-value">₱ <?= number_format($overview['total_sales'], 2) ?></div>
                <div class="mt-2">
                    <span class="trend-badge badge-up"><i class="bi bi-info-circle me-1"></i> Lifetime Gross</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="analytics-card">
                <div class="stat-label">Actual Revenue Collected</div>
                <div class="stat-value text-success">₱ <?= number_format($overview['total_collected'], 2) ?></div>
                <div class="mt-2">
                    <span class="trend-badge badge-up"><i class="bi bi-cash-coin me-1"></i> Cash in Hand</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="analytics-card">
                <div class="stat-label">Outstanding Credit (Utang)</div>
                <div class="stat-value text-danger">₱ <?= number_format($overview['total_pending'], 2) ?></div>
                <div class="mt-2">
                    <span class="trend-badge badge-down"><i class="bi bi-clock-history me-1"></i> To be Collected</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Daily Sales Chart -->
        <div class="col-lg-8">
            <div class="analytics-card">
                <h5 class="fw-bold mb-4">Daily Sales Performance (Last 15 Days)</h5>
                <div class="chart-container">
                    <canvas id="dailySalesChart"></canvas>
                </div>
            </div>
        </div>
        <!-- Payment Methods -->
        <div class="col-lg-4">
            <div class="analytics-card">
                <h5 class="fw-bold mb-4">Payment Methods</h5>
                <div class="chart-container">
                    <canvas id="paymentMethodChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Monthly Sales Chart -->
        <div class="col-lg-6">
            <div class="analytics-card">
                <h5 class="fw-bold mb-4">Monthly Revenue Growth</h5>
                <div class="chart-container">
                    <canvas id="monthlySalesChart"></canvas>
                </div>
            </div>
        </div>
        <!-- Category Distribution -->
        <div class="col-lg-6">
            <div class="analytics-card">
                <h5 class="fw-bold mb-4">Top Selling Items</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle border-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 small fw-bold">Item Name</th>
                                <th class="border-0 small fw-bold text-end">Quantity Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($top_items)): ?>
                                <?php foreach($top_items as $name => $qty): ?>
                                <tr>
                                    <td class="border-0 fw-semibold text-dark"><?= esc($name) ?></td>
                                    <td class="border-0 text-end">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3"><?= $qty ?> Sold</span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="2" class="text-center py-4 text-muted">No sales data recorded yet</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="analytics-card">
                <h5 class="fw-bold mb-4">Inventory vs Categories</h5>
                <div class="row text-center g-4">
                    <?php foreach($category_dist as $cat): ?>
                    <div class="col-md-3">
                        <div class="p-3 rounded-4 bg-light">
                            <div class="stat-label"><?= esc($cat['category'] ?: 'Uncategorized') ?></div>
                            <div class="h4 fw-bold mb-1"><?= $cat['count'] ?> Products</div>
                            <div class="small text-muted"><?= $cat['total_stock'] ?> units in stock</div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Daily Sales Chart
    const dailyCtx = document.getElementById('dailySalesChart').getContext('2d');
    new Chart(dailyCtx, {
        type: 'line',
        data: {
            labels: <?= json_encode(array_column($daily_trends, 'date')) ?>,
            datasets: [{
                label: 'Revenue (₱)',
                data: <?= json_encode(array_column($daily_trends, 'total')) ?>,
                borderColor: '#4361ee',
                backgroundColor: 'rgba(67, 97, 238, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#4361ee',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { display: false } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Payment Method Chart
    const paymentCtx = document.getElementById('paymentMethodChart').getContext('2d');
    new Chart(paymentCtx, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(array_column($payment_methods, 'payment_method')) ?>,
            datasets: [{
                data: <?= json_encode(array_column($payment_methods, 'count')) ?>,
                backgroundColor: ['#4361ee', '#06ffa5', '#ffb703', '#f72585'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } }
            },
            cutout: '70%'
        }
    });

    // 3. Monthly Sales Chart
    const monthlyCtx = document.getElementById('monthlySalesChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($monthly_trends, 'month')) ?>,
            datasets: [{
                label: 'Monthly Revenue',
                data: <?= json_encode(array_column($monthly_trends, 'total')) ?>,
                backgroundColor: '#4361ee',
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [5, 5] } },
                x: { grid: { display: false } }
            }
        }
    });
});
</script>

<?= $this->endSection() ?>
