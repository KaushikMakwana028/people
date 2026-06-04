<style>
    /* ==================== PROFESSIONAL PROFILE STYLES ==================== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap');

    :root {
        --pf-primary: #6366f1;
        --pf-primary-dark: #4f46e5;
        --pf-primary-light: #eef2ff;
        --pf-primary-glow: rgba(99, 102, 241, 0.15);
        --pf-accent: #06b6d4;
        --pf-accent-light: #ecfeff;
        --pf-gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
        --pf-gradient-accent: linear-gradient(135deg, #06b6d4 0%, #6366f1 100%);
        --pf-success: #10b981;
        --pf-success-light: #ecfdf5;
        --pf-warning: #f59e0b;
        --pf-warning-light: #fffbeb;
        --pf-danger: #ef4444;
        --pf-danger-light: #fef2f2;
        --pf-info: #3b82f6;
        --pf-info-light: #eff6ff;
        --pf-dark: #0f172a;
        --pf-heading: #1e293b;
        --pf-text: #334155;
        --pf-muted: #94a3b8;
        --pf-light-muted: #cbd5e1;
        --pf-border: #e2e8f0;
        --pf-border-light: #f1f5f9;
        --pf-bg: #f8fafc;
        --pf-bg-alt: #f1f5f9;
        --pf-card: #ffffff;
        --pf-radius-xs: 8px;
        --pf-radius-sm: 12px;
        --pf-radius: 16px;
        --pf-radius-lg: 20px;
        --pf-radius-xl: 24px;
        --pf-radius-full: 9999px;
        --pf-shadow-xs: 0 1px 2px rgba(0, 0, 0, 0.04);
        --pf-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04);
        --pf-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        --pf-shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -4px rgba(0, 0, 0, 0.04);
        --pf-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
        --pf-shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        --pf-shadow-glow: 0 8px 30px rgba(99, 102, 241, 0.2);
        --pf-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --pf-transition-bounce: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* ===== Base ===== */
    .pf-wrapper {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(180deg, var(--pf-bg) 0%, var(--pf-bg-alt) 100%);
        min-height: 100vh;
        padding: 28px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .pf-wrapper *,
    .pf-wrapper *::before,
    .pf-wrapper *::after {
        box-sizing: border-box;
    }

    /* ===== Animations ===== */
    @keyframes pfFadeInUp {
        from {
            opacity: 0;
            transform: translateY(28px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pfFadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pfFadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-24px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pfFadeInRight {
        from {
            opacity: 0;
            transform: translateX(24px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pfScaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes pfFloat {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-6px);
        }
    }

    @keyframes pfShimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    @keyframes pfPulseRing {
        0% {
            box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4);
        }

        70% {
            box-shadow: 0 0 0 12px rgba(99, 102, 241, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(99, 102, 241, 0);
        }
    }

    @keyframes pfGradientMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes pfSlideIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pfCheckmark {
        0% {
            transform: scale(0) rotate(-45deg);
            opacity: 0;
        }

        50% {
            transform: scale(1.2) rotate(-45deg);
        }

        100% {
            transform: scale(1) rotate(0deg);
            opacity: 1;
        }
    }

    @keyframes pfProgressFill {
        from {
            width: 0;
        }
    }

    @keyframes pfSpin {
        to {
            transform: rotate(360deg);
        }
    }

    .pf-anim {
        animation: pfFadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .pf-anim-left {
        animation: pfFadeInLeft 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .pf-anim-right {
        animation: pfFadeInRight 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .pf-d1 {
        animation-delay: 0.05s;
    }

    .pf-d2 {
        animation-delay: 0.1s;
    }

    .pf-d3 {
        animation-delay: 0.15s;
    }

    .pf-d4 {
        animation-delay: 0.2s;
    }

    .pf-d5 {
        animation-delay: 0.25s;
    }

    .pf-d6 {
        animation-delay: 0.3s;
    }

    .pf-d7 {
        animation-delay: 0.35s;
    }

    .pf-d8 {
        animation-delay: 0.4s;
    }

    /* ===== Page Header ===== */
    .pf-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 32px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .pf-page-header-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .pf-header-icon {
        width: 52px;
        height: 52px;
        background: var(--pf-gradient);
        border-radius: var(--pf-radius);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.5rem;
        box-shadow: var(--pf-shadow-glow);
        flex-shrink: 0;
    }

    .pf-page-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--pf-dark);
        letter-spacing: -0.5px;
        margin: 0 0 2px;
        line-height: 1.2;
    }

    .pf-page-subtitle {
        font-size: 0.85rem;
        color: var(--pf-muted);
        margin: 0;
        font-weight: 400;
    }

    .pf-header-actions {
        display: flex;
        gap: 10px;
    }

    .pf-header-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--pf-card);
        border: 1px solid var(--pf-border);
        padding: 8px 16px;
        border-radius: var(--pf-radius-full);
        font-size: 0.78rem;
        font-weight: 600;
        color: var(--pf-text);
        box-shadow: var(--pf-shadow-xs);
    }

    .pf-header-chip i {
        color: var(--pf-primary);
        font-size: 1rem;
    }

    /* ===== Left Column — Profile Card ===== */
    .pf-profile-card {
        background: var(--pf-card);
        border-radius: var(--pf-radius-xl);
        box-shadow: var(--pf-shadow);
        overflow: hidden;
        border: 1px solid var(--pf-border-light);
        transition: var(--pf-transition);
    }

    .pf-profile-card:hover {
        box-shadow: var(--pf-shadow-md);
    }

    /* Cover */
    .pf-cover {
        height: 160px;
        background: var(--pf-gradient);
        background-size: 200% 200%;
        animation: pfGradientMove 8s ease-in-out infinite;
        position: relative;
        overflow: hidden;
    }

    .pf-cover::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -15%;
        width: 350px;
        height: 350px;
        background: rgba(255, 255, 255, 0.07);
        border-radius: 50%;
        pointer-events: none;
    }

    .pf-cover::after {
        content: '';
        position: absolute;
        bottom: -50%;
        left: -8%;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        pointer-events: none;
    }

    .pf-cover-dots {
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 15% 85%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 85% 15%, rgba(255, 255, 255, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.03) 0%, transparent 40%);
        pointer-events: none;
    }

    .pf-cover-edit {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--pf-transition);
        z-index: 3;
    }

    .pf-cover-edit:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.1);
    }

    /* Avatar */
    .pf-avatar-section {
        text-align: center;
        padding: 0 24px 8px;
        position: relative;
        z-index: 2;
    }

    .pf-avatar-wrap {
        position: relative;
        display: inline-block;
        margin-top: -64px;
    }

    .pf-avatar-ring {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        padding: 5px;
        background: var(--pf-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 30px rgba(99, 102, 241, 0.25), 0 0 0 4px var(--pf-card);
        transition: var(--pf-transition);
    }

    .pf-avatar-wrap:hover .pf-avatar-ring {
        transform: scale(1.04);
        box-shadow: 0 12px 40px rgba(99, 102, 241, 0.35), 0 0 0 4px var(--pf-card);
    }

    .pf-avatar-img {
        width: 126px;
        height: 126px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--pf-card);
        background: var(--pf-card);
        transition: var(--pf-transition);
    }

    .pf-avatar-online {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 20px;
        height: 20px;
        background: var(--pf-success);
        border: 3px solid var(--pf-card);
        border-radius: 50%;
        z-index: 3;
        animation: pfPulseRing 2s infinite;
    }

    .pf-camera-trigger {
        position: absolute;
        bottom: 4px;
        right: 4px;
        width: 40px;
        height: 40px;
        background: var(--pf-gradient);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 3px solid var(--pf-card);
        font-size: 1rem;
        transition: var(--pf-transition-bounce);
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
        z-index: 4;
    }

    .pf-camera-trigger:hover {
        transform: scale(1.15) rotate(12deg);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.45);
    }

    /* Name & Meta */
    .pf-user-name {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--pf-dark);
        margin: 16px 0 6px;
        letter-spacing: -0.3px;
    }

    .pf-user-role {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--pf-primary-light);
        color: var(--pf-primary);
        padding: 5px 16px;
        border-radius: var(--pf-radius-full);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.3px;
        margin-bottom: 8px;
    }

    .pf-user-role i {
        font-size: 0.85rem;
    }

    .pf-user-location {
        color: var(--pf-muted);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        margin-bottom: 4px;
    }

    .pf-user-location i {
        color: var(--pf-danger);
        font-size: 0.95rem;
    }

    /* Stats */
    .pf-stats-row {
        display: flex;
        border-top: 1px solid var(--pf-border-light);
        margin: 16px 0 0;
    }

    .pf-stat-block {
        flex: 1;
        padding: 18px 10px;
        text-align: center;
        border-right: 1px solid var(--pf-border-light);
        transition: var(--pf-transition);
        cursor: default;
    }

    .pf-stat-block:last-child {
        border-right: none;
    }

    .pf-stat-block:hover {
        background: var(--pf-bg);
    }

    .pf-stat-num {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--pf-primary);
        letter-spacing: -0.5px;
        line-height: 1;
        margin-bottom: 4px;
    }

    .pf-stat-text {
        font-size: 0.68rem;
        font-weight: 600;
        color: var(--pf-muted);
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    /* Quick Actions */
    .pf-quick-actions {
        display: flex;
        gap: 10px;
        padding: 18px 24px;
        justify-content: center;
        border-top: 1px solid var(--pf-border-light);
    }

    .pf-btn-follow {
        padding: 10px 28px;
        border-radius: var(--pf-radius-sm);
        font-size: 0.82rem;
        font-weight: 700;
        background: var(--pf-gradient);
        color: #fff;
        border: none;
        transition: var(--pf-transition);
        display: inline-flex;
        align-items: center;
        gap: 7px;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
        cursor: pointer;
    }

    .pf-btn-follow:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(99, 102, 241, 0.4);
        color: #fff;
    }

    .pf-btn-message {
        padding: 10px 28px;
        border-radius: var(--pf-radius-sm);
        font-size: 0.82rem;
        font-weight: 700;
        background: var(--pf-bg);
        color: var(--pf-primary);
        border: 2px solid var(--pf-border) !important;
        transition: var(--pf-transition);
        display: inline-flex;
        align-items: center;
        gap: 7px;
        cursor: pointer;
    }

    .pf-btn-message:hover {
        background: var(--pf-primary-light);
        border-color: var(--pf-primary) !important;
        transform: translateY(-2px);
        color: var(--pf-primary);
    }

    /* ===== Sidebar Cards ===== */
    .pf-sidebar-card {
        background: var(--pf-card);
        border-radius: var(--pf-radius-lg);
        box-shadow: var(--pf-shadow-sm);
        border: 1px solid var(--pf-border-light);
        overflow: hidden;
        transition: var(--pf-transition);
    }

    .pf-sidebar-card:hover {
        box-shadow: var(--pf-shadow);
    }

    .pf-sidebar-header {
        padding: 18px 22px;
        border-bottom: 1px solid var(--pf-border-light);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pf-sidebar-header-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .pf-sidebar-header h6 {
        font-size: 0.88rem;
        font-weight: 700;
        color: var(--pf-heading);
        margin: 0;
    }

    .pf-sidebar-body {
        padding: 18px 22px;
    }

    /* Completion Bar */
    .pf-completion-track {
        height: 8px;
        background: var(--pf-bg-alt);
        border-radius: var(--pf-radius-full);
        overflow: hidden;
        margin-bottom: 10px;
    }

    .pf-completion-fill {
        height: 100%;
        background: var(--pf-gradient);
        border-radius: var(--pf-radius-full);
        transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .pf-completion-fill::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        background-size: 200% 100%;
        animation: pfShimmer 2s infinite;
    }

    .pf-completion-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pf-completion-percent {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--pf-primary);
    }

    .pf-completion-hint {
        font-size: 0.75rem;
        color: var(--pf-muted);
    }

    /* Social Links */
    .pf-social-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid var(--pf-border-light);
        transition: var(--pf-transition);
    }

    .pf-social-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .pf-social-item:first-child {
        padding-top: 0;
    }

    .pf-social-item:hover {
        padding-left: 6px;
    }

    .pf-social-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: #fff;
        flex-shrink: 0;
    }

    .pf-social-icon.si-globe {
        background: linear-gradient(135deg, #06b6d4, #0891b2);
    }

    .pf-social-icon.si-github {
        background: linear-gradient(135deg, #374151, #1f2937);
    }

    .pf-social-icon.si-twitter {
        background: linear-gradient(135deg, #1da1f2, #0a8ed9);
    }

    .pf-social-icon.si-linkedin {
        background: linear-gradient(135deg, #0077b5, #005a8c);
    }

    .pf-social-text {
        font-size: 0.82rem;
        color: var(--pf-text);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-weight: 500;
    }

    /* ===== Right Column — Form Card ===== */
    .pf-form-card {
        background: var(--pf-card);
        border-radius: var(--pf-radius-xl);
        box-shadow: var(--pf-shadow);
        border: 1px solid var(--pf-border-light);
        overflow: hidden;
        transition: var(--pf-transition);
    }

    .pf-form-card:hover {
        box-shadow: var(--pf-shadow-md);
    }

    /* Form Header */
    .pf-form-header {
        padding: 24px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid var(--pf-border-light);
    }

    .pf-form-header-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pf-form-icon {
        width: 42px;
        height: 42px;
        background: var(--pf-primary-light);
        border-radius: var(--pf-radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pf-primary);
        font-size: 1.2rem;
    }

    .pf-form-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--pf-dark);
        margin: 0 0 2px;
        letter-spacing: -0.3px;
    }

    .pf-form-desc {
        font-size: 0.78rem;
        color: var(--pf-muted);
        margin: 0;
    }

    .pf-editable-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: var(--pf-success-light);
        color: var(--pf-success);
        padding: 5px 14px;
        border-radius: var(--pf-radius-full);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.3px;
    }

    /* Form Body */
    .pf-form-body {
        padding: 8px 28px 28px;
    }

    /* Section Titles inside form */
    .pf-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        color: var(--pf-muted);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 18px 18px 6px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pf-section-label::before {
        content: '';
        width: 3px;
        height: 14px;
        background: var(--pf-gradient);
        border-radius: 3px;
    }

    /* Field Row */
    .pf-field-row {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 14px 18px;
        margin: 2px 0;
        border-radius: var(--pf-radius-sm);
        transition: var(--pf-transition);
        position: relative;
    }

    .pf-field-row:hover {
        background: var(--pf-bg);
    }

    .pf-field-icon {
        width: 42px;
        height: 42px;
        border-radius: var(--pf-radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.1rem;
        margin-top: 2px;
        transition: var(--pf-transition);
    }

    .pf-field-row:hover .pf-field-icon {
        transform: scale(1.05);
    }

    .pf-fi-blue {
        background: #eff6ff;
        color: #3b82f6;
    }

    .pf-fi-purple {
        background: #f5f3ff;
        color: #8b5cf6;
    }

    .pf-fi-green {
        background: #ecfdf5;
        color: #10b981;
    }

    .pf-fi-orange {
        background: #fff7ed;
        color: #f97316;
    }

    .pf-fi-red {
        background: #fef2f2;
        color: #ef4444;
    }

    .pf-fi-teal {
        background: #ecfeff;
        color: #06b6d4;
    }

    .pf-fi-indigo {
        background: #eef2ff;
        color: #6366f1;
    }

    .pf-fi-pink {
        background: #fdf2f8;
        color: #ec4899;
    }

    .pf-fi-amber {
        background: #fffbeb;
        color: #f59e0b;
    }

    .pf-field-content {
        flex: 1;
        min-width: 0;
    }

    .pf-field-label {
        display: block;
        font-size: 0.72rem;
        font-weight: 700;
        color: var(--pf-muted);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 7px;
    }

    .pf-field-input {
        width: 100%;
        border: 2px solid var(--pf-border);
        border-radius: var(--pf-radius-sm);
        padding: 11px 16px;
        font-size: 0.88rem;
        font-family: 'Inter', sans-serif;
        color: var(--pf-dark);
        background: var(--pf-card);
        transition: var(--pf-transition);
        outline: none;
    }

    .pf-field-input:focus {
        border-color: var(--pf-primary);
        box-shadow: 0 0 0 4px var(--pf-primary-glow);
        background: #fff;
    }

    .pf-field-input:disabled {
        background: var(--pf-bg-alt);
        color: var(--pf-muted);
        cursor: not-allowed;
        opacity: 0.7;
    }

    .pf-field-input::placeholder {
        color: var(--pf-light-muted);
    }

    textarea.pf-field-input {
        resize: vertical;
        min-height: 88px;
        line-height: 1.6;
    }

    .pf-field-hint {
        font-size: 0.72rem;
        color: var(--pf-light-muted);
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* Divider */
    .pf-form-divider {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--pf-border), transparent);
        margin: 6px 18px;
    }

    /* Action Buttons */
    .pf-form-actions {
        display: flex;
        gap: 12px;
        padding: 22px 18px 0;
        margin-top: 10px;
        border-top: 2px solid var(--pf-bg);
        flex-wrap: wrap;
    }

    .pf-btn-save {
        padding: 12px 36px;
        border-radius: var(--pf-radius-sm);
        font-size: 0.88rem;
        font-weight: 700;
        background: var(--pf-gradient);
        color: #fff;
        border: none;
        transition: var(--pf-transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: var(--pf-shadow-glow);
        cursor: pointer;
        letter-spacing: 0.2px;
    }

    .pf-btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(99, 102, 241, 0.35);
        color: #fff;
    }

    .pf-btn-save:active {
        transform: translateY(0);
    }

    .pf-btn-save:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    .pf-btn-password {
        padding: 12px 30px;
        border-radius: var(--pf-radius-sm);
        font-size: 0.88rem;
        font-weight: 700;
        background: var(--pf-card);
        color: var(--pf-danger);
        border: 2px solid var(--pf-danger-light) !important;
        transition: var(--pf-transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        cursor: pointer;
    }

    .pf-btn-password:hover {
        background: var(--pf-danger-light);
        border-color: var(--pf-danger) !important;
        transform: translateY(-2px);
        color: var(--pf-danger);
    }

    /* ===== Security Card ===== */
    .pf-security-card {
        background: var(--pf-card);
        border-radius: var(--pf-radius-lg);
        box-shadow: var(--pf-shadow-sm);
        border: 1px solid var(--pf-border-light);
        overflow: hidden;
        transition: var(--pf-transition);
    }

    .pf-security-card:hover {
        box-shadow: var(--pf-shadow);
    }

    .pf-security-header {
        padding: 18px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid var(--pf-border-light);
    }

    .pf-security-icon {
        width: 38px;
        height: 38px;
        background: var(--pf-success-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pf-success);
        font-size: 1.1rem;
    }

    .pf-security-header h6 {
        font-size: 0.92rem;
        font-weight: 700;
        color: var(--pf-heading);
        margin: 0;
    }

    .pf-sec-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 24px;
        border-bottom: 1px solid var(--pf-border-light);
        transition: var(--pf-transition);
    }

    .pf-sec-item:last-child {
        border-bottom: none;
    }

    .pf-sec-item:hover {
        background: var(--pf-bg);
    }

    .pf-sec-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .pf-sec-left>i {
        font-size: 1.2rem;
        color: var(--pf-muted);
        width: 24px;
        text-align: center;
    }

    .pf-sec-title {
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--pf-heading);
        margin: 0 0 2px;
    }

    .pf-sec-desc {
        font-size: 0.75rem;
        color: var(--pf-muted);
        margin: 0;
    }

    .pf-sec-badge {
        font-size: 0.72rem;
        padding: 4px 14px;
        border-radius: var(--pf-radius-full);
        font-weight: 700;
        letter-spacing: 0.3px;
        white-space: nowrap;
    }

    .pf-sec-badge.is-active {
        background: var(--pf-success-light);
        color: var(--pf-success);
    }

    .pf-sec-badge.is-inactive {
        background: var(--pf-warning-light);
        color: var(--pf-warning);
    }

    /* ===== Toast ===== */
    .pf-toast {
        position: fixed;
        top: 28px;
        right: 28px;
        z-index: 99999;
        min-width: 340px;
        padding: 16px 22px;
        border-radius: var(--pf-radius);
        color: #fff;
        font-weight: 600;
        font-size: 0.88rem;
        display: flex;
        align-items: center;
        gap: 12px;
        transform: translateX(120%);
        transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.18);
        backdrop-filter: blur(10px);
    }

    .pf-toast.show {
        transform: translateX(0);
    }

    .pf-toast.pf-toast-success {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .pf-toast.pf-toast-error {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .pf-toast-icon {
        width: 28px;
        height: 28px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    /* ===== Responsive ===== */
    @media (max-width: 991.98px) {
        .pf-wrapper {
            padding: 16px;
        }

        .pf-field-row {
            flex-direction: column;
            gap: 8px;
        }

        .pf-field-icon {
            display: none;
        }

        .pf-form-actions {
            flex-direction: column;
        }

        .pf-btn-save,
        .pf-btn-password {
            justify-content: center;
            width: 100%;
        }

        .pf-stat-block {
            padding: 14px 6px;
        }

        .pf-stat-num {
            font-size: 1.1rem;
        }

        .pf-page-title {
            font-size: 1.25rem;
        }

        .pf-form-body {
            padding: 8px 18px 18px;
        }

        .pf-form-header {
            padding: 20px 18px;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }

    @media (max-width: 575.98px) {
        .pf-wrapper {
            padding: 12px;
        }

        .pf-cover {
            height: 120px;
        }

        .pf-avatar-ring {
            width: 110px;
            height: 110px;
        }

        .pf-avatar-img {
            width: 98px;
            height: 98px;
        }

        .pf-user-name {
            font-size: 1.15rem;
        }

        .pf-quick-actions {
            flex-direction: column;
            padding: 14px 18px;
        }

        .pf-btn-follow,
        .pf-btn-message {
            justify-content: center;
        }

        .pf-header-actions {
            display: none;
        }

        .pf-page-title {
            font-size: 1.1rem;
        }

        .pf-page-subtitle {
            font-size: 0.78rem;
        }
    }

    /* ===== Custom Scrollbar ===== */
    .pf-wrapper ::-webkit-scrollbar {
        width: 5px;
    }

    .pf-wrapper ::-webkit-scrollbar-track {
        background: transparent;
    }

    .pf-wrapper ::-webkit-scrollbar-thumb {
        background: var(--pf-light-muted);
        border-radius: 10px;
    }

    .pf-wrapper ::-webkit-scrollbar-thumb:hover {
        background: var(--pf-muted);
    }

    /* Tabs for employee view */
    .pf-tabs {
        display: flex;
        background: var(--pf-bg-alt);
        border-bottom: 1px solid var(--pf-border);
    }

    .pf-tab {
        flex: 1;
        padding: 16px 20px;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--pf-muted);
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
    }

    .pf-tab:hover {
        color: var(--pf-text);
        background: rgba(0, 0, 0, 0.02);
    }

    .pf-tab.active {
        color: var(--pf-primary);
        background: var(--pf-card);
        border-bottom-color: var(--pf-primary);
    }

    .pf-tab i {
        font-size: 1.15rem;
    }

    .pf-tab .pro-tag {
        background: var(--pf-gradient);
        color: #fff;
        font-size: 0.6rem;
        padding: 2px 6px;
        border-radius: 6px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .pf-panel {
        display: none;
        animation: pfPanelIn 0.35s ease forwards;
    }

    .pf-panel.active {
        display: block;
    }

    @keyframes pfPanelIn {
        from {
            opacity: 0;
            transform: translateY(6px);
        }
        to {
            opacity: 1;
            transform: none;
        }
    }

    /* ========== PERFORMANCE TAB ========== */

    /* KPI Cards */
    .pf-kpi-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 28px;
    }

    .pf-kpi {
        background: var(--pf-card);
        border: 1px solid var(--pf-border-light);
        border-radius: var(--pf-radius-sm);
        padding: 20px 16px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: var(--pf-transition);
    }

    .pf-kpi::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
    }

    .pf-kpi:hover {
        transform: translateY(-4px);
        box-shadow: var(--pf-shadow-md);
    }

    .pf-kpi.green::after {
        background: var(--pf-success);
    }

    .pf-kpi.yellow::after {
        background: var(--pf-warning);
    }

    .pf-kpi.blue::after {
        background: var(--pf-info);
    }

    .pf-kpi.red::after {
        background: var(--pf-danger);
    }

    .pf-kpi-icon {
        width: 42px;
        height: 42px;
        border-radius: var(--pf-radius-xs);
        display: grid;
        place-items: center;
        font-size: 1.25rem;
        margin: 0 auto 10px;
    }

    .pf-kpi.green .pf-kpi-icon {
        background: var(--pf-success-light);
        color: var(--pf-success);
    }

    .pf-kpi.yellow .pf-kpi-icon {
        background: var(--pf-warning-light);
        color: var(--pf-warning);
    }

    .pf-kpi.blue .pf-kpi-icon {
        background: var(--pf-info-light);
        color: var(--pf-info);
    }

    .pf-kpi.red .pf-kpi-icon {
        background: var(--pf-danger-light);
        color: var(--pf-danger);
    }

    .pf-kpi-val {
        font-size: 1.7rem;
        font-weight: 800;
        color: var(--pf-dark);
        line-height: 1;
        margin-bottom: 4px;
    }

    .pf-kpi-lbl {
        font-size: 0.72rem;
        font-weight: 600;
        color: var(--pf-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .pf-kpi-trend {
        display: inline-flex;
        align-items: center;
        gap: 3px;
        font-size: 0.68rem;
        font-weight: 600;
        margin-top: 8px;
        padding: 2px 8px;
        border-radius: 20px;
    }

    .pf-kpi-trend.up {
        background: var(--pf-success-light);
        color: var(--pf-success);
    }

    .pf-kpi-trend.down {
        background: var(--pf-danger-light);
        color: var(--pf-danger);
    }

    .pf-kpi-trend.flat {
        background: var(--pf-bg-alt);
        color: var(--pf-muted);
    }

    /* Chart Area */
    .pf-charts {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 0;
    }

    .pf-chart-box {
        background: var(--pf-card);
        border: 1px solid var(--pf-border-light);
        border-radius: var(--pf-radius-sm);
        overflow: hidden;
        transition: var(--pf-transition);
    }

    .pf-chart-box:hover {
        box-shadow: var(--pf-shadow);
    }

    .pf-chart-head {
        padding: 14px 18px;
        border-bottom: 1px solid var(--pf-border-light);
        background: var(--pf-bg);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .pf-chart-head h6 {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--pf-heading);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .pf-chart-head h6 i {
        color: var(--pf-primary);
        font-size: 1.1rem;
    }

    .pf-chart-head .tag {
        font-size: 0.68rem;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 12px;
        background: var(--pf-primary-light);
        color: var(--pf-primary);
    }

    .pf-chart-body {
        padding: 20px;
    }

    /* Circular Progress */
    .pf-circle-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        padding: 16px 0;
    }

    .pf-circle {
        position: relative;
        width: 130px;
        height: 130px;
    }

    .pf-circle svg {
        transform: rotate(-90deg);
        width: 130px;
        height: 130px;
    }

    .pf-circle .track {
        fill: none;
        stroke: var(--pf-bg-alt);
        stroke-width: 10;
    }

    .pf-circle .fill {
        fill: none;
        stroke-width: 10;
        stroke-linecap: round;
        stroke-dasharray: 346;
        stroke-dashoffset: 346;
        transition: stroke-dashoffset 1.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .pf-circle .txt {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .pf-circle .val {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--pf-dark);
        line-height: 1;
    }

    .pf-circle .lbl {
        font-size: 0.68rem;
        color: var(--pf-muted);
        font-weight: 600;
        text-transform: uppercase;
        margin-top: 3px;
    }

    /* Progress Bars */
    .pf-bar-item {
        margin-bottom: 16px;
    }

    .pf-bar-item:last-child {
        margin-bottom: 0;
    }

    .pf-bar-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 6px;
    }

    .pf-bar-label {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--pf-text);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .pf-bar-label .dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .pf-bar-value {
        font-size: 0.78rem;
        font-weight: 700;
        color: var(--pf-heading);
    }

    .pf-bar-track {
        width: 100%;
        height: 7px;
        background: var(--pf-bg-alt);
        border-radius: 7px;
        overflow: hidden;
    }

    .pf-bar-fill {
        height: 100%;
        border-radius: 7px;
        width: 0;
        transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .pf-bar-fill::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
        animation: pfBarShimmer 2s infinite;
    }

    @keyframes pfBarShimmer {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    @media (max-width: 768px) {
        .pf-kpi-row {
            grid-template-columns: repeat(2, 1fr);
        }

        .pf-charts {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- ========== PROFESSIONAL PROFILE PAGE ========== -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="pf-wrapper">

            <!-- ===== Page Header ===== -->
            <div class="pf-page-header pf-anim pf-d1">
                <div class="pf-page-header-left">
                    <div class="pf-header-icon">
                        <i class="bx bx-user-circle"></i>
                    </div>
                    <div>
                        <h1 class="pf-page-title">User Profile</h1>
                        <p class="pf-page-subtitle">Manage your personal information and account settings</p>
                    </div>
                </div>
                <div class="pf-header-actions">
                    <span class="pf-header-chip">
                        <i class='bx bx-check-shield'></i>
                        Account Verified
                    </span>
                    <span class="pf-header-chip">
                        <i class='bx bx-calendar'></i>
                        <?= date('M d, Y') ?>
                    </span>
                </div>
            </div>

            <!-- ===== Form Wrapper ===== -->
            <form action="<?= $is_own_profile ? site_url('emp/profile/update') : '#' ?>" method="post"
                enctype="multipart/form-data" id="profileForm" <?= !$is_own_profile ? 'onsubmit="return false;"' : '' ?>>
                <div class="container-fluid px-0">
                    <div class="row g-4">

                        <!-- ===== LEFT COLUMN ===== -->
                        <div class="col-lg-4">

                            <!-- Profile Card -->
                            <div class="pf-profile-card pf-anim-left pf-d2">

                                <!-- Cover -->
                                <div class="pf-cover">
                                    <div class="pf-cover-dots"></div>
                                    <div class="pf-cover-edit" title="Change cover">
                                        <i class='bx bx-image-add'></i>
                                    </div>
                                </div>

                                <!-- Avatar Section -->
                                <div class="pf-avatar-section">
                                    <div class="pf-avatar-wrap">
                                        <div class="pf-avatar-ring">
                                            <img id="imagePreview" class="pf-avatar-img" src="<?= !empty($user->photo)
                                                ? base_url('uploads/profile/' . $user->photo)
                                                : base_url('assets/default.jpg'); ?>"
                                                alt="Profile Photo" >
                                        </div>
                                        <div class="pf-avatar-online"></div>
                                        <label for="imageUpload" class="pf-camera-trigger" title="Change photo">
                                            <i class="bx bx-camera"></i>
                                        </label>
                                        <input type="file" name="photo" id="imageUpload" hidden accept="image/*">
                                    </div>

                                    <h4 class="pf-user-name"><?= htmlspecialchars($user->name); ?></h4>

                                    <div class="pf-user-role">
                                        <i class='bx bx-shield-quarter'></i>
                                        EMPLOYEE

                                         <!-- <?= !$is_own_profile ? 'disabled' : '' ?> -->
                                    </div>

                                    <?php if (!empty($user->address)): ?>
                                        <p class="pf-user-location">
                                            <i class='bx bx-map'></i>
                                            <?= htmlspecialchars($user->address); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <!-- Stats -->
                                <div class="pf-stats-row">
                                    <div class="pf-stat-block">
                                        <div class="pf-stat-num">24</div>
                                        <div class="pf-stat-text">Projects</div>
                                    </div>
                                    <div class="pf-stat-block">
                                        <div class="pf-stat-num">156</div>
                                        <div class="pf-stat-text">Tasks</div>
                                    </div>
                                    <div class="pf-stat-block">
                                        <div class="pf-stat-num">98%</div>
                                        <div class="pf-stat-text">Rating</div>
                                    </div>
                                </div>

                                
                               
                            </div>

                            <!-- Profile Completion -->
                            <div class="pf-sidebar-card mt-3 pf-anim-left pf-d3">
                                <div class="pf-sidebar-header">
                                    <div class="pf-sidebar-header-icon" style="background:#fffbeb; color:#f59e0b;">
                                        <i class='bx bx-bar-chart-alt-2'></i>
                                    </div>
                                    <h6>Profile Completion</h6>
                                </div>
                                <div class="pf-sidebar-body">
                                    <div class="pf-completion-track">
                                        <div class="pf-completion-fill" id="completionBar" style="width: 0%"></div>
                                    </div> 
                                    <div class="pf-completion-meta">
                                        <span class="pf-completion-percent" id="completionPercent">0%</span>
                                        <span class="pf-completion-hint">Complete for better visibility</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links -->
                           

                        </div>

                        <!-- ===== RIGHT COLUMN ===== -->
                        <div class="col-lg-8">

                            <!-- Form Card -->
                            <div class="pf-form-card pf-anim-right pf-d2">

                                <div class="pf-tabs">
                                    <button type="button" class="pf-tab active" data-tab="personal">
                                        <i class='bx bx-user'></i> Personal Info
                                    </button>
                                    <button type="button" class="pf-tab" data-tab="performance">
                                        <i class='bx bx-bar-chart-alt-2'></i> Performance
                                        <span class="pro-tag">PRO</span>
                                    </button>
                                </div>

                                <div class="pf-panel active" id="panel-personal">
                                    <!-- Header -->
                                    <div class="pf-form-header">
                                        <div class="pf-form-header-left">
                                            <div class="pf-form-icon">
                                                <i class='bx bx-edit-alt'></i>
                                            </div>
                                            <div>
                                                <h5 class="pf-form-title">Personal Information</h5>
                                                <p class="pf-form-desc">Employee profile details and contact info</p>
                                            </div>
                                        </div>
                                        <span class="pf-editable-badge" style="background: var(--pf-primary-light); color: var(--pf-primary);">
                                            <i class='bx bx-show'></i> Read-only
                                        </span>
                                    </div>

                                    <!-- Body -->
                                    <div class="pf-form-body">

                                    <!-- Section: Basic Info -->
                                    <p class="pf-section-label">Basic Information</p>

                                    <!-- Full Name -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-blue">
                                            <i class='bx bx-user'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Full Name</label>
                                            <input type="text" name="name" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->name); ?>"
                                                placeholder="Enter your full name" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-purple">
                                            <i class='bx bx-envelope'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Email Address</label>
                                            <input type="email" name="email" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->email); ?>"
                                                placeholder="name@example.com" required <?= !$is_own_profile ? 'disabled' : '' ?>>
                                            <span class="pf-field-hint">
                                                <i class='bx bx-info-circle'></i>
                                                This email is used for account notifications
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-green">
                                            <i class='bx bx-phone'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Phone Number</label>
                                            <input type="text" name="phone" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->phone ?? ''); ?>"
                                                placeholder="+91 XXXXX XXXXX" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-orange">
                                            <i class='bx bx-map'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Address</label>
                                            <input type="text" name="address" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->address ?? ''); ?>"
                                                placeholder="Enter your address" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <hr class="pf-form-divider">

                                    <!-- Section: Professional -->
                                    <p class="pf-section-label">Professional Details</p>

                                    <!-- Designation -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-teal">
                                            <i class='bx bx-briefcase'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Designation</label>
                                            <input type="text" name="designation" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->designation ?? ''); ?>"
                                                placeholder="e.g. Senior Developer" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- Skills -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-indigo">
                                            <i class='bx bx-code-alt'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Skills & Expertise</label>
                                            <textarea name="skills" class="pf-field-input"
                                                placeholder="e.g. PHP, JavaScript, Laravel, React..."
                                                <?= !$is_own_profile ? 'disabled' : '' ?>><?= htmlspecialchars($user->skills ?? ''); ?></textarea>
                                            <span class="pf-field-hint">
                                                <i class='bx bx-info-circle'></i>
                                                Separate skills with commas
                                            </span>
                                        </div>
                                    </div>

                                    <hr class="pf-form-divider">

                                    <!-- Section: Identity -->
                                    <p class="pf-section-label">Identity & Personal</p>

                                    <!-- Aadhar -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-red">
                                            <i class='bx bx-id-card'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Aadhar Card</label>
                                            <input type="text" name="aadhar_card" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->aadhar_card ?? ''); ?>"
                                                placeholder="XXXX XXXX XXXX" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                            <span class="pf-field-hint">
                                                <i class='bx bx-lock-alt'></i>
                                                Your ID is stored securely and encrypted
                                            </span>
                                        </div>
                                    </div>

                                    <!-- DOB -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-pink">
                                            <i class='bx bx-cake'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Date of Birth</label>
                                            <input type="date" name="dob" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->dob ?? ''); ?>" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <hr class="pf-form-divider">

                                    <!-- Section: Bank Details -->
                                    <p class="pf-section-label">Bank Details</p>

                                    <!-- Bank Name -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-blue">
                                            <i class='bx bx-buildings'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Bank Name</label>
                                            <input type="text" name="bank_name" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->bank_name ?? ''); ?>"
                                                placeholder="e.g. HDFC Bank" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- Account Holder Name -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-purple">
                                            <i class='bx bx-user-check'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Account Holder Name</label>
                                            <input type="text" name="account_holder_name" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->account_holder_name ?? ''); ?>"
                                                placeholder="e.g. John Doe" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- Account Number -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-green">
                                            <i class='bx bx-hash'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Account Number</label>
                                            <input type="text" name="account_number" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->account_number ?? ''); ?>"
                                                placeholder="Enter account number" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- IFSC Code -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-teal">
                                            <i class='bx bx-barcode'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">IFSC Code</label>
                                            <input type="text" name="ifsc_code" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->ifsc_code ?? ''); ?>"
                                                placeholder="e.g. HDFC0001234" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- Bank Branch -->
                                    <div class="pf-field-row">
                                        <div class="pf-field-icon pf-fi-orange">
                                            <i class='bx bx-map-alt'></i>
                                        </div>
                                        <div class="pf-field-content">
                                            <label class="pf-field-label">Bank Branch</label>
                                            <input type="text" name="bank_branch" class="pf-field-input"
                                                value="<?= htmlspecialchars($user->bank_branch ?? ''); ?>"
                                                placeholder="Enter bank branch" <?= !$is_own_profile ? 'disabled' : '' ?>>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <?php if ($is_own_profile): ?>
                                        <div class="pf-form-actions">
                                            <button type="submit" class="pf-btn-save" id="saveBtn">
                                                <i class='bx bx-save'></i> Save Changes
                                            </button>
                                            <a href="<?= base_url('emp/change-password'); ?>" class="pf-btn-password">
                                                <i class='bx bx-lock-alt'></i> Change Password
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                </div>

                                <!-- PANEL: PERFORMANCE -->
                                <div class="pf-panel" id="panel-performance">
                                    <div class="pf-form-header">
                                        <div class="pf-form-header-left">
                                            <div class="pf-form-icon" style="background: var(--pf-primary-light); color: var(--pf-primary);">
                                                <i class='bx bx-bar-chart-alt-2'></i>
                                            </div>
                                            <div>
                                                <h5 class="pf-form-title">Performance Analytics</h5>
                                                <p class="pf-form-desc">Metrics, efficiency, and task distribution</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pf-form-body" style="padding-top: 24px;">
                                        
                                        <!-- KPI widgets -->
                                        <div class="pf-kpi-row">
                                            <div class="pf-kpi green">
                                                <div class="pf-kpi-icon"><i class='bx bx-check-double'></i></div>
                                                <div class="pf-kpi-val" id="kpi-completed">0</div>
                                                <div class="pf-kpi-lbl">Completed</div>
                                                <span class="pf-kpi-trend up"><i class='bx bx-trending-up'></i> On Track</span>
                                            </div>
                                            <div class="pf-kpi yellow">
                                                <div class="pf-kpi-icon"><i class='bx bx-time-five'></i></div>
                                                <div class="pf-kpi-val" id="kpi-pending">0</div>
                                                <div class="pf-kpi-lbl">Pending</div>
                                                <span class="pf-kpi-trend flat"><i class='bx bx-minus'></i> Stable</span>
                                            </div>
                                            <div class="pf-kpi blue">
                                                <div class="pf-kpi-icon"><i class='bx bx-calendar-check'></i></div>
                                                <div class="pf-kpi-val" id="kpi-ontime">0</div>
                                                <div class="pf-kpi-lbl">On Time</div>
                                                <span class="pf-kpi-trend up"><i class='bx bx-trending-up'></i> Great</span>
                                            </div>
                                            <div class="pf-kpi red">
                                                <div class="pf-kpi-icon"><i class='bx bx-error-circle'></i></div>
                                                <div class="pf-kpi-val" id="kpi-delayed">0</div>
                                                <div class="pf-kpi-lbl">Delayed</div>
                                                <span class="pf-kpi-trend down"><i class='bx bx-trending-down'></i> Focus</span>
                                            </div>
                                        </div>

                                        <!-- Charts Grid -->
                                        <div class="pf-charts">
                                            <div class="pf-chart-box">
                                                <div class="pf-chart-head">
                                                    <h6><i class='bx bx-bar-chart-alt-2'></i> Task Distribution</h6>
                                                    <span class="tag">This Month</span>
                                                </div>
                                                <div class="pf-chart-body">
                                                    <canvas id="empBarChart" height="220"></canvas>
                                                </div>
                                            </div>

                                            <div class="pf-chart-box">
                                                <div class="pf-chart-head">
                                                    <h6><i class='bx bx-target-lock'></i> Efficiency Score</h6>
                                                    <span class="tag">Live</span>
                                                </div>
                                                <div class="pf-chart-body">
                                                    <div class="pf-circle-wrap">
                                                        <div class="pf-circle">
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

                                            <div class="pf-chart-box" style="grid-column: 1 / -1;">
                                                <div class="pf-chart-head">
                                                    <h6><i class='bx bx-slider-alt'></i> Performance Breakdown</h6>
                                                    <span class="tag">Detail</span>
                                                </div>
                                                <div class="pf-chart-body">
                                                    <div class="pf-bar-item">
                                                        <div class="pf-bar-top">
                                                            <span class="pf-bar-label"><span class="dot"
                                                                    style="background:#22c55e"></span> Completion Rate</span>
                                                            <span class="pf-bar-value" id="bComp">0%</span>
                                                        </div>
                                                        <div class="pf-bar-track">
                                                            <div class="pf-bar-fill" id="fComp"
                                                                style="background: linear-gradient(90deg,#22c55e,#16a34a)"></div>
                                                        </div>
                                                    </div>
                                                    <div class="pf-bar-item">
                                                        <div class="pf-bar-top">
                                                            <span class="pf-bar-label"><span class="dot"
                                                                    style="background:#3b82f6"></span> On Time </span>
                                                            <span class="pf-bar-value" id="bPunc">0%</span>
                                                        </div>
                                                        <div class="pf-bar-track">
                                                            <div class="pf-bar-fill" id="fPunc"
                                                                style="background: linear-gradient(90deg,#3b82f6,#2563eb)"></div>
                                                        </div>
                                                    </div>
                                                    <div class="pf-bar-item">
                                                        <div class="pf-bar-top">
                                                            <span class="pf-bar-label"><span class="dot"
                                                                    style="background:#f59e0b"></span> Pending Ratio</span>
                                                            <span class="pf-bar-value" id="bPend">0%</span>
                                                        </div>
                                                        <div class="pf-bar-track">
                                                            <div class="pf-bar-fill" id="fPend"
                                                                style="background: linear-gradient(90deg,#f59e0b,#d97706)"></div>
                                                        </div>
                                                    </div>
                                                    <div class="pf-bar-item">
                                                        <div class="pf-bar-top">
                                                            <span class="pf-bar-label"><span class="dot"
                                                                    style="background:#ef4444"></span> Delay Rate</span>
                                                            <span class="pf-bar-value" id="bDel">0%</span>
                                                        </div>
                                                        <div class="pf-bar-track">
                                                            <div class="pf-bar-fill" id="fDel"
                                                                style="background: linear-gradient(90deg,#ef4444,#dc2626)"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Security Card -->
                            

                        </div>
                    </div>
                </div>
            </form>

            <!-- Toast -->
            <div class="pf-toast" id="pfToast">
                <div class="pf-toast-icon">
                    <i class='bx bx-check-circle' id="pfToastIcon"></i>
                </div>
                <span id="pfToastMsg">Profile updated successfully!</span>
            </div>

        </div>
    </div>
</div>

<!-- ===== Scripts ===== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // ===== Image Preview =====
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');

        imageUpload.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            if (file.size > 2 * 1024 * 1024) {
                showToast('Image must be less than 2 MB', 'error');
                e.target.value = '';
                return;
            }

            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                showToast('Please upload a valid image file', 'error');
                e.target.value = '';
                return;
            }

            imagePreview.style.opacity = '0.4';
            imagePreview.style.transform = 'scale(0.95)';
            setTimeout(() => {
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.opacity = '1';
                imagePreview.style.transform = 'scale(1)';
                showToast('Photo selected — save to apply', 'success');
            }, 400);
        });

        // ===== Profile Completion =====
        function calcCompletion() {
            const fields = [
                'input[name="name"]',
                'input[name="email"]',
                'input[name="phone"]',
                'input[name="address"]',
                'input[name="designation"]',
                'textarea[name="skills"]',
                'input[name="aadhar_card"]',
                'input[name="dob"]',
                'input[name="bank_name"]',
                'input[name="account_holder_name"]',
                'input[name="account_number"]',
                'input[name="ifsc_code"]',
                'input[name="bank_branch"]'
            ];

            let filled = 0;
            fields.forEach(sel => {
                const el = document.querySelector(sel);
                if (el && el.value.trim() !== '') filled++;
            });

            const photoSrc = imagePreview.src;
            if (!photoSrc.includes('default.jpg')) filled++;

            const total = fields.length + 1;
            const pct = Math.round((filled / total) * 100);

            document.getElementById('completionBar').style.width = pct + '%';
            document.getElementById('completionPercent').textContent = pct + '%';
        }

        calcCompletion();

        document.querySelectorAll('#profileForm input, #profileForm textarea')
            .forEach(el => el.addEventListener('input', calcCompletion));

        imageUpload.addEventListener('change', () => setTimeout(calcCompletion, 500));

        // ===== Toast =====
        function showToast(message, type = 'success') {
            const toast = document.getElementById('pfToast');
            const msg = document.getElementById('pfToastMsg');
            const icon = document.getElementById('pfToastIcon');

            msg.textContent = message;
            toast.className = 'pf-toast pf-toast-' + type;
            icon.className = type === 'success' ? 'bx bx-check-circle' : 'bx bx-error-circle';

            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 4000);
        }

        // ===== Save Button =====
        const saveBtn = document.getElementById('saveBtn');
        const form = document.getElementById('profileForm');

        if (saveBtn && form) {
            form.addEventListener('submit', function () {
                saveBtn.innerHTML = '<i class="bx bx-loader-alt" style="animation:pfSpin 1s linear infinite;"></i> Saving...';
                saveBtn.disabled = true;
            });
        }

        // ===== Stagger Field Animations =====
        const observer = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            },
            { threshold: 0.1 }
        );

        document.querySelectorAll('.pf-field-row').forEach((el, i) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(16px)';
            el.style.transition = `all 0.5s cubic-bezier(0.16, 1, 0.3, 1) ${i * 0.06}s`;
            observer.observe(el);
        });

        // ===== Input Focus Enhancement =====
        document.querySelectorAll('.pf-field-input').forEach(input => {
            input.addEventListener('focus', function () {
                const row = this.closest('.pf-field-row');
                if (row) row.style.background = 'var(--pf-primary-light)';
            });
            input.addEventListener('blur', function () {
                const row = this.closest('.pf-field-row');
                if (row) row.style.background = '';
            });
        });

        // ===== Tab Switching =====
        const tabs = document.querySelectorAll('.pf-tab');
        const panels = document.querySelectorAll('.pf-panel');
        let perfReady = false;

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                tabs.forEach(t => t.classList.remove('active'));
                panels.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('panel-' + this.dataset.tab).classList.add('active');
                if (this.dataset.tab === 'performance' && !perfReady) {
                    setTimeout(initPerf, 150);
                    perfReady = true;
                }
            });
        });

        // ===== Performance Metrics & Chart Initialization =====
        const perf = <?= json_encode($performance) ?>;
        const total = (perf.completed || 0) + (perf.pending || 0) + (perf.ontime || 0) + (perf.delayed || 0);

        function initPerf() {
            const completedVal = parseInt(perf.completed) || 0;
            const pendingVal = parseInt(perf.pending) || 0;
            const ontimeVal = parseInt(perf.ontime) || 0;
            const delayedVal = parseInt(perf.delayed) || 0;

            animNum(document.getElementById('kpi-completed'), completedVal, '');
            animNum(document.getElementById('kpi-pending'), pendingVal, '');
            animNum(document.getElementById('kpi-ontime'), ontimeVal, '');
            animNum(document.getElementById('kpi-delayed'), delayedVal, '');

            const compPct = total > 0 ? Math.round((completedVal / total) * 100) : 0;
            const puncPct = completedVal > 0 ? Math.round((ontimeVal / completedVal) * 100) : 0;
            const pendPct = total > 0 ? Math.round((pendingVal / total) * 100) : 0;
            const delPct = total > 0 ? Math.round((delayedVal / total) * 100) : 0;
            const efficiency = total > 0 ? Math.round(((completedVal + ontimeVal) / (total + delayedVal)) * 100) : 0;

            const circle = document.getElementById('progressCircle');
            if (circle) {
                const circ = 2 * Math.PI * 50;
                circle.style.strokeDasharray = circ;
                setTimeout(() => {
                    circle.style.strokeDashoffset = circ - (circ * Math.min(efficiency, 100) / 100);
                }, 300);
            }
            animNum(document.getElementById('effVal'), efficiency, '%');

            setTimeout(() => {
                const fComp = document.getElementById('fComp'), bComp = document.getElementById('bComp');
                const fPunc = document.getElementById('fPunc'), bPunc = document.getElementById('bPunc');
                const fPend = document.getElementById('fPend'), bPend = document.getElementById('bPend');
                const fDel = document.getElementById('fDel'), bDel = document.getElementById('bDel');

                if (fComp) { fComp.style.width = compPct + '%'; bComp.textContent = compPct + '%'; }
                if (fPunc) { fPunc.style.width = puncPct + '%'; bPunc.textContent = puncPct + '%'; }
                if (fPend) { fPend.style.width = pendPct + '%'; bPend.textContent = pendPct + '%'; }
                if (fDel) { fDel.style.width = delPct + '%'; bDel.textContent = delPct + '%'; }
            }, 400);

            const chartEl = document.getElementById('empBarChart');
            if (chartEl) {
                const ctx = chartEl.getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Completed', 'Pending', 'On Time', 'Delayed'],
                        datasets: [{
                            label: 'Tasks',
                            data: [completedVal, pendingVal, ontimeVal, delayedVal],
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
    });
</script>