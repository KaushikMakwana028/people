<?php
function pay_rupees($amount)
{
  return '&#8377;' . number_format((float) $amount, 0);
}
function pay_label($value)
{
  return ucwords(str_replace('-', ' ', (string) $value));
}
$totalPaid = 0;
foreach (($payment_logs ?? []) as $log) {
  $totalPaid += (float) $log->amount;
}
$clientOptions = [];
foreach (($projects ?? []) as $project) {
  $clientKey = $project->client_name ?: 'Unknown Client';
  $clientOptions[$clientKey] = $clientKey;
}
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
  .pay-page,
  .pay-modal {
    --pay-primary: #6366f1;
    --pay-success: #10b981;
    --pay-warning: #f59e0b;
    --pay-text: var(--text-primary, #0f172a);
    --pay-muted: var(--text-secondary, #64748b);
    --pay-faint: var(--text-tertiary, #94a3b8);
    --pay-bg: var(--bg-secondary, #f8fafc);
    --pay-card: var(--bg-primary, #fff);
    --pay-soft: var(--bg-tertiary, #f1f5f9);
    --pay-border: var(--border-color, #e2e8f0);
    --pay-shadow: 0 16px 42px rgba(15, 23, 42, .08);
    font-family: 'Poppins', sans-serif
  }

  .pay-page {
    background: var(--pay-bg);
    min-height: calc(100vh - 73px)
  }

  [data-bs-theme=dark] .pay-page,
  [data-bs-theme=dark] .pay-modal {
    --pay-shadow: 0 16px 42px rgba(0, 0, 0, .32)
  }

  .pay-page .page-content {
    padding: 24px 20px
  }

  .pay-shell {
    max-width: 1320px;
    margin: 0 auto
  }

  .pay-head {
    display: flex;
    justify-content: space-between;
    gap: 16px;
    align-items: flex-start;
    margin-bottom: 22px
  }

  .pay-head h1 {
    font-size: 30px;
    font-weight: 850;
    color: var(--pay-text);
    margin: 0 0 6px
  }

  .pay-head p {
    color: var(--pay-muted);
    margin: 0
  }

  .pay-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 20px
  }

  .pay-card {
    background: var(--pay-card);
    border: 1px solid var(--pay-border);
    border-radius: 20px;
    box-shadow: var(--pay-shadow);
    padding: 20px
  }

  .pay-label {
    color: var(--pay-muted);
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .06em
  }

  .pay-value {
    font-size: 30px;
    font-weight: 850;
    margin-top: 8px;
    color: var(--stat-color)
  }

  .pay-table-card {
    background: var(--pay-card);
    border: 1px solid var(--pay-border);
    border-radius: 20px;
    box-shadow: var(--pay-shadow);
    overflow: hidden
  }

  .pay-table-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 20px;
    border-bottom: 1px solid var(--pay-border)
  }

  .pay-table-head h2 {
    font-size: 18px;
    font-weight: 800;
    color: var(--pay-text);
    margin: 0
  }

  .pay-count {
    font-size: 12px;
    color: var(--pay-faint);
    background: var(--pay-soft);
    border-radius: 999px;
    padding: 5px 11px
  }

  .pay-table-wrap {
    overflow-x: auto
  }

  .pay-table {
    width: 100%;
    min-width: 820px;
    border-collapse: collapse
  }

  .pay-table th,
  .pay-table td {
    padding: 15px 18px;
    border-bottom: 1px solid var(--pay-border)
  }

  .pay-table th {
    background: var(--pay-bg);
    color: var(--pay-faint);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .08em
  }

  .pay-table td {
    color: var(--pay-text);
    font-size: 13px
  }

  .pay-money {
    font-weight: 850;
    color: var(--pay-success);
    font-size: 15px
  }

  .pay-chip {
    display: inline-flex;
    padding: 5px 10px;
    border-radius: 999px;
    background: rgba(99, 102, 241, .13);
    color: var(--pay-primary);
    font-size: 12px;
    font-weight: 800
  }

  .pay-empty {
    padding: 48px;
    text-align: center;
    color: var(--pay-faint)
  }

  .pay-btn {
    border: 0;
    border-radius: 13px;
    padding: 11px 17px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, var(--pay-primary), #8b5cf6);
    color: #fff;
    font-weight: 800;
    text-decoration: none;
    cursor: pointer
  }

  .pay-btn:hover {
    color: #fff
  }

  .pay-btn.light {
    background: var(--pay-soft);
    color: var(--pay-text);
    border: 1px solid var(--pay-border)
  }

  .pay-alert {
    padding: 12px 14px;
    border-radius: 12px;
    margin-bottom: 14px;
    background: var(--pay-card);
    border: 1px solid var(--pay-border);
    color: var(--pay-success)
  }

  .pay-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
    background: rgba(15, 23, 42, .68)
  }

  .pay-modal.active {
    display: flex
  }

  .pay-box {
    width: 100%;
    max-width: 560px;
    max-height: 92vh;
    display: flex;
    flex-direction: column;
    border-radius: 22px;
    background: var(--pay-card);
    border: 1px solid var(--pay-border);
    box-shadow: 0 24px 70px rgba(0, 0, 0, .35);
    overflow: hidden
  }

  .pay-modal-head,
  .pay-modal-foot {
    padding: 18px 24px;
    border-bottom: 1px solid var(--pay-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px
  }

  .pay-modal-foot {
    border-top: 1px solid var(--pay-border);
    border-bottom: 0;
    justify-content: flex-end
  }

  .pay-modal-title {
    font-size: 24px;
    font-weight: 900;
    color: var(--pay-text)
  }

  .pay-close {
    width: 36px;
    height: 36px;
    border: 0;
    border-radius: 11px;
    background: var(--pay-soft);
    color: var(--pay-muted)
  }

  .pay-modal-body {
    padding: 24px;
    overflow-y: auto
  }

  .pay-field {
    margin-bottom: 17px
  }

  .pay-field label {
    display: block;
    color: var(--pay-muted);
    font-size: 13px;
    font-weight: 850;
    margin-bottom: 8px
  }

  .pay-input,
  .pay-select,
  .pay-textarea {
    width: 100%;
    min-height: 47px;
    border: 1px solid var(--pay-border);
    border-radius: 12px;
    background: var(--pay-soft);
    color: var(--pay-text);
    padding: 11px 14px;
    outline: 0
  }

  .pay-textarea {
    min-height: 90px
  }

  .pay-input:focus,
  .pay-select:focus,
  .pay-textarea:focus {
    border-color: var(--pay-primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, .14)
  }

  @media(max-width:800px) {
    .pay-stats {
      grid-template-columns: 1fr
    }

    .pay-head {
      flex-direction: column
    }

    .pay-page .page-content {
      padding: 16px 12px
    }
  }
</style>

<div class="page-wrapper pay-page">
  <div class="page-content">
    <div class="pay-shell">
      <?php if ($this->session->flashdata('success')): ?><div class="pay-alert"><?= htmlspecialchars($this->session->flashdata('success')) ?></div><?php endif; ?>
      <div class="pay-head">
        <div>
          <h1>Payment Management</h1>
          <p>All project payment logs from the shared payment table.</p>
        </div>
        <button class="pay-btn" onclick="openPayModal()"><i class="fas fa-plus"></i> Add Payment</button>
      </div>

      <div class="pay-stats">
        <div class="pay-card">
          <div class="pay-label">Total Paid</div>
          <div class="pay-value" style="--stat-color:var(--pay-success)"><?= pay_rupees($totalPaid) ?></div>
        </div>
        <div class="pay-card">
          <div class="pay-label">Payment Logs</div>
          <div class="pay-value" style="--stat-color:var(--pay-primary)"><?= count($payment_logs ?? []) ?></div>
        </div>
        <div class="pay-card">
          <div class="pay-label">Projects</div>
          <div class="pay-value" style="--stat-color:var(--pay-warning)"><?= count($projects ?? []) ?></div>
        </div>
      </div>

      <div class="pay-table-card">
        <div class="pay-table-head">
          <h2><i class="fas fa-receipt me-2" style="color:var(--pay-primary)"></i>Payment Logs</h2><span class="pay-count"><?= count($payment_logs ?? []) ?> records</span>
        </div>
        <?php if (empty($payment_logs)): ?>
          <div class="pay-empty">No payment logs found. Add payment logs from the Project page.</div>
        <?php else: ?>
          <div class="pay-table-wrap">
            <table class="pay-table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Client Name</th>
                  <th>Project Name</th>
                  <th>Amount</th>
                  <th>Payment Mode</th>
                  <th>Notes</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($payment_logs as $log): ?>
                  <tr>
                    <td><?= date('d M Y', strtotime($log->payment_date)) ?></td>
                    <td><?= htmlspecialchars($log->client_name ?: '-') ?></td>
                    <td><?= htmlspecialchars($log->project_name ?: '-') ?></td>
                    <td><span class="pay-money"><?= pay_rupees($log->amount) ?></span></td>
                    <td><span class="pay-chip"><?= pay_label($log->payment_mode) ?></span></td>
                    <td><?= htmlspecialchars($log->notes ?: '-') ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="pay-modal" id="addPaymentModal">
  <div class="pay-box">
    <form method="post" action="<?= site_url('admin/payments/store') ?>">
      <div class="pay-modal-head">
        <div class="pay-modal-title">Add Payment Log</div>
        <button type="button" class="pay-close" onclick="closePayModal()"><i class="fas fa-times"></i></button>
      </div>
      <div class="pay-modal-body">
        <div class="pay-field">
          <label>Client</label>
          <select class="pay-select" id="payClient" required>
            <option value="">Select Client</option>
            <?php foreach ($clientOptions as $clientName): ?>
              <option value="<?= htmlspecialchars($clientName) ?>"><?= htmlspecialchars($clientName) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="pay-field">
          <label>Project</label>
          <select class="pay-select" name="project_id" id="payProject" required>
            <option value="">Select Project</option>
          </select>
        </div>
        <div class="pay-field">
          <label>Pending Amount</label>
          <input class="pay-input" id="pendingAmount" type="text" readonly>
        </div>
        <div class="pay-field">
          <label>Payment Amount</label>
          <input class="pay-input" name="amount" type="number" min="1" step="0.01" placeholder="Enter payment amount" required>
        </div>
        <div class="pay-field">
          <label>Date</label>
          <input class="pay-input" name="payment_date" type="date" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div class="pay-field">
          <label>Payment Mode</label>
          <select class="pay-select" name="payment_mode">
            <option value="upi">UPI</option>
            <option value="cash">Cash</option>
            <option value="bank-transfer">Bank Transfer</option>
            <option value="card">Card</option>
            <option value="cheque">Cheque</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="pay-field">
          <label>Notes</label>
          <textarea class="pay-textarea" name="notes" placeholder="Add notes..."></textarea>
        </div>
      </div>
      <div class="pay-modal-foot">
        <button type="button" class="pay-btn light" onclick="closePayModal()">Cancel</button>
        <button class="pay-btn" type="submit">Add Payment</button>
      </div>
    </form>
  </div>
</div>

<script>
  const payProjects = <?= json_encode(array_map(function ($project) {
                        return [
                          'id' => (int) $project->id,
                          'client_name' => $project->client_name ?: 'Unknown Client',
                          'project_name' => $project->project_name,
                          'remaining_amount' => (float) ($project->remaining_amount ?? 0)
                        ];
                      }, $projects ?? []), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

  function formatPayRupees(amount) {
    return '₹' + Number(amount || 0).toLocaleString('en-IN', {
      maximumFractionDigits: 0
    });
  }

  function openPayModal() {
    document.getElementById('addPaymentModal').classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closePayModal() {
    document.getElementById('addPaymentModal').classList.remove('active');
    document.body.style.overflow = '';
  }

  document.getElementById('payClient')?.addEventListener('change', function() {
    const projectSelect = document.getElementById('payProject');
    projectSelect.innerHTML = '<option value="">Select Project</option>';
    document.getElementById('pendingAmount').value = '';
    payProjects.filter(project => project.client_name === this.value).forEach(project => {
      const option = document.createElement('option');
      option.value = project.id;
      option.textContent = project.project_name;
      option.dataset.pending = project.remaining_amount;
      projectSelect.appendChild(option);
    });
  });

  document.getElementById('payProject')?.addEventListener('change', function() {
    const selected = this.options[this.selectedIndex];
    document.getElementById('pendingAmount').value = selected?.dataset?.pending ? formatPayRupees(selected.dataset.pending) : '';
  });

  document.querySelectorAll('.pay-modal').forEach(modal => modal.addEventListener('click', event => {
    if (event.target === modal) closePayModal();
  }));
</script>