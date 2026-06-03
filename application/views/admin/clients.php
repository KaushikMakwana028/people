<?php
if (!function_exists('client_rupees')) {
  function client_rupees($amount)
  {
    return '&#8377;' . number_format((float) $amount, 0);
  }
}
?>



<style>
  .client-page {
    --client-primary: #6c5ce7;
    --client-success: #10b981;
    --client-text: var(--text-primary, #0f172a);
    --client-muted: var(--text-secondary, #64748b);
    --client-faint: var(--text-tertiary, #94a3b8);
    --client-bg: var(--bg-secondary, #f8fafc);
    --client-card: var(--bg-primary, #fff);
    --client-soft: var(--bg-tertiary, #f1f5f9);
    --client-border: var(--border-color, #e2e8f0);
    --client-shadow: 0 16px 42px rgba(15, 23, 42, .08);
    font-family: 'Poppins', sans-serif;
    background: var(--client-bg);
    min-height: calc(100vh - 73px)
  }

  [data-bs-theme=dark] .client-page {
    --client-shadow: 0 16px 42px rgba(0, 0, 0, .32)
  }

  .client-page .page-content {
    padding: 28px 20px
  }

  .client-shell {
    max-width: 1320px;
    margin: 0 auto
  }

  .client-head {
    display: flex;
    justify-content: space-between;
    gap: 16px;
    align-items: flex-start;
    margin-bottom: 26px
  }

  .client-head h1 {
    font-size: 32px;
    font-weight: 850;
    color: var(--client-text);
    letter-spacing: -.04em;
    margin: 0 0 8px
  }

  .client-head p {
    color: var(--client-muted);
    margin: 0
  }

  .client-search {
    position: relative;
    margin-bottom: 26px
  }

  .client-search i {
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--client-faint)
  }

  .client-search input {
    width: 100%;
    height: 46px;
    border: 1px solid var(--client-border);
    border-radius: 13px;
    background: var(--client-card);
    color: var(--client-text);
    padding: 0 16px 0 44px;
    outline: 0
  }

  .client-search input:focus {
    border-color: var(--client-primary);
    box-shadow: 0 0 0 3px rgba(108, 92, 231, .14)
  }

  .client-card {
    background: var(--client-card);
    border: 1px solid var(--client-border);
    border-radius: 20px;
    box-shadow: var(--client-shadow);
    overflow: hidden
  }

  .client-table-wrap {
    overflow-x: auto
  }

  .client-table {
    width: 100%;
    min-width: 960px;
    border-collapse: collapse
  }

  .client-table th,
  .client-table td {
    padding: 18px 22px;
    border-bottom: 1px solid var(--client-border);
    vertical-align: middle
  }

  .client-table th {
    background: var(--client-bg);
    color: var(--client-faint);
    font-size: 12px;
    font-weight: 850;
    text-transform: uppercase;
    letter-spacing: .07em
  }

  .client-table td {
    color: var(--client-text);
    font-size: 14px
  }

  .client-person {
    display: flex;
    align-items: center;
    gap: 14px
  }

  .client-avatar {
    width: 34px;
    height: 34px;
    border-radius: 999px;
    display: grid;
    place-items: center;
    background: linear-gradient(135deg, var(--client-primary), #8b5cf6);
    color: #fff;
    font-weight: 850
  }

  .client-name {
    font-weight: 850;
    color: var(--client-text)
  }

  .client-money {
    font-weight: 850;
    color: var(--client-success)
  }

  .client-actions {
    display: flex;
    gap: 8px
  }

  .client-icon {
    width: 34px;
    height: 34px;
    border-radius: 10px;
    border: 1px solid var(--client-border);
    background: var(--client-soft);
    color: var(--client-muted);
    display: grid;
    place-items: center;
    text-decoration: none
  }

  .client-icon:hover {
    color: var(--client-primary)
  }

  .client-empty {
    padding: 50px;
    text-align: center;
    color: var(--client-faint)
  }

  .client-mobile {
    display: none;
    padding: 12px
  }

  .client-mobile-card {
    border: 1px solid var(--client-border);
    background: var(--client-card);
    border-radius: 16px;
    padding: 15px;
    margin-bottom: 12px
  }

  .client-row {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding: 8px 0;
    border-top: 1px solid var(--client-border);
    color: var(--client-muted);
    font-size: 13px
  }

  @media(max-width:760px) {
    .client-page .page-content {
      padding: 18px 12px
    }

    .client-head {
      flex-direction: column
    }

    .client-table-wrap {
      display: none
    }

    .client-mobile {
      display: block
    }

    .client-head h1 {
      font-size: 28px
    }
  }
</style>

<div class="page-wrapper client-page">
  <div class="page-content">
    <div class="client-shell">
      <div class="client-head">
        <div>
          <h1>Clients</h1>
          <p>Manage your clients from project records.</p>
        </div>
      </div>

      <div class="client-search">
        <i class="bx bx-search"></i>
        <input type="search" id="clientSearch" placeholder="Search clients...">
      </div>

      <div class="client-card">
        <?php if (empty($clients)): ?>
          <div class="client-empty"><i class="bx bx-group bx-md mb-3"></i><br>No clients found. Add projects to create client records.</div>
        <?php else: ?>
          <div class="client-table-wrap">
            <table class="client-table" id="clientTable">
              <thead>
                <tr>
                  <th>Client Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Company</th>
                  <th>Total Projects</th>
                  <th>Total Revenue</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($clients as $client): ?>
                  <tr>
                    <td>
                      <div class="client-person">
                        <div class="client-avatar"><?= strtoupper(substr($client->client_name, 0, 1)) ?></div>
                        <div class="client-name"><?= htmlspecialchars($client->client_name) ?></div>
                      </div>
                    </td>
                    <td><?= htmlspecialchars($client->client_email ?: '-') ?></td>
                    <td><?= htmlspecialchars($client->client_phone ?: '-') ?></td>
                    <td><?= htmlspecialchars($client->company ?: '-') ?></td>
                    <td><strong><?= (int) $client->total_projects ?></strong></td>
                    <td><span class="client-money"><?= client_rupees($client->total_revenue) ?></span></td>
                    <td>
                      <div class="client-actions"><a class="client-icon" href="<?= site_url('project/view/' . $client->project_id) ?>" title="View latest project"><i class="bx bx-show"></i></a></div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="client-mobile" id="clientMobile">
            <?php foreach ($clients as $client): ?>
              <div class="client-mobile-card">
                <div class="client-person">
                  <div class="client-avatar"><?= strtoupper(substr($client->client_name, 0, 1)) ?></div>
                  <div>
                    <div class="client-name"><?= htmlspecialchars($client->client_name) ?></div>
                    <div class="client-row" style="border-top:0;padding-top:2px"><?= htmlspecialchars($client->client_email ?: '-') ?></div>
                  </div>
                </div>
                <div class="client-row"><span>Mobile</span><strong><?= htmlspecialchars($client->client_phone ?: '-') ?></strong></div>
                <div class="client-row"><span>Projects</span><strong><?= (int) $client->total_projects ?></strong></div>
                <div class="client-row"><span>Revenue</span><strong class="client-money"><?= client_rupees($client->total_revenue) ?></strong></div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script>
  const clientSearch = document.getElementById('clientSearch');
  if (clientSearch) {
    clientSearch.addEventListener('input', function() {
      const term = this.value.toLowerCase();
      document.querySelectorAll('#clientTable tbody tr, #clientMobile .client-mobile-card').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
      });
    });
  }
</script>