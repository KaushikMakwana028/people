<?php
function txn_rupees($amount)
{
  return '&#8377;' . number_format((float) $amount, 0);
}

function txn_label($value)
{
  return ucwords(str_replace('-', ' ', (string) $value));
}

$totalCredit = 0;
$totalDebit = 0;
$clientOptions = [];

foreach (($transactions ?? []) as $txn) {
  if ($txn->transaction_type === 'debit') {
    $totalDebit += (float) $txn->amount;
  } else {
    $totalCredit += (float) $txn->amount;
  }
}

foreach (($projects ?? []) as $project) {
  $clientName = $project->client_name ?: 'Unknown Client';
  $clientOptions[$clientName] = $clientName;
}
?>

<style>
  .txn-page,
  .txn-modal {
    --txn-primary: #6366f1;
    --txn-secondary: #8b5cf6;
    --txn-success: #10b981;
    --txn-danger: #ef4444;
    --txn-warning: #f59e0b;
    --txn-text: var(--text-primary, #0f172a);
    --txn-muted: var(--text-secondary, #64748b);
    --txn-faint: var(--text-tertiary, #94a3b8);
    --txn-bg: var(--bg-secondary, #f8fafc);
    --txn-card: var(--bg-primary, #fff);
    --txn-soft: var(--bg-tertiary, #f1f5f9);
    --txn-border: var(--border-color, #e2e8f0);
    --txn-shadow: 0 16px 42px rgba(15, 23, 42, .08);
    font-family: 'Poppins', sans-serif;
  }

  .txn-page {
    background: var(--txn-bg);
    height: calc(100vh - 90px);
    min-height: 0;
    overflow-y: auto;
    overflow-x: hidden;
    -webkit-overflow-scrolling: touch;
  }

  [data-bs-theme=dark] .txn-page,
  [data-bs-theme=dark] .txn-modal {
    --txn-shadow: 0 16px 42px rgba(0, 0, 0, .32);
  }

  .txn-page .page-content {
    padding: 24px 20px;
    min-height: auto;
  }

  .txn-shell {
    max-width: 1320px;
    margin: 0 auto;
  }

  .txn-head,
  .txn-table-head,
  .txn-filter-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    flex-wrap: wrap;
  }

  .txn-head {
    margin-bottom: 22px;
  }

  .txn-head h1 {
    margin: 0 0 6px;
    color: var(--txn-text);
    font-size: 30px;
    font-weight: 850;
  }

  .txn-head p {
    margin: 0;
    color: var(--txn-muted);
  }

  .txn-stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 18px;
  }

  .txn-stat,
  .txn-table-card {
    background: var(--txn-card);
    border: 1px solid var(--txn-border);
    border-radius: 18px;
    box-shadow: var(--txn-shadow);
  }

  .txn-stat {
    padding: 18px;
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .txn-stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
  }

  .txn-stat-label {
    color: var(--txn-muted);
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .06em;
  }

  .txn-stat-value {
    color: var(--stat-color);
    font-size: 24px;
    font-weight: 850;
    margin-top: 4px;
  }

  .txn-filter-bar {
    margin-bottom: 18px;
  }

  .txn-search {
    position: relative;
    flex: 1;
    min-width: 240px;
  }

  .txn-search i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--txn-faint);
    font-size: 18px;
  }

  .txn-input,
  .txn-select,
  .txn-textarea {
    width: 100%;
    border: 1px solid var(--txn-border);
    border-radius: 12px;
    background: var(--txn-soft);
    color: var(--txn-text);
    min-height: 44px;
    padding: 10px 13px;
    outline: 0;
  }

  .txn-search .txn-input {
    padding-left: 42px;
  }

  .txn-input:focus,
  .txn-select:focus,
  .txn-textarea:focus {
    border-color: var(--txn-primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, .14);
  }

  .txn-btn {
    border: 0;
    border-radius: 12px;
    padding: 11px 17px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, var(--txn-primary), var(--txn-secondary));
    color: #fff;
    font-weight: 800;
    text-decoration: none;
    cursor: pointer;
  }

  .txn-btn:hover {
    color: #fff;
  }

  .txn-btn.light {
    background: var(--txn-soft);
    color: var(--txn-text);
    border: 1px solid var(--txn-border);
  }

  .txn-btn.danger {
    background: rgba(239, 68, 68, .1);
    color: var(--txn-danger);
    padding: 7px 10px;
  }

  .txn-alert {
    padding: 12px 14px;
    border-radius: 12px;
    margin-bottom: 14px;
    background: rgba(16, 185, 129, .1);
    border: 1px solid rgba(16, 185, 129, .25);
    color: var(--txn-success);
  }

  .txn-table-card {
    overflow: hidden;
  }

  .txn-table-head {
    padding: 18px 20px;
    border-bottom: 1px solid var(--txn-border);
  }

  .txn-table-head h2 {
    margin: 0;
    color: var(--txn-text);
    font-size: 18px;
    font-weight: 800;
  }

  .txn-count {
    font-size: 12px;
    color: var(--txn-faint);
    background: var(--txn-soft);
    border-radius: 999px;
    padding: 5px 11px;
  }

  .txn-table-wrap {
    overflow-x: auto;
  }

  .txn-table {
    width: 100%;
    min-width: 980px;
    border-collapse: collapse;
  }

  .txn-table th,
  .txn-table td {
    padding: 15px 18px;
    border-bottom: 1px solid var(--txn-border);
    text-align: left;
  }

  .txn-table th {
    background: var(--txn-bg);
    color: var(--txn-faint);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .08em;
  }

  .txn-table td {
    color: var(--txn-text);
    font-size: 13px;
    vertical-align: middle;
  }

  .txn-money {
    font-size: 15px;
    font-weight: 850;
  }

  .txn-money.credit {
    color: var(--txn-success);
  }

  .txn-money.debit {
    color: var(--txn-danger);
  }

  .txn-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 11px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
    text-transform: capitalize;
  }

  .txn-badge.credit,
  .txn-badge.paid {
    background: rgba(16, 185, 129, .12);
    color: var(--txn-success);
  }

  .txn-badge.debit,
  .txn-badge.failed {
    background: rgba(239, 68, 68, .12);
    color: var(--txn-danger);
  }

  .txn-badge.pending,
  .txn-badge.processing {
    background: rgba(245, 158, 11, .14);
    color: var(--txn-warning);
  }

  .txn-empty {
    padding: 52px 20px;
    color: var(--txn-faint);
    text-align: center;
  }

  .txn-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
    background: rgba(15, 23, 42, .68);
  }

  .txn-modal.active {
    display: flex;
    align-items: flex-start;
    overflow-x: hidden;
    overflow-y: auto;
    padding-top: 28px;
    padding-bottom: 28px;
  }

  .txn-box {
    width: 100%;
    max-width: 580px;
    max-height: calc(100vh - 56px);
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    background: var(--txn-card);
    border: 1px solid var(--txn-border);
    box-shadow: 0 24px 70px rgba(0, 0, 0, .35);
    overflow: hidden;
  }

  .txn-box > form {
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 0;
  }

  .txn-modal-head,
  .txn-modal-foot {
    padding: 18px 24px;
    border-bottom: 1px solid var(--txn-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
  }

  .txn-modal-foot {
    border-top: 1px solid var(--txn-border);
    border-bottom: 0;
    justify-content: flex-end;
  }

  .txn-modal-title {
    font-size: 22px;
    font-weight: 900;
    color: var(--txn-text);
  }

  .txn-close {
    width: 36px;
    height: 36px;
    border: 0;
    border-radius: 10px;
    background: var(--txn-soft);
    color: var(--txn-muted);
  }

  .txn-modal-body {
    padding: 24px;
    flex: 1;
    min-height: 0;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
  }

  .txn-field {
    margin-bottom: 16px;
  }

  .txn-field label {
    display: block;
    color: var(--txn-muted);
    font-size: 13px;
    font-weight: 850;
    margin-bottom: 8px;
  }

  .txn-radio-row {
    display: flex;
    gap: 10px;
  }

  .txn-radio {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    border-radius: 12px;
    border: 1px solid var(--txn-border);
    background: var(--txn-soft);
    color: var(--txn-text);
    font-weight: 800;
    cursor: pointer;
  }

  .txn-radio input {
    width: auto;
  }

  .txn-textarea {
    min-height: 86px;
  }

  @media(max-width:900px) {
    .txn-stats {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }

  @media(max-width:640px) {
    .txn-stats {
      grid-template-columns: 1fr;
    }

    .txn-page .page-content {
      padding: 16px 12px;
    }
  }
</style>

<div class="page-wrapper txn-page">
  <div class="page-content">
    <div class="txn-shell">
      <?php if ($this->session->flashdata('success')): ?>
        <div class="txn-alert"><?= htmlspecialchars($this->session->flashdata('success')) ?></div>
      <?php endif; ?>

      <div class="txn-head">
        <div>
          <h1>Transactions</h1>
          <p>Manage all credit and debit transactions for projects and clients.</p>
        </div>
        <button type="button" class="txn-btn" onclick="openTxnModal()">
          <i class="bx bx-plus"></i> Add Transaction
        </button>
      </div>

      <div class="txn-stats">
        <div class="txn-stat">
          <div class="txn-stat-icon" style="background:linear-gradient(135deg,#10b981,#059669)"><i class="bx bx-trending-up"></i></div>
          <div>
            <div class="txn-stat-label">Total Credit</div>
            <div class="txn-stat-value" style="--stat-color:var(--txn-success)"><?= txn_rupees($totalCredit) ?></div>
          </div>
        </div>
        <div class="txn-stat">
          <div class="txn-stat-icon" style="background:linear-gradient(135deg,#ef4444,#dc2626)"><i class="bx bx-trending-down"></i></div>
          <div>
            <div class="txn-stat-label">Total Debit</div>
            <div class="txn-stat-value" style="--stat-color:var(--txn-danger)"><?= txn_rupees($totalDebit) ?></div>
          </div>
        </div>
        <div class="txn-stat">
          <div class="txn-stat-icon" style="background:linear-gradient(135deg,#6366f1,#8b5cf6)"><i class="bx bx-wallet"></i></div>
          <div>
            <div class="txn-stat-label">Net Balance</div>
            <div class="txn-stat-value" style="--stat-color:var(--txn-primary)"><?= txn_rupees($totalCredit - $totalDebit) ?></div>
          </div>
        </div>
        <div class="txn-stat">
          <div class="txn-stat-icon" style="background:linear-gradient(135deg,#f59e0b,#d97706)"><i class="bx bx-receipt"></i></div>
          <div>
            <div class="txn-stat-label">Transactions</div>
            <div class="txn-stat-value" style="--stat-color:var(--txn-warning)"><?= count($transactions ?? []) ?></div>
          </div>
        </div>
      </div>

      <div class="txn-filter-bar">
        <div class="txn-search">
          <i class="bx bx-search"></i>
          <input type="text" id="txnSearch" class="txn-input" placeholder="Search client, project, notes...">
        </div>
        <select id="txnMonthFilter" class="txn-select" style="max-width:180px">
          <option value="">All Months</option>
          <?php for ($m = 1; $m <= 12; $m++): ?>
            <option value="<?= $m ?>"><?= date('F', mktime(0, 0, 0, $m, 1)) ?></option>
          <?php endfor; ?>
        </select>
        <select id="txnTypeFilter" class="txn-select" style="max-width:160px">
          <option value="">All Types</option>
          <option value="credit">Credit</option>
          <option value="debit">Debit</option>
        </select>
      </div>

      <div class="txn-table-card">
        <div class="txn-table-head">
          <h2><i class="bx bx-receipt" style="color:var(--txn-primary)"></i> Transaction Records</h2>
          <span class="txn-count"><span id="txnVisibleCount"><?= count($transactions ?? []) ?></span> records</span>
        </div>

        <?php if (empty($transactions)): ?>
          <div class="txn-empty">No transactions found. Add your first transaction to start tracking records.</div>
        <?php else: ?>
          <div class="txn-table-wrap">
            <table class="txn-table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Client</th>
                  <th>Project</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Mode</th>
                  <th>Notes</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="txnTableBody">
                <?php foreach ($transactions as $txn): ?>
                  <?php
                  $type = $txn->transaction_type ?: 'credit';
                  $status = $txn->status ?: 'paid';
                  $searchText = strtolower(($txn->client_name ?? '') . ' ' . ($txn->project_name ?? '') . ' ' . ($txn->notes ?? '') . ' ' . $type . ' ' . $status);
                  $month = date('n', strtotime($txn->transaction_date));
                  ?>
                  <tr data-search="<?= htmlspecialchars($searchText) ?>" data-month="<?= $month ?>" data-type="<?= htmlspecialchars($type) ?>">
                    <td><?= date('d M Y', strtotime($txn->transaction_date)) ?></td>
                    <td><?= htmlspecialchars($txn->client_name ?: '-') ?></td>
                    <td><?= htmlspecialchars($txn->project_name ?: '-') ?></td>
                    <td><span class="txn-badge <?= htmlspecialchars($type) ?>"><?= txn_label($type) ?></span></td>
                    <td><span class="txn-money <?= htmlspecialchars($type) ?>"><?= txn_rupees($txn->amount) ?></span></td>
                    <td><span class="txn-badge <?= htmlspecialchars($status) ?>"><?= txn_label($status) ?></span></td>
                    <td><?= txn_label($txn->payment_mode ?: '-') ?></td>
                    <td><?= htmlspecialchars($txn->notes ?: '-') ?></td>
                    <td>
                      <a href="<?= base_url('admin/transactions/delete/' . $txn->id) ?>" class="txn-btn danger" onclick="return confirm('Are you sure you want to delete this transaction?')">
                        <i class="bx bx-trash"></i>
                      </a>
                    </td>
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

<div class="txn-modal" id="addTxnModal">
  <div class="txn-box">
    <form method="post" action="<?= site_url('admin/transactions/store') ?>">
      <div class="txn-modal-head">
        <div class="txn-modal-title">Add Transaction</div>
        <button type="button" class="txn-close" onclick="closeTxnModal()"><i class="bx bx-x"></i></button>
      </div>
      <div class="txn-modal-body">
        <div class="txn-field">
          <label>Client</label>
          <select class="txn-select" name="client_name" id="txnClient" required>
            <option value="">Select Client</option>
            <?php foreach ($clientOptions as $clientName): ?>
              <option value="<?= htmlspecialchars($clientName) ?>"><?= htmlspecialchars($clientName) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="txn-field">
          <label>Project</label>
          <select class="txn-select" name="project_id" id="txnProject">
            <option value="">Select Project</option>
          </select>
        </div>
        <div class="txn-field">
          <label>Transaction Type</label>
          <div class="txn-radio-row">
            <label class="txn-radio"><input type="radio" name="transaction_type" value="credit" checked> Credit</label>
            <label class="txn-radio"><input type="radio" name="transaction_type" value="debit"> Debit</label>
          </div>
        </div>
        <div class="txn-field">
          <label>Amount</label>
          <input class="txn-input" name="amount" type="number" min="1" step="0.01" placeholder="Enter amount" required>
        </div>
        <div class="txn-field">
          <label>Date</label>
          <input class="txn-input" name="transaction_date" type="date" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div class="txn-field">
          <label>Status</label>
          <select class="txn-select" name="status" required>
            <option value="paid">Paid</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="failed">Failed</option>
          </select>
        </div>
        <div class="txn-field">
          <label>Payment Mode</label>
          <select class="txn-select" name="payment_mode">
            <option value="upi">UPI</option>
            <option value="cash">Cash</option>
            <option value="bank-transfer">Bank Transfer</option>
            <option value="card">Card</option>
            <option value="cheque">Cheque</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="txn-field">
          <label>Notes</label>
          <textarea class="txn-textarea" name="notes" placeholder="Add notes..."></textarea>
        </div>
      </div>
      <div class="txn-modal-foot">
        <button type="button" class="txn-btn light" onclick="closeTxnModal()">Cancel</button>
        <button class="txn-btn" type="submit">Add Transaction</button>
      </div>
    </form>
  </div>
</div>

<script>
  const txnProjects = <?= json_encode(array_map(function ($project) {
                        return [
                          'id' => (int) $project->id,
                          'client_name' => $project->client_name ?: 'Unknown Client',
                          'project_name' => $project->project_name
                        ];
                      }, $projects ?? []), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

  function openTxnModal() {
    document.getElementById('addTxnModal').classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeTxnModal() {
    document.getElementById('addTxnModal').classList.remove('active');
    document.body.style.overflow = '';
  }

  function filterTransactions() {
    const term = (document.getElementById('txnSearch')?.value || '').toLowerCase().trim();
    const month = document.getElementById('txnMonthFilter')?.value || '';
    const type = document.getElementById('txnTypeFilter')?.value || '';
    let visible = 0;

    document.querySelectorAll('#txnTableBody tr').forEach(row => {
      const matchTerm = !term || row.dataset.search.indexOf(term) > -1;
      const matchMonth = !month || row.dataset.month === month;
      const matchType = !type || row.dataset.type === type;
      const show = matchTerm && matchMonth && matchType;
      row.style.display = show ? '' : 'none';
      if (show) visible++;
    });

    const counter = document.getElementById('txnVisibleCount');
    if (counter) counter.textContent = visible;
  }

  document.getElementById('txnClient')?.addEventListener('change', function() {
    const projectSelect = document.getElementById('txnProject');
    projectSelect.innerHTML = '<option value="">Select Project</option>';
    txnProjects.filter(project => project.client_name === this.value).forEach(project => {
      const option = document.createElement('option');
      option.value = project.id;
      option.textContent = project.project_name;
      projectSelect.appendChild(option);
    });
  });

  document.getElementById('txnSearch')?.addEventListener('input', filterTransactions);
  document.getElementById('txnMonthFilter')?.addEventListener('change', filterTransactions);
  document.getElementById('txnTypeFilter')?.addEventListener('change', filterTransactions);

  document.querySelectorAll('.txn-modal').forEach(modal => modal.addEventListener('click', event => {
    if (event.target === modal) closeTxnModal();
  }));
</script>
