<style>
    /* ============================================================
   SALES DASHBOARD — Full Theme-Aware Design
   Light: Clean white with vivid indigo accents
   Dark:  Deep navy with glowing neon accents
   ============================================================ */

    /* ---------- Light Mode Tokens ---------- */
    .sales-dash {
        --dash-bg: var(--bg-secondary, #f8fafc);
        --dash-card: var(--bg-primary, #ffffff);
        --dash-soft: var(--bg-tertiary, #f1f5f9);
        --dash-text: var(--text-primary, #0f172a);
        --dash-muted: var(--text-secondary, #64748b);
        --dash-border: var(--border-color, #e2e8f0);
        --dash-shadow: 0 2px 12px rgba(0, 0, 0, .07);
        --dash-shadow-lg: 0 8px 32px rgba(0, 0, 0, .12);
        --dash-primary: #6366f1;
        --dash-secondary: #8b5cf6;
        --dash-info: #3b82f6;
        --dash-warning: #f59e0b;
        --dash-success: #10b981;
        --dash-danger: #ef4444;
        --dash-glow: rgba(99, 102, 241, 0.12);

        font-family: 'Poppins', sans-serif;
        background-color: var(--dash-bg) !important;
        min-height: calc(100vh - 73px);
    }

    /* ---------- Dark Mode Tokens ---------- */
    [data-bs-theme=dark] .sales-dash {
        --dash-bg: var(--bg-secondary, #0f172a);
        --dash-card: var(--bg-primary, #1e293b);
        --dash-soft: var(--bg-tertiary, #334155);
        --dash-text: var(--text-primary, #f1f5f9);
        --dash-muted: var(--text-secondary, #cbd5e1);
        --dash-border: var(--border-color, rgba(255, 255, 255, 0.08));
        --dash-shadow: 0 2px 12px rgba(0, 0, 0, .25);
        --dash-shadow-lg: 0 8px 32px rgba(0, 0, 0, .40);
        --dash-glow: rgba(99, 102, 241, 0.25);
    }

    .sales-dash .page-content {
        padding: 24px;
    }

    /* ============================================================
   HERO SECTION
   ============================================================ */
    .sales-dash-hero {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 36px 32px;
        margin-bottom: 24px;
        color: #fff;
        box-shadow: var(--dash-shadow-lg);
    }

    /* Light hero: rich indigo-violet gradient */
    .sales-dash-hero {
        background: linear-gradient(135deg, #3730a3 0%, #4f46e5 40%, #7c3aed 100%);
    }

    /* Dark hero: deeper, more electric */
    [data-bs-theme=dark] .sales-dash-hero {
        background: linear-gradient(135deg, #0f0c29 0%, #1a1560 45%, #24243e 100%);
        border: 1px solid rgba(99, 102, 241, 0.2);
    }

    /* Decorative orbs */
    .sales-dash-hero::before {
        content: '';
        position: absolute;
        top: -60px;
        right: -60px;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        pointer-events: none;
    }

    .sales-dash-hero::after {
        content: '';
        position: absolute;
        bottom: -80px;
        right: 120px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(139, 92, 246, 0.2);
        pointer-events: none;
    }

    [data-bs-theme=dark] .sales-dash-hero::after {
        background: rgba(99, 102, 241, 0.3);
    }

    .sales-dash-hero-inner {
        position: relative;
        z-index: 1;
    }

    .sales-dash-title {
        font-size: clamp(22px, 3vw, 34px);
        line-height: 1.15;
        font-weight: 800;
        letter-spacing: -0.03em;
        margin-bottom: 8px;
        text-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
    }

    .sales-dash-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 14px;
        margin-bottom: 16px;
    }

    .sales-dash-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 14px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        font-size: 13px;
        backdrop-filter: blur(12px);
    }

    /* ============================================================
   KPI CARDS
   ============================================================ */
    .sales-dash-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .sales-kpi-card {
        position: relative;
        padding: 20px 18px;
        border-radius: 18px;
        background: var(--dash-card);
        border: 1.5px solid var(--dash-border);
        border-left: 5px solid var(--kpi-color);
        box-shadow: var(--dash-shadow);
        transition: transform 0.22s ease, box-shadow 0.22s ease;
        overflow: hidden;
    }

    /* Subtle gradient shimmer on card */
    .sales-kpi-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--kpi-bg-soft) 0%, transparent 60%);
        opacity: 0.5;
        pointer-events: none;
    }

    [data-bs-theme=dark] .sales-kpi-card::before {
        opacity: 0.3;
    }

    .sales-kpi-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--dash-shadow-lg), 0 0 0 1px var(--kpi-color);
    }

    [data-bs-theme=dark] .sales-kpi-card:hover {
        box-shadow: var(--dash-shadow-lg), 0 0 20px color-mix(in srgb, var(--kpi-color) 30%, transparent);
    }

    .kpi-card-inner {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .kpi-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--dash-muted);
        margin-bottom: 6px;
    }

    .kpi-value {
        font-size: 28px;
        font-weight: 800;
        line-height: 1;
        color: var(--dash-text);
        letter-spacing: -0.02em;
    }

    [data-bs-theme=dark] .kpi-value {
        /* Subtle glow on value in dark mode */
        text-shadow: 0 0 20px var(--kpi-color);
    }

    .kpi-caption {
        font-size: 11px;
        color: var(--dash-muted);
        margin-top: 5px;
        display: block;
    }

    .kpi-icon {
        width: 50px;
        height: 50px;
        display: grid;
        place-items: center;
        border-radius: 14px;
        background: var(--kpi-bg-soft);
        color: var(--kpi-color);
        font-size: 22px;
        flex-shrink: 0;
        transition: transform 0.2s;
    }

    [data-bs-theme=dark] .kpi-icon {
        box-shadow: 0 0 16px color-mix(in srgb, var(--kpi-color) 25%, transparent);
    }

    .sales-kpi-card:hover .kpi-icon {
        transform: scale(1.1) rotate(-4deg);
    }

    /* ============================================================
   PRODUCT PERFORMANCE
   ============================================================ */
    .prod-perf-section {
        background: var(--dash-card);
        border: 1.5px solid var(--dash-border);
        border-radius: 22px;
        padding: 26px;
        box-shadow: var(--dash-shadow);
        margin-bottom: 24px;
    }

    [data-bs-theme=dark] .prod-perf-section {
        background: linear-gradient(160deg, #111827 0%, #0f172a 100%);
    }

    .prod-perf-title {
        font-size: 17px;
        font-weight: 800;
        color: var(--dash-text);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .prod-perf-title::before {
        content: '';
        display: inline-block;
        width: 4px;
        height: 20px;
        background: linear-gradient(180deg, var(--dash-primary), var(--dash-secondary));
        border-radius: 4px;
    }

    .prod-perf-list {
        display: grid;
        gap: 14px;
    }

    .prod-perf-card {
        background: var(--dash-soft);
        border: 1px solid var(--dash-border);
        border-radius: 16px;
        padding: 18px 20px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    [data-bs-theme=dark] .prod-perf-card {
        background: linear-gradient(135deg, #161d2e 0%, #1a2338 100%);
        border-color: #1e293b;
    }

    .prod-perf-card:hover {
        border-color: var(--dash-primary);
        box-shadow: 0 0 0 1px var(--dash-glow), var(--dash-shadow);
    }

    .prod-perf-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
    }

    .prod-perf-name {
        font-size: 14px;
        font-weight: 700;
        color: var(--dash-text);
    }

    .prod-perf-total {
        font-size: 16px;
        font-weight: 800;
        color: var(--dash-primary);
        background: rgba(99, 102, 241, 0.1);
        padding: 3px 12px;
        border-radius: 8px;
        border: 1px solid rgba(99, 102, 241, 0.2);
    }

    [data-bs-theme=dark] .prod-perf-total {
        background: rgba(99, 102, 241, 0.15);
        box-shadow: 0 0 12px rgba(99, 102, 241, 0.2);
    }

    .prod-perf-counts {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .prod-count-box {
        flex: 1;
        background: var(--dash-card);
        border: 1px solid var(--dash-border);
        border-radius: 10px;
        padding: 10px 8px;
        text-align: center;
        transition: border-color 0.2s;
    }

    [data-bs-theme=dark] .prod-count-box {
        background: rgba(255, 255, 255, 0.03);
        border-color: #1e2d45;
    }

    .prod-count-box:hover {
        border-color: var(--dash-primary);
    }

    .prod-count-value {
        font-size: 17px;
        font-weight: 800;
        color: var(--dash-text);
        margin-bottom: 3px;
    }

    .prod-count-label {
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: var(--dash-muted);
    }

    /* ============================================================
   CHARTS ROW
   ============================================================ */
    .sales-dash-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 24px;
    }

    .chart-card,
    .priority-card {
        background: var(--dash-card);
        border: 1.5px solid var(--dash-border);
        border-radius: 22px;
        padding: 24px;
        box-shadow: var(--dash-shadow);
        transition: box-shadow 0.2s;
    }

    [data-bs-theme=dark] .chart-card,
    [data-bs-theme=dark] .priority-card {
        background: linear-gradient(160deg, #111827 0%, #0f172a 100%);
    }

    .chart-card:hover,
    .priority-card:hover {
        box-shadow: var(--dash-shadow-lg);
    }

    .chart-card h4,
    .priority-card h4 {
        font-size: 15px;
        font-weight: 800;
        color: var(--dash-text);
        margin-bottom: 2px;
    }

    .chart-card p,
    .priority-card p {
        font-size: 12px;
        color: var(--dash-muted);
        margin-bottom: 18px;
    }

    .chart-canvas-container {
        position: relative;
        height: 260px;
        width: 100%;
    }

    /* ============================================================
   PRIORITY LEADS
   ============================================================ */
    .priority-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .btn-view-all {
        color: var(--dash-primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 8px;
        background: rgba(99, 102, 241, 0.08);
        border: 1px solid rgba(99, 102, 241, 0.2);
        transition: all 0.2s;
    }

    .btn-view-all:hover {
        background: rgba(99, 102, 241, 0.15);
        color: var(--dash-primary);
        transform: translateX(2px);
    }

    [data-bs-theme=dark] .btn-view-all {
        background: rgba(99, 102, 241, 0.12);
        border-color: rgba(99, 102, 241, 0.3);
    }

    .priority-list {
        display: grid;
        gap: 10px;
    }

    .priority-item-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        border-radius: 14px;
        background: var(--dash-soft);
        border: 1px solid var(--dash-border);
        transition: all 0.2s;
    }

    [data-bs-theme=dark] .priority-item-card {
        background: rgba(255, 255, 255, 0.03);
        border-color: #1e293b;
    }

    .priority-item-card:hover {
        border-color: var(--dash-primary);
        background: rgba(99, 102, 241, 0.04);
        transform: translateX(3px);
    }

    [data-bs-theme=dark] .priority-item-card:hover {
        background: rgba(99, 102, 241, 0.08);
        box-shadow: 0 0 12px rgba(99, 102, 241, 0.15);
    }

    .priority-item-left {
        display: grid;
        gap: 3px;
    }

    .priority-item-name {
        font-weight: 700;
        color: var(--dash-text);
        font-size: 13px;
    }

    .priority-item-sub {
        font-size: 11px;
        color: var(--dash-muted);
    }

    .priority-item-tag {
        font-size: 10px;
        font-weight: 700;
        background: rgba(99, 102, 241, 0.08);
        color: var(--dash-primary);
        padding: 2px 8px;
        border-radius: 6px;
        display: inline-block;
        margin-top: 3px;
        border: 1px solid rgba(99, 102, 241, 0.15);
    }

    [data-bs-theme=dark] .priority-item-tag {
        background: rgba(99, 102, 241, 0.15);
        border-color: rgba(99, 102, 241, 0.3);
    }

    /* Status Pills */
    .status-pill {
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 700;
        border: 1px solid transparent;
    }

    .status-pill.new {
        background: rgba(99, 102, 241, 0.1);
        color: #6366f1;
        border-color: rgba(99, 102, 241, 0.25);
    }

    .status-pill.follow-up {
        background: rgba(245, 158, 11, 0.1);
        color: #f59e0b;
        border-color: rgba(245, 158, 11, 0.25);
    }

    [data-bs-theme=dark] .status-pill.new {
        background: rgba(99, 102, 241, 0.18);
        box-shadow: 0 0 10px rgba(99, 102, 241, 0.2);
    }

    [data-bs-theme=dark] .status-pill.follow-up {
        background: rgba(245, 158, 11, 0.15);
        box-shadow: 0 0 10px rgba(245, 158, 11, 0.15);
    }

    /* ============================================================
   ANIMATIONS
   ============================================================ */
    @keyframes pulse-dot {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: 0.4;
            transform: scale(0.65);
        }
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .sales-dash-hero {
        animation: fadeSlideUp 0.5s ease both;
    }

    .sales-dash-grid {
        animation: fadeSlideUp 0.5s 0.1s ease both;
    }

    .prod-perf-section {
        animation: fadeSlideUp 0.5s 0.18s ease both;
    }

    .sales-dash-row {
        animation: fadeSlideUp 0.5s 0.26s ease both;
    }

    .priority-card {
        animation: fadeSlideUp 0.5s 0.32s ease both;
    }

    /* ============================================================
   RESPONSIVE
   ============================================================ */
    @media (max-width: 1400px) {
        .sales-dash-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 992px) {
        .sales-dash-row {
            grid-template-columns: 1fr;
        }

        .sales-dash-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .sales-dash .page-content {
            padding: 14px;
        }

        .sales-dash-hero {
            padding: 22px 18px;
            border-radius: 18px;
            margin-bottom: 16px;
        }

        .sales-dash-title {
            font-size: 20px;
        }

        .sales-dash-subtitle {
            font-size: 13px;
        }

        .sales-dash-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }

        .sales-kpi-card {
            padding: 14px 12px;
            border-radius: 14px;
        }

        .kpi-value {
            font-size: 24px;
        }

        .kpi-icon {
            width: 42px;
            height: 42px;
            font-size: 19px;
        }

        .prod-perf-section {
            padding: 18px;
            border-radius: 18px;
        }

        .prod-count-box {
            padding: 8px 6px;
        }

        .prod-count-value {
            font-size: 15px;
        }

        .prod-count-label {
            font-size: 9px;
        }

        .chart-card,
        .priority-card {
            padding: 18px;
            border-radius: 18px;
        }

        .chart-canvas-container {
            height: 220px;
        }
    }

    @media (max-width: 480px) {
        .sales-dash .page-content {
            padding: 10px;
        }

        .sales-dash-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 14px;
        }

        .sales-dash-hero {
            padding: 18px 14px;
            border-radius: 16px;
        }

        .sales-dash-title {
            font-size: 17px;
            margin-bottom: 6px;
        }

        .sales-dash-date {
            font-size: 11px;
            padding: 6px 11px;
        }

        .sales-kpi-card {
            padding: 13px 11px;
            border-radius: 13px;
        }

        .kpi-label {
            font-size: 10px;
        }

        .kpi-value {
            font-size: 22px;
        }

        .kpi-caption {
            font-size: 10px;
        }

        .kpi-icon {
            width: 36px;
            height: 36px;
            font-size: 16px;
            border-radius: 10px;
        }

        .prod-perf-section {
            padding: 14px;
            margin-bottom: 14px;
        }

        .prod-perf-title {
            font-size: 14px;
            margin-bottom: 12px;
        }

        .prod-perf-card {
            padding: 13px;
            border-radius: 12px;
        }

        .prod-perf-counts {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 6px;
        }

        .prod-count-box {
            min-width: unset;
            padding: 7px 3px;
            border-radius: 8px;
        }

        .prod-count-value {
            font-size: 13px;
        }

        .prod-count-label {
            font-size: 8px;
        }

        .sales-dash-row {
            gap: 12px;
            margin-bottom: 14px;
        }

        .chart-canvas-container {
            height: 200px;
        }

        .chart-card h4,
        .priority-card h4 {
            font-size: 13px;
        }

        .priority-item-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
            padding: 13px;
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
            <!-- Decorative blobs -->
            <div style="position:absolute;top:-40px;right:-40px;width:220px;height:220px;
                border-radius:50%;background:rgba(255,255,255,0.04);pointer-events:none;z-index:0;"></div>
            <div style="position:absolute;bottom:-60px;right:80px;width:160px;height:160px;
                border-radius:50%;background:rgba(99,102,241,0.15);pointer-events:none;z-index:0;"></div>
            <div style="position:absolute;top:20px;right:160px;width:80px;height:80px;
                border-radius:50%;background:rgba(139,92,246,0.12);pointer-events:none;z-index:0;"></div>

            <div class="sales-dash-hero-inner">
                <div style="position:relative;z-index:1;width:100%;">

                    <!-- Top row: greeting + live badge -->
                    <div style="display:flex;align-items:flex-start;justify-content:space-between;
                        flex-wrap:wrap;gap:10px;margin-bottom:10px;">
                        <div class="sales-dash-title">
                            <?php
                            $hour = date('H');
                            if ($hour < 12) echo 'Good Morning';
                            elseif ($hour < 17) echo 'Good Afternoon';
                            else echo 'Good Evening';
                            ?>, <?= htmlspecialchars($this->session->userdata('user_name') ?? 'Sales Officer') ?> 👋
                        </div>
                        <!-- Live indicator -->
                        <div style="display:inline-flex;align-items:center;gap:6px;
                            background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);
                            padding:5px 12px;border-radius:50px;flex-shrink:0;margin-top:4px;">
                            <span style="width:7px;height:7px;border-radius:50%;background:#10b981;
                                 display:inline-block;animation:pulse-dot 1.5s infinite;"></span>
                            <span style="font-size:11px;font-weight:700;color:#10b981;letter-spacing:0.05em;">LIVE</span>
                        </div>
                    </div>

                    <div class="sales-dash-subtitle">Track your leads and performance across all products.</div>

                    <!-- Bottom row: date + quick stats -->
                    <div style="display:flex;align-items:center;justify-content:space-between;
                        flex-wrap:wrap;gap:12px;margin-top:16px;">
                        <div class="sales-dash-date">
                            <i class="bx bx-calendar"></i>
                            <?= date('l, d M Y') ?>
                        </div>

                        <!-- Quick mini stats -->
                        <div style="display:flex;gap:8px;flex-wrap:wrap;">
                            <div style="display:flex;align-items:center;gap:6px;
                                background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.1);
                                padding:6px 12px;border-radius:12px;backdrop-filter:blur(10px);">
                                <i class="bx bx-envelope" style="color:#818cf8;font-size:14px;"></i>
                                <span style="font-size:12px;font-weight:700;color:#fff;">
                                    <?= (int)($kpis['New'] ?? 0) ?> New
                                </span>
                            </div>
                            <div style="display:flex;align-items:center;gap:6px;
                                background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.1);
                                padding:6px 12px;border-radius:12px;backdrop-filter:blur(10px);">
                                <i class="bx bx-check-circle" style="color:#10b981;font-size:14px;"></i>
                                <span style="font-size:12px;font-weight:700;color:#fff;">
                                    <?= (int)($kpis['Converted'] ?? 0) ?> Converted
                                </span>
                            </div>
                        </div>
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
                            font: {
                                family: 'Poppins',
                                size: 12
                            },
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
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: 'Poppins',
                                size: 10
                            },
                            color: getComputedStyle(document.documentElement).getPropertyValue('--text-primary') || '#0f172a'
                        }
                    },
                    y: {
                        grid: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--border-color') || '#e2e8f0'
                        },
                        ticks: {
                            font: {
                                family: 'Poppins',
                                size: 11
                            },
                            color: getComputedStyle(document.documentElement).getPropertyValue('--text-primary') || '#0f172a',
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>