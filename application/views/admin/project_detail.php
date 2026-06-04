<?php
if (!function_exists('pd_rupees')) {
  function pd_rupees($amount)
  {
    return '&#8377;' . number_format((float) $amount, 0);
  }
}

if (!function_exists('pd_label')) {
  function pd_label($value)
  {
    return ucwords(str_replace('-', ' ', (string) $value));
  }
}
?>



<style>
  .pd-page,
  .pd-modal {
    --pd-primary: #6c5ce7;
    --pd-secondary: #8b5cf6;
    --pd-success: #10b981;
    --pd-warning: #f59e0b;
    --pd-text: var(--text-primary, #0f172a);
    --pd-muted: var(--text-secondary, #64748b);
    --pd-faint: var(--text-tertiary, #94a3b8);
    --pd-bg: var(--bg-secondary, #f8fafc);
    --pd-card: var(--bg-primary, #fff);
    --pd-soft: var(--bg-tertiary, #f1f5f9);
    --pd-border: var(--border-color, #e2e8f0);
    --pd-hero: #111827;
    --pd-shadow: 0 16px 42px rgba(15, 23, 42, .08);
    font-family: 'Poppins', sans-serif
  }

  [data-bs-theme=dark] .pd-page,
  [data-bs-theme=dark] .pd-modal {
    --pd-hero: #0f172a;
    --pd-shadow: 0 16px 42px rgba(0, 0, 0, .32)
  }

  .pd-page {
    background: var(--pd-bg);
    min-height: calc(100vh - 73px)
  }

  .pd-page .page-content {
    padding: 28px 20px
  }

  .pd-shell {
    max-width: 1320px;
    margin: 0 auto
  }

  .pd-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
    margin-bottom: 26px
  }

  .pd-btn {
    border: 0;
    border-radius: 13px;
    padding: 12px 18px;
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: linear-gradient(135deg, var(--pd-primary), var(--pd-secondary));
    color: #fff;
    font-weight: 800;
    text-decoration: none;
    cursor: pointer
  }

  .pd-btn:hover {
    color: #fff
  }

  .pd-btn.light {
    background: var(--pd-card);
    color: var(--pd-text);
    border: 1px solid var(--pd-border)
  }

  .pd-hero {
    background: var(--pd-hero);
    border: 1px solid var(--pd-border);
    border-radius: 18px;
    padding: 34px 32px;
    color: #fff;
    margin-bottom: 26px
  }

  .pd-hero h1 {
    font-size: 28px;
    font-weight: 850;
    letter-spacing: -.04em;
    margin: 0 0 16px
  }

  .pd-client {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #e5e7eb;
    margin-bottom: 24px
  }

  .pd-pill {
    display: inline-flex;
    padding: 5px 12px;
    border-radius: 999px;
    background: rgba(99, 102, 241, .18);
    color: #8b5cf6;
    font-size: 12px;
    font-weight: 850
  }

  .pd-desc {
    margin: 0 0 28px;
    color: #f8fafc
  }

  .pd-meta {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
    max-width: 860px
  }

  .pd-meta-label {
    font-size: 12px;
    font-weight: 850;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: #9fb3ca
  }

  .pd-meta-value {
    font-size: 16px;
    font-weight: 850;
    color: #fff;
    margin-top: 8px
  }

  .pd-stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 24px;
    margin-bottom: 26px
  }

  .pd-stat {
    background: var(--pd-card);
    border: 1px solid var(--pd-border);
    border-radius: 16px;
    padding: 24px;
    box-shadow: var(--pd-shadow)
  }

  .pd-stat-label {
    color: var(--pd-muted);
    font-size: 14px
  }

  .pd-stat-value {
    font-size: 30px;
    font-weight: 900;
    color: var(--stat-color, #fff);
    margin-top: 12px
  }

  .pd-section {
    background: var(--pd-card);
    border: 1px solid var(--pd-border);
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 26px;
    box-shadow: var(--pd-shadow)
  }

  .pd-section-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
    margin-bottom: 18px
  }

  .pd-section h2 {
    font-size: 21px;
    font-weight: 850;
    color: var(--pd-text);
    margin: 0
  }

  .pd-item {
    display: grid;
    grid-template-columns: 120px 1fr auto;
    gap: 18px;
    align-items: start;
    background: var(--pd-soft);
    border: 1px solid var(--pd-border);
    border-radius: 13px;
    padding: 17px;
    margin-bottom: 12px
  }

  .pd-date,
  .pd-title {
    font-weight: 850;
    color: var(--pd-text)
  }

  .pd-money {
    font-weight: 900;
    color: var(--pd-success);
    font-size: 22px
  }

  .pd-note {
    color: var(--pd-muted);
    margin-top: 8px
  }

  .pd-req-price {
    font-weight: 900;
    color: var(--pd-primary)
  }

  .pd-empty {
    background: var(--pd-soft);
    border: 1px dashed var(--pd-border);
    border-radius: 14px;
    color: var(--pd-faint);
    padding: 28px;
    text-align: center
  }

  .pd-alert {
    padding: 12px 14px;
    border-radius: 12px;
    margin-bottom: 16px;
    background: var(--pd-card);
    border: 1px solid var(--pd-border);
    color: var(--pd-success)
  }

  .pd-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
    background: rgba(15, 23, 42, .68)
  }

  .pd-modal.active {
    display: flex
  }

  .pd-box {
    width: 100%;
    max-width: 520px;
    border: 1px solid var(--pd-border);
    border-radius: 22px;
    background: var(--pd-card);
    box-shadow: 0 24px 70px rgba(0, 0, 0, .35);
    overflow: hidden
  }

  .pd-modal-head,
  .pd-modal-foot {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 18px 22px;
    border-bottom: 1px solid var(--pd-border)
  }

  .pd-modal-foot {
    border-top: 1px solid var(--pd-border);
    border-bottom: 0;
    justify-content: flex-end
  }

  .pd-modal-title {
    font-size: 24px;
    font-weight: 900;
    color: var(--pd-text)
  }

  .pd-close {
    width: 36px;
    height: 36px;
    border: 0;
    border-radius: 11px;
    background: var(--pd-soft);
    color: var(--pd-muted)
  }

  .pd-modal-body {
    padding: 24px
  }

  .pd-field {
    margin-bottom: 17px
  }

  .pd-field label {
    display: block;
    color: var(--pd-muted);
    font-size: 13px;
    font-weight: 850;
    margin-bottom: 8px
  }

  .pd-input,
  .pd-select,
  .pd-textarea {
    width: 100%;
    min-height: 47px;
    border: 1px solid var(--pd-border);
    border-radius: 12px;
    background: var(--pd-soft);
    color: var(--pd-text);
    padding: 11px 14px;
    outline: 0
  }

  .pd-textarea {
    min-height: 90px
  }

  .pd-input:focus,
  .pd-select:focus,
  .pd-textarea:focus {
    border-color: var(--pd-primary);
    box-shadow: 0 0 0 3px rgba(108, 92, 231, .14)
  }

  .pd-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 15px
  }

  @media(max-width:992px) {
    .pd-stats {
      grid-template-columns: repeat(2, 1fr)
    }

    .pd-meta {
      grid-template-columns: 1fr
    }
  }

  @media(max-width:680px) {
    .pd-page .page-content {
      padding: 18px 12px
    }

    .pd-top,
    .pd-section-head {
      flex-direction: column;
      align-items: stretch
    }

    .pd-btn {
      justify-content: center
    }

    .pd-hero {
      padding: 24px 18px
    }

    .pd-stats {
      grid-template-columns: 1fr;
      gap: 14px
    }

    .pd-item {
      grid-template-columns: 1fr
    }

    .pd-modal-foot {
      flex-direction: column-reverse
    }

    .pd-modal-foot .pd-btn {
      width: 100%
    }

    .pd-form-grid {
      grid-template-columns: 1fr
    }
  }
</style>

<div class="page-wrapper pd-page">
  <div class="page-content">
    <div class="pd-shell">
      <?php if ($this->session->flashdata('success')): ?><div class="pd-alert"><?= htmlspecialchars($this->session->flashdata('success')) ?></div><?php endif; ?>

      <div class="pd-top">
        <a class="pd-btn light" href="<?= site_url('project/all_projects') ?>"><i class="bx bx-arrow-back"></i> Back to Projects</a>
        <button class="pd-btn" onclick="openPd('projectModal')"><i class="bx bx-pencil"></i> Edit Project</button>
      </div>

      <section class="pd-hero">
        <h1><?= htmlspecialchars($project->project_name) ?></h1>
        <div class="pd-client"><i class="bx bx-user"></i> <?= htmlspecialchars($project->client_name ?: 'No client') ?> <span class="pd-pill"><?= pd_label($project->status ?: 'active') ?></span></div>
        <p class="pd-desc"><?= htmlspecialchars($project->project_description ?: 'No project description added.') ?></p>
        <div class="pd-meta">
          <div>
            <div class="pd-meta-label">Client Email</div>
            <div class="pd-meta-value"><?= htmlspecialchars($project->client_email ?: '-') ?></div>
          </div>
          <div>
            <div class="pd-meta-label">Progress</div>
            <div class="pd-meta-value"><?= (int) ($project->progress ?? 0) ?>%</div>
          </div>
        </div>
      </section>

      <div class="pd-stats">
        <div class="pd-stat">
          <div class="pd-stat-label">Base Amount</div>
          <div class="pd-stat-value" style="--stat-color:var(--pd-text)"><?= pd_rupees($project->base_amount ?? 0) ?></div>
        </div>
        <div class="pd-stat">
          <div class="pd-stat-label">Requirements</div>
          <div class="pd-stat-value" style="--stat-color:var(--pd-text)"><?= pd_rupees($project->requirements_amount ?? 0) ?></div>
        </div>
        <div class="pd-stat">
          <div class="pd-stat-label">Total Amount</div>
          <div class="pd-stat-value" style="--stat-color:var(--pd-text)"><?= pd_rupees($project->total_amount ?? 0) ?></div>
        </div>
        <div class="pd-stat">
          <div class="pd-stat-label">Paid Amount</div>
          <div class="pd-stat-value" style="--stat-color:var(--pd-success)"><?= pd_rupees($project->paid_amount ?? 0) ?></div>
        </div>
        <div class="pd-stat">
          <div class="pd-stat-label">Remaining</div>
          <div class="pd-stat-value" style="--stat-color:var(--pd-warning)"><?= pd_rupees($project->remaining_amount ?? 0) ?></div>
        </div>
      </div>

      <section class="pd-section">
        <div class="pd-section-head">
          <h2>Payment Logs</h2>
          <button class="pd-btn" onclick="openPd('paymentModal')"><i class="bx bx-plus"></i> Add Payment</button>
        </div>
        <?php if (empty($payment_logs)): ?>
          <div class="pd-empty">No payment logs for this project yet.</div>
        <?php else: ?>
          <?php foreach ($payment_logs as $log): ?>
            <div class="pd-item">
              <div class="pd-date"><?= date('d M Y', strtotime($log->payment_date)) ?></div>
              <div>
                <div class="pd-money"><?= pd_rupees($log->amount) ?></div>
                <div class="pd-note"><?= htmlspecialchars($log->notes ?: pd_label($log->payment_mode)) ?></div>
              </div>
              <span class="pd-pill"><?= pd_label($log->payment_mode) ?></span>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </section>

      <section class="pd-section">
        <div class="pd-section-head">
          <h2>Additional Requirements</h2>
          <button class="pd-btn" onclick="openPd('requirementModal')"><i class="bx bx-plus"></i> Add Requirement</button>
        </div>
        <?php if (empty($requirements)): ?>
          <div class="pd-empty">No additional requirements for this project yet.</div>
        <?php else: ?>
          <?php foreach ($requirements as $requirement): ?>
            <div class="pd-item">
              <div class="pd-title"><?= htmlspecialchars($requirement->title) ?></div>
              <div>
                <div class="pd-note"><?= htmlspecialchars($requirement->description ?: 'No description') ?></div>
                <div class="pd-note">Added on <?= date('d M Y', strtotime($requirement->created_at)) ?></div>
              </div>
              <div class="pd-req-price"><?= pd_rupees($requirement->amount) ?></div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </section>
    </div>
  </div>
</div>

<div class="pd-modal" id="paymentModal">
  <div class="pd-box">
    <form method="post" action="<?= site_url('project/add_payment') ?>">
      <div class="pd-modal-head">
        <div class="pd-modal-title">Add Payment Log</div><button type="button" class="pd-close" onclick="closePd('paymentModal')"><i class="bx bx-x"></i></button>
      </div>
      <div class="pd-modal-body">
        <input type="hidden" name="project_id" value="<?= (int) $project->id ?>">
        <div class="pd-field"><label>Amount</label><input class="pd-input" name="amount" type="number" min="1" step="0.01" placeholder="Enter amount" required></div>
        <div class="pd-field"><label>Date</label><input class="pd-input" name="payment_date" type="date" value="<?= date('Y-m-d') ?>" required></div>
        <div class="pd-field"><label>Payment Mode</label><select class="pd-select" name="payment_mode">
            <option value="upi">UPI</option>
            <option value="cash">Cash</option>
            <option value="bank-transfer">Bank Transfer</option>
            <option value="card">Card</option>
            <option value="cheque">Cheque</option>
            <option value="other">Other</option>
          </select></div>
        <div class="pd-field"><label>Notes</label><textarea class="pd-textarea" name="notes" placeholder="Add notes..."></textarea></div>
      </div>
      <div class="pd-modal-foot"><button type="button" class="pd-btn light" onclick="closePd('paymentModal')">Cancel</button><button class="pd-btn" type="submit">Add Payment</button></div>
    </form>
  </div>
</div>

<div class="pd-modal" id="requirementModal">
  <div class="pd-box">
    <form method="post" action="<?= site_url('project/add_requirement') ?>">
      <div class="pd-modal-head">
        <div class="pd-modal-title">Add Requirement</div><button type="button" class="pd-close" onclick="closePd('requirementModal')"><i class="bx bx-x"></i></button>
      </div>
      <div class="pd-modal-body">
        <input type="hidden" name="project_id" value="<?= (int) $project->id ?>">
        <div class="pd-field"><label>Requirement Name</label><input class="pd-input" name="title" placeholder="Enter requirement name" required></div>
        <div class="pd-field"><label>Description</label><textarea class="pd-textarea" name="description" placeholder="Enter description"></textarea></div>
        <div class="pd-field"><label>Price</label><input class="pd-input" name="amount" type="number" min="0" step="0.01" placeholder="Enter price" required></div>
      </div>
      <div class="pd-modal-foot"><button type="button" class="pd-btn light" onclick="closePd('requirementModal')">Cancel</button><button class="pd-btn" type="submit">Add Requirement</button></div>
    </form>
  </div>
</div>

<div class="pd-modal" id="projectModal">
  <div class="pd-box">
    <form method="post" id="projectForm" action="<?= site_url('project/update/' . $project->id) ?>">
      <div class="pd-modal-head">
        <div class="pd-modal-title">Edit Project</div><button type="button" class="pd-close" onclick="closePd('projectModal')"><i class="bx bx-x"></i></button>
      </div>
      <div class="pd-modal-body">
        <div class="pd-form-grid">
          <div class="pd-field" style="grid-column: 1 / -1;"><label>Project Name</label><input class="pd-input" name="project_name" value="<?= htmlspecialchars($project->project_name) ?>" required></div>
          <div class="pd-field" style="grid-column: 1 / -1;"><label>Project Description</label><textarea class="pd-textarea" name="project_description"><?= htmlspecialchars($project->project_description) ?></textarea></div>
          <div class="pd-field"><label>Client Name</label><input class="pd-input" name="client_name" value="<?= htmlspecialchars($project->client_name) ?>" required></div>
          <div class="pd-field"><label>Client Email</label><input class="pd-input" name="client_email" type="email" value="<?= htmlspecialchars($project->client_email) ?>"></div>
          <div class="pd-field"><label>Client Phone</label><input class="pd-input" name="client_phone" value="<?= htmlspecialchars($project->client_phone) ?>"></div>
          <div class="pd-field"><label>Status</label><select class="pd-select" name="status">
              <option value="active" <?= ($project->status === 'active') ? 'selected' : '' ?>>Active</option>
              <option value="completed" <?= ($project->status === 'completed') ? 'selected' : '' ?>>Completed</option>
              <option value="on-hold" <?= ($project->status === 'on-hold') ? 'selected' : '' ?>>On Hold</option>
              <option value="cancelled" <?= ($project->status === 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
            </select></div>
          <div class="pd-field"><label>Base Amount (₹)</label><input class="pd-input" name="base_amount" type="number" min="0" step="0.01" value="<?= htmlspecialchars($project->base_amount) ?>"></div>
          <div class="pd-field"><label>Progress %</label><input class="pd-input" name="progress" type="number" min="0" max="100" value="<?= htmlspecialchars($project->progress) ?>"></div>
          <div class="pd-field"><label>Start Date</label><input class="pd-input" name="start_date" type="date" value="<?= htmlspecialchars($project->start_date) ?>"></div>
          <div class="pd-field"><label>Due Date</label><input class="pd-input" name="due_date" type="date" value="<?= htmlspecialchars($project->due_date) ?>"></div>
        </div>
      </div>
      <div class="pd-modal-foot"><button type="button" class="pd-btn light" onclick="closePd('projectModal')">Cancel</button><button class="pd-btn" type="submit">Save Changes</button></div>
    </form>
  </div>
</div>

<script>
  function openPd(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden'
  }

  function closePd(id) {
    document.getElementById(id).classList.remove('active');
    document.body.style.overflow = ''
  }
  document.querySelectorAll('.pd-modal').forEach(modal => modal.addEventListener('click', event => {
    if (event.target === modal) closePd(modal.id);
  }));
</script>