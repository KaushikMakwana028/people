<div class="page-wrapper">
    <div class="page-content">

        <!-- Breadcrumb -->
        <div class="d-flex align-items-center mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none">
                            <i class="bx bx-home-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Announcements</li>
                </ol>
            </nav>
        </div>

        <!-- Header Card -->
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4 header-card">
            <div class="card-body p-0">
                <div class="bg-gradient-dark p-4 position-relative overflow-hidden">
                    <!-- Decorative Elements -->
                    <div class="decorative-circle circle-1"></div>
                    <div class="decorative-circle circle-2"></div>
                    <div class="decorative-circle circle-3"></div>
                    <div class="decorative-dots"></div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center position-relative z-1">
                        <div class="d-flex align-items-center mb-2 mb-md-0">
                            <div class="icon-wrapper me-3">
                                <i class="bx bxs-megaphone fs-1"></i>
                            </div>
                            <div>
                                <h4 class="text-white mb-1 fw-bold">Announcements</h4>
                                <p class="text-white-50 mb-0 small">
                                    <i class="bx bx-list-ul me-1"></i>
                                    <?php
                                        $count = !empty($announcements) ? count($announcements) : 0;
                                        echo $count . ' Total Announcement' . ($count !== 1 ? 's' : '');
                                    ?>
                                </p>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/announcements/add') ?>"
                           class="btn btn-add btn-lg rounded-pill px-4 shadow-sm">
                            <i class="bx bx-plus-circle me-2"></i> New Announcement
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search & Filter Bar -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 filter-card">
            <div class="card-body p-3">
                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group search-input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="bx bx-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0"
                                   placeholder="Search announcements..."
                                   id="searchInput">
                            <span class="input-group-text bg-transparent border-start-0 clear-btn d-none"
                                  id="clearSearch" role="button">
                                <i class="bx bx-x text-muted"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select custom-select" id="sortSelect">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="az">A → Z</option>
                            <option value="za">Z → A</option>
                        </select>
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="btn-group view-toggle" role="group">
                            <button type="button" class="btn btn-sm btn-outline-secondary active" id="tableViewBtn"
                                    onclick="switchView('table')">
                                <i class="bx bx-list-ul"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="cardViewBtn"
                                    onclick="switchView('card')">
                                <i class="bx bx-grid-alt"></i>
                            </button>
                        </div>
                        <span class="badge bg-light text-dark ms-2 result-count" id="resultCount">
                            <?= $count ?> results
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table View -->
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden table-card" id="tableView">
            <div class="card-body p-0">

                <?php if (!empty($announcements)) { ?>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="announcementTable">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3 text-uppercase small fw-bold text-muted"
                                        style="width: 60px;">#</th>
                                    <th class="py-3 text-uppercase small fw-bold text-muted">Title</th>
                                    <th class="py-3 text-uppercase small fw-bold text-muted"
                                        style="min-width: 300px;">Description</th>
                                    <th class="py-3 text-uppercase small fw-bold text-muted"
style="width: 180px;">Date</th>

<th class="py-3 text-uppercase small fw-bold text-muted pe-4"
style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($announcements as $a) { ?>
                                    <tr class="announcement-row" data-title="<?= strtolower($a->title) ?>"
                                        data-date="<?= $a->created_at ?>">
                                        <td class="ps-4">
                                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill fw-semibold">
                                                <?= $i++ ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="title-icon me-3">
                                                    <i class="bx bxs-bell-ring"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold announcement-title">
                                                        <?= $a->title ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-muted description-text">
                                                <?= strlen($a->description) > 120
                                                    ? substr($a->description, 0, 120) . '...'
                                                    : $a->description ?>
                                            </p>
                                            <?php if (strlen($a->description) > 120) { ?>
                                                <button class="btn btn-link btn-sm p-0 text-primary text-decoration-none read-more-btn"
                                                        onclick="showFullDescription(this, '<?= addslashes(htmlspecialchars($a->description)) ?>')">
                                                    Read more <i class="bx bx-chevron-right"></i>
                                                </button>
                                            <?php } ?>
                                        </td>
                                        <td class="pe-4">


                                            <td class="pe-4">
  <div class="d-flex align-items-center">
    <div class="date-icon me-2">
      <i class="bx bx-calendar"></i>
    </div>
    <div>
      <small class="d-block fw-semibold text-dark">
        <?= date('d M Y', strtotime($a->created_at)) ?>
      </small>
      <small class="text-muted">
        <?= date('h:i A', strtotime($a->created_at)) ?>
      </small>
    </div>
  </div>
</td>

<!-- DELETE -->
<td>
  <a href="<?= base_url('admin/announcements/delete/'.$a->id) ?>"
     class="btn btn-sm btn-danger rounded-pill px-3"
     onclick="return confirm('Delete this announcement?')">
     <i class="bx bx-trash"></i>
  </a>
</td>



                                            <div class="d-flex align-items-center">
                                                <div class="date-icon me-2">
                                                    <i class="bx bx-calendar"></i>
                                                </div>
                                                <div>
                                                    <small class="d-block fw-semibold text-dark">
                                                        <?= date('d M Y', strtotime($a->created_at)) ?>
                                                    </small>
                                                    <small class="text-muted">
                                                        <?= date('h:i A', strtotime($a->created_at)) ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                <?php } else { ?>

                    <!-- Empty State -->
                    <div class="empty-state text-center py-5 px-4">
                        <div class="empty-icon mb-4">
                            <div class="empty-icon-wrapper mx-auto">
                                <i class="bx bx-bell-off"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">No Announcements Yet</h5>
                        <p class="text-muted mb-4 mx-auto" style="max-width: 400px;">
                            You haven't created any announcements. Start by adding your first one!
                        </p>
                        <a href="<?= base_url('admin/announcements/add') ?>"
                           class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                            <i class="bx bx-plus-circle me-2"></i> Create First Announcement
                        </a>
                    </div>

                <?php } ?>

            </div>
        </div>

        <!-- Card/Grid View (Hidden by default) -->
        <div class="row g-4" id="cardView" style="display: none;">
            <?php if (!empty($announcements)) { ?>
                <?php $i = 1; foreach ($announcements as $a) { ?>
                    <div class="col-md-6 col-lg-4 announcement-card-item"
                         data-title="<?= strtolower($a->title) ?>"
                         data-date="<?= $a->created_at ?>">
                        <div class="card border-0 shadow-sm rounded-4 h-100 announcement-card overflow-hidden">
                            <div class="card-accent-top accent-<?= ($i % 4) + 1 ?>"></div>
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill">
                                        <i class="bx bx-bell me-1"></i> #<?= $i++ ?>
                                    </span>
                                    <small class="text-muted">
                                        <i class="bx bx-time-five me-1"></i>
                                        <?= date('d M Y', strtotime($a->created_at)) ?>
                                    </small>
                                </div>
                                <h6 class="fw-bold text-dark mb-2 card-announcement-title">
                                    <?= $a->title ?>
                                </h6>
                                <p class="text-muted small mb-0 card-desc-text">
                                    <?= strlen($a->description) > 150
                                        ? substr($a->description, 0, 150) . '...'
                                        : $a->description ?>
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0">
                                <small class="text-muted">
                                    <i class="bx bx-calendar me-1"></i>
                                    <?= date('h:i A', strtotime($a->created_at)) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <!-- No Search Results (hidden by default) -->
        <div class="card border-0 shadow-sm rounded-4 mt-4" id="noResults" style="display: none;">
            <div class="card-body text-center py-5">
                <i class="bx bx-search-alt fs-1 text-muted mb-3 d-block"></i>
                <h6 class="fw-bold text-dark">No Results Found</h6>
                <p class="text-muted small">Try adjusting your search terms</p>
            </div>
        </div>

    </div>
</div>

<!-- Full Description Modal -->
<div class="modal fade" id="descriptionModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h6 class="modal-title fw-bold">
                    <i class="bx bx-detail text-primary me-2"></i>Full Description
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-2">
                <p class="text-muted" id="fullDescriptionText"></p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* ===== Gradient Header ===== */
    .bg-gradient-dark {
        background: linear-gradient(135deg, #1e2a3a 0%, #2c3e50 40%, #34495e 100%);
    }

    /* ===== Decorative Elements ===== */
    .decorative-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
    }
    .circle-1 { width: 220px; height: 220px; top: -80px; right: -50px; }
    .circle-2 { width: 140px; height: 140px; bottom: -50px; right: 120px; }
    .circle-3 { width: 90px; height: 90px; top: 20px; right: 250px; }

    .decorative-dots {
        position: absolute;
        top: 15px;
        left: 50%;
        width: 100px;
        height: 100px;
        background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 12px 12px;
    }

    .z-1 { z-index: 1; }

    /* ===== Icon Wrapper ===== */
    .icon-wrapper {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    /* ===== Add Button ===== */
    .btn-add {
        background: linear-gradient(135deg, #00b894 0%, #00a381 100%);
        border: none;
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-add:hover {
        background: linear-gradient(135deg, #00d2a4 0%, #00b894 100%);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 184, 148, 0.4) !important;
    }

    /* ===== Search & Filter ===== */
    .search-input-group .form-control,
    .search-input-group .input-group-text {
        border-color: #e9ecef;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }
    .search-input-group:focus-within .form-control,
    .search-input-group:focus-within .input-group-text {
        border-color: #4e73df;
        background: #fff;
        box-shadow: 0 0 0 0.15rem rgba(78, 115, 223, 0.1);
    }
    .search-input-group .form-control:focus { box-shadow: none; }

    .custom-select {
        border-color: #e9ecef;
        background-color: #f8f9fa;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .custom-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.15rem rgba(78, 115, 223, 0.1);
    }

    .view-toggle .btn {
        border-radius: 8px;
        padding: 6px 12px;
        transition: all 0.2s ease;
    }
    .view-toggle .btn.active {
        background: #4e73df;
        border-color: #4e73df;
        color: #fff;
    }

    .clear-btn { cursor: pointer; }

    /* ===== Table Styling ===== */
    .table-card { transition: all 0.3s ease; }

    .table thead {
        background: linear-gradient(135deg, #f8f9fc 0%, #f1f3f8 100%);
        border-bottom: 2px solid #e3e6f0;
    }

    .table tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f0f0f0;
    }
    .table tbody tr:hover {
        background: #f8f9ff;
        transform: scale(1.002);
    }
    .table tbody tr:last-child { border-bottom: none; }

    /* ===== Title Icon ===== */
    .title-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 16px;
    }

    .announcement-row:nth-child(2n) .title-icon {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    .announcement-row:nth-child(3n) .title-icon {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    .announcement-row:nth-child(4n) .title-icon {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    /* ===== Date Icon ===== */
    .date-icon {
        width: 32px;
        height: 32px;
        min-width: 32px;
        background: #f0f2ff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4e73df;
        font-size: 14px;
    }

    /* ===== Description ===== */
    .description-text {
        font-size: 0.875rem;
        line-height: 1.6;
    }

    .read-more-btn {
        font-size: 0.8rem;
        font-weight: 600;
    }
    .read-more-btn:hover {
        text-decoration: underline !important;
    }

    /* ===== Card View ===== */
    .announcement-card {
        transition: all 0.3s ease;
        cursor: default;
    }
    .announcement-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.1) !important;
    }

    .card-accent-top {
        height: 4px;
        width: 100%;
    }
    .accent-1 { background: linear-gradient(90deg, #667eea, #764ba2); }
    .accent-2 { background: linear-gradient(90deg, #f093fb, #f5576c); }
    .accent-3 { background: linear-gradient(90deg, #4facfe, #00f2fe); }
    .accent-4 { background: linear-gradient(90deg, #43e97b, #38f9d7); }

    /* ===== Empty State ===== */
    .empty-icon-wrapper {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #adb5bd;
        border: 3px dashed #dee2e6;
    }

    /* ===== Animations ===== */
    .header-card { animation: slideDown 0.4s ease-out; }
    .filter-card { animation: slideDown 0.5s ease-out; }
    .table-card  { animation: slideDown 0.6s ease-out; }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-15px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .announcement-row {
        animation: fadeInRow 0.4s ease-out forwards;
        opacity: 0;
    }
    @keyframes fadeInRow {
        from { opacity: 0; transform: translateX(-10px); }
        to   { opacity: 1; transform: translateX(0); }
    }

    <?php if (!empty($announcements)) { $i = 0; foreach ($announcements as $a) { ?>
        .announcement-row:nth-child(<?= ++$i ?>) { animation-delay: <?= $i * 0.05 ?>s; }
    <?php } } ?>

    /* ===== Result Count Badge ===== */
    .result-count {
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 20px;
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
        .bg-gradient-dark { padding: 1.2rem !important; }
        .icon-wrapper { width: 48px; height: 48px; border-radius: 12px; }
        .icon-wrapper i { font-size: 1.3rem !important; }
        .btn-add { font-size: 0.85rem; padding: 8px 16px !important; }
        .view-toggle { display: none; }
    }
</style>

<script>
    // ===== Search Functionality =====
    const searchInput = document.getElementById('searchInput');
    const clearSearch = document.getElementById('clearSearch');
    const resultCount = document.getElementById('resultCount');

    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();

        // Toggle clear button
        clearSearch.classList.toggle('d-none', query === '');

        filterAnnouncements(query);
    });

    clearSearch.addEventListener('click', function () {
        searchInput.value = '';
        this.classList.add('d-none');
        filterAnnouncements('');
        searchInput.focus();
    });

    function filterAnnouncements(query) {
        let visibleCount = 0;

        // Filter table rows
        document.querySelectorAll('.announcement-row').forEach(row => {
            const title = row.getAttribute('data-title') || '';
            const desc = row.querySelector('.description-text')?.textContent.toLowerCase() || '';
            const match = title.includes(query) || desc.includes(query);
            row.style.display = match ? '' : 'none';
            if (match) visibleCount++;
        });

        // Filter card items
        document.querySelectorAll('.announcement-card-item').forEach(card => {
            const title = card.getAttribute('data-title') || '';
            const desc = card.querySelector('.card-desc-text')?.textContent.toLowerCase() || '';
            const match = title.includes(query) || desc.includes(query);
            card.style.display = match ? '' : 'none';
        });

        // Show/hide no results
        const noResults = document.getElementById('noResults');
        const totalItems = document.querySelectorAll('.announcement-row').length;

        if (totalItems > 0) {
            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        resultCount.textContent = visibleCount + ' result' + (visibleCount !== 1 ? 's' : '');
    }

    // ===== Sort Functionality =====
    document.getElementById('sortSelect').addEventListener('change', function () {
        const tbody = document.querySelector('#announcementTable tbody');
        if (!tbody) return;

        const rows = Array.from(tbody.querySelectorAll('.announcement-row'));

        rows.sort((a, b) => {
            switch (this.value) {
                case 'newest':
                    return new Date(b.dataset.date) - new Date(a.dataset.date);
                case 'oldest':
                    return new Date(a.dataset.date) - new Date(b.dataset.date);
                case 'az':
                    return a.dataset.title.localeCompare(b.dataset.title);
                case 'za':
                    return b.dataset.title.localeCompare(a.dataset.title);
            }
        });

        rows.forEach(row => tbody.appendChild(row));
    });

    // ===== View Toggle =====
    function switchView(view) {
        const tableView = document.getElementById('tableView');
        const cardView = document.getElementById('cardView');
        const tableBtn = document.getElementById('tableViewBtn');
        const cardBtn = document.getElementById('cardViewBtn');

        if (view === 'table') {
            tableView.style.display = 'block';
            cardView.style.display = 'none';
            tableBtn.classList.add('active');
            cardBtn.classList.remove('active');
        } else {
            tableView.style.display = 'none';
            cardView.style.display = 'flex';
            cardView.classList.add('d-flex', 'flex-wrap');
            cardBtn.classList.add('active');
            tableBtn.classList.remove('active');
        }
    }

    // ===== Read More Modal =====
    function showFullDescription(btn, description) {
        document.getElementById('fullDescriptionText').textContent = description;
        const modal = new bootstrap.Modal(document.getElementById('descriptionModal'));
        modal.show();
    }
</script>