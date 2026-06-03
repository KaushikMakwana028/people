<div class="page-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

                :root {
                    --primary: #6366f1;
                    --primary-hover: #4f46e5;
                    --primary-light: rgba(99, 102, 241, 0.08);
                    --primary-glow: rgba(99, 102, 241, 0.25);
                    --accent: #8b5cf6;
                    --success: #22c55e;
                    --success-light: rgba(34, 197, 94, 0.1);
                    --warning: #f59e0b;
                    --warning-light: rgba(245, 158, 11, 0.1);
                    --danger: #ef4444;
                    --danger-light: rgba(239, 68, 68, 0.1);
                    --info: #3b82f6;
                    --info-light: rgba(59, 130, 246, 0.1);
                    --gray-50: var(--bg-secondary);
                    --gray-100: var(--bg-tertiary);
                    --gray-200: var(--border-color);
                    --gray-300: var(--text-tertiary);
                    --gray-400: var(--text-tertiary);
                    --gray-500: var(--text-secondary);
                    --gray-600: var(--text-secondary);
                    --gray-700: var(--text-primary);
                    --gray-800: var(--text-primary);
                    --gray-900: var(--text-primary);
                    --white: var(--bg-primary);
                    --radius: 10px;
                    --radius-lg: 14px;
                    --radius-xl: 18px;
                    --shadow-xs: 0 1px 2px rgba(0, 0, 0, 0.05);
                    --shadow-sm: 0 2px 8px var(--shadow);
                    --shadow-md: 0 8px 24px var(--shadow-lg);
                    --shadow-lg: 0 16px 48px var(--shadow-lg);
                    --shadow-glow: 0 8px 32px var(--primary-glow);
                }

                * {
                    box-sizing: border-box;
                }

                .ee-wrapper {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 12px 0 60px;
                    font-family: 'Inter', -apple-system, sans-serif;
                    -webkit-font-smoothing: antialiased;
                }

                /* Breadcrumb */
                .ee-breadcrumb {
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    margin-bottom: 22px;
                    font-size: 0.8rem;
                    color: var(--gray-400);
                }

                .ee-breadcrumb a {
                    color: var(--gray-500);
                    text-decoration: none;
                    font-weight: 500;
                    transition: color 0.2s;
                    display: inline-flex;
                    align-items: center;
                    gap: 4px;
                }

                .ee-breadcrumb a:hover {
                    color: var(--primary);
                }

                .ee-breadcrumb .bc-sep {
                    font-size: 0.65rem;
                    color: var(--gray-300);
                }

                .ee-breadcrumb .bc-current {
                    color: var(--gray-700);
                    font-weight: 600;
                }

                /* Header */
                .ee-header {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-bottom: 24px;
                    gap: 16px;
                    flex-wrap: wrap;
                }

                .ee-header-left {
                    display: flex;
                    align-items: center;
                    gap: 14px;
                }

                .ee-header-icon {
                    width: 52px;
                    height: 52px;
                    background: linear-gradient(135deg, var(--primary), var(--accent));
                    border-radius: 14px;
                    display: grid;
                    place-items: center;
                    color: var(--white);
                    font-size: 1.5rem;
                    box-shadow: var(--shadow-glow);
                    flex-shrink: 0;
                }

                .ee-header h3 {
                    font-size: 1.35rem;
                    font-weight: 800;
                    color: var(--gray-900);
                    margin: 0 0 3px;
                    letter-spacing: -0.3px;
                }

                .ee-header p {
                    font-size: 0.82rem;
                    color: var(--gray-500);
                    margin: 0;
                }

                .ee-back-btn {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    padding: 9px 18px;
                    border: 1.5px solid var(--gray-200);
                    border-radius: var(--radius);
                    background: var(--white);
                    color: var(--gray-600);
                    font-size: 0.82rem;
                    font-weight: 600;
                    text-decoration: none;
                    transition: all 0.2s;
                    font-family: inherit;
                }

                .ee-back-btn:hover {
                    border-color: var(--primary);
                    color: var(--primary);
                    background: var(--primary-light);
                }

                .ee-back-btn i {
                    font-size: 1.05rem;
                }

                /* Main Card */
                .ee-card {
                    background: var(--white);
                    border: 1px solid var(--gray-200);
                    border-radius: var(--radius-xl);
                    box-shadow: var(--shadow-sm);
                    overflow: hidden;
                }

                /* Tabs */
                .ee-tabs {
                    display: flex;
                    background: var(--gray-50);
                    border-bottom: 1px solid var(--gray-200);
                }

                .ee-tab {
                    flex: 1;
                    padding: 16px 20px;
                    font-size: 0.82rem;
                    font-weight: 600;
                    color: var(--gray-400);
                    background: none;
                    border: none;
                    border-bottom: 2.5px solid transparent;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                    transition: all 0.25s;
                    font-family: inherit;
                    position: relative;
                }

                .ee-tab:hover {
                    color: var(--gray-600);
                    background: var(--gray-100);
                }

                .ee-tab.active {
                    color: var(--primary);
                    background: var(--white);
                    border-bottom-color: var(--primary);
                }

                .ee-tab i {
                    font-size: 1.1rem;
                }

                .ee-tab .pro-tag {
                    background: linear-gradient(135deg, var(--primary), var(--accent));
                    color: var(--white);
                    font-size: 0.58rem;
                    padding: 2px 6px;
                    border-radius: 6px;
                    font-weight: 700;
                    letter-spacing: 0.5px;
                    text-transform: uppercase;
                }

                /* Panels */
                .ee-panel {
                    display: none;
                    padding: 32px 28px;
                    animation: panelIn 0.35s ease;
                }

                .ee-panel.active {
                    display: block;
                }

                @keyframes panelIn {
                    from {
                        opacity: 0;
                        transform: translateY(6px);
                    }

                    to {
                        opacity: 1;
                        transform: none;
                    }
                }

                /* Avatar Section */
                .ee-avatar-block {
                    display: flex;
                    align-items: center;
                    gap: 18px;
                    padding: 22px;
                    background: linear-gradient(135deg, rgba(99, 102, 241, 0.04), rgba(139, 92, 246, 0.04));
                    border: 1px solid rgba(99, 102, 241, 0.1);
                    border-radius: var(--radius-lg);
                    margin-bottom: 32px;
                }

                .ee-avatar {
                    width: 68px;
                    height: 68px;
                    border-radius: 50%;
                    background: linear-gradient(135deg, var(--primary), var(--accent));
                    display: grid;
                    place-items: center;
                    color: var(--white);
                    font-size: 1.5rem;
                    font-weight: 700;
                    flex-shrink: 0;
                    box-shadow: var(--shadow-glow);
                    position: relative;
                }

                .ee-avatar .online-dot {
                    position: absolute;
                    bottom: 2px;
                    right: 2px;
                    width: 15px;
                    height: 15px;
                    border-radius: 50%;
                    background: var(--success);
                    border: 2.5px solid var(--white);
                }

                .ee-avatar-info h5 {
                    font-size: 1.05rem;
                    font-weight: 700;
                    color: var(--gray-800);
                    margin: 0 0 2px;
                }

                .ee-avatar-info p {
                    font-size: 0.78rem;
                    color: var(--gray-400);
                    margin: 0 0 8px;
                }

                .ee-status-badge {
                    display: inline-flex;
                    align-items: center;
                    gap: 4px;
                    padding: 3px 10px;
                    background: var(--success-light);
                    color: var(--success);
                    border-radius: 20px;
                    font-size: 0.68rem;
                    font-weight: 600;
                }

                /* Section Divider */
                .ee-divider {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    margin: 0 0 22px;
                }

                .ee-divider .marker {
                    width: 6px;
                    height: 6px;
                    border-radius: 50%;
                    background: var(--primary);
                    flex-shrink: 0;
                }

                .ee-divider h6 {
                    font-size: 0.72rem;
                    font-weight: 700;
                    color: var(--gray-700);
                    margin: 0;
                    text-transform: uppercase;
                    letter-spacing: 0.8px;
                    white-space: nowrap;
                }

                .ee-divider .rule {
                    flex: 1;
                    height: 1px;
                    background: var(--gray-100);
                }

                /* Form Grid */
                .ee-grid {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 18px 22px;
                    margin-bottom: 30px;
                }

                .ee-grid .span-2 {
                    grid-column: 1 / -1;
                }

                /* Field */
                .ee-field label {
                    display: flex;
                    align-items: center;
                    gap: 5px;
                    font-size: 0.73rem;
                    font-weight: 600;
                    color: var(--gray-600);
                    margin-bottom: 7px;
                    text-transform: uppercase;
                    letter-spacing: 0.4px;
                }

                .ee-field label i {
                    color: var(--gray-400);
                    font-size: 0.9rem;
                }

                .ee-field label .star {
                    color: var(--danger);
                    font-weight: 700;
                }

                .ee-input-wrap {
                    position: relative;
                }

                .ee-input-wrap .ico {
                    position: absolute;
                    left: 13px;
                    top: 50%;
                    transform: translateY(-50%);
                    color: var(--gray-400);
                    font-size: 1.05rem;
                    pointer-events: none;
                    transition: color 0.2s;
                    z-index: 1;
                }

                .ee-input-wrap.is-textarea .ico {
                    top: 15px;
                    transform: none;
                }

                .ee-input {
                    width: 100%;
                    padding: 11px 13px 11px 40px;
                    font-size: 0.875rem;
                    font-family: inherit;
                    color: var(--gray-800);
                    background: var(--gray-50);
                    border: 1.5px solid var(--gray-200);
                    border-radius: var(--radius);
                    outline: none;
                    transition: all 0.2s;
                }

                .ee-input::placeholder {
                    color: var(--gray-300);
                }

                .ee-input:hover {
                    border-color: var(--gray-300);
                }

                .ee-input:focus {
                    background: var(--white);
                    border-color: var(--primary);
                    box-shadow: 0 0 0 3px var(--primary-light);
                }

                .ee-input:focus~.ico {
                    color: var(--primary);
                }

                textarea.ee-input {
                    min-height: 100px;
                    resize: vertical;
                    line-height: 1.6;
                }

                .ee-hint {
                    font-size: 0.68rem;
                    color: var(--gray-400);
                    margin-top: 5px;
                    display: flex;
                    align-items: center;
                    gap: 4px;
                }

                .ee-char-count {
                    font-size: 0.68rem;
                    color: var(--gray-400);
                    text-align: right;
                    margin-top: 5px;
                }

                .ee-char-count.warn {
                    color: var(--warning);
                }

                .ee-char-count.over {
                    color: var(--danger);
                    font-weight: 600;
                }

                /* Password */
                .ee-pw-toggle {
                    position: absolute;
                    right: 12px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: none;
                    border: none;
                    color: var(--gray-400);
                    cursor: pointer;
                    font-size: 1.1rem;
                    padding: 4px;
                    border-radius: 6px;
                    transition: all 0.2s;
                    z-index: 2;
                }

                .ee-pw-toggle:hover {
                    color: var(--primary);
                }

                .ee-pw-strength {
                    margin-top: 8px;
                    display: none;
                }

                .ee-str-track {
                    width: 100%;
                    height: 3px;
                    background: var(--gray-100);
                    border-radius: 3px;
                    overflow: hidden;
                }

                .ee-str-fill {
                    height: 100%;
                    width: 0;
                    border-radius: 3px;
                    transition: all 0.35s;
                }

                .ee-str-text {
                    font-size: 0.66rem;
                    font-weight: 600;
                    margin-top: 4px;
                    display: block;
                }

                .ee-match-hint {
                    font-size: 0.7rem;
                    margin-top: 5px;
                    display: none;
                    align-items: center;
                    gap: 4px;
                    font-weight: 500;
                }

                .ee-match-hint.ok {
                    color: var(--success);
                }

                .ee-match-hint.err {
                    color: var(--danger);
                }

                /* ========== PERFORMANCE TAB ========== */

                /* KPI Cards */
                .ee-kpi-row {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    gap: 14px;
                    margin-bottom: 28px;
                }

                .ee-kpi {
                    background: var(--white);
                    border: 1px solid var(--gray-100);
                    border-radius: var(--radius-lg);
                    padding: 20px 16px;
                    text-align: center;
                    position: relative;
                    overflow: hidden;
                    transition: all 0.25s;
                }

                .ee-kpi::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    height: 3px;
                }

                .ee-kpi:hover {
                    transform: translateY(-4px);
                    box-shadow: var(--shadow-md);
                }

                .ee-kpi.green::after {
                    background: var(--success);
                }

                .ee-kpi.yellow::after {
                    background: var(--warning);
                }

                .ee-kpi.blue::after {
                    background: var(--info);
                }

                .ee-kpi.red::after {
                    background: var(--danger);
                }

                .ee-kpi-icon {
                    width: 42px;
                    height: 42px;
                    border-radius: var(--radius);
                    display: grid;
                    place-items: center;
                    font-size: 1.2rem;
                    margin: 0 auto 10px;
                }

                .ee-kpi.green .ee-kpi-icon {
                    background: var(--success-light);
                    color: var(--success);
                }

                .ee-kpi.yellow .ee-kpi-icon {
                    background: var(--warning-light);
                    color: var(--warning);
                }

                .ee-kpi.blue .ee-kpi-icon {
                    background: var(--info-light);
                    color: var(--info);
                }

                .ee-kpi.red .ee-kpi-icon {
                    background: var(--danger-light);
                    color: var(--danger);
                }

                .ee-kpi-val {
                    font-size: 1.7rem;
                    font-weight: 800;
                    color: var(--gray-900);
                    line-height: 1;
                    margin-bottom: 4px;
                }

                .ee-kpi-lbl {
                    font-size: 0.7rem;
                    font-weight: 600;
                    color: var(--gray-400);
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }

                .ee-kpi-trend {
                    display: inline-flex;
                    align-items: center;
                    gap: 3px;
                    font-size: 0.65rem;
                    font-weight: 600;
                    margin-top: 8px;
                    padding: 2px 8px;
                    border-radius: 20px;
                }

                .ee-kpi-trend.up {
                    background: var(--success-light);
                    color: var(--success);
                }

                .ee-kpi-trend.down {
                    background: var(--danger-light);
                    color: var(--danger);
                }

                .ee-kpi-trend.flat {
                    background: var(--gray-100);
                    color: var(--gray-500);
                }

                /* Chart Area */
                .ee-charts {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 20px;
                    margin-bottom: 0;
                }

                .ee-chart-box {
                    background: var(--white);
                    border: 1px solid var(--gray-100);
                    border-radius: var(--radius-lg);
                    overflow: hidden;
                    transition: box-shadow 0.25s;
                }

                .ee-chart-box:hover {
                    box-shadow: var(--shadow-sm);
                }

                .ee-chart-head {
                    padding: 14px 18px;
                    border-bottom: 1px solid var(--gray-100);
                    background: var(--gray-50);
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                .ee-chart-head h6 {
                    font-size: 0.8rem;
                    font-weight: 700;
                    color: var(--gray-800);
                    margin: 0;
                    display: flex;
                    align-items: center;
                    gap: 7px;
                }

                .ee-chart-head h6 i {
                    color: var(--primary);
                    font-size: 1rem;
                }

                .ee-chart-head .tag {
                    font-size: 0.65rem;
                    font-weight: 600;
                    padding: 3px 9px;
                    border-radius: 12px;
                    background: var(--primary-light);
                    color: var(--primary);
                }

                .ee-chart-body {
                    padding: 20px;
                }

                /* Circular Progress */
                .ee-circle-wrap {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 12px;
                    padding: 16px 0;
                }

                .ee-circle {
                    position: relative;
                    width: 130px;
                    height: 130px;
                }

                .ee-circle svg {
                    transform: rotate(-90deg);
                    width: 130px;
                    height: 130px;
                }

                .ee-circle .track {
                    fill: none;
                    stroke: var(--gray-100);
                    stroke-width: 10;
                }

                .ee-circle .fill {
                    fill: none;
                    stroke-width: 10;
                    stroke-linecap: round;
                    stroke-dasharray: 346;
                    stroke-dashoffset: 346;
                    transition: stroke-dashoffset 1.5s cubic-bezier(0.4, 0, 0.2, 1);
                }

                .ee-circle .txt {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                }

                .ee-circle .val {
                    font-size: 1.8rem;
                    font-weight: 800;
                    color: var(--gray-900);
                    line-height: 1;
                }

                .ee-circle .lbl {
                    font-size: 0.65rem;
                    color: var(--gray-400);
                    font-weight: 600;
                    text-transform: uppercase;
                    margin-top: 3px;
                }

                /* Progress Bars */
                .ee-bar-item {
                    margin-bottom: 16px;
                }

                .ee-bar-item:last-child {
                    margin-bottom: 0;
                }

                .ee-bar-top {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 6px;
                }

                .ee-bar-label {
                    font-size: 0.78rem;
                    font-weight: 600;
                    color: var(--gray-700);
                    display: flex;
                    align-items: center;
                    gap: 6px;
                }

                .ee-bar-label .dot {
                    width: 7px;
                    height: 7px;
                    border-radius: 50%;
                    flex-shrink: 0;
                }

                .ee-bar-value {
                    font-size: 0.74rem;
                    font-weight: 700;
                    color: var(--gray-800);
                }

                .ee-bar-track {
                    width: 100%;
                    height: 7px;
                    background: var(--gray-100);
                    border-radius: 7px;
                    overflow: hidden;
                }

                .ee-bar-fill {
                    height: 100%;
                    border-radius: 7px;
                    width: 0;
                    transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
                    position: relative;
                    overflow: hidden;
                }

                .ee-bar-fill::after {
                    content: '';
                    position: absolute;
                    inset: 0;
                    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
                    animation: barShimmer 2s infinite;
                }

                @keyframes barShimmer {
                    0% {
                        transform: translateX(-100%);
                    }

                    100% {
                        transform: translateX(100%);
                    }
                }

                /* Footer */
                .ee-footer {
                    padding: 20px 28px;
                    background: var(--gray-50);
                    border-top: 1px solid var(--gray-100);
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 12px;
                    flex-wrap: wrap;
                }

                .ee-footer-note {
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    font-size: 0.75rem;
                    color: var(--gray-400);
                }

                .ee-footer-note i {
                    color: var(--success);
                    font-size: 1rem;
                }

                .ee-footer-actions {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }

                .ee-btn-cancel {
                    display: inline-flex;
                    align-items: center;
                    gap: 5px;
                    padding: 10px 20px;
                    border: 1.5px solid var(--gray-200);
                    border-radius: var(--radius);
                    background: var(--white);
                    color: var(--gray-500);
                    font-size: 0.82rem;
                    font-weight: 600;
                    font-family: inherit;
                    text-decoration: none;
                    cursor: pointer;
                    transition: all 0.2s;
                }

                .ee-btn-cancel:hover {
                    border-color: var(--gray-300);
                    color: var(--gray-700);
                }

                .ee-btn-save {
                    display: inline-flex;
                    align-items: center;
                    gap: 7px;
                    padding: 10px 28px;
                    background: linear-gradient(135deg, var(--primary), var(--accent));
                    color: var(--white);
                    border: none;
                    border-radius: var(--radius);
                    font-size: 0.82rem;
                    font-weight: 600;
                    font-family: inherit;
                    cursor: pointer;
                    transition: all 0.25s;
                    position: relative;
                    overflow: hidden;
                }

                .ee-btn-save:hover {
                    transform: translateY(-2px);
                    box-shadow: var(--shadow-glow);
                }

                .ee-btn-save:active {
                    transform: translateY(0);
                }

                .ee-btn-save i {
                    font-size: 1.05rem;
                }

                .ee-btn-save .spinner {
                    display: none;
                    width: 16px;
                    height: 16px;
                    border: 2px solid rgba(255, 255, 255, 0.3);
                    border-top-color: var(--white);
                    border-radius: 50%;
                    animation: spin 0.5s linear infinite;
                }

                @keyframes spin {
                    to {
                        transform: rotate(360deg);
                    }
                }

                .ee-btn-save.loading .spinner {
                    display: block;
                }

                .ee-btn-save.loading .btn-text,
                .ee-btn-save.loading i {
                    display: none;
                }

                /* Toast */
                .ee-toast {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 13px 20px;
                    background: var(--white);
                    border: 1px solid var(--gray-200);
                    border-left: 4px solid var(--success);
                    border-radius: var(--radius);
                    box-shadow: var(--shadow-md);
                    font-size: 0.82rem;
                    font-weight: 600;
                    color: var(--gray-800);
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    z-index: 9999;
                    transform: translateX(130%);
                    transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
                    font-family: 'Inter', sans-serif;
                }

                .ee-toast.show {
                    transform: translateX(0);
                }

                .ee-toast i {
                    color: var(--success);
                    font-size: 1.15rem;
                }

                /* Responsive */
                @media (max-width: 768px) {
                    .ee-kpi-row {
                        grid-template-columns: repeat(2, 1fr);
                    }

                    .ee-charts {
                        grid-template-columns: 1fr;
                    }
                }

                @media (max-width: 640px) {
                    .ee-grid {
                        grid-template-columns: 1fr;
                    }

                    .ee-panel {
                        padding: 24px 18px;
                    }

                    .ee-footer {
                        padding: 18px;
                        flex-direction: column;
                        align-items: stretch;
                    }

                    .ee-footer-actions {
                        flex-direction: column;
                    }

                    .ee-btn-cancel,
                    .ee-btn-save {
                        width: 100%;
                        justify-content: center;
                    }

                    .ee-header {
                        flex-direction: column;
                        align-items: flex-start;
                    }

                    .ee-avatar-block {
                        flex-direction: column;
                        text-align: center;
                    }

                    .ee-kpi-row {
                        gap: 10px;
                    }

                    .ee-kpi {
                        padding: 16px 12px;
                    }

                    .ee-kpi-val {
                        font-size: 1.4rem;
                    }
                }
            </style>

            <div class="ee-wrapper">

                <div class="ee-breadcrumb">
                    <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Home</a>
                    <span class="bc-sep"><i class='bx bx-chevron-right'></i></span>
                    <a href="<?= base_url('admin/employee') ?>">Employees</a>
                    <span class="bc-sep"><i class='bx bx-chevron-right'></i></span>
                    <span class="bc-current">Edit Employee</span>
                </div>

                <div class="ee-header">
                    <div class="ee-header-left">
                        <div class="ee-header-icon"><i class='bx bx-edit-alt'></i></div>
                        <div>
                            <h3>Edit Employee</h3>
                            <p>Update information and view performance</p>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/employee') ?>" class="ee-back-btn">
                        <i class='bx bx-arrow-back'></i> Back to List
                    </a>
                </div>

                <form method="post" action="<?= base_url('admin/employee/update/' . $emp->id) ?>" id="editForm">
                    <div class="ee-card">

                        <div class="ee-tabs">
                            <button type="button" class="ee-tab active" data-tab="personal">
                                <i class='bx bx-user'></i> Personal Info
                            </button>
                            <button type="button" class="ee-tab" data-tab="work">
                                <i class='bx bx-bar-chart-alt-2'></i> Performance
                                <span class="pro-tag">PRO</span>
                            </button>
                        </div>

                        <div class="ee-panel active" id="panel-personal">

                            <div class="ee-avatar-block">
                                <div class="ee-avatar">
                                    <span id="avatarInitials"><?= strtoupper(substr($emp->name, 0, 1)) ?></span>
                                    <span class="online-dot"></span>
                                </div>
                                <div class="ee-avatar-info">
                                    <h5 id="previewName"><?= $emp->name ?></h5>
                                    <p id="previewEmail"><?= $emp->email ?></p>
                                    <span class="ee-status-badge">
                                        <i class='bx bx-check-circle'></i> Active Employee
                                    </span>
                                </div>
                            </div>

                            <div class="ee-divider">
                                <span class="marker"></span>
                                <h6>Personal Information</h6>
                                <span class="rule"></span>
                            </div>

                            <div class="ee-grid">
                                <div class="ee-field">
                                    <label><i class='bx bx-user'></i> Full Name <span class="star">*</span></label>
                                    <div class="ee-input-wrap">
                                        <input type="text" name="name" class="ee-input" id="nameInput"
                                            value="<?= $emp->name ?>" placeholder="Enter full name" required>
                                        <i class='bx bx-user ico'></i>
                                    </div>
                                </div>

                                <div class="ee-field">
                                    <label><i class='bx bx-phone'></i> Phone</label>
                                    <div class="ee-input-wrap">
                                        <input type="tel" name="phone" class="ee-input" value="<?= $emp->phone ?>"
                                            placeholder="Enter phone number">
                                        <i class='bx bx-phone ico'></i>
                                    </div>
                                    <div class="ee-hint"><i class='bx bx-info-circle'></i> Include country code</div>
                                </div>

                                <div class="ee-field">
                                    <label><i class='bx bx-envelope'></i> Email</label>
                                    <div class="ee-input-wrap">
                                        <input type="email" name="email" class="ee-input" id="emailInput"
                                            value="<?= $emp->email ?>" placeholder="Enter email">
                                        <i class='bx bx-envelope ico'></i>
                                    </div>
                                </div>

                                <div class="ee-field">
                                    <label><i class='bx bx-globe'></i> Country</label>
                                    <div class="ee-input-wrap">
                                        <input type="text" name="country" class="ee-input" value="<?= $emp->country ?>"
                                            placeholder="Enter country">
                                        <i class='bx bx-globe ico'></i>
                                    </div>
                                </div>

                                <div class="ee-field span-2">
                                    <label><i class='bx bx-map'></i> Address</label>
                                    <div class="ee-input-wrap is-textarea">
                                        <textarea name="address" class="ee-input" id="addressInput"
                                            placeholder="Enter full address"
                                            maxlength="300"><?= $emp->address ?></textarea>
                                        <i class='bx bx-map ico'></i>
                                    </div>
                                    <div class="ee-char-count" id="charWrap"><span id="charNum">0</span> / 300</div>
                                </div>
                            </div>

                            <div class="ee-divider">
                                <span class="marker"></span>
                                <h6>Security</h6>
                                <span class="rule"></span>
                            </div>

                            <div class="ee-grid">
                                <div class="ee-field">
                                    <label><i class='bx bx-lock'></i> New Password</label>
                                    <div class="ee-input-wrap">
                                        <input type="password" name="password" class="ee-input" id="pwInput"
                                            placeholder="Leave blank to keep current">
                                        <i class='bx bx-lock-alt ico'></i>
                                        <button type="button" class="ee-pw-toggle" data-target="pwInput"><i
                                                class='bx bx-hide'></i></button>
                                    </div>
                                    <div class="ee-pw-strength" id="pwStrength">
                                        <div class="ee-str-track">
                                            <div class="ee-str-fill" id="strFill"></div>
                                        </div>
                                        <span class="ee-str-text" id="strText"></span>
                                    </div>
                                </div>

                                <div class="ee-field">
                                    <label><i class='bx bx-lock'></i> Confirm Password</label>
                                    <div class="ee-input-wrap">
                                        <input type="password" name="confirm_password" class="ee-input" id="cpwInput"
                                            placeholder="Confirm new password">
                                        <i class='bx bx-lock-alt ico'></i>
                                        <button type="button" class="ee-pw-toggle" data-target="cpwInput"><i
                                                class='bx bx-hide'></i></button>
                                    </div>
                                    <div class="ee-match-hint ok" id="matchOk"><i class='bx bx-check-circle'></i>
                                        Passwords match</div>
                                    <div class="ee-match-hint err" id="matchErr"><i class='bx bx-x-circle'></i>
                                        Passwords do not match</div>
                                </div>
                            </div>
                        </div>

                        <div class="ee-panel" id="panel-work">

                            <div class="ee-divider">
                                <span class="marker"></span>
                                <h6>Key Metrics</h6>
                                <span class="rule"></span>
                            </div>

                            <div class="ee-kpi-row">
                                <div class="ee-kpi green">
                                    <div class="ee-kpi-icon"><i class='bx bx-check-double'></i></div>
                                    <div class="ee-kpi-val" data-count="0">0</div>
                                    <div class="ee-kpi-lbl">Completed</div>
                                    <span class="ee-kpi-trend up"><i class='bx bx-trending-up'></i> On Track</span>
                                </div>
                                <div class="ee-kpi yellow">
                                    <div class="ee-kpi-icon"><i class='bx bx-time-five'></i></div>
                                    <div class="ee-kpi-val" data-count="0">0</div>
                                    <div class="ee-kpi-lbl">Pending</div>
                                    <span class="ee-kpi-trend flat"><i class='bx bx-minus'></i> Stable</span>
                                </div>
                                <div class="ee-kpi blue">
                                    <div class="ee-kpi-icon"><i class='bx bx-calendar-check'></i></div>
                                    <div class="ee-kpi-val" data-count="0">0</div>
                                    <div class="ee-kpi-lbl">On Time</div>
                                    <span class="ee-kpi-trend up"><i class='bx bx-trending-up'></i> Great</span>
                                </div>
                                <div class="ee-kpi red">
                                    <div class="ee-kpi-icon"><i class='bx bx-error-circle'></i></div>
                                    <div class="ee-kpi-val" data-count="0">0</div>
                                    <div class="ee-kpi-lbl">Delayed</div>
                                    <span class="ee-kpi-trend down"><i class='bx bx-trending-down'></i> Focus</span>
                                </div>
                            </div>

                            <div class="ee-divider">
                                <span class="marker"></span>
                                <h6>Analytics Overview</h6>
                                <span class="rule"></span>
                            </div>

                            <div class="ee-charts">
                                <div class="ee-chart-box">
                                    <div class="ee-chart-head">
                                        <h6><i class='bx bx-bar-chart-alt-2'></i> Task Distribution</h6>
                                        <span class="tag">This Month</span>
                                    </div>
                                    <div class="ee-chart-body">
                                        <canvas id="empBarChart" height="220"></canvas>
                                    </div>
                                </div>

                                <div class="ee-chart-box">
                                    <div class="ee-chart-head">
                                        <h6><i class='bx bx-target-lock'></i> Efficiency Score</h6>
                                        <span class="tag">Live</span>
                                    </div>
                                    <div class="ee-chart-body">
                                        <div class="ee-circle-wrap">
                                            <div class="ee-circle">
                                                <svg viewBox="0 0 120 120">
                                                    <circle class="track" cx="60" cy="60" r="50"></circle>
                                                    <circle class="fill" cx="60" cy="60" r="50" id="progressCircle"
                                                        stroke="url(#grad1)"></circle>
                                                    <defs>
                                                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#6366f1" />
                                                            <stop offset="100%" style="stop-color:#8b5cf6" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                                <div class="txt">
                                                    <div class="val" id="effVal">0%</div>
                                                    <div class="lbl">Efficiency</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ee-chart-box" style="grid-column: 1 / -1;">
                                    <div class="ee-chart-head">
                                        <h6><i class='bx bx-slider-alt'></i> Performance Breakdown</h6>
                                        <span class="tag">Detail</span>
                                    </div>
                                    <div class="ee-chart-body">
                                        <div class="ee-bar-item">
                                            <div class="ee-bar-top">
                                                <span class="ee-bar-label"><span class="dot"
                                                        style="background:#22c55e"></span> Completion Rate</span>
                                                <span class="ee-bar-value" id="bComp">0%</span>
                                            </div>
                                            <div class="ee-bar-track">
                                                <div class="ee-bar-fill" id="fComp"
                                                    style="background: linear-gradient(90deg,#22c55e,#16a34a)"></div>
                                            </div>
                                        </div>
                                        <div class="ee-bar-item">
                                            <div class="ee-bar-top">
                                                <span class="ee-bar-label"><span class="dot"
                                                        style="background:#3b82f6"></span> On Time </span>
                                                <span class="ee-bar-value" id="bPunc">0%</span>
                                            </div>
                                            <div class="ee-bar-track">
                                                <div class="ee-bar-fill" id="fPunc"
                                                    style="background: linear-gradient(90deg,#3b82f6,#2563eb)"></div>
                                            </div>
                                        </div>
                                        <div class="ee-bar-item">
                                            <div class="ee-bar-top">
                                                <span class="ee-bar-label"><span class="dot"
                                                        style="background:#f59e0b"></span> Pending Ratio</span>
                                                <span class="ee-bar-value" id="bPend">0%</span>
                                            </div>
                                            <div class="ee-bar-track">
                                                <div class="ee-bar-fill" id="fPend"
                                                    style="background: linear-gradient(90deg,#f59e0b,#d97706)"></div>
                                            </div>
                                        </div>
                                        <div class="ee-bar-item">
                                            <div class="ee-bar-top">
                                                <span class="ee-bar-label"><span class="dot"
                                                        style="background:#ef4444"></span> Delay Rate</span>
                                                <span class="ee-bar-value" id="bDel">0%</span>
                                            </div>
                                            <div class="ee-bar-track">
                                                <div class="ee-bar-fill" id="fDel"
                                                    style="background: linear-gradient(90deg,#ef4444,#dc2626)"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ee-footer">
                            <div class="ee-footer-note">
                                <i class='bx bx-shield-quarter'></i>
                                <span>All changes are saved securely</span>
                            </div>
                            <div class="ee-footer-actions">
                                <a href="<?= base_url('admin/employee') ?>" class="ee-btn-cancel">
                                    <i class='bx bx-x'></i> Cancel
                                </a>
                                <button type="submit" class="ee-btn-save" id="saveBtn">
                                    <span class="btn-text">Save Changes</span>
                                    <i class='bx bx-check'></i>
                                    <div class="spinner"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="ee-toast" id="toast">
        <i class='bx bx-check-circle'></i>
        <span id="toastMsg">Changes saved successfully!</span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        (function () {
            'use strict';

            const perf = <?= json_encode($performance) ?>;
            const total = (perf.completed || 0) + (perf.pending || 0) + (perf.ontime || 0) + (perf.delayed || 0);
            const q = s => document.querySelector(s);
            const qa = s => document.querySelectorAll(s);
            let perfReady = false;

            qa('.ee-tab').forEach(tab => {
                tab.addEventListener('click', function () {
                    qa('.ee-tab').forEach(t => t.classList.remove('active'));
                    qa('.ee-panel').forEach(p => p.classList.remove('active'));
                    this.classList.add('active');
                    q('#panel-' + this.dataset.tab).classList.add('active');
                    if (this.dataset.tab === 'work' && !perfReady) {
                        setTimeout(initPerf, 150);
                        perfReady = true;
                    }
                });
            });

            q('#nameInput').addEventListener('input', function () {
                const v = this.value.trim();
                if (v) {
                    const p = v.split(' ').filter(Boolean);
                    let i = p[0][0].toUpperCase();
                    if (p.length > 1) i += p[p.length - 1][0].toUpperCase();
                    q('#avatarInitials').textContent = i;
                    q('#previewName').textContent = v;
                } else {
                    q('#avatarInitials').textContent = '?';
                    q('#previewName').textContent = 'Employee Name';
                }
            });

            q('#emailInput').addEventListener('input', function () {
                q('#previewEmail').textContent = this.value || 'email@example.com';
            });

            const addr = q('#addressInput'), cn = q('#charNum'), cw = q('#charWrap');
            function updChar() {
                const l = addr.value.length;
                cn.textContent = l;
                cw.className = 'ee-char-count' + (l > 270 ? ' over' : l > 220 ? ' warn' : '');
            }
            updChar();
            addr.addEventListener('input', updChar);

            qa('.ee-pw-toggle').forEach(btn => {
                btn.addEventListener('click', function () {
                    const t = q('#' + this.dataset.target);
                    const isPw = t.type === 'password';
                    t.type = isPw ? 'text' : 'password';
                    this.querySelector('i').className = isPw ? 'bx bx-show' : 'bx bx-hide';
                });
            });

            q('#pwInput').addEventListener('input', function () {
                const v = this.value;
                const el = q('#pwStrength'), fill = q('#strFill'), txt = q('#strText');
                if (!v) { el.style.display = 'none'; return; }
                el.style.display = 'block';
                let s = 0;
                if (v.length >= 6) s++;
                if (v.length >= 10) s++;
                if (/[A-Z]/.test(v)) s++;
                if (/[0-9]/.test(v)) s++;
                if (/[^A-Za-z0-9]/.test(v)) s++;
                const lvls = [
                    { w: '20%', c: '#ef4444', t: 'Very Weak' },
                    { w: '40%', c: '#f59e0b', t: 'Weak' },
                    { w: '60%', c: '#eab308', t: 'Fair' },
                    { w: '80%', c: '#22c55e', t: 'Strong' },
                    { w: '100%', c: '#10b981', t: 'Excellent' }
                ];
                const l = lvls[Math.min(s, 4)];
                fill.style.width = l.w;
                fill.style.background = l.c;
                txt.textContent = l.t;
                txt.style.color = l.c;
            });

            const pw = q('#pwInput'), cpw = q('#cpwInput');
            function chkMatch() {
                if (!cpw.value) { q('#matchOk').style.display = 'none'; q('#matchErr').style.display = 'none'; return; }
                q('#matchOk').style.display = cpw.value === pw.value ? 'flex' : 'none';
                q('#matchErr').style.display = cpw.value !== pw.value ? 'flex' : 'none';
            }
            cpw.addEventListener('input', chkMatch);
            pw.addEventListener('input', chkMatch);

            q('#editForm').addEventListener('submit', function () {
                q('#saveBtn').classList.add('loading');
                q('#saveBtn').disabled = true;
            });

            function initPerf() {
                const vals = [perf.completed, perf.pending, perf.ontime, perf.delayed];
                qa('.ee-kpi-val').forEach((el, i) => animNum(el, vals[i] || 0, ''));

                const compPct = total > 0 ? Math.round((perf.completed / total) * 100) : 0;
                const puncPct = perf.completed > 0 ? Math.round((perf.ontime / perf.completed) * 100) : 0;
                const pendPct = total > 0 ? Math.round((perf.pending / total) * 100) : 0;
                const delPct = total > 0 ? Math.round((perf.delayed / total) * 100) : 0;
                const efficiency = total > 0 ? Math.round(((perf.completed + perf.ontime) / (total + perf.delayed)) * 100) : 0;

                const circle = q('#progressCircle');
                const circ = 2 * Math.PI * 50;
                circle.style.strokeDasharray = circ;
                setTimeout(() => {
                    circle.style.strokeDashoffset = circ - (circ * Math.min(efficiency, 100) / 100);
                }, 300);
                animNum(q('#effVal'), efficiency, '%');

                setTimeout(() => {
                    q('#fComp').style.width = compPct + '%'; q('#bComp').textContent = compPct + '%';
                    q('#fPunc').style.width = puncPct + '%'; q('#bPunc').textContent = puncPct + '%';
                    q('#fPend').style.width = pendPct + '%'; q('#bPend').textContent = pendPct + '%';
                    q('#fDel').style.width = delPct + '%'; q('#bDel').textContent = delPct + '%';
                }, 400);

                const ctx = q('#empBarChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Completed', 'Pending', 'On Time', 'Delayed'],
                        datasets: [{
                            label: 'Tasks',
                            data: [perf.completed, perf.pending, perf.ontime, perf.delayed],
                            backgroundColor: ['rgba(34,197,94,0.12)', 'rgba(245,158,11,0.12)', 'rgba(59,130,246,0.12)', 'rgba(239,68,68,0.12)'],
                            borderColor: ['#22c55e', '#f59e0b', '#3b82f6', '#ef4444'],
                            borderWidth: 2,
                            borderRadius: 8,
                            borderSkipped: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#1e293b',
                                titleFont: { family: 'Inter', weight: '600' },
                                bodyFont: { family: 'Inter' },
                                padding: 12,
                                cornerRadius: 8,
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { font: { family: 'Inter', size: 11, weight: '600' }, color: '#94a3b8' },
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: 'rgba(0,0,0,0.04)', drawBorder: false },
                                ticks: { font: { family: 'Inter', size: 11 }, color: '#94a3b8', stepSize: 1 },
                            }
                        },
                        animation: { duration: 1200, easing: 'easeOutQuart' }
                    }
                });
            }

            function animNum(el, target, suffix) {
                if (!el) return;
                const dur = 1000, start = performance.now();
                (function step(now) {
                    const p = Math.min((now - start) / dur, 1);
                    const ease = 1 - Math.pow(1 - p, 3);
                    el.textContent = Math.round(target * ease) + suffix;
                    if (p < 1) requestAnimationFrame(step);
                })(start);
            }

            window.showToast = function (msg) {
                q('#toastMsg').textContent = msg || 'Changes saved successfully!';
                q('#toast').classList.add('show');
                setTimeout(() => q('#toast').classList.remove('show'), 3000);
            };
        })();
    </script>
</div>