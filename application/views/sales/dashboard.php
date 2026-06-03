<style>
.sales-dash {
    --dash-bg: var(--bg-secondary, #f8fafc);
    --dash-card: var(--bg-primary, #ffffff);
    --dash-soft: var(--bg-tertiary, #f1f5f9);
    --dash-text: var(--text-primary, #0f172a);
    --dash-muted: var(--text-secondary, #64748b);
    --dash-border: var(--border-color, #e2e8f0);
    --dash-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
    --dash-primary: #6366f1;
    --dash-secondary: #8b5cf6;
    --dash-info: #3b82f6;
    --dash-warning: #f59e0b;
    --dash-success: #10b981;
    --dash-danger: #ef4444;
    font-family: 'Poppins', sans-serif;
    background: var(--dash-bg);
    min-height: calc(100vh - 73px);
}

[data-bs-theme=dark] .sales-dash {
    --dash-shadow: 0 18px 45px rgba(0, 0, 0, 0.25);
}

.sales-dash .page-content {
    padding: 24px;
}

/* Hero Section */
.sales-dash-hero {
    position: relative;
    overflow: hidden;
    border-radius: 24px;
    padding: 34px 32px;
    margin-bottom: 24px;
    background: linear-gradient(135deg, #1e1e2f 0%, #2d2d44 48%, #1a1a3e 100%);
    color: #fff;
    box-shadow: var(--dash-shadow);
}

.sales-dash-hero-inner {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
}

.sales-dash-title {
    font-size: clamp(24px, 3vw, 34px);
    line-height: 1.15;
    font-weight: 800;
    letter-spacing: -0.04em;
    margin-bottom: 8px;
}

.sales-dash-subtitle {
    color: rgba(255, 255, 255, 0.62);
    font-size: 15px;
    margin-bottom: 16px;
}

.sales-dash-date {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 16px;
    border-radius: 14px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    background: rgba(255, 255, 255, 0.08);
    color: rgba(255, 255, 255, 0.78);
    font-weight: 600;
    backdrop-filter: blur(10px);
}

/* KPI Cards Grid */
.sales-dash-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 16px;
    margin-bottom: 24px;
}

.sales-kpi-card {
    position: relative;
    padding: 20px;
    border-radius: 16px;
    background: var(--dash-card);
    border: 1.5px solid var(--dash-border);
    box-shadow: var(--dash-shadow);
    transition: transform 0.2s ease, border-color 0.2s ease;
    border-left: 5px solid var(--kpi-color);
}

.sales-kpi-card:hover {
    transform: translateY(-2px);
    border-color: var(--kpi-color);
}

.kpi-card-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.kpi-icon {
    width: 48px;
    height: 48px;
    display: grid;
    place-items: center;
    border-radius: 12px;
    background: var(--kpi-bg-soft);
    color: var(--kpi-color);
    font-size: 22px;
}

.kpi-info {
    text-align: right;
}

.kpi-label {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--dash-muted);
    margin-bottom: 4px;
}

.kpi-value {
    font-size: 26px;
    font-weight: 800;
    line-height: 1;
    color: var(--dash-text);
}

.kpi-caption {
    font-size: 11px;
    color: var(--dash-muted);
    margin-top: 4px;
    display: block;
}

/* Product Performance */
.prod-perf-section {
    background: var(--dash-card);
    border: 1.5px solid var(--dash-border);
    border-radius: 20px;
    padding: 24px;
    box-shadow: var(--dash-shadow);
    margin-bottom: 24px;
}

.prod-perf-title {
    font-size: 18px;
    font-weight: 800;
    color: var(--dash-text);
    margin-bottom: 20px;
}

.prod-perf-list {
    display: grid;
    gap: 16px;
}

.prod-perf-card {
    background: var(--dash-soft);
    border: 1px solid var(--dash-border);
    border-radius: 16px;
    padding: 20px;
}

.prod-perf-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.prod-perf-name {
    font-size: 15px;
    font-weight: 700;
    color: var(--dash-text);
}

.prod-perf-total {
    font-size: 18px;
    font-weight: 800;
    color: var(--dash-primary);
    background: rgba(99, 102, 241, 0.1);
    padding: 4px 12px;
    border-radius: 8px;
}

.prod-perf-counts {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.prod-count-box {
    flex: 1;
    min-width: 100px;
    background: var(--dash-card);
    border: 1px solid var(--dash-border);
    border-radius: 12px;
    padding: 12px;
    text-align: center;
}

.prod-count-value {
    font-size: 18px;
    font-weight: 800;
    color: var(--dash-text);
    margin-bottom: 4px;
}

.prod-count-label {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--dash-muted);
}

/* Charts & Priority Section */
.sales-dash-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 24px;
}

.chart-card, .priority-card {
    background: var(--dash-card);
    border: 1.5px solid var(--dash-border);
    border-radius: 20px;
    padding: 24px;
    box-shadow: var(--dash-shadow);
}

.chart-card h4, .priority-card h4 {
    font-size: 16px;
    font-weight: 800;
    color: var(--dash-text);
    margin-bottom: 4px;
}

.chart-card p, .priority-card p {
    font-size: 12px;
    color: var(--dash-muted);
    margin-bottom: 20px;
}

.chart-canvas-container {
    position: relative;
    height: 260px;
    width: 100%;
}

/* Priority Leads */
.priority-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.btn-view-all {
    color: var(--dash-primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    transition: opacity 0.2s;
}

.btn-view-all:hover {
    opacity: 0.8;
    text-decoration: underline;
}

.priority-list {
    display: grid;
    gap: 12px;
}

.priority-item-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    border-radius: 14px;
    background: var(--dash-soft);
    border: 1px solid var(--dash-border);
}

.priority-item-left {
    display: grid;
    gap: 4px;
}

.priority-item-name {
    font-weight: 700;
    color: var(--dash-text);
    font-size: 14px;
}

.priority-item-sub {
    font-size: 12px;
    color: var(--dash-muted);
}

.priority-item-tag {
    font-size: 11px;
    font-weight: 600;
    background: rgba(99, 102, 241, 0.08);
    color: var(--dash-primary);
    padding: 2px 8px;
    border-radius: 6px;
    display: inline-block;
    margin-top: 4px;
}

.status-pill {
    padding: 4px 10px;
    border-radius: 50px;
    font-size: 11px;
    font-weight: 700;
}

.status-pill.new {
    background: rgba(99, 102, 241, 0.13);
    color: #6366f1;
}

.status-pill.follow-up {
    background: rgba(245, 158, 11, 0.13);
    color: #f59e0b;
}

@media (max-width: 1400px) {
    .sales-dash-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 992px) {
    .sales-dash-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .sales-dash-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .prod-count-box {
        min-width: 80px;
        padding: 8px;
    }

    .prod-count-value {
        font-size: 16px;
    }

    .sales-dash-hero {
        padding: 24px 20px;
    }
}

@media (max-width: 480px) {
    .sales-dash-grid {
        grid-template-columns: 1fr;
    }

    .prod-perf-counts {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }

    .priority-item-card {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .status-pill {
        align-self: flex-end;
    }
}
</style>

<div class="page-wrapper sales-dash">
    <div class="page-content">
        <!-- Hero Section -->
        <section class="sales-dash-hero">
            <div class="sales-dash-hero-inner">
                <div>
                    <div class="sales-dash-title">
                        <?php
                            $hour = date('H');
                            if ($hour < 12) echo 'Good Morning';
                            elseif ($hour < 17) echo 'Good Afternoon';
                            else echo 'Good Evening';
                        ?>, <?= htmlspecialchars($this->session->userdata('user_name') ?? 'Sales Officer') ?> 👋
                    </div>
                    <div class="sales-dash-subtitle">Track your leads and performance across all products.</div>
                    <div class="sales-dash-date">
                        <i class="bx bx-calendar"></i>
                        <?= date('l, d M Y') ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- KPI Grid -->
        <section class="sales-dash-grid">
            <!-- New Leads -->
            <div class="sales-kpi-card" style="--kpi-color: var(--dash-primary); --kpi-bg-soft: rgba(99, 102, 241, 0.1);">
                <div class="kpi-card-inner">
                    <div>
                        <div class="kpi-label">New Leads</div>
                        <div class="kpi-value"><?= (int)($kpis['New'] ?? 0) ?></div>
                        <span class="kpi-caption">Needs attention</span>
                    </div>
                    <div class="kpi-icon"><i class="bx bx-envelope"></i></div>
                </div>
            </div>

            <!-- Contacted -->
            <div class="sales-kpi-card" style="--kpi-color: var(--dash-info); --kpi-bg-soft: rgba(59, 130, 246, 0.1);">
                <div class="kpi-card-inner">
                    <div>
                        <div class="kpi-label">Contacted</div>
                        <div class="kpi-value"><?= (int)($kpis['Contacted'] ?? 0) ?></div>
                        <span class="kpi-caption">First contact made</span>
                    </div>
                    <div class="kpi-icon"><i class="bx bx-phone"></i></div>
                </div>
            </div>

            <!-- Follow Up -->
            <div class="sales-kpi-card" style="--kpi-color: var(--dash-warning); --kpi-bg-soft: rgba(245, 158, 11, 0.1);">
                <div class="kpi-card-inner">
                    <div>
                        <div class="kpi-label">Follow Up</div>
                        <div class="kpi-value"><?= (int)($kpis['Follow Up'] ?? 0) ?></div>
                        <span class="kpi-caption">In progress</span>
                    </div>
                    <div class="kpi-icon"><i class="bx bx-time-five"></i></div>
                </div>
            </div>

            <!-- Converted -->
            <div class="sales-kpi-card" style="--kpi-color: var(--dash-success); --kpi-bg-soft: rgba(16, 185, 129, 0.1);">
                <div class="kpi-card-inner">
                    <div>
                        <div class="kpi-label">Converted</div>
                        <div class="kpi-value"><?= (int)($kpis['Converted'] ?? 0) ?></div>
                        <span class="kpi-caption">Success!</span>
                    </div>
                    <div class="kpi-icon"><i class="bx bx-check-circle"></i></div>
                </div>
            </div>

            <!-- Not Interested -->
            <div class="sales-kpi-card" style="--kpi-color: var(--dash-danger); --kpi-bg-soft: rgba(239, 68, 68, 0.1);">
                <div class="kpi-card-inner">
                    <div>
                        <div class="kpi-label">Not Interested</div>
                        <div class="kpi-value"><?= (int)($kpis['Not Interested'] ?? 0) ?></div>
                        <span class="kpi-caption">Closed</span>
                    </div>
                    <div class="kpi-icon"><i class="bx bx-x-circle"></i></div>
                </div>
            </div>

            <!-- Total Leads -->
            <div class="sales-kpi-card" style="--kpi-color: #4f46e5; --kpi-bg-soft: rgba(79, 70, 229, 0.1);">
                <div class="kpi-card-inner">
                    <div>
                        <div class="kpi-label">Total Leads</div>
                        <div class="kpi-value"><?= (int)($total_leads ?? 0) ?></div>
                        <span class="kpi-caption">All time</span>
                    </div>
                    <div class="kpi-icon"><i class="bx bx-layer"></i></div>
                </div>
            </div>
        </section>

        <!-- Products Performance -->
        <section class="prod-perf-section">
            <h3 class="prod-perf-title">Products Performance</h3>
            <div class="prod-perf-list">
                <?php if (empty($product_performance)): ?>
                    <div class="text-center py-4 text-muted">No products found.</div>
                <?php else: ?>
                    <?php foreach ($product_performance as $pp): ?>
                        <div class="prod-perf-card">
                            <div class="prod-perf-header">
                                <span class="prod-perf-name"><?= htmlspecialchars($pp['name']) ?></span>
                                <span class="prod-perf-total"><?= (int)$pp['total'] ?></span>
                            </div>
                            <div class="prod-perf-counts">
                                <div class="prod-count-box">
                                    <div class="prod-count-value"><?= (int)($pp['kpis']['New'] ?? 0) ?></div>
                                    <div class="prod-count-label">New</div>
                                </div>
                                <div class="prod-count-box">
                                    <div class="prod-count-value"><?= (int)($pp['kpis']['Contacted'] ?? 0) ?></div>
                                    <div class="prod-count-label">Contacted</div>
                                </div>
                                <div class="prod-count-box">
                                    <div class="prod-count-value"><?= (int)($pp['kpis']['Follow Up'] ?? 0) ?></div>
                                    <div class="prod-count-label">Follow Up</div>
                                </div>
                                <div class="prod-count-box">
                                    <div class="prod-count-value"><?= (int)($pp['kpis']['Converted'] ?? 0) ?></div>
                                    <div class="prod-count-label">Converted</div>
                                </div>
                                <div class="prod-count-box">
                                    <div class="prod-count-value"><?= (int)($pp['kpis']['Not Interested'] ?? 0) ?></div>
                                    <div class="prod-count-label">Not Int.</div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <!-- Charts Row -->
        <div class="sales-dash-row">
            <!-- Donut Chart -->
            <div class="chart-card">
                <h4>Lead Status Distribution</h4>
                <p>Overall status breakdown</p>
                <div class="chart-canvas-container">
                    <canvas id="donutChart"></canvas>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="chart-card">
                <h4>Product-wise Leads</h4>
                <p>Leads by product</p>
                <div class="chart-canvas-container">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Priority Leads -->
        <section class="priority-card">
            <div class="priority-header">
                <div>
                    <h4>Priority Leads (New &amp; Follow Up)</h4>
                    <p>Leads requiring immediate attention</p>
                </div>
                <a href="<?= base_url('sales/leads') ?>" class="btn-view-all">View All Leads</a>
            </div>
            <div class="priority-list">
                <?php if (empty($priority_leads)): ?>
                    <div class="text-center py-4 text-muted">No high priority leads at this time.</div>
                <?php else: ?>
                    <?php foreach ($priority_leads as $pl): ?>
                        <div class="priority-item-card">
                            <div class="priority-item-left">
                                <span class="priority-item-name"><?= htmlspecialchars($pl->name) ?></span>
                                <span class="priority-item-sub">
                                    <?= htmlspecialchars($pl->mobile) ?> &bull; <?= htmlspecialchars($pl->city) ?>
                                </span>
                                <div>
                                    <span class="priority-item-tag"><?= htmlspecialchars($pl->product_name ?: 'Unknown Product') ?></span>
                                </div>
                            </div>
                            <div>
                                <span class="status-pill <?= strtolower(str_replace(' ', '-', $pl->status)) ?>">
                                    <?= htmlspecialchars($pl->status) ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

    </div>
</div>

<div class="overlay mobile-toggle-icon"></div>

<!-- Chart.js and rendering scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Donut Chart - Lead Status Distribution
    const donutCtx = document.getElementById('donutChart').getContext('2d');
    const donutData = {
        labels: ['New', 'Contacted', 'Follow Up', 'Converted', 'Not Interested'],
        datasets: [{
            data: [
                <?= (int)($kpis['New'] ?? 0) ?>,
                <?= (int)($kpis['Contacted'] ?? 0) ?>,
                <?= (int)($kpis['Follow Up'] ?? 0) ?>,
                <?= (int)($kpis['Converted'] ?? 0) ?>,
                <?= (int)($kpis['Not Interested'] ?? 0) ?>
            ],
            backgroundColor: ['#6366f1', '#3b82f6', '#f59e0b', '#10b981', '#ef4444'],
            borderWidth: 2,
            borderColor: getComputedStyle(document.documentElement).getPropertyValue('--bg-primary') || '#ffffff'
        }]
    };
    new Chart(donutCtx, {
        type: 'doughnut',
        data: donutData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        font: { family: 'Poppins', size: 12 },
                        color: getComputedStyle(document.documentElement).getPropertyValue('--text-primary') || '#0f172a'
                    }
                }
            },
            cutout: '65%'
        }
    });

    // 2. Bar Chart - Product-wise Leads
    const barCtx = document.getElementById('barChart').getContext('2d');
    const productNames = [];
    const productTotals = [];
    <?php foreach ($product_performance as $pp): ?>
        productNames.push(<?= json_encode($pp['name']) ?>);
        productTotals.push(<?= (int)$pp['total'] ?>);
    <?php endforeach; ?>

    const barData = {
        labels: productNames,
        datasets: [{
            label: 'Total Leads',
            data: productTotals,
            backgroundColor: ['#6366f1', '#8b5cf6', '#10b981', '#f59e0b', '#06b6d4', '#ef4444'],
            borderRadius: 8,
            borderSkipped: false
        }]
    };
    new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        font: { family: 'Poppins', size: 10 },
                        color: getComputedStyle(document.documentElement).getPropertyValue('--text-primary') || '#0f172a'
                    }
                },
                y: {
                    grid: {
                        color: getComputedStyle(document.documentElement).getPropertyValue('--border-color') || '#e2e8f0'
                    },
                    ticks: {
                        font: { family: 'Poppins', size: 11 },
                        color: getComputedStyle(document.documentElement).getPropertyValue('--text-primary') || '#0f172a',
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
