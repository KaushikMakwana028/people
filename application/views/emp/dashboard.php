<style>
    /* ==================== PROFESSIONAL DASHBOARD STYLES ==================== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    :root {
        --pro-primary: #6366f1;
        --pro-primary-hover: #4f46e5;
        --pro-primary-light: #eef2ff;
        --pro-primary-glow: rgba(99, 102, 241, 0.15);
        --pro-success: #10b981;
        --pro-success-light: #ecfdf5;
        --pro-warning: #f59e0b;
        --pro-warning-light: #fffbeb;
        --pro-danger: #ef4444;
        --pro-danger-light: #fef2f2;
        --pro-info: #06b6d4;
        --pro-info-light: #ecfeff;
        --pro-dark: #0f172a;
        --pro-heading: #1e293b;
        --pro-text: #334155;
        --pro-muted: #94a3b8;
        --pro-border: #e2e8f0;
        --pro-bg: #f8fafc;
        --pro-card-bg: #ffffff;
        --pro-radius-sm: 10px;
        --pro-radius: 16px;
        --pro-radius-lg: 20px;
        --pro-radius-xl: 24px;
        --pro-shadow-xs: 0 1px 2px rgba(0, 0, 0, 0.04);
        --pro-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04);
        --pro-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        --pro-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -4px rgba(0, 0, 0, 0.04);
        --pro-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
        --pro-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        --pro-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ===== Global Reset ===== */
    .pro-dashboard {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: var(--pro-bg);
        color: var(--pro-text);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .pro-dashboard *,
    .pro-dashboard *::before,
    .pro-dashboard *::after {
        box-sizing: border-box;
    }

    /* ===== Animations ===== */
    @keyframes proFadeInUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes proFadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes proSlideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes proPulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: 0.5;
            transform: scale(1.3);
        }
    }

    @keyframes proFloat {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    @keyframes proShimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    @keyframes proCountUp {
        from {
            opacity: 0;
            transform: scale(0.5);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes proGlow {

        0%,
        100% {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
        }

        50% {
            box-shadow: 0 0 40px rgba(99, 102, 241, 0.4);
        }
    }

    @keyframes timerPulse {

        0%,
        100% {
            text-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }

        50% {
            text-shadow: 0 0 40px rgba(99, 102, 241, 0.6), 0 0 80px rgba(99, 102, 241, 0.2);
        }
    }

    @keyframes progressGrow {
        from {
            width: 0;
        }
    }

    .pro-animate {
        animation: proFadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .pro-animate-1 {
        animation-delay: 0.05s;
    }

    .pro-animate-2 {
        animation-delay: 0.1s;
    }

    .pro-animate-3 {
        animation-delay: 0.15s;
    }

    .pro-animate-4 {
        animation-delay: 0.2s;
    }

    .pro-animate-5 {
        animation-delay: 0.25s;
    }

    .pro-animate-6 {
        animation-delay: 0.3s;
    }

    .pro-animate-7 {
        animation-delay: 0.35s;
    }

    .pro-animate-8 {
        animation-delay: 0.4s;
    }

    .pro-animate-9 {
        animation-delay: 0.45s;
    }

    .pro-animate-10 {
        animation-delay: 0.5s;
    }

    /* ===== Hero Banner ===== */
    .pro-hero-banner {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 30%, #7c3aed 60%, #a855f7 100%);
        border-radius: var(--pro-radius-xl);
        padding: 2.5rem;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(99, 102, 241, 0.25);
    }

    .pro-hero-banner::before {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        border-radius: 50%;
        top: -200px;
        right: -100px;
        pointer-events: none;
    }

    .pro-hero-banner::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.06) 0%, transparent 70%);
        border-radius: 50%;
        bottom: -150px;
        left: -50px;
        pointer-events: none;
    }

    .pro-hero-content {
        position: relative;
        z-index: 2;
    }

    .pro-role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 5px 16px;
        border-radius: 50px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .pro-role-badge::before {
        content: '';
        width: 6px;
        height: 6px;
        background: #34d399;
        border-radius: 50%;
        animation: proPulse 2s infinite;
    }

    .pro-date-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 8px 18px;
        border-radius: 12px;
        font-size: 0.82rem;
        font-weight: 500;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .pro-hero-banner h2 {
        font-weight: 800;
        font-size: 1.75rem;
        letter-spacing: -0.5px;
        margin: 0;
        line-height: 1.3;
    }

    .pro-hero-banner .pro-subtitle {
        opacity: 0.8;
        font-size: 0.92rem;
        margin: 0;
        font-weight: 400;
    }

    .pro-clock-display {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 12px 24px;
        border-radius: 14px;
        font-size: 1.1rem;
        font-weight: 600;
        font-family: 'JetBrains Mono', monospace;
        letter-spacing: 1px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    /* ===== Break Alert ===== */
    .pro-break-alert {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        border: 1px solid #fcd34d;
        border-left: 5px solid #f59e0b;
        border-radius: var(--pro-radius);
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 4px 16px rgba(245, 158, 11, 0.12);
    }

    .pro-break-alert-icon {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #fff;
        flex-shrink: 0;
        animation: proFloat 3s ease-in-out infinite;
    }

    .pro-break-alert-text h6 {
        font-weight: 700;
        color: #92400e;
        margin: 0 0 4px;
        font-size: 0.95rem;
    }

    .pro-break-alert-text p {
        color: #a16207;
        font-size: 0.82rem;
        margin: 0;
    }

    .pro-btn-resume {
        background: linear-gradient(135deg, #10b981, #059669);
        border: none;
        color: #fff;
        padding: 10px 24px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.85rem;
        transition: var(--pro-transition);
        box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
        cursor: pointer;
    }

    .pro-btn-resume:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
        color: #fff;
    }

    /* ===== Session & Stat Cards Row ===== */
    .pro-session-card {
        background: linear-gradient(145deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-lg);
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .pro-session-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 50% 0%, rgba(99, 102, 241, 0.15) 0%, transparent 60%);
        pointer-events: none;
    }

    .pro-session-card::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        bottom: -100px;
        right: -50px;
        pointer-events: none;
    }

    .pro-session-inner {
        position: relative;
        z-index: 1;
        padding: 2rem 1.5rem;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 280px;
    }

    .pro-session-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        color: rgba(255, 255, 255, 0.4);
        margin-bottom: 20px;
    }

    .pro-live-indicator {
        width: 8px;
        height: 8px;
        background: #22c55e;
        border-radius: 50%;
        animation: proPulse 1.5s infinite;
        box-shadow: 0 0 8px rgba(34, 197, 94, 0.5);
    }

    .pro-timer-display {
        font-family: 'JetBrains Mono', monospace;
        font-size: 3.5rem;
        font-weight: 800;
        color: #fff;
        letter-spacing: 6px;
        margin-bottom: 28px;
        animation: timerPulse 3s ease-in-out infinite;
        line-height: 1;
    }

    .pro-timer-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .pro-timer-btn {
        padding: 10px 24px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.82rem;
        border: none;
        cursor: pointer;
        transition: var(--pro-transition);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        letter-spacing: 0.3px;
    }

    .pro-timer-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
        transform: none !important;
        box-shadow: none !important;
    }

    .pro-btn-start {
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff;
        box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
    }

    .pro-btn-start:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.5);
        color: #fff;
    }

    .pro-btn-pause {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        box-shadow: 0 4px 14px rgba(245, 158, 11, 0.35);
    }

    .pro-btn-pause:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(245, 158, 11, 0.5);
        color: #fff;
    }

    .pro-btn-reset {
        background: rgba(255, 255, 255, 0.08);
        color: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }

    .pro-btn-reset:hover:not(:disabled) {
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
        transform: translateY(-2px);
    }

    /* ===== Stat Cards ===== */
    .pro-stat-card {
        background: var(--pro-card-bg);
        border-radius: var(--pro-radius-lg);
        padding: 1.75rem;
        border: 1px solid var(--pro-border);
        box-shadow: var(--pro-shadow-sm);
        transition: var(--pro-transition);
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .pro-stat-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--pro-shadow-md);
        border-color: transparent;
    }

    .pro-stat-card::before {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        opacity: 0.06;
        top: -40px;
        right: -30px;
    }

    .pro-stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 16px;
    }

    .pro-stat-label {
        text-transform: uppercase;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        color: var(--pro-muted);
        margin-bottom: 10px;
    }

    .pro-stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        line-height: 1;
        letter-spacing: -0.5px;
        margin-bottom: 6px;
    }

    .pro-stat-sub {
        font-size: 0.78rem;
        color: var(--pro-muted);
        font-weight: 500;
    }

    .pro-stat-break {
        border-left: 4px solid var(--pro-danger);
    }

    .pro-stat-break::before {
        background: var(--pro-danger);
    }

    .pro-stat-break .pro-stat-icon {
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        color: var(--pro-danger);
    }

    .pro-stat-break .pro-stat-value {
        color: #dc2626;
    }

    .pro-stat-break .pro-stat-count {
        font-size: 1rem;
        font-weight: 700;
        color: var(--pro-danger);
        margin-bottom: 8px;
    }

    .pro-stat-work {
        border-left: 4px solid var(--pro-success);
    }

    .pro-stat-work::before {
        background: var(--pro-success);
    }

    .pro-stat-work .pro-stat-icon {
        background: linear-gradient(135deg, #dcfce7, #bbf7d0);
        color: #16a34a;
    }

    .pro-stat-work .pro-stat-value {
        color: #15803d;
    }

    /* ===== Complete Day Button ===== */
    .pro-complete-wrap {
        text-align: center;
        padding: 8px 0;
    }

    .pro-btn-complete {
        background: linear-gradient(135deg, #6b7280, #4b5563);
        border: none;
        color: #fff;
        padding: 14px 40px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        transition: var(--pro-transition);
        box-shadow: 0 4px 16px rgba(107, 114, 128, 0.25);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .pro-btn-complete:not(:disabled):hover {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(34, 197, 94, 0.35);
        color: #fff;
    }

    .pro-btn-complete:disabled {
        opacity: 0.45;
        cursor: not-allowed;
    }

    .pro-btn-complete.is-active {
        background: linear-gradient(135deg, #22c55e, #16a34a) !important;
        box-shadow: 0 6px 24px rgba(34, 197, 94, 0.35);
    }

    /* ===== Section Headers ===== */
    .pro-section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .pro-section-bar {
        width: 4px;
        height: 24px;
        background: linear-gradient(180deg, var(--pro-primary), #a855f7);
        border-radius: 4px;
    }

    .pro-section-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--pro-heading);
        letter-spacing: -0.3px;
        margin: 0;
    }

    .pro-section-count {
        background: var(--pro-primary-light);
        color: var(--pro-primary);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.72rem;
        font-weight: 700;
        margin-left: auto;
    }

    /* ===== Card Common ===== */
    .pro-card {
        background: var(--pro-card-bg);
        border: 1px solid var(--pro-border);
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-sm);
        transition: var(--pro-transition);
    }

    .pro-card:hover {
        box-shadow: var(--pro-shadow-md);
    }

    .pro-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--pro-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .pro-card-header-gradient {
        border: none;
        color: #fff;
    }

    .pro-card-header h6 {
        font-weight: 700;
        font-size: 0.92rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pro-card-body {
        padding: 0;
    }

    /* ===== Info Cards Grid (Birthdays, Employees) ===== */
    .pro-info-card {
        background: var(--pro-card-bg);
        border: 1px solid var(--pro-border);
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-sm);
        transition: var(--pro-transition);
    }

    .pro-info-card:hover {
        box-shadow: var(--pro-shadow-md);
        transform: translateY(-2px);
    }

    .pro-info-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--pro-border);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pro-info-header-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }

    .pro-info-header h6 {
        font-weight: 700;
        font-size: 0.92rem;
        margin: 0;
        color: var(--pro-heading);
    }

    .pro-info-list {
        padding: 12px 16px;
        max-height: 300px;
        overflow-y: auto;
    }

    .pro-info-list::-webkit-scrollbar {
        width: 4px;
    }

    .pro-info-list::-webkit-scrollbar-track {
        background: transparent;
    }

    .pro-info-list::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    .pro-person-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 10px 12px;
        border-radius: 12px;
        transition: var(--pro-transition);
        text-decoration: none;
        color: inherit;
    }

    .pro-person-item:hover {
        background: #f8fafc;
        transform: translateX(4px);
        color: inherit;
    }

    .pro-person-avatar {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        object-fit: cover;
        border: 2px solid #f1f5f9;
        flex-shrink: 0;
    }

    .pro-person-info {
        flex: 1;
        min-width: 0;
    }

    .pro-person-name {
        font-weight: 600;
        font-size: 0.88rem;
        color: var(--pro-heading);
        margin: 0 0 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .pro-person-meta {
        font-size: 0.78rem;
        color: var(--pro-muted);
        margin: 0;
    }

    /* ===== Break Activity Card ===== */
    .pro-break-card {
        background: var(--pro-card-bg);
        border: 1px solid var(--pro-border);
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-sm);
        transition: var(--pro-transition);
    }

    .pro-break-card:hover {
        box-shadow: var(--pro-shadow-md);
    }

    .pro-break-header {
        background: linear-gradient(135deg, #ef4444 0%, #f87171 50%, #fb923c 100%);
        padding: 20px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .pro-break-header::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }

    .pro-break-header-left {
        display: flex;
        align-items: center;
        gap: 14px;
        z-index: 1;
    }

    .pro-break-header-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(6px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: #fff;
    }

    .pro-break-header-text h6 {
        margin: 0;
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
    }

    .pro-break-header-text span {
        font-size: 0.76rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .pro-break-count-badge {
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(6px);
        color: #fff;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 700;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .pro-break-body {
        max-height: 360px;
        overflow-y: auto;
        padding: 8px 12px;
    }

    .pro-break-body::-webkit-scrollbar {
        width: 4px;
    }

    .pro-break-body::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    .pro-break-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 16px;
        border-radius: 12px;
        transition: var(--pro-transition);
        position: relative;
    }

    .pro-break-item:hover {
        background: #fff5f5;
        transform: translateX(4px);
    }

    .pro-break-item+.pro-break-item {
        border-top: 1px solid #f8fafc;
    }

    .pro-break-avatar {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: linear-gradient(135deg, #ffe0dc, #ffc4bc);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        color: #ef4444;
        flex-shrink: 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .pro-break-info {
        flex: 1;
        min-width: 0;
    }

    .pro-break-name {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--pro-heading);
        margin: 0 0 4px;
    }

    .pro-break-reason {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.76rem;
        color: var(--pro-muted);
        background: #f8fafc;
        padding: 3px 10px;
        border-radius: 6px;
    }

    .pro-break-status-badge {
        background: #ecfdf5;
        color: #059669;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.3px;
        flex-shrink: 0;
    }

    .pro-break-empty {
        text-align: center;
        padding: 48px 24px;
    }

    .pro-break-empty-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 2rem;
        color: #cbd5e1;
    }

    .pro-break-empty h6 {
        color: var(--pro-muted);
        font-weight: 600;
        font-size: 0.92rem;
        margin: 0 0 4px;
    }

    .pro-break-empty p {
        color: #cbd5e1;
        font-size: 0.8rem;
        margin: 0;
    }

    /* ===== Announcement / Holiday / Leave Cards ===== */
    .pro-gradient-card {
        background: var(--pro-card-bg);
        border: none;
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-sm);
        transition: var(--pro-transition);
    }

    .pro-gradient-card:hover {
        box-shadow: var(--pro-shadow-md);
        transform: translateY(-3px);
    }

    .pro-gradient-header {
        padding: 18px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .pro-gradient-header::before {
        content: '';
        position: absolute;
        top: -30px;
        right: -30px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }

    .pro-gradient-header-icon {
        width: 38px;
        height: 38px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .pro-gradient-header h6 {
        font-weight: 700;
        font-size: 0.95rem;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .pro-header-announce {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
    }

    .pro-header-holiday {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    }

    .pro-header-leave {
        background: linear-gradient(135deg, #ef4444 0%, #f97316 100%);
    }

    .pro-header-break-log {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    }

    /* Announcement Items */
    .pro-announce-item {
        padding: 18px 24px;
        border-bottom: 1px solid #f8fafc;
        transition: var(--pro-transition);
        position: relative;
    }

    .pro-announce-item:last-child {
        border-bottom: none;
    }

    .pro-announce-item:hover {
        background: #fafbff;
    }

    .pro-announce-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(180deg, var(--pro-danger), #fb923c);
        border-radius: 0 3px 3px 0;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .pro-announce-item:hover::before {
        opacity: 1;
    }

    .pro-announce-title {
        font-weight: 700;
        font-size: 0.92rem;
        color: var(--pro-heading);
        margin: 0 0 6px;
    }

    .pro-announce-desc {
        font-size: 0.82rem;
        color: #64748b;
        line-height: 1.6;
        margin: 0 0 8px;
    }

    .pro-time-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #fef2f2;
        color: #dc2626;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    /* Holiday Items */
    .pro-holiday-item {
        padding: 16px 24px;
        border-bottom: 1px solid #f8fafc;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: var(--pro-transition);
    }

    .pro-holiday-item:last-child {
        border-bottom: none;
    }

    .pro-holiday-item:hover {
        background: #f5f3ff;
    }

    .pro-holiday-name {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--pro-heading);
        margin: 0 0 3px;
    }

    .pro-holiday-date {
        font-size: 0.78rem;
        color: var(--pro-muted);
    }

    .pro-holiday-badge {
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.72rem;
        font-weight: 700;
        box-shadow: 0 3px 10px rgba(16, 185, 129, 0.25);
        white-space: nowrap;
    }

    /* Leave Items */
    .pro-leave-item {
        padding: 16px 24px;
        border-bottom: 1px solid #f8fafc;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: var(--pro-transition);
    }

    .pro-leave-item:last-child {
        border-bottom: none;
    }

    .pro-leave-item:hover {
        background: #fff5f5;
    }

    .pro-leave-name {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--pro-heading);
        margin: 0 0 3px;
    }

    .pro-leave-reason {
        font-size: 0.78rem;
        color: var(--pro-muted);
    }

    .pro-leave-time {
        background: var(--pro-dark);
        color: #fff;
        padding: 5px 14px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 600;
        white-space: nowrap;
    }

    /* ===== Empty State ===== */
    .pro-empty {
        padding: 40px 24px;
        text-align: center;
    }

    .pro-empty-icon {
        width: 60px;
        height: 60px;
        background: #f8fafc;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #cbd5e1;
        margin-bottom: 12px;
    }

    .pro-empty p {
        color: var(--pro-muted);
        font-size: 0.88rem;
        margin: 0;
        font-weight: 500;
    }

    /* ===== Break Log Table ===== */
    .pro-table-card {
        background: var(--pro-card-bg);
        border: 1px solid var(--pro-border);
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-sm);
        transition: var(--pro-transition);
    }

    .pro-table-card:hover {
        box-shadow: var(--pro-shadow-md);
    }

    .pro-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 0.88rem;
    }

    .pro-table thead th {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        font-weight: 600;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 14px 20px;
        border: none;
        white-space: nowrap;
    }

    .pro-table thead th:first-child {
        border-radius: 0;
    }

    .pro-table tbody td {
        padding: 14px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f8fafc;
        color: var(--pro-text);
    }

    .pro-table tbody tr {
        transition: var(--pro-transition);
    }

    .pro-table tbody tr:hover {
        background: #f8fafc;
    }

    .pro-table tbody tr:last-child td {
        border-bottom: none;
    }

    .pro-reason-chip {
        background: linear-gradient(135deg, #fef2f2, #fecaca);
        color: #dc2626;
        padding: 5px 14px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .pro-time-mono {
        font-family: 'JetBrains Mono', monospace;
        font-weight: 600;
        font-size: 0.82rem;
        color: #475569;
    }

    .pro-duration-chip {
        background: linear-gradient(135deg, #eef2ff, #dbeafe);
        color: #4f46e5;
        padding: 5px 14px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 700;
        font-family: 'JetBrains Mono', monospace;
    }

    /* ===== Task Board ===== */
    .pro-task-table-card {
        background: var(--pro-card-bg);
        border: 1px solid var(--pro-border);
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-sm);
        transition: var(--pro-transition);
    }

    .pro-task-table-card:hover {
        box-shadow: var(--pro-shadow-md);
    }

    .pro-task-header {
        background: #f8fafc;
        padding: 16px 24px;
        border-bottom: 1px solid var(--pro-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .pro-task-header h6 {
        font-weight: 700;
        margin: 0;
        font-size: 0.92rem;
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--pro-heading);
    }

    .pro-task-count {
        background: var(--pro-primary-light);
        color: var(--pro-primary);
        padding: 3px 12px;
        border-radius: 50px;
        font-size: 0.72rem;
        font-weight: 700;
    }

    .pro-task-table {
        width: 100%;
        margin: 0;
        font-size: 0.88rem;
    }

    .pro-task-table thead th {
        background: #f8fafc;
        font-weight: 600;
        color: var(--pro-muted);
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 12px 16px;
        border-bottom: 2px solid var(--pro-border);
        white-space: nowrap;
    }

    .pro-task-table tbody td {
        padding: 14px 16px;
        vertical-align: middle;
        border-bottom: 1px solid #f8fafc;
        color: var(--pro-text);
    }

    .pro-task-table tbody tr {
        transition: var(--pro-transition);
    }

    .pro-task-table tbody tr:hover {
        background: #f8fafc;
    }

    .pro-task-table tbody tr:last-child td {
        border-bottom: none;
    }

    .pro-task-title {
        font-weight: 600;
        color: var(--pro-heading);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pro-task-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .pro-project-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #f1f5f9;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 0.78rem;
        color: var(--pro-muted);
        font-weight: 500;
    }

    .pro-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .pro-badge-high {
        background: #fef2f2;
        color: #dc2626;
    }

    .pro-badge-medium {
        background: #fffbeb;
        color: #d97706;
    }

    .pro-badge-low {
        background: #ecfdf5;
        color: #059669;
    }

    .pro-badge-pending {
        background: #f1f5f9;
        color: #475569;
    }

    .pro-badge-progress {
        background: #eef2ff;
        color: #4f46e5;
    }

    .pro-badge-done {
        background: #ecfdf5;
        color: #059669;
    }

    .pro-badge-delayed {
        background: #fef2f2;
        color: #dc2626;
    }

    .pro-badge-ontime {
        background: #ecfdf5;
        color: #059669;
    }

    .pro-task-time {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--pro-muted);
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .pro-btn-view-list {
        background: var(--pro-primary);
        color: #fff;
        border: none;
        padding: 6px 18px;
        border-radius: 10px;
        font-size: 0.78rem;
        font-weight: 600;
        transition: var(--pro-transition);
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
    }

    .pro-btn-view-list:hover {
        background: var(--pro-primary-hover);
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    .pro-finished-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: var(--pro-success);
        font-weight: 700;
        font-size: 0.82rem;
    }

    .pro-task-empty {
        padding: 48px 16px;
        text-align: center;
    }

    .pro-task-empty-icon {
        width: 56px;
        height: 56px;
        background: #f8fafc;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: #cbd5e1;
        margin-bottom: 10px;
    }

    .pro-task-empty p {
        color: var(--pro-muted);
        font-size: 0.88rem;
        margin: 0;
    }

    /* ===== Modals ===== */
    .pro-modal .modal-content {
        border: none;
        border-radius: var(--pro-radius-lg);
        overflow: hidden;
        box-shadow: var(--pro-shadow-xl);
    }

    .pro-modal .modal-header {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        color: #fff;
        padding: 20px 24px;
        border: none;
    }

    .pro-modal .modal-title {
        font-weight: 700;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pro-modal .btn-close {
        filter: invert(1);
        opacity: 0.5;
    }

    .pro-modal .btn-close:hover {
        opacity: 1;
    }

    .pro-modal .modal-body {
        padding: 28px 24px;
    }

    .pro-modal .modal-body .form-label {
        font-weight: 600;
        color: var(--pro-heading);
        font-size: 0.88rem;
        margin-bottom: 8px;
    }

    .pro-modal .modal-body .form-select,
    .pro-modal .modal-body .form-control {
        border-radius: 12px;
        border: 2px solid var(--pro-border);
        padding: 12px 16px;
        font-size: 0.88rem;
        transition: var(--pro-transition);
        background-color: #f8fafc;
    }

    .pro-modal .modal-body .form-select:focus,
    .pro-modal .modal-body .form-control:focus {
        border-color: var(--pro-primary);
        box-shadow: 0 0 0 4px var(--pro-primary-glow);
        background-color: #fff;
    }

    .pro-modal .modal-footer {
        padding: 16px 24px;
        border-top: 1px solid #f1f5f9;
        gap: 8px;
    }

    .pro-modal .modal-footer .btn {
        border-radius: 12px;
        padding: 10px 24px;
        font-weight: 600;
        font-size: 0.88rem;
    }

    .pro-modal-btn-submit {
        background: linear-gradient(135deg, #10b981, #059669) !important;
        border: none !important;
        color: #fff !important;
        box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
        transition: var(--pro-transition);
    }

    .pro-modal-btn-submit:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    .pro-modal-btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626) !important;
        border: none !important;
        color: #fff !important;
        box-shadow: 0 4px 14px rgba(239, 68, 68, 0.3);
        transition: var(--pro-transition);
    }

    .pro-modal-btn-danger:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
    }

    /* ===== Divider ===== */
    .pro-divider {
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--pro-border), transparent);
        margin: 8px 0;
    }

    /* ===== Back to Top ===== */
    .pro-back-top {
        background: linear-gradient(135deg, var(--pro-primary), #8b5cf6) !important;
        border-radius: 14px !important;
        box-shadow: 0 4px 16px rgba(99, 102, 241, 0.35) !important;
    }

    /* ===== Custom Scrollbar ===== */
    .pro-dashboard ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    .pro-dashboard ::-webkit-scrollbar-track {
        background: transparent;
    }

    .pro-dashboard ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .pro-dashboard ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    /* ===== Responsive ===== */
    @media (max-width: 991.98px) {
        .pro-hero-banner {
            padding: 2rem;
        }

        .pro-hero-banner h2 {
            font-size: 1.4rem;
        }

        .pro-timer-display {
            font-size: 2.8rem;
            letter-spacing: 4px;
        }

        .pro-session-inner {
            min-height: 240px;
        }
    }

    @media (max-width: 767.98px) {
        .pro-hero-banner {
            padding: 1.5rem;
        }

        .pro-hero-banner h2 {
            font-size: 1.2rem;
        }

        .pro-clock-display {
            display: none;
        }

        .pro-timer-display {
            font-size: 2.2rem;
            letter-spacing: 3px;
        }

        .pro-session-inner {
            min-height: 200px;
            padding: 1.5rem 1rem;
        }

        .pro-timer-btn {
            padding: 8px 16px;
            font-size: 0.78rem;
        }

        .pro-stat-value {
            font-size: 1.4rem;
        }

        .pro-stat-card {
            padding: 1.25rem;
        }

        .pro-btn-complete {
            padding: 12px 28px;
            font-size: 0.88rem;
        }

        .pro-break-alert {
            flex-wrap: wrap;
        }
    }

    @media (max-width: 575.98px) {
        .pro-hero-banner h2 {
            font-size: 1.05rem;
        }

        .pro-hero-banner .pro-subtitle {
            font-size: 0.82rem;
        }

        .pro-timer-display {
            font-size: 1.8rem;
            letter-spacing: 2px;
        }

        .pro-timer-actions {
            gap: 6px;
        }

        .pro-timer-btn {
            padding: 8px 14px;
            font-size: 0.72rem;
        }

        .pro-stat-icon {
            width: 44px;
            height: 44px;
            font-size: 1.3rem;
        }

        .pro-stat-value {
            font-size: 1.2rem;
        }
    }
</style>

<!-- ========== PROFESSIONAL DASHBOARD ========== -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="pro-dashboard">

            <?php
            $hour = date('H');
            if ($hour < 12)
                $greeting = "Good Morning";
            elseif ($hour < 17)
                $greeting = "Good Afternoon";
            else
                $greeting = "Good Evening";

            $userName = ucfirst(htmlspecialchars($this->session->userdata('user_name') ?? 'User'));
            $userRole = ucfirst(htmlspecialchars($this->session->userdata('role') ?? 'Member'));
            ?>

            <!-- ===== Hero Banner ===== -->
            <div class="pro-hero-banner mb-4 pro-animate pro-animate-1">
                <div class="pro-hero-content">
                    <div class="d-flex flex-wrap align-items-start justify-content-between gap-3">
                        <div>
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                <span class="pro-role-badge"><?= $userRole ?></span>
                                <span class="pro-date-chip d-none d-sm-inline-flex">
                                    <i class='bx bx-calendar'></i>
                                    <?= date('l, F j, Y') ?>
                                </span>
                            </div>
                            <h2><?= $greeting ?>, <?= $userName ?> </h2>
                            <p class="pro-subtitle mt-1">Here's your workspace overview for today.</p>
                        </div>
                        <div class="d-none d-md-block">
                            <div class="pro-clock-display">
                                <i class='bx bx-time-five'></i>
                                <span id="liveClockDash"><?= date('h:i A') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== Break Alert ===== -->
            <?php if ($this->session->userdata('on_break')): ?>
                <div class="pro-break-alert mb-4 pro-animate pro-animate-2">
                    <div class="pro-break-alert-icon">⏸️</div>
                    <div class="flex-grow-1">
                        <div class="pro-break-alert-text">
                            <h6>You're currently on a break</h6>
                            <p>Your timer is paused. Resume to continue tracking your work hours.</p>
                        </div>
                    </div>
                    <button class="pro-btn-resume" onclick="resumeWork()">
                        <i class='bx bx-play'></i> Resume Work
                    </button>
                </div>
            <?php endif; ?>

            <!-- ===== Timer + Stats Row ===== -->
            <div class="row g-3 mb-4">
                <!-- Active Session -->
                <div class="col-12 col-xl-4 pro-animate pro-animate-2">
                    <div class="pro-session-card h-100">
                        <div class="pro-session-inner">
                            <div class="pro-session-label">
                                <span class="pro-live-indicator"></span>
                                Active Session
                            </div>
                            <div class="pro-timer-display" id="display">00:00:00</div>
                            <div class="pro-timer-actions">
                                <button id="btnStart" onclick="startWatch()" class="pro-timer-btn pro-btn-start"
                                    <?= ($report_submitted || $leave_type_today == 'full_day') ? 'disabled' : '' ?>>START</button>
                                    <button id="btnStop" onclick="stopWatch()" class="pro-timer-btn pro-btn-pause"
                                        <?= ($report_submitted || $leave_type_today == 'full_day') ? 'disabled' : '' ?>>BREAK</button>
                                        <button id="btnReset" onclick="resetWatch()" class="pro-timer-btn pro-btn-reset"
                                            <?= ($report_submitted || $leave_type_today == 'full_day') ? 'disabled' : '' ?>>RESET</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Break Summary -->
                <div class="col-12 col-xl-4 pro-animate pro-animate-3">
                    <div class="pro-stat-card pro-stat-break h-100">
                        <div class="pro-stat-icon">☕</div>
                        <div class="pro-stat-label">Today's Breaks</div>
                        <div class="pro-stat-count mb-2">
                            <?= $break_summary->total_breaks ?? 0 ?>
                            Break<?= ($break_summary->total_breaks ?? 0) != 1 ? 's' : '' ?>
                        </div>
                        <div class="pro-stat-value"><?= $formattedBreakTime ?? '00h 00m 00s'; ?></div>
                        <div class="pro-stat-sub mt-1">Total Break Duration</div>
                    </div>
                </div>

                <!-- Work Summary -->
                <div class="col-12 col-xl-4 pro-animate pro-animate-4">
                    <div class="pro-stat-card pro-stat-work h-100">
                        <div class="pro-stat-icon">💼</div>
                        <div class="pro-stat-label">Today's Work</div>
                        <div class="pro-stat-value"><?= $formattedWorkTime ?? '00h 00m 00s'; ?></div>
                        <div class="pro-stat-sub mt-1">Total Active Working Time</div>
                    </div>
                </div>
            </div>



            <div class="pro-section-header pro-animate pro-animate-9">
                <span class="pro-section-bar"></span>
                <h5 class="pro-section-title">My Task Board</h5>
            </div>

            <?php
            $columns = [
                'pending' => ['title' => 'Pending Tasks', 'icon' => 'bx-time-five', 'color' => 'warning'],
                'completed' => ['title' => 'Completed Tasks', 'icon' => 'bx-check-circle', 'color' => 'success'],
            ];
            ?>

            <?php foreach ($columns as $status => $meta):
                $count = 0;
                foreach ($tasks as $t) {
                    if ($t->status === $status)
                        $count++;
                }
            ?>
                <div class="pro-task-table-card mb-4 pro-animate pro-animate-10">
                    <div class="pro-task-header">
                        <h6>
                            <i class='bx <?= $meta['icon'] ?>'
                                style="font-size:1.1rem; color:var(--pro-<?= $meta['color'] ?>);"></i>
                            <?= $meta['title'] ?>
                        </h6>
                        <span class="pro-task-count"><?= $count ?> task<?= $count !== 1 ? 's' : '' ?></span>
                    </div>
                    <div class="table-responsive">
                        <table class="pro-task-table">
                            <thead>
                                <tr>
                                    <th style="min-width:200px;">Task</th>
                                    <th>Project</th>
                                    <th>Priority</th>
                                    <?php if ($status !== 'completed'): ?>
                                        <th>Time Left</th>
                                        <th>Status</th>
                                    <?php else: ?>
                                        <th>Expected</th>
                                        <th>Worked</th>
                                        <th>Result</th>
                                    <?php endif; ?>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $found = false;
                                foreach ($tasks as $t):
                                    if ($t->status !== $status)
                                        continue;
                                    $found = true;

                                    $expectedSeconds = (int) ($t->expected_minutes ?? 0) * 60;
                                    $workedSeconds = (int) ($t->total_seconds ?? 0);
                                    $leftSeconds = max(0, $expectedSeconds - $workedSeconds);

                                    $eh = floor($expectedSeconds / 3600);
                                    $em = floor(($expectedSeconds % 3600) / 60);
                                    $es = $expectedSeconds % 60;

                                    $wh = floor($workedSeconds / 3600);
                                    $wm = floor(($workedSeconds % 3600) / 60);
                                    $ws = $workedSeconds % 60;

                                    $lh = floor($leftSeconds / 3600);
                                    $lm = floor(($leftSeconds % 3600) / 60);
                                    $ls = $leftSeconds % 60;

                                    $priorityClass = $t->priority === 'high' ? 'pro-badge-high' : ($t->priority === 'medium' ? 'pro-badge-medium' : 'pro-badge-low');
                                    $dotColor = $t->priority === 'high' ? '#ef4444' : ($t->priority === 'medium' ? '#f59e0b' : '#10b981');
                                ?>
                                    <tr>
                                        <td>
                                            <div class="pro-task-title">
                                                <span class="pro-task-dot" style="background:<?= $dotColor ?>"></span>
                                                <?= htmlspecialchars($t->title); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pro-project-chip">
                                                <i class='bx bx-folder' style="font-size:0.9rem;"></i>
                                                <?= htmlspecialchars($t->project_name ?? '—'); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="pro-badge <?= $priorityClass ?>">
                                                <?= ucfirst($t->priority); ?>
                                            </span>
                                        </td>
                                        <?php if ($status !== 'completed'): ?>
                                            <td>
                                                <span class="pro-task-time">
                                                    <i class='bx bx-stopwatch'></i>
                                                    <?= "{$lh}h {$lm}m {$ls}s"; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="pro-badge <?= $status === 'in_progress' ? 'pro-badge-progress' : 'pro-badge-pending'; ?>">
                                                    <i class='bx <?= $status === 'in_progress' ? 'bx-loader-circle' : 'bx-time-five' ?>'
                                                        style="font-size:0.8rem;"></i>
                                                    <?= ucfirst(str_replace('_', ' ', $status)); ?>
                                                </span>
                                            </td>
                                        <?php else: ?>
                                            <td><span class="pro-task-time"><?= "{$eh}h {$em}m {$es}s"; ?></span></td>
                                            <td><span class="pro-task-time"><?= "{$wh}h {$wm}m {$ws}s"; ?></span></td>
                                            <td>
                                                <?php $isDelayed = ($workedSeconds > $expectedSeconds); ?>
                                                <span
                                                    class="pro-badge <?= $isDelayed ? 'pro-badge-delayed' : 'pro-badge-ontime'; ?>">
                                                    <i class='bx <?= $isDelayed ? 'bx-error-circle' : 'bx-check-circle' ?>'
                                                        style="font-size:0.8rem;"></i>
                                                    <?= $isDelayed ? 'Delayed' : 'On Time'; ?>
                                                </span>
                                            </td>
                                        <?php endif; ?>
                                        <td class="text-center">
                                            <?php if ($status === 'pending'): ?>
                                                <a href="<?= site_url('task/task_list') ?>" class="pro-btn-view-list">
                                                    <i class='bx bx-list-ul'></i> View
                                                </a>
                                            <?php else: ?>
                                                <span class="pro-finished-badge">
                                                    <i class='bx bx-check-double' style="font-size:1.1rem;"></i> Done
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <?php if (!$found): ?>
                                    <tr>
                                        <td colspan="8">
                                            <div class="pro-task-empty">
                                                <div class="pro-task-empty-icon">
                                                    <i
                                                        class='bx bx-<?= $status === 'completed' ? 'check-circle' : 'inbox' ?>'></i>
                                                </div>
                                                <p>No <?= strtolower($meta['title']) ?> found</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>









        <!-- ===== Complete Day ===== -->
        <div class="pro-complete-wrap mb-4 pro-animate pro-animate-5">
            <button id="completeBtn" class="pro-btn-complete" <?= $report_submitted ? 'disabled' : '' ?>
                data-bs-toggle="modal" data-bs-target="#reportModal">
                <i class='bx bx-flag'></i> Complete Day
            </button>
        </div>

        <!-- ===== Report Modal ===== -->
        <div class="modal fade pro-modal" id="reportModal">
            <div class="modal-dialog modal-dialog-centered">
                <form id="reportForm" method="post" action="<?= base_url('emp/dashboard/complete_day') ?>"
                    class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class='bx bx-edit'></i> Daily Work Report
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">What did you accomplish today?</label>
                        <textarea name="daily_report" class="form-control" rows="5"
                            placeholder="Describe your tasks, achievements, blockers, and plans..."
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn pro-modal-btn-submit">
                            <i class='bx bx-check'></i> Submit Report
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- <div class="page-wrapper">
        <div class="page-content"> -->
        <!-- ===== Birthdays & Employees Row ===== -->
        <div class="row g-3 mb-4">
            <!-- Birthdays -->
            <div class="col-12 col-lg-6 pro-animate pro-animate-5">
                <div class="pro-info-card h-100">
                    <div class="pro-info-header">
                        <div class="pro-info-header-icon" style="background:#fef2f2; color:#ef4444;">🎂</div>
                        <h6>Upcoming Birthdays</h6>
                    </div>
                    <div class="pro-info-list">
                        <?php if (!empty($upcoming_birthdays)): ?>
                            <?php foreach ($upcoming_birthdays as $b): ?>
                                <div class="pro-person-item">
                                    <img src="<?= !empty($b->photo)
                                                    ? base_url('uploads/profile/' . $b->photo)
                                                    : base_url('assets/images/avatars/avatar-1.png') ?>"
                                        class="pro-person-avatar" alt="">
                                    <div class="pro-person-info">
                                        <p class="pro-person-name"><?= ucfirst($b->name ?? '') ?></p>
                                        <p class="pro-person-meta">🎂 <?= date('d M', strtotime($b->dob)) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="pro-empty">
                                <div class="pro-empty-icon">🎂</div>
                                <p>No upcoming birthdays in next 7 days</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Employees -->
            <div class="col-12 col-lg-6 pro-animate pro-animate-6">
                <div class="pro-info-card h-100">
                    <div class="pro-info-header">
                        <div class="pro-info-header-icon" style="background:#eef2ff; color:#6366f1;">👥</div>
                        <h6>Team Members</h6>
                    </div>
                    <div class="pro-info-list">
                        <?php if (!empty($emp_skills)): ?>
                            <?php foreach ($emp_skills as $e): ?>
                                <a href="<?= base_url('emp/view-profile/' . $e->id) ?>" class="pro-person-item">
                                    <img src="<?= !empty($e->photo)
                                                    ? base_url('uploads/profile/' . $e->photo)
                                                    : base_url('assets/images/avatars/avatar-1.png') ?>"
                                        class="pro-person-avatar" alt="">
                                    <div class="pro-person-info">
                                        <p class="pro-person-name"><?= ucfirst($e->name ?? '') ?></p>
                                        <p class="pro-person-meta"><?= ucfirst($e->designation ?? 'Not Assigned') ?></p>
                                    </div>
                                    <i class='bx bx-chevron-right' style="color:#cbd5e1; font-size:1.2rem;"></i>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="pro-empty">
                                <div class="pro-empty-icon">👥</div>
                                <p>No team members found</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Employee Breaks Activity ===== -->
        <div class="pro-break-card mb-4 pro-animate pro-animate-6">
            <div class="pro-break-header">
                <div class="pro-break-header-left">
                    <div class="pro-break-header-icon">
                        <i class='bx bx-coffee-togo'></i>
                    </div>
                    <div class="pro-break-header-text">
                        <h6>Employee Break Activity</h6>
                        <span><i class='bx bx-calendar me-1'></i>Today's Active Breaks</span>
                    </div>
                </div>
                <?php if (!empty($today_breaks)): ?>
                    <div class="pro-break-count-badge">
                        <span class="pro-live-indicator"></span>
                        <?= count($today_breaks) ?> Active
                    </div>
                <?php endif; ?>
            </div>
            <div class="pro-break-body">
                <?php if (!empty($today_breaks)): ?>
                    <?php foreach ($today_breaks as $b): ?>
                        <div class="pro-break-item">
                            <div class="pro-break-avatar">
                                <?php
                                $words = explode(' ', trim($b->name));
                                $initials = strtoupper(substr($words[0], 0, 1));
                                if (count($words) > 1) {
                                    $initials .= strtoupper(substr(end($words), 0, 1));
                                }
                                echo $initials;
                                ?>
                            </div>
                            <div class="pro-break-info">
                                <p class="pro-break-name"><?= htmlspecialchars($b->name) ?></p>
                                <span class="pro-break-reason">
                                    <i class='bx bx-message-rounded-dots' style="font-size:0.85rem; color:#cbd5e1;"></i>
                                    <?= htmlspecialchars($b->reason) ?>
                                </span>
                            </div>
                            <span class="pro-break-status-badge">
                                <i class='bx bx-coffee' style="font-size:0.8rem;"></i> On Break
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="pro-break-empty">
                        <div class="pro-break-empty-icon">
                            <i class='bx bx-coffee-togo'></i>
                        </div>
                        <h6>No Breaks Right Now</h6>
                        <p>All employees are currently working</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- ===== Announcements & Holidays Row ===== -->
        <div class="row g-3 mb-4">
            <!-- Announcements -->
            <div class="col-12 col-lg-6 pro-animate pro-animate-7">
                <div class="pro-gradient-card h-100">
                    <div class="pro-gradient-header pro-header-announce">
                        <div class="pro-gradient-header-icon">📢</div>
                        <h6>Announcements</h6>
                    </div>
                    <div class="pro-card-body">
                        <?php if (!empty($announcements)): ?>
                            <?php foreach ($announcements as $a): ?>
                                <div class="pro-announce-item">
                                    <h6 class="pro-announce-title"><?= $a->title ?></h6>
                                    <p class="pro-announce-desc"><?= $a->description ?></p>
                                    <span class="pro-time-chip">
                                        <i class='bx bx-time-five' style="font-size:0.8rem;"></i>
                                        <?= timespan(strtotime($a->created_at), time(), 1) ?> ago
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="pro-empty">
                                <div class="pro-empty-icon">📭</div>
                                <p>No announcements available</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Holidays -->
            <div class="col-12 col-lg-6 pro-animate pro-animate-8">
                <div class="pro-gradient-card h-100">
                    <div class="pro-gradient-header pro-header-holiday">
                        <div class="pro-gradient-header-icon">🎉</div>
                        <h6>Upcoming Holidays</h6>
                    </div>
                    <div class="pro-card-body">
                        <?php if (!empty($upcoming_holidays)): ?>
                            <?php foreach ($upcoming_holidays as $h):
                                $today = new DateTime(date('Y-m-d'));
                                $holiday = new DateTime($h->holiday_date);
                                $diff = $today->diff($holiday)->days;
                            ?>
                                <div class="pro-holiday-item">
                                    <div>
                                        <p class="pro-holiday-name"><?= $h->holiday_name ?></p>
                                        <span class="pro-holiday-date">
                                            <?= date('d M Y', strtotime($h->holiday_date)) ?> • <?= $h->day ?>
                                        </span>
                                    </div>
                                    <span class="pro-holiday-badge">
                                        In <?= $diff ?> day<?= $diff != 1 ? 's' : '' ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="pro-empty">
                                <div class="pro-empty-icon">🏖️</div>
                                <p>No upcoming holidays</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="reportMsg"></div>

        <!-- ===== Employee Status (Leaves) ===== -->
        <div class="pro-gradient-card mb-4 pro-animate pro-animate-8">
            <div class="pro-gradient-header pro-header-leave">
                <div class="pro-gradient-header-icon">🏠</div>
                <h6>Employee Status</h6>
            </div>
            <div class="pro-card-body">
                <?php if (!empty($today_leaves)): ?>
                    <?php foreach ($today_leaves as $l): ?>
                        <div class="pro-leave-item">
                            <div>
                                <p class="pro-leave-name"><?= $l->name ?></p>
                                <span class="pro-leave-reason"><?= $l->reason ?></span>
                            </div>
                            <span class="pro-leave-time">
                                <?= timespan(strtotime($l->created_at), time(), 1); ?> ago
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="pro-empty">
                        <div class="pro-empty-icon">✅</div>
                        <p>No employee on leave today</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- ===== Break Reason Modal ===== -->
        <div class="modal fade pro-modal" id="breakModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class='bx bx-coffee'></i> Break Reason
                        </h5>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Why are you taking a break?</label>
                        <select id="breakReason" class="form-select">
                            <option value="">— Select Reason —</option>
                            <option value="Tea Break">🍵 Tea Break</option>
                            <option value="Lunch">🍽️ Lunch</option>
                            <option value="Meeting">📋 Meeting</option>
                            <option value="Other">📌 Other</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn pro-modal-btn-danger" onclick="submitBreak()">
                            <i class='bx bx-pause-circle'></i> Start Break
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Break Log Table ===== -->
        <div class="pro-table-card mb-4 pro-animate pro-animate-9">
            <div class="pro-gradient-header pro-header-break-log">
                <div class="pro-gradient-header-icon">📊</div>
                <h6>Break Log</h6>
            </div>
            <div class="table-responsive">
                <table class="pro-table">
                    <thead>
                        <tr>
                            <th>Reason</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($breaks)): ?>
                            <?php foreach ($breaks as $b): ?>
                                <tr>
                                    <td>
                                        <span class="pro-reason-chip">
                                            <?php
                                            $icons = ['Tea Break' => '🍵', 'Lunch' => '🍽️', 'Meeting' => '📋', 'Other' => '📌'];
                                            echo ($icons[$b->reason] ?? '⏸') . ' ' . $b->reason;
                                            ?>
                                        </span>
                                    </td>
                                    <td class="pro-time-mono">
                                        <?= $b->start_time ? date('h:i:s A', strtotime($b->start_time)) : '—' ?>
                                    </td>
                                    <td class="pro-time-mono">
                                        <?= $b->end_time ? date('h:i:s A', strtotime($b->end_time)) : '—' ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($b->start_time && $b->end_time) {
                                            $seconds = strtotime($b->end_time) - strtotime($b->start_time);
                                            $hours = floor($seconds / 3600);
                                            $minutes = floor(($seconds % 3600) / 60);
                                            $secs = $seconds % 60;
                                            $formatted = $hours > 0 ? "{$hours}h {$minutes}m" : "{$minutes}m {$secs}s";
                                            echo '<span class="pro-duration-chip">' . $formatted . '</span>';
                                        } else {
                                            echo '<span style="color:#cbd5e1;">—</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    <div class="pro-empty">
                                        <div class="pro-empty-icon">📋</div>
                                        <p>No breaks recorded today</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pro-divider my-3"></div>

        <!-- ===== Task Board ===== -->

    </div>
</div>


<!-- Overlay -->
<div class="overlay mobile-toggle-icon"></div>

<!-- Back To Top -->
<a href="javascript:;" class="back-to-top pro-back-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!-- ===== Scripts ===== -->
<script>
    // Live Clock
    (function() {
        const el = document.getElementById('liveClockDash');
        if (!el) return;

        function tick() {
            const d = new Date();
            let h = d.getHours(),
                m = d.getMinutes(),
                ap = 'AM';
            if (h >= 12) {
                ap = 'PM';
                if (h > 12) h -= 12;
            }
            if (h === 0) h = 12;
            el.textContent = String(h).padStart(2, '0') + ':' + String(m).padStart(2, '0') + ' ' + ap;
        }
        tick();
        setInterval(tick, 30000);
    })();

    // Timer Logic
    let timer = null;
    let display = document.getElementById("display");

    function updateDisplay() {
        let start = localStorage.getItem("startTime");
        if (!start) return;
        let s = Math.floor((Date.now() - start) / 1000);
        let h = String(Math.floor(s / 3600)).padStart(2, '0');
        let m = String(Math.floor((s % 3600) / 60)).padStart(2, '0');
        let sec = String(s % 60).padStart(2, '0');
        display.innerHTML = `${h}:${m}:${sec}`;
    }

    function startWatch() {
        if (timer) return;
        localStorage.setItem("startTime", Date.now());
        fetch("<?= site_url('emp/dashboard/start_work') ?>");
        timer = setInterval(updateDisplay, 1000);
        btnStart.disabled = true;
        btnStop.disabled = false;
        btnReset.disabled = true;
    }

    function stopWatch() {
        new bootstrap.Modal(document.getElementById('breakModal')).show();
    }

    function submitBreak() {
        let r = document.getElementById('breakReason').value;
        if (!r) {
            Swal.fire({
                icon: 'warning',
                title: 'Missing Reason',
                text: 'Please select a break reason',
                confirmButtonColor: '#6366f1'
            });
            return;
        }
        fetch("<?= site_url('emp/dashboard/stop_work') ?>");
        fetch("<?= site_url('emp/dashboard/start_timer') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "reason=" + encodeURIComponent(r)
        }).then(() => {
            clearInterval(timer);
            timer = null;
            localStorage.removeItem("startTime");
            breakMode();
            location.reload();
        });
    }

    window.onload = function() {
        const today = new Date().toISOString().slice(0, 10);
        const savedDate = localStorage.getItem("work_date");
        if (savedDate === today && localStorage.getItem("startTime")) {
            timer = setInterval(updateDisplay, 1000);
        } else {
            localStorage.removeItem("startTime");
        }
        localStorage.setItem("work_date", today);
    };

    function resetWatch() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
        fetch("<?= site_url('emp/dashboard/stop_work') ?>");
        localStorage.removeItem("startTime");
        display.innerText = "00:00:00";
        location.reload();
    }

    function resumeWork() {
        fetch("<?= site_url('emp/dashboard/stop_timer') ?>")
            .then(() => fetch("<?= site_url('emp/dashboard/start_work') ?>"))
            .then(() => {
                localStorage.setItem("startTime", Date.now());
                timer = setInterval(updateDisplay, 1000);
                workMode();
                location.reload();
            });
    }
</script>

<script>
    // Report Form
    document.getElementById("reportForm").addEventListener("submit", function(e) {
        e.preventDefault();
        fetch("<?= base_url('emp/dashboard/complete_day') ?>", {
                method: "POST",
                body: new FormData(this)
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "time_error") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Too Early!',
                        text: 'You can submit report only after 7 PM',
                        confirmButtonColor: '#f59e0b'
                    });
                    return;
                }
                if (data.status === "success") {
                    clearInterval(timer);
                    timer = null;
                    localStorage.removeItem("startTime");
                    localStorage.removeItem("work_date");
                    document.getElementById("display").innerText = "00:00:00";
                    document.querySelectorAll("button[onclick='startWatch()'], button[onclick='stopWatch()'], button[onclick='resetWatch()'], #completeBtn")
                        .forEach(btn => btn.disabled = true);
                    Swal.fire({
                        icon: 'success',
                        title: '🎉 Report Submitted!',
                        text: 'Your work report has been submitted. Great work today!',
                        confirmButtonColor: '#22c55e'
                    });
                    bootstrap.Modal.getInstance(document.getElementById('reportModal')).hide();
                }
                if (data.status === "already") {
                    Swal.fire({
                        icon: 'info',
                        title: 'Already Submitted',
                        text: "You have already submitted today's report.",
                        confirmButtonColor: '#6366f1'
                    });
                }
            });
    });
</script>

<script>
    const reportSubmitted = <?= $report_submitted ? 'true' : 'false' ?>;
    const onBreak = <?= $this->session->userdata('on_break') ? 'true' : 'false' ?>;

    const reportHour = <?= $report_hour ?? 19 ?>;

    function lockAllButtons() {
        document.querySelectorAll("button[onclick='startWatch()'], button[onclick='stopWatch()'], button[onclick='resetWatch()'], #completeBtn")
            .forEach(btn => btn.disabled = true);
    }

    function checkCompleteButton() {
        if (reportSubmitted) {
            lockAllButtons();
            return;
        }

        const now = new Date();

        if (reportHour !== null && now.getHours() >= reportHour) {

            document.querySelectorAll("button[onclick='startWatch()'], button[onclick='stopWatch()'], button[onclick='resetWatch()']")
                .forEach(btn => btn.disabled = false);

            const completeBtn = document.getElementById('completeBtn');
            completeBtn.disabled = false;
            completeBtn.classList.add('is-active');
        }
    }

    checkCompleteButton();
    if (!reportSubmitted) setInterval(checkCompleteButton, 60000);
</script>

<script>
    function lockAllWorkButtons() {
        btnStart.disabled = true;
        btnStop.disabled = true;
        btnReset.disabled = true;
    }

    function breakMode() {
        lockAllWorkButtons();
    }

    function workMode() {
        btnStop.disabled = false;
        btnStart.disabled = true;
        btnReset.disabled = true;
    }

    window.addEventListener("load", () => {
        if (reportSubmitted) {
            lockAllWorkButtons();
            document.getElementById("completeBtn").disabled = true;
            return;
        }
        if (onBreak) {
            breakMode();
            return;
        }
        if (localStorage.getItem("startTime")) {
            btnStart.disabled = true;
            btnStop.disabled = false;
            btnReset.disabled = true;
            timer = setInterval(updateDisplay, 1000);
            return;
        }
        btnStart.disabled = false;
        btnStop.disabled = true;
        btnReset.disabled = true;
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>