<style>
    /* ─── Premium Products Theme ─── */
    .products-page,
    .prod-modal {
        --prod-bg: var(--bg-secondary, #f8fafc);
        --prod-card: var(--bg-primary, #ffffff);
        --prod-border: var(--border-color, #e2e8f0);
        --prod-text: var(--text-primary, #0f172a);
        --prod-muted: var(--text-secondary, #64748b);
        --prod-soft: var(--bg-tertiary, #f1f5f9);
        --prod-shadow: 0 10px 30px rgba(0,0,0,0.05);
        --prod-primary: #6366f1;
        --prod-primary-hover: #4f46e5;
    }

    .products-page {
        min-height: calc(100vh - 73px);
        background-color: var(--prod-bg) !important;
        color: var(--prod-text);
        padding: 24px !important;
    }

    [data-bs-theme=dark] .products-page,
    [data-bs-theme=dark] .prod-modal {
        --prod-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* ─── Header Banner ─── */
    .prod-header {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-radius: 16px;
        padding: 28px 32px;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
    }

    .prod-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
    }

    .prod-header .header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        z-index: 1;
        flex-wrap: wrap;
        gap: 16px;
    }

    .prod-header h4 {
        color: #fff;
        font-weight: 700;
        font-size: 22px;
        margin: 0;
    }

    .prod-header p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 13px;
        margin: 4px 0 0;
    }

    .btn-add-prod {
        background: rgba(255, 255, 255, 0.2);
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        text-decoration: none;
        cursor: pointer;
    }

    .btn-add-prod:hover {
        background: #fff;
        color: #6366f1;
        border-color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* ─── Product Card Grid ─── */
    .prod-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
    }

    .prod-card {
        background: var(--prod-card);
        border: 1px solid var(--prod-border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--prod-shadow);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .prod-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(99, 102, 241, 0.15);
        border-color: var(--prod-primary);
    }

    .prod-img-box {
        position: relative;
        width: 100%;
        height: 180px;
        background: var(--prod-soft);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 1px solid var(--prod-border);
    }

    .prod-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .prod-card:hover .prod-img {
        transform: scale(1.05);
    }

    .prod-placeholder-img {
        font-size: 48px;
        color: var(--prod-muted);
        opacity: 0.4;
    }

    .prod-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .prod-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--prod-text);
        margin: 0 0 8px 0;
        line-height: 1.4;
    }

    .prod-desc {
        font-size: 13px;
        color: var(--prod-muted);
        line-height: 1.6;
        margin: 0 0 16px 0;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .prod-footer {
        border-top: 1px solid var(--prod-border);
        padding-top: 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        color: var(--prod-muted);
    }

    .prod-actions {
        display: flex;
        gap: 8px;
    }

    .btn-icon-action {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: 1px solid var(--prod-border);
        background: var(--prod-soft);
        color: var(--prod-text);
        display: grid;
        place-items: center;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-icon-action.edit:hover {
        background: var(--prod-primary);
        color: #fff;
        border-color: var(--prod-primary);
    }

    .btn-icon-action.delete:hover {
        background: #ef4444;
        color: #fff;
        border-color: #ef4444;
    }

    /* ─── Empty Catalog State ─── */
    .prod-empty {
        background: var(--prod-card);
        border: 1px dashed var(--prod-border);
        border-radius: 16px;
        padding: 60px 20px;
        text-align: center;
        color: var(--prod-muted);
        grid-column: 1 / -1;
    }

    /* ─── Custom Modal ─── */
    .prod-modal {
        position: fixed;
        inset: 0;
        z-index: 1050;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 16px;
        overflow-y: auto;
    }

    .prod-modal.active {
        display: flex;
    }

    .prod-modal-box {
        width: 100%;
        max-width: 500px;
        background: var(--prod-card);
        border: 1px solid var(--prod-border);
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        overflow: hidden;
        animation: modalScale 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes modalScale {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .prod-modal-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--prod-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .prod-modal-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--prod-text);
        margin: 0;
    }

    .btn-modal-close {
        background: var(--prod-soft);
        border: 0;
        color: var(--prod-muted);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-modal-close:hover {
        background: var(--prod-border);
        color: var(--prod-text);
    }

    .prod-modal-body {
        padding: 24px;
    }

    .form-group-custom {
        margin-bottom: 18px;
    }

    .form-label-custom {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--prod-muted);
        margin-bottom: 6px;
        display: block;
        letter-spacing: 0.05em;
    }

    .form-control-custom {
        width: 100%;
        background-color: var(--prod-soft);
        border: 1.5px solid var(--prod-border);
        border-radius: 12px;
        padding: 10px 14px;
        color: var(--prod-text);
        font-size: 14px;
        outline: none;
        transition: border 0.2s;
    }

    .form-control-custom:focus {
        border-color: var(--prod-primary);
    }

    textarea.form-control-custom {
        min-height: 100px;
        resize: vertical;
    }

    .form-control-custom::placeholder {
        color: var(--prod-muted);
        opacity: 0.7;
    }

    .form-control-custom[type="file"]::file-selector-button {
        border: none;
        background: var(--prod-primary);
        color: #fff;
        padding: 8px 16px;
        border-radius: 8px;
        margin-right: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-control-custom[type="file"]::file-selector-button:hover {
        background: var(--prod-primary-hover);
    }

    .modal-actions-custom {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 24px;
    }

    .btn-action-custom {
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        border: 0;
    }

    .btn-action-custom.cancel {
        background: var(--prod-soft);
        color: var(--prod-text);
        border: 1px solid var(--prod-border);
    }

    .btn-action-custom.cancel:hover {
        background: var(--prod-border);
    }

    .btn-action-custom.submit {
        background: var(--prod-primary);
        color: #fff;
    }

    .btn-action-custom.submit:hover {
        background: var(--prod-primary-hover);
    }

    /* File preview */
    .img-upload-preview {
        width: 100%;
        height: 150px;
        border: 1px dashed var(--prod-border);
        border-radius: 12px;
        margin-top: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--prod-soft);
    }

    .img-upload-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<div class="page-wrapper products-page">
    <div class="page-content bg-transparent p-0">
        
        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2 rounded-4 mb-4">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class="bx bxs-check-circle"></i></div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success</h6>
                        <div class="text-white small"><?= $this->session->flashdata('success') ?></div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2 rounded-4 mb-4">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i></div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Error</h6>
                        <div class="text-white small"><?= $this->session->flashdata('error') ?></div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Header -->
        <div class="prod-header">
            <div class="header-content">
                <div>
                    <h4>Products Catalog</h4>
                    <p>Manage the list of available products for lead capture and tracking.</p>
                </div>
                <button class="btn-add-prod" onclick="openModal('addProdModal')">
                    <i class="bx bx-plus"></i> Add Product
                </button>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="prod-grid">
            <?php if (empty($products)): ?>
                <div class="prod-empty">
                    <i class="bx bx-cube" style="font-size: 48px; display: block; margin-bottom: 12px;"></i>
                    <p class="mb-0">No products added yet. Click "Add Product" to create your first product.</p>
                </div>
            <?php else: ?>
                <?php foreach ($products as $p): ?>
                    <div class="prod-card">
                        <div class="prod-img-box">
                            <?php if ($p->image && file_exists(FCPATH . 'uploads/products/' . $p->image)): ?>
                                <img src="<?= base_url('uploads/products/' . $p->image) ?>" class="prod-img" alt="<?= htmlspecialchars($p->name) ?>">
                            <?php else: ?>
                                <div class="prod-placeholder-img">
                                    <i class="bx bx-cube"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="prod-body">
                            <h5 class="prod-title"><?= htmlspecialchars($p->name) ?></h5>
                            <p class="prod-desc"><?= htmlspecialchars($p->description ?: 'No description provided.') ?></p>
                            <div class="prod-footer">
                                <span><?= date('M d, Y', strtotime($p->created_at)) ?></span>
                                <div class="prod-actions">
                                    <button class="btn-icon-action edit" onclick="openEditModal(<?= htmlspecialchars(json_encode($p), ENT_QUOTES) ?>)" title="Edit Product">
                                        <i class="bx bx-pencil"></i>
                                    </button>
                                    <a class="btn-icon-action delete" href="<?= site_url('admin/products/delete/' . $p->id) ?>" onclick="return confirm('Are you sure you want to delete this product? All connected product leads will also be deleted.')" title="Delete Product">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
</div>

<!-- Modal: Add Product -->
<div class="prod-modal" id="addProdModal">
    <div class="prod-modal-box">
        <div class="prod-modal-header">
            <h5 class="prod-modal-title">Add New Product</h5>
            <button class="btn-modal-close" onclick="closeModal('addProdModal')"><i class="bx bx-x"></i></button>
        </div>
        <form action="<?= site_url('admin/products/add') ?>" method="post" enctype="multipart/form-data">
            <div class="prod-modal-body">
                <div class="form-group-custom">
                    <label class="form-label-custom">Product Name *</label>
                    <input type="text" name="name" class="form-control-custom" placeholder="e.g. ERP Software" required>
                </div>
                <div class="form-group-custom">
                    <label class="form-label-custom">Description</label>
                    <textarea name="description" class="form-control-custom" placeholder="Provide product details..."></textarea>
                </div>
                <div class="form-group-custom">
                    <label class="form-label-custom">Product Image</label>
                    <input type="file" name="image" class="form-control-custom" accept="image/*" onchange="previewImage(this, 'addImgPreview')">
                    <div class="img-upload-preview" id="addImgPreview">
                        <span class="text-muted small">No image selected</span>
                    </div>
                </div>
                <div class="modal-actions-custom">
                    <button type="button" class="btn-action-custom cancel" onclick="closeModal('addProdModal')">Cancel</button>
                    <button type="submit" class="btn-action-custom submit">Save Product</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Edit Product -->
<div class="prod-modal" id="editProdModal">
    <div class="prod-modal-box">
        <div class="prod-modal-header">
            <h5 class="prod-modal-title">Edit Product</h5>
            <button class="btn-modal-close" onclick="closeModal('editProdModal')"><i class="bx bx-x"></i></button>
        </div>
        <form id="editProdForm" method="post" enctype="multipart/form-data">
            <div class="prod-modal-body">
                <div class="form-group-custom">
                    <label class="form-label-custom">Product Name *</label>
                    <input type="text" name="name" id="editProdName" class="form-control-custom" required>
                </div>
                <div class="form-group-custom">
                    <label class="form-label-custom">Description</label>
                    <textarea name="description" id="editProdDesc" class="form-control-custom"></textarea>
                </div>
                <div class="form-group-custom">
                    <label class="form-label-custom">Replace Product Image</label>
                    <input type="file" name="image" class="form-control-custom" accept="image/*" onchange="previewImage(this, 'editImgPreview')">
                    <div class="img-upload-preview" id="editImgPreview">
                        <span class="text-muted small">No new image selected</span>
                    </div>
                </div>
                <div class="modal-actions-custom">
                    <button type="button" class="btn-action-custom cancel" onclick="closeModal('editProdModal')">Cancel</button>
                    <button type="submit" class="btn-action-custom submit">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.add('active');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
    }

    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        preview.innerHTML = '';
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.setAttribute('src', e.target.result);
                preview.appendChild(img);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = '<span class="text-muted small">No image selected</span>';
        }
    }

    function openEditModal(product) {
        document.getElementById('editProdForm').action = '<?= site_url('admin/products/update/') ?>' + product.id;
        document.getElementById('editProdName').value = product.name;
        document.getElementById('editProdDesc').value = product.description || '';
        
        const preview = document.getElementById('editImgPreview');
        if (product.image) {
            preview.innerHTML = `<img src="<?= base_url('uploads/products/') ?>${product.image}" alt="Current image">`;
        } else {
            preview.innerHTML = '<span class="text-muted small">No image uploaded</span>';
        }
        
        openModal('editProdModal');
    }

    // Close on click outside modal box
    document.querySelectorAll('.prod-modal').forEach(m => m.addEventListener('click', e => {
        if (e.target === m) closeModal(m.id);
    }));
</script>
