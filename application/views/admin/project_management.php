<?php
function pm_rupees($amount)
{
  return '&#8377;' . number_format((float) $amount, 0);
}

function pm_status($status)
{
  return ucwords(str_replace('-', ' ', (string) $status));
}
?>



<style>
  .pm-page,
  .pm-modal {
    --pm-primary: #6366f1;
    --pm-secondary: #8b5cf6;
    --pm-success: #10b981;
    --pm-warning: #f59e0b;
    --pm-danger: #ef4444;
    --pm-text: var(--text-primary, #0f172a);
    --pm-muted: var(--text-secondary, #64748b);
    --pm-faint: var(--text-tertiary, #94a3b8);
    --pm-bg: var(--bg-secondary, #f8fafc);
    --pm-card: var(--bg-primary, #fff);
    --pm-soft: var(--bg-tertiary, #f1f5f9);
    --pm-border: var(--border-color, #e2e8f0);
    --pm-shadow: 0 16px 42px rgba(15, 23, 42, .08);
    font-family: 'Poppins', sans-serif
  }

  [data-bs-theme=dark] .pm-page,
  [data-bs-theme=dark] .pm-modal {
    --pm-shadow: 0 16px 42px rgba(0, 0, 0, .32)
  }

  .pm-page {
    background: var(--pm-bg);
    min-height: calc(100vh - 73px)
  }

  .pm-page .page-content {
    padding: 24px 20px
  }

  .pm-shell {
    max-width: 1320px;
    margin: 0 auto
  }

  .pm-head {
    display: flex;
    justify-content: space-between;
    gap: 16px;
    align-items: flex-start;
    margin-bottom: 22px
  }

  .pm-head h1 {
    font-size: 30px;
    font-weight: 800;
    color: var(--pm-text);
    letter-spacing: -.04em;
    margin: 0 0 6px
  }

  .pm-head p {
    color: var(--pm-muted);
    margin: 0
  }

  .pm-btn {
    border: 0;
    border-radius: 13px;
    padding: 11px 16px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, var(--pm-primary), var(--pm-secondary));
    color: #fff;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer
  }

  .pm-btn:hover {
    color: #fff
  }

  .pm-btn.light {
    background: var(--pm-soft);
    color: var(--pm-text);
    border: 1px solid var(--pm-border)
  }

  .pm-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 22px
  }

  .pm-card {
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    border-radius: 20px;
    box-shadow: var(--pm-shadow);
    padding: 20px
  }

  .pm-stat-label {
    color: var(--pm-muted);
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em
  }

  .pm-stat-value {
    font-size: 28px;
    font-weight: 850;
    margin-top: 8px;
    color: var(--stat-color)
  }

  .pm-section {
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    border-radius: 20px;
    box-shadow: var(--pm-shadow);
    margin-bottom: 22px;
    overflow: hidden
  }

  .pm-section-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 18px 20px;
    border-bottom: 1px solid var(--pm-border)
  }

  .pm-section-head h2 {
    font-size: 18px;
    font-weight: 800;
    color: var(--pm-text);
    margin: 0
  }

  .pm-table-wrap {
    overflow-x: auto
  }

  .pm-table {
    width: 100%;
    min-width: 920px;
    border-collapse: collapse
  }

  .pm-table th,
  .pm-table td {
    padding: 15px 18px;
    border-bottom: 1px solid var(--pm-border);
    vertical-align: middle
  }

  .pm-table th {
    background: var(--pm-bg);
    color: var(--pm-faint);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .08em
  }

  .pm-table td {
    color: var(--pm-text);
    font-size: 13px
  }

  .pm-name {
    font-weight: 800;
    color: var(--pm-text)
  }

  .pm-sub {
    color: var(--pm-faint);
    font-size: 12px;
    margin-top: 2px
  }

  .pm-pill {
    display: inline-flex;
    padding: 5px 10px;
    border-radius: 999px;
    background: rgba(99, 102, 241, .13);
    color: var(--pm-primary);
    font-size: 12px;
    font-weight: 800
  }

  .pm-money {
    font-weight: 850;
    color: var(--pm-success);
    font-size: 15px
  }

  .pm-actions {
    display: flex;
    gap: 7px
  }

  .pm-icon {
    width: 34px;
    height: 34px;
    display: grid;
    place-items: center;
    border-radius: 10px;
    border: 1px solid var(--pm-border);
    background: var(--pm-card);
    color: var(--pm-muted);
    cursor: pointer
  }

  .pm-icon:hover {
    color: var(--pm-primary);
    background: var(--pm-soft)
  }

  .pm-empty {
    padding: 38px;
    text-align: center;
    color: var(--pm-faint)
  }

  .pm-mobile {
    display: none;
    padding: 12px
  }

  .pm-mobile-card {
    border: 1px solid var(--pm-border);
    background: var(--pm-card);
    border-radius: 16px;
    padding: 14px;
    margin-bottom: 10px
  }

  .pm-row {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 7px 0;
    border-top: 1px solid var(--pm-border);
    color: var(--pm-muted);
    font-size: 13px
  }

  .pm-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
    background: rgba(15, 23, 42, .62)
  }

  .pm-modal.active {
    display: flex
  }

  .pm-box {
    width: 100%;
    max-width: 800px;
    max-height: 92vh;
    display: flex;
    flex-direction: column;
    border-radius: 22px;
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    box-shadow: 0 24px 70px rgba(0, 0, 0, .35);
    overflow: hidden
  }

  .pm-box.small {
    max-width: 520px
  }

  .pm-modal-head,
  .pm-modal-foot {
    padding: 17px 22px;
    border-bottom: 1px solid var(--pm-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px
  }

  .pm-modal-foot {
    border-top: 1px solid var(--pm-border);
    border-bottom: 0;
    justify-content: flex-end
  }

  .pm-modal-title {
    font-size: 20px;
    font-weight: 850;
    color: var(--pm-text)
  }

  .pm-close {
    width: 34px;
    height: 34px;
    border: 0;
    border-radius: 10px;
    background: var(--pm-soft);
    color: var(--pm-muted)
  }

  .pm-modal-body {
    padding: 22px;
    overflow-y: auto
  }

  .pm-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 15px
  }

  .pm-field.full {
    grid-column: 1/-1
  }

  .pm-field label {
    display: block;
    color: var(--pm-muted);
    font-size: 12px;
    font-weight: 800;
    margin-bottom: 7px
  }

  .pm-input,
  .pm-select,
  .pm-textarea {
    width: 100%;
    min-height: 44px;
    padding: 10px 12px;
    border: 1px solid var(--pm-border);
    border-radius: 12px;
    background: var(--pm-bg);
    color: var(--pm-text);
    outline: 0
  }

  .pm-textarea {
    min-height: 90px
  }

  .pm-input:focus,
  .pm-select:focus,
  .pm-textarea:focus {
    border-color: var(--pm-primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, .14)
  }

  .pm-alert {
    padding: 12px 14px;
    border-radius: 12px;
    margin-bottom: 14px;
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    color: var(--pm-success)
  }

  @media(max-width:992px) {
    .pm-grid {
      grid-template-columns: repeat(2, 1fr)
    }
  }

  @media(max-width:720px) {
    .pm-page .page-content {
      padding: 16px 12px
    }

    .pm-head {
      flex-direction: column
    }

    .pm-head .pm-btn {
      width: 100%;
      justify-content: center
    }

    .pm-grid {
      grid-template-columns: 1fr
    }

    .pm-table-wrap {
      display: none
    }

    .pm-mobile {
      display: block
    }

    .pm-form-grid {
      grid-template-columns: 1fr
    }

    .pm-modal-foot {
      flex-direction: column-reverse
    }

    .pm-modal-foot .pm-btn {
      width: 100%;
      justify-content: center
    }
  }

  .pm-autocomplete {
    position: relative;
    width: 100%;
  }

  .pm-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    max-height: 220px;
    overflow-y: auto;
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    z-index: 99999;
    margin-top: 5px;
    display: none;
    scrollbar-width: thin;
  }

  .pm-suggestions.active {
    display: block;
  }

  .pm-suggestion-item {
    padding: 10px 14px;
    border-bottom: 1px solid var(--pm-border);
    cursor: pointer;
    transition: background .2s ease, color .2s ease;
    display: flex;
    flex-direction: column;
    gap: 2px;
    text-align: left;
  }

  .pm-suggestion-item:last-child {
    border-bottom: 0;
  }

  .pm-suggestion-item:hover {
    background: var(--pm-soft);
  }

  .pm-suggestion-name {
    font-size: 13px;
    font-weight: 750;
    color: var(--pm-text);
  }

  .pm-suggestion-meta {
    font-size: 11px;
    color: var(--pm-muted);
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .pm-suggestion-meta span {
    display: inline-flex;
    align-items: center;
    gap: 3px;
  }

  .pm-suggestion-meta i {
    font-size: 12px;
  }

  @keyframes autofill-glow {
    0% {
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.4);
      border-color: var(--pm-primary);
    }
    50% {
      box-shadow: 0 0 0 6px rgba(99, 102, 241, 0.6);
      border-color: var(--pm-primary);
    }
    100% {
      box-shadow: 0 0 0 0px rgba(99, 102, 241, 0);
      border-color: var(--pm-border);
    }
  }

  .autofill-highlight {
    animation: autofill-glow 1.2s cubic-bezier(0.25, 0.8, 0.25, 1);
  }
</style>

<div class="page-wrapper pm-page">
  <div class="page-content">
    <div class="pm-shell">
      <?php if ($this->session->flashdata('success')): ?><div class="pm-alert"><?= htmlspecialchars($this->session->flashdata('success')) ?></div><?php endif; ?>

      <div class="pm-head">
        <div>
          <h1>Project Management</h1>
          <p>Projects, clients, requirements and payment logs connected from one database flow.</p>
        </div>
        <button class="pm-btn" onclick="openAddProject()"><i class="bx bx-plus"></i> Add Project</button>
      </div>

      <?php $totalProjects = count($projects ?? []);
      $totalBase = 0;
      $totalPaid = 0;
      $totalRemaining = 0;
      $clients = [];
      foreach (($projects ?? []) as $p) {
        $totalBase += (float)($p->base_amount ?? 0);
        $totalPaid += (float)($p->paid_amount ?? 0);
        $totalRemaining += (float)($p->remaining_amount ?? 0);
        if (!empty($p->client_name)) {
          $clients[$p->client_name] = true;
        }
      } ?>
      <div class="pm-grid">
        <div class="pm-card">
          <div class="pm-stat-label">Total Projects</div>
          <div class="pm-stat-value" style="--stat-color:var(--pm-primary)"><?= $totalProjects ?></div>
        </div>
        <div class="pm-card">
          <div class="pm-stat-label">Clients</div>
          <div class="pm-stat-value" style="--stat-color:var(--pm-secondary)"><?= count($clients) ?></div>
        </div>
        <div class="pm-card">
          <div class="pm-stat-label">Paid Amount</div>
          <div class="pm-stat-value" style="--stat-color:var(--pm-success)"><?= pm_rupees($totalPaid) ?></div>
        </div>
        <div class="pm-card">
          <div class="pm-stat-label">Remaining</div>
          <div class="pm-stat-value" style="--stat-color:var(--pm-warning)"><?= pm_rupees($totalRemaining) ?></div>
        </div>
      </div>

      <section class="pm-section" id="projects">
        <div class="pm-section-head">
          <h2><i class="bx bx-folder me-2" style="color:var(--pm-primary)"></i>Projects</h2><span class="pm-pill"><?= count($projects ?? []) ?> records</span>
        </div>
        <?php if (empty($projects)): ?><div class="pm-empty">No projects found.</div><?php else: ?>
          <div class="pm-table-wrap">
            <table class="pm-table">
              <thead>
                <tr>
                  <th>Project</th>
                  <th>Client</th>
                  <th>Status</th>
                  <th>Base</th>
                  <th>Requirements</th>
                  <th>Paid</th>
                  <th>Remaining</th>
                  <th>Progress</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($projects as $p): ?><tr>
                    <td>
                      <div class="pm-name"><?= htmlspecialchars($p->project_name) ?></div>
                      <div class="pm-sub"><?= htmlspecialchars($p->project_description ?: 'No description') ?></div>
                    </td>
                    <td>
                      <div class="pm-name"><?= htmlspecialchars($p->client_name ?: '-') ?></div>
                      <div class="pm-sub"><?= htmlspecialchars($p->client_email ?: '') ?></div>
                    </td>
                    <td><span class="pm-pill"><?= pm_status($p->status ?? 'active') ?></span></td>
                    <td><?= pm_rupees($p->base_amount ?? 0) ?></td>
                    <td><?= pm_rupees($p->requirements_amount ?? 0) ?></td>
                    <td><span class="pm-money"><?= pm_rupees($p->paid_amount ?? 0) ?></span></td>
                    <td><?= pm_rupees($p->remaining_amount ?? 0) ?></td>
                    <td><?= (int)($p->progress ?? 0) ?>%</td>
                    <td>
                      <div class="pm-actions"><a class="pm-icon" href="<?= site_url('project/view/' . $p->id) ?>" title="View Project Details"><i class="bx bx-show"></i></a><button class="pm-icon" onclick='editProject(<?= json_encode($p, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)' title="Edit Project"><i class="bx bx-pencil"></i></button><button class="pm-icon" onclick="openRequirement(<?= (int)$p->id ?>)" title="Manage Requirements"><i class="bx bx-list-check"></i></button><button class="pm-icon" onclick="openPayment(<?= (int)$p->id ?>)" title="Add Payment Log"><i class="bx bx-rupee"></i></button><a class="pm-icon" href="<?= site_url('project/tasks_by_project/' . $p->id) ?>" title="View Tasks"><i class="bx bx-sitemap"></i></a></div>
                    </td>
                  </tr><?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="pm-mobile"><?php foreach ($projects as $p): ?><div class="pm-mobile-card">
                <div class="pm-name"><?= htmlspecialchars($p->project_name) ?></div>
                <div class="pm-sub"><?= htmlspecialchars($p->client_name ?: '-') ?></div>
                <div class="pm-row"><span>Paid</span><strong><?= pm_rupees($p->paid_amount ?? 0) ?></strong></div>
                <div class="pm-row"><span>Remaining</span><strong><?= pm_rupees($p->remaining_amount ?? 0) ?></strong></div>
                <div class="pm-actions mt-2"><a class="pm-icon" href="<?= site_url('project/view/' . $p->id) ?>" title="View Project Details"><i class="bx bx-show"></i></a><button class="pm-icon" onclick='editProject(<?= json_encode($p, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)' title="Edit Project"><i class="bx bx-pencil"></i></button><button class="pm-icon" onclick="openPayment(<?= (int)$p->id ?>)" title="Add Payment Log"><i class="bx bx-rupee"></i></button></div>
              </div><?php endforeach; ?></div>
        <?php endif; ?>
      </section>

      <section class="pm-section" id="payments">
        <div class="pm-section-head">
          <h2><i class="bx bx-receipt me-2" style="color:var(--pm-success)"></i>Payment Logs</h2><a class="pm-btn light" href="<?= base_url('admin/payments') ?>">Open Payments Page</a>
        </div>
        <div class="pm-table-wrap">
          <table class="pm-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Client</th>
                <th>Project</th>
                <th>Amount</th>
                <th>Mode</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (($payment_logs ?? []) as $log): ?><tr>
                  <td><?= date('d M Y', strtotime($log->payment_date)) ?></td>
                  <td><?= htmlspecialchars($log->client_name ?: '-') ?></td>
                  <td><?= htmlspecialchars($log->project_name ?: '-') ?></td>
                  <td><span class="pm-money"><?= pm_rupees($log->amount) ?></span></td>
                  <td><?= pm_status($log->payment_mode) ?></td>
                  <td><?= htmlspecialchars($log->notes ?: '-') ?></td>
                </tr><?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>

<div class="pm-modal" id="projectModal">
  <div class="pm-box">
    <form method="post" id="projectForm" action="<?= site_url('project/store') ?>">
      <div class="pm-modal-head">
        <div class="pm-modal-title">Add Project</div><button type="button" class="pm-close" onclick="closePm('projectModal')"><i class="bx bx-x"></i></button>
      </div>
      <div class="pm-modal-body">
        <div class="pm-form-grid">
          <div class="pm-field full"><label>Project Name</label><input class="pm-input" name="project_name" required></div>
          <div class="pm-field full"><label>Project Description</label><textarea class="pm-textarea" name="project_description"></textarea></div>
          <div class="pm-field"><label>Client Name</label>
            <div class="pm-autocomplete">
              <input class="pm-input" name="client_name" required autocomplete="off">
              <div class="pm-suggestions" id="clientSuggestions"></div>
            </div>
          </div>
          <div class="pm-field"><label>Client Email</label><input class="pm-input" name="client_email" type="email"></div>
          <div class="pm-field"><label>Client Phone</label><input class="pm-input" name="client_phone"></div>
          <div class="pm-field"><label>Status</label><select class="pm-select" name="status">
              <option value="active">Active</option>
              <option value="completed">Completed</option>
              <option value="on-hold">On Hold</option>
              <option value="cancelled">Cancelled</option>
            </select></div>
          <div class="pm-field"><label>Base Amount (₹)</label><input class="pm-input" name="base_amount" type="number" min="0" step="0.01"></div>
          <div class="pm-field" id="progressFieldContainer"><label>Progress %</label><input class="pm-input" name="progress" type="number" min="0" max="100"></div>
          <div class="pm-field"><label>Start Date</label><input class="pm-input" name="start_date" type="date"></div>
          <div class="pm-field"><label>Due Date</label><input class="pm-input" name="due_date" type="date"></div>
        </div>
      </div>
      <div class="pm-modal-foot"><button type="button" class="pm-btn light" onclick="closePm('projectModal')">Cancel</button><button class="pm-btn" type="submit">Save Project</button></div>
    </form>
  </div>
</div>

<div class="pm-modal" id="requirementModal">
  <div class="pm-box small">
    <form method="post" action="<?= site_url('project/add_requirement') ?>">
      <div class="pm-modal-head">
        <div class="pm-modal-title">Add Requirement</div><button type="button" class="pm-close" onclick="closePm('requirementModal')"><i class="bx bx-x"></i></button>
      </div>
      <div class="pm-modal-body"><input type="hidden" name="project_id" id="reqProjectId">
        <div class="pm-form-grid">
          <div class="pm-field full"><label>Requirement Title</label><input class="pm-input" name="title" required></div>
          <div class="pm-field full"><label>Description</label><textarea class="pm-textarea" name="description"></textarea></div>
          <div class="pm-field full"><label>Amount (₹)</label><input class="pm-input" name="amount" type="number" min="0" step="0.01" required></div>
        </div>
      </div>
      <div class="pm-modal-foot"><button type="button" class="pm-btn light" onclick="closePm('requirementModal')">Cancel</button><button class="pm-btn">Save Requirement</button></div>
    </form>
  </div>
</div>

<div class="pm-modal" id="paymentModal">
  <div class="pm-box small">
    <form method="post" action="<?= site_url('project/add_payment') ?>">
      <div class="pm-modal-head">
        <div class="pm-modal-title">Add Payment Log</div><button type="button" class="pm-close" onclick="closePm('paymentModal')"><i class="bx bx-x"></i></button>
      </div>
      <div class="pm-modal-body"><input type="hidden" name="project_id" id="payProjectId">
        <div class="pm-form-grid">
          <div class="pm-field full"><label>Amount (₹)</label><input class="pm-input" name="amount" type="number" min="1" step="0.01" required></div>
          <div class="pm-field"><label>Payment Date</label><input class="pm-input" name="payment_date" type="date" value="<?= date('Y-m-d') ?>" required></div>
          <div class="pm-field"><label>Mode</label><select class="pm-select" name="payment_mode">
              <option value="upi">UPI</option>
              <option value="cash">Cash</option>
              <option value="bank-transfer">Bank Transfer</option>
              <option value="card">Card</option>
              <option value="cheque">Cheque</option>
              <option value="other">Other</option>
            </select></div>
          <div class="pm-field full"><label>Notes</label><textarea class="pm-textarea" name="notes"></textarea></div>
        </div>
      </div>
      <div class="pm-modal-foot"><button type="button" class="pm-btn light" onclick="closePm('paymentModal')">Cancel</button><button class="pm-btn">Save Payment</button></div>
    </form>
  </div>
</div>

<script>
  function openPm(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden'
  }

  function closePm(id) {
    document.getElementById(id).classList.remove('active');
    document.body.style.overflow = ''
  }

  function openAddProject() {
    const f = document.getElementById('projectForm');
    f.reset();
    f.action = '<?= site_url('project/store') ?>';
    document.querySelector('#projectModal .pm-modal-title').textContent = 'Add Project';
    const progressField = document.getElementById('progressFieldContainer');
    if (progressField) progressField.style.display = 'none';
    openPm('projectModal')
  }

  function openRequirement(id) {
    document.getElementById('reqProjectId').value = id;
    openPm('requirementModal')
  }

  function openPayment(id) {
    document.getElementById('payProjectId').value = id;
    openPm('paymentModal')
  }

  function editProject(p) {
    const f = document.getElementById('projectForm');
    f.action = '<?= site_url('project/update/') ?>' + p.id;
    document.querySelector('#projectModal .pm-modal-title').textContent = 'Edit Project';
    const progressField = document.getElementById('progressFieldContainer');
    if (progressField) progressField.style.display = '';
    ['project_name', 'project_description', 'client_name', 'client_email', 'client_phone', 'status', 'base_amount', 'progress', 'start_date', 'due_date'].forEach(k => {
      if (f.elements[k]) f.elements[k].value = p[k] || ''
    });
    openPm('projectModal')
  }
  document.querySelectorAll('.pm-modal').forEach(m => m.addEventListener('click', e => {
    if (e.target === m) closePm(m.id)
  }));

  // Client Autocomplete Logic
  document.addEventListener('DOMContentLoaded', () => {
    const projectsData = <?= json_encode($projects ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    
    // Extract unique clients
    const clientMap = new Map();
    projectsData.forEach(p => {
      if (p.client_name) {
        const nameKey = p.client_name.trim().toLowerCase();
        if (!clientMap.has(nameKey)) {
          clientMap.set(nameKey, {
            name: p.client_name.trim(),
            email: p.client_email ? p.client_email.trim() : '',
            phone: p.client_phone ? p.client_phone.trim() : ''
          });
        }
      }
    });
    const uniqueClients = Array.from(clientMap.values());

    const clientInput = document.querySelector('input[name="client_name"]');
    const emailInput = document.querySelector('input[name="client_email"]');
    const phoneInput = document.querySelector('input[name="client_phone"]');
    const suggestionsContainer = document.getElementById('clientSuggestions');
    
    if (!clientInput || !suggestionsContainer) return;

    clientInput.addEventListener('input', function() {
      const val = this.value.trim().toLowerCase();
      suggestionsContainer.innerHTML = '';
      
      if (!val) {
        suggestionsContainer.classList.remove('active');
        return;
      }

      const matches = uniqueClients.filter(c => c.name.toLowerCase().includes(val));
      if (matches.length === 0) {
        suggestionsContainer.classList.remove('active');
        return;
      }

      matches.forEach(c => {
        const div = document.createElement('div');
        div.className = 'pm-suggestion-item';
        
        let metaHtml = '';
        if (c.email || c.phone) {
          metaHtml = `<div class="pm-suggestion-meta">`;
          if (c.email) {
            metaHtml += `<span><i class="bx bx-envelope"></i> ${escapeHtml(c.email)}</span>`;
          }
          if (c.phone) {
            metaHtml += `<span><i class="bx bx-phone"></i> ${escapeHtml(c.phone)}</span>`;
          }
          metaHtml += `</div>`;
        }

        div.innerHTML = `
          <div class="pm-suggestion-name">${escapeHtml(c.name)}</div>
          ${metaHtml}
        `;

        div.addEventListener('click', () => {
          clientInput.value = c.name;
          
          if (emailInput) {
            emailInput.value = c.email;
            emailInput.classList.remove('autofill-highlight');
            void emailInput.offsetWidth; // Trigger reflow
            emailInput.classList.add('autofill-highlight');
          }
          
          if (phoneInput) {
            phoneInput.value = c.phone;
            phoneInput.classList.remove('autofill-highlight');
            void phoneInput.offsetWidth; // Trigger reflow
            phoneInput.classList.add('autofill-highlight');
          }

          suggestionsContainer.classList.remove('active');
        });

        suggestionsContainer.appendChild(div);
      });

      suggestionsContainer.classList.add('active');
    });

    // Close suggestions when clicking outside
    document.addEventListener('click', (e) => {
      if (e.target !== clientInput && e.target !== suggestionsContainer && !suggestionsContainer.contains(e.target)) {
        suggestionsContainer.classList.remove('active');
      }
    });

    // Close on Escape key
    clientInput.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        suggestionsContainer.classList.remove('active');
      }
    });

    function escapeHtml(str) {
      return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
    }
  });
</script>