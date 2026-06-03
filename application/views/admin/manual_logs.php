<style>
.adm-manual {
    --manual-bg: var(--bg-secondary, #f8fafc);
    --manual-card: var(--bg-primary, #ffffff);
    --manual-soft: var(--bg-tertiary, #f1f5f9);
    --manual-text: var(--text-primary, #0f172a);
    --manual-muted: var(--text-secondary, #64748b);
    --manual-border: var(--border-color, #e2e8f0);
    --manual-primary: #6366f1;
    --manual-secondary: #8b5cf6;
    --manual-danger: #ef4444;
    --manual-success: #10b981;
    --manual-warning: #f59e0b;
    --manual-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
    font-family: 'Poppins', sans-serif;
    background: var(--manual-bg);
    min-height: calc(100vh - 73px);
}

[data-bs-theme=dark] .adm-manual {
    --manual-shadow: 0 18px 45px rgba(0, 0, 0, 0.25);
}

.adm-manual .page-content {
    padding: 24px;
}

.adm-manual-hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    padding: 28px 30px;
    margin-bottom: 22px;
    border-radius: 24px;
    overflow: hidden;
    position: relative;
    background: linear-gradient(135deg, var(--manual-primary), var(--manual-secondary));
    color: #fff;
    box-shadow: var(--manual-shadow);
}

.adm-manual-hero::after {
    content: '';
    position: absolute;
    width: 260px;
    height: 260px;
    right: -80px;
    top: -100px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.12);
}

.adm-manual-hero h1 {
    position: relative;
    z-index: 1;
    margin: 0 0 8px;
    font-size: clamp(24px, 3vw, 34px);
    font-weight: 800;
    letter-spacing: -0.04em;
}

.adm-manual-hero p {
    position: relative;
    z-index: 1;
    margin: 0;
    color: rgba(255, 255, 255, 0.78);
}

.adm-manual-hero-icon {
    position: relative;
    z-index: 1;
    width: 76px;
    height: 76px;
    display: grid;
    place-items: center;
    border-radius: 22px;
    background: rgba(255, 255, 255, 0.14);
    font-size: 38px;
}

.adm-manual-alert {
    padding: 14px 16px;
    margin-bottom: 18px;
    border-radius: 14px;
    border: 1px solid var(--manual-border);
    background: var(--manual-card);
    color: var(--manual-text);
    box-shadow: var(--manual-shadow);
}

.adm-manual-alert.success {
    border-color: rgba(16, 185, 129, 0.35);
    color: var(--manual-success);
}

.adm-manual-alert.error {
    border-color: rgba(239, 68, 68, 0.35);
    color: var(--manual-danger);
}

.adm-manual-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 22px;
}

.adm-manual-card {
    border-radius: 22px;
    background: var(--manual-card);
    border: 1px solid var(--manual-border);
    box-shadow: var(--manual-shadow);
    overflow: hidden;
}

.adm-manual-card-body {
    padding: 24px;
}

.adm-manual-section-head {
    display: flex;
    align-items: center;
    gap: 14px;
    padding-bottom: 18px;
    margin-bottom: 20px;
    border-bottom: 1px solid var(--manual-border);
}

.adm-manual-section-icon {
    width: 46px;
    height: 46px;
    display: grid;
    place-items: center;
    border-radius: 14px;
    color: #fff;
    font-size: 22px;
    background: var(--head-gradient);
}

.adm-manual-section-title {
    color: var(--manual-text);
    font-size: 20px;
    font-weight: 750;
    margin: 0;
}

.adm-manual-section-subtitle {
    color: var(--manual-muted);
    font-size: 13px;
}

.adm-manual-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.adm-manual-field.full {
    grid-column: 1 / -1;
}

.adm-manual-label {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 8px;
    color: var(--manual-text);
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.adm-manual .form-control,
.adm-manual .form-select {
    min-height: 46px;
    border: 1px solid var(--manual-border);
    border-radius: 14px;
    background-color: var(--manual-soft);
    color: var(--manual-text);
    font-size: 14px;
    font-weight: 500;
}

.adm-manual .form-control:focus,
.adm-manual .form-select:focus {
    border-color: var(--manual-primary);
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
}

.adm-manual-submit {
    width: 100%;
    min-height: 48px;
    margin-top: 18px;
    border: 0;
    border-radius: 15px;
    color: #fff;
    font-weight: 700;
    background: var(--button-gradient);
    box-shadow: 0 14px 24px var(--button-shadow);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.adm-manual-submit:hover {
    color: #fff;
    transform: translateY(-2px);
}

.adm-manual-table-wrap {
    overflow-x: auto;
}

.adm-manual-table {
    width: 100%;
    min-width: 760px;
    border-collapse: separate;
    border-spacing: 0;
}

.adm-manual-table th {
    padding: 14px 16px;
    color: #fff;
    background: var(--table-gradient);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.adm-manual-table th:first-child {
    border-radius: 14px 0 0 14px;
}

.adm-manual-table th:last-child {
    border-radius: 0 14px 14px 0;
}

.adm-manual-table td {
    padding: 16px;
    color: var(--manual-text);
    border-bottom: 1px solid var(--manual-border);
    vertical-align: middle;
}

.adm-manual-user {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 650;
}

.adm-manual-avatar {
    width: 34px;
    height: 34px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    color: #fff;
    background: linear-gradient(135deg, var(--manual-primary), var(--manual-secondary));
    font-size: 13px;
}

.adm-manual-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 10px;
    border-radius: 999px;
    color: var(--pill-color);
    background: var(--pill-bg);
    font-size: 13px;
    font-weight: 700;
}

.adm-manual-note {
    color: var(--manual-muted);
    font-size: 13px;
}

.adm-manual-empty {
    padding: 34px 18px;
    text-align: center;
    color: var(--manual-muted);
}

.adm-manual-empty strong {
    display: block;
    margin-bottom: 4px;
    color: var(--manual-text);
}

@media (max-width: 1199px) {
    .adm-manual-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 767px) {
    .adm-manual .page-content {
        padding: 16px;
    }

    .adm-manual-hero {
        padding: 24px 20px;
        border-radius: 20px;
    }

    .adm-manual-hero-icon {
        display: none;
    }

    .adm-manual-card-body {
        padding: 18px;
    }

    .adm-manual-form-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="page-wrapper adm-manual">
    <div class="page-content">
        <section class="adm-manual-hero">
            <div>
                <h1>Manual Logs</h1>
                <p>Add and review manual work and break entries for today.</p>
            </div>
            <div class="adm-manual-hero-icon"><i class="bx bx-time-five"></i></div>
        </section>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="adm-manual-alert success"><?= htmlspecialchars($this->session->flashdata('success')) ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="adm-manual-alert error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
        <?php endif; ?>

        <section class="adm-manual-grid">
            <div class="adm-manual-card">
                <div class="adm-manual-card-body">
                    <div class="adm-manual-section-head">
                        <div class="adm-manual-section-icon" style="--head-gradient: linear-gradient(135deg, #6366f1, #8b5cf6);">
                            <i class="bx bx-briefcase"></i>
                        </div>
                        <div>
                            <h2 class="adm-manual-section-title">Manual Work Log</h2>
                            <div class="adm-manual-section-subtitle">Add work entries for employees who forgot to log.</div>
                        </div>
                    </div>

                    <form method="post" action="<?= base_url('admin/history/add_manual_work') ?>">
                        <div class="adm-manual-form-grid">
                            <div class="adm-manual-field full">
                                <label class="adm-manual-label"><i class="bx bx-user"></i> Employee</label>
                                <select name="emp_id" class="form-select" required>
                                    <option value="">Select Employee</option>
                                    <?php foreach ($employees as $emp): ?>
                                        <option value="<?= (int) $emp->id ?>"><?= htmlspecialchars($emp->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="adm-manual-field">
                                <label class="adm-manual-label"><i class="bx bx-play-circle"></i> Start Time</label>
                                <input type="datetime-local" name="start_time" class="form-control" required>
                            </div>
                            <div class="adm-manual-field">
                                <label class="adm-manual-label"><i class="bx bx-stop-circle"></i> End Time</label>
                                <input type="datetime-local" name="end_time" class="form-control" required>
                            </div>
                            <div class="adm-manual-field full">
                                <label class="adm-manual-label"><i class="bx bx-note"></i> Note</label>
                                <input type="text" name="note" class="form-control" placeholder="e.g., Forgot to start timer">
                            </div>
                        </div>
                        <button type="submit" class="adm-manual-submit" style="--button-gradient: linear-gradient(135deg, #6366f1, #4f46e5); --button-shadow: rgba(99, 102, 241, 0.26);">
                            <i class="bx bx-plus-circle"></i> Add Work Log Entry
                        </button>
                    </form>
                </div>
            </div>

            <div class="adm-manual-card">
                <div class="adm-manual-card-body">
                    <div class="adm-manual-section-head">
                        <div class="adm-manual-section-icon" style="--head-gradient: linear-gradient(135deg, #ef4444, #f97316);">
                            <i class="bx bx-coffee"></i>
                        </div>
                        <div>
                            <h2 class="adm-manual-section-title">Manual Break Log</h2>
                            <div class="adm-manual-section-subtitle">Add break entries for employees.</div>
                        </div>
                    </div>

                    <form method="post" action="<?= base_url('admin/dashboard/add_manual_break') ?>">
                        <div class="adm-manual-form-grid">
                            <div class="adm-manual-field full">
                                <label class="adm-manual-label"><i class="bx bx-user"></i> Employee</label>
                                <select name="emp_id" class="form-select" required>
                                    <option value="">Select Employee</option>
                                    <?php foreach ($employees as $emp): ?>
                                        <option value="<?= (int) $emp->id ?>"><?= htmlspecialchars($emp->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="adm-manual-field">
                                <label class="adm-manual-label"><i class="bx bx-play-circle"></i> Start Time</label>
                                <input type="datetime-local" name="start_time" class="form-control" required>
                            </div>
                            <div class="adm-manual-field">
                                <label class="adm-manual-label"><i class="bx bx-stop-circle"></i> End Time</label>
                                <input type="datetime-local" name="end_time" class="form-control" required>
                            </div>
                            <div class="adm-manual-field full">
                                <label class="adm-manual-label"><i class="bx bx-note"></i> Note</label>
                                <input type="text" name="note" class="form-control" placeholder="e.g., Late break start">
                            </div>
                        </div>
                        <button type="submit" class="adm-manual-submit" style="--button-gradient: linear-gradient(135deg, #ef4444, #dc2626); --button-shadow: rgba(239, 68, 68, 0.26);">
                            <i class="bx bx-plus-circle"></i> Add Break Log Entry
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section class="adm-manual-grid">
            <div class="adm-manual-card">
                <div class="adm-manual-card-body">
                    <div class="adm-manual-section-head">
                        <div class="adm-manual-section-icon" style="--head-gradient: linear-gradient(135deg, #10b981, #06b6d4);">
                            <i class="bx bx-list-check"></i>
                        </div>
                        <div>
                            <h2 class="adm-manual-section-title">Today's Manual Work Logs</h2>
                            <div class="adm-manual-section-subtitle">Work entries added manually by admin.</div>
                        </div>
                    </div>

                    <div class="adm-manual-table-wrap">
                        <table class="adm-manual-table" style="--table-gradient: linear-gradient(135deg, #6366f1, #4f46e5);">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Duration</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($manual_logs)): ?>
                                    <?php foreach ($manual_logs as $log): ?>
                                        <?php
                                            $name = $log->name ?? 'Unknown';
                                            $duration = max(0, strtotime($log->end_time) - strtotime($log->start_time));
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="adm-manual-user">
                                                    <span class="adm-manual-avatar"><?= strtoupper(substr($name, 0, 1)) ?></span>
                                                    <?= htmlspecialchars($name) ?>
                                                </div>
                                            </td>
                                            <td><?= date('d M, h:i A', strtotime($log->start_time)) ?></td>
                                            <td><?= date('d M, h:i A', strtotime($log->end_time)) ?></td>
                                            <td>
                                                <span class="adm-manual-pill" style="--pill-color: #4f46e5; --pill-bg: rgba(99, 102, 241, 0.12);">
                                                    <i class="bx bx-timer"></i><?= gmdate('H:i:s', $duration) ?>
                                                </span>
                                            </td>
                                            <td><span class="adm-manual-note"><?= htmlspecialchars($log->note ?: '-') ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="adm-manual-empty">
                                                <strong>No Manual Work Logs Today</strong>
                                                Add a work log using the form above.
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="adm-manual-card">
                <div class="adm-manual-card-body">
                    <div class="adm-manual-section-head">
                        <div class="adm-manual-section-icon" style="--head-gradient: linear-gradient(135deg, #f59e0b, #ef4444);">
                            <i class="bx bx-coffee-togo"></i>
                        </div>
                        <div>
                            <h2 class="adm-manual-section-title">Today's Manual Break Logs</h2>
                            <div class="adm-manual-section-subtitle">Break entries added manually by admin.</div>
                        </div>
                    </div>

                    <div class="adm-manual-table-wrap">
                        <table class="adm-manual-table" style="--table-gradient: linear-gradient(135deg, #ef4444, #dc2626);">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Duration</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($manual_break_logs)): ?>
                                    <?php foreach ($manual_break_logs as $log): ?>
                                        <?php
                                            $name = $log->name ?? 'Unknown';
                                            $duration = max(0, strtotime($log->end_time) - strtotime($log->start_time));
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="adm-manual-user">
                                                    <span class="adm-manual-avatar"><?= strtoupper(substr($name, 0, 1)) ?></span>
                                                    <?= htmlspecialchars($name) ?>
                                                </div>
                                            </td>
                                            <td><?= date('d M, h:i A', strtotime($log->start_time)) ?></td>
                                            <td><?= date('d M, h:i A', strtotime($log->end_time)) ?></td>
                                            <td>
                                                <span class="adm-manual-pill" style="--pill-color: #dc2626; --pill-bg: rgba(239, 68, 68, 0.12);">
                                                    <i class="bx bx-coffee"></i><?= gmdate('H:i:s', $duration) ?>
                                                </span>
                                            </td>
                                            <td><span class="adm-manual-note"><?= htmlspecialchars($log->note ?: '-') ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="adm-manual-empty">
                                                <strong>No Manual Break Logs Today</strong>
                                                Add a break log using the form above.
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="overlay mobile-toggle-icon"></div>
