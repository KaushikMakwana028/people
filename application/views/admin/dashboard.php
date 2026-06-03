<style>
.adm-dash {
    --dash-bg: var(--bg-secondary, #f8fafc);
    --dash-card: var(--bg-primary, #ffffff);
    --dash-soft: var(--bg-tertiary, #f1f5f9);
    --dash-text: var(--text-primary, #0f172a);
    --dash-muted: var(--text-secondary, #64748b);
    --dash-border: var(--border-color, #e2e8f0);
    --dash-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
    --dash-primary: #6366f1;
    --dash-secondary: #8b5cf6;
    --dash-info: #06b6d4;
    --dash-warning: #f59e0b;
    --dash-success: #10b981;
    font-family: 'Poppins', sans-serif;
    background: var(--dash-bg);
    min-height: calc(100vh - 73px);
}

[data-bs-theme=dark] .adm-dash {
    --dash-shadow: 0 18px 45px rgba(0, 0, 0, 0.25);
}

.adm-dash .page-content {
    padding: 24px;
}

.adm-dash-hero {
    position: relative;
    overflow: hidden;
    border-radius: 24px;
    padding: 34px 32px;
    margin-bottom: 24px;
    background: linear-gradient(135deg, #1e1e2f 0%, #2d2d44 48%, #1a1a3e 100%);
    color: #fff;
    box-shadow: var(--dash-shadow);
}

.adm-dash-hero::before,
.adm-dash-hero::after {
    content: '';
    position: absolute;
    border-radius: 999px;
    pointer-events: none;
}

.adm-dash-hero::before {
    width: 320px;
    height: 320px;
    right: -80px;
    top: -130px;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.25), transparent 65%);
}

.adm-dash-hero::after {
    width: 220px;
    height: 220px;
    left: 28%;
    bottom: -110px;
    background: radial-gradient(circle, rgba(16, 185, 129, 0.16), transparent 70%);
}

.adm-dash-hero-inner {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
}

.adm-dash-title {
    font-size: clamp(24px, 3vw, 34px);
    line-height: 1.15;
    font-weight: 800;
    letter-spacing: -0.04em;
    margin-bottom: 8px;
}

.adm-dash-subtitle {
    color: rgba(255, 255, 255, 0.62);
    font-size: 15px;
    margin-bottom: 16px;
}

.adm-dash-date {
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

.adm-dash-hero-icon {
    width: 86px;
    height: 86px;
    display: grid;
    place-items: center;
    border-radius: 24px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 44px;
}

.adm-dash-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 24px;
}

.adm-dash-card {
    position: relative;
    overflow: hidden;
    min-height: 132px;
    padding: 22px;
    border-radius: 18px;
    background: var(--dash-card);
    border: 1px solid var(--dash-border);
    box-shadow: var(--dash-shadow);
}

.adm-dash-card::before {
    content: '';
    position: absolute;
    inset: 0 auto 0 0;
    width: 5px;
    background: var(--card-accent);
}

.adm-dash-card-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
}

.adm-dash-label {
    color: var(--dash-muted);
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 8px;
}

.adm-dash-value {
    color: var(--card-accent);
    font-size: 32px;
    line-height: 1;
    font-weight: 800;
    margin-bottom: 8px;
}

.adm-dash-caption {
    color: var(--dash-text);
    font-size: 14px;
    font-weight: 500;
}

.adm-dash-icon {
    width: 58px;
    height: 58px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    color: #fff;
    font-size: 27px;
    background: var(--card-gradient);
}

.adm-dash-panel {
    display: grid;
    grid-template-columns: minmax(0, 1.4fr) minmax(280px, 0.6fr);
    gap: 20px;
}

.adm-dash-section {
    padding: 24px;
    border-radius: 20px;
    background: var(--dash-card);
    border: 1px solid var(--dash-border);
    box-shadow: var(--dash-shadow);
}

.adm-dash-section h3 {
    color: var(--dash-text);
    font-size: 20px;
    font-weight: 750;
    margin-bottom: 6px;
}

.adm-dash-section p {
    color: var(--dash-muted);
    margin-bottom: 0;
}

.adm-dash-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 20px;
}

.adm-dash-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 16px;
    border-radius: 14px;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    background: linear-gradient(135deg, var(--dash-primary), var(--dash-secondary));
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.adm-dash-action:hover {
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 12px 22px rgba(99, 102, 241, 0.24);
}

.adm-dash-mini-list {
    display: grid;
    gap: 12px;
    margin-top: 18px;
}

.adm-dash-mini-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 13px 14px;
    border-radius: 14px;
    background: var(--dash-soft);
    color: var(--dash-text);
}

.adm-dash-mini-item span {
    color: var(--dash-muted);
    font-size: 13px;
}

@media (max-width: 1199px) {
    .adm-dash-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .adm-dash-panel {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 767px) {
    .adm-dash .page-content {
        padding: 16px;
    }

    .adm-dash-hero {
        padding: 26px 22px;
        border-radius: 20px;
    }

    .adm-dash-hero-inner {
        align-items: flex-start;
    }

    .adm-dash-hero-icon {
        display: none;
    }

    .adm-dash-grid {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .adm-dash-card {
        min-height: auto;
    }
}
</style>

<div class="page-wrapper adm-dash">
    <div class="page-content">
        <section class="adm-dash-hero">
            <div class="adm-dash-hero-inner">
                <div>
                    <div class="adm-dash-title">
                        <?php
                            $hour = date('H');
                            if ($hour < 12) echo 'Good Morning';
                            elseif ($hour < 17) echo 'Good Afternoon';
                            else echo 'Good Evening';
                        ?>, Admin 👋
                    </div>
                    <div class="adm-dash-subtitle">Here's what's happening with your team today.</div>
                    <div class="adm-dash-date">
                        <i class="bx bx-calendar"></i>
                        <?= date('l, d M Y') ?>
                    </div>
                </div>
                <div class="adm-dash-hero-icon">🏢</div>
            </div>
        </section>

        <section class="adm-dash-grid">
            <div class="adm-dash-card" style="--card-accent: var(--dash-info); --card-gradient: linear-gradient(135deg, #06b6d4, #6366f1);">
                <div class="adm-dash-card-row">
                    <div>
                        <div class="adm-dash-label">Total Employees</div>
                        <div class="adm-dash-value"><?= (int) ($total_employees ?? 0) ?></div>
                        <div class="adm-dash-caption">Active employees</div>
                    </div>
                    <div class="adm-dash-icon"><i class="bx bx-group"></i></div>
                </div>
            </div>

            <div class="adm-dash-card" style="--card-accent: var(--dash-warning); --card-gradient: linear-gradient(135deg, #f59e0b, #fb923c);">
                <div class="adm-dash-card-row">
                    <div>
                        <div class="adm-dash-label">Holidays This Month</div>
                        <div class="adm-dash-value"><?= (int) ($total_holidays_month ?? 0) ?></div>
                        <div class="adm-dash-caption">Monthly holidays</div>
                    </div>
                    <div class="adm-dash-icon"><i class="bx bx-calendar-event"></i></div>
                </div>
            </div>

            <div class="adm-dash-card" style="--card-accent: #0ea5e9; --card-gradient: linear-gradient(135deg, #0ea5e9, #22c55e);">
                <div class="adm-dash-card-row">
                    <div>
                        <div class="adm-dash-label">Announcements</div>
                        <div class="adm-dash-value"><?= (int) ($total_announcements_month ?? 0) ?></div>
                        <div class="adm-dash-caption">This month</div>
                    </div>
                    <div class="adm-dash-icon"><i class="bx bx-megaphone"></i></div>
                </div>
            </div>
        </section>

        <section class="adm-dash-panel">
            <div class="adm-dash-section">
                <h3>Dashboard Overview</h3>
                <p>Quick team metrics from your database, with manual work and break tools moved to a dedicated page.</p>
                <div class="adm-dash-actions">
                    <a class="adm-dash-action" href="<?= base_url('admin/manual-logs') ?>">
                        <i class="bx bx-time-five"></i>
                        Manual Logs
                    </a>
                    <a class="adm-dash-action" href="<?= base_url('admin/employee/add') ?>">
                        <i class="bx bx-user-plus"></i>
                        Add Employee
                    </a>
                    <a class="adm-dash-action" href="<?= base_url('admin/announcements/add') ?>">
                        <i class="bx bx-bell-plus"></i>
                        Add Announcement
                    </a>
                </div>
            </div>

            <div class="adm-dash-section">
                <h3>Today</h3>
                <p>Live attendance snapshot.</p>
                <div class="adm-dash-mini-list">
                    <div class="adm-dash-mini-item">
                        <strong>Present</strong>
                        <span><?= (int) ($present_count ?? 0) ?> employees</span>
                    </div>
                    <div class="adm-dash-mini-item">
                        <strong>On Leave</strong>
                        <span><?= (int) ($leave_count ?? 0) ?> approved</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="overlay mobile-toggle-icon"></div>
