<div class="exp-form-grid">
    <div class="exp-field full">
        <label>Expense Title <span style="color:var(--exp-danger)">*</span></label>
        <input type="text" name="title" class="exp-input" placeholder="e.g., Office rent, Adobe license" required>
    </div>

    <div class="exp-field">
        <label>Category <span style="color:var(--exp-danger)">*</span></label>
        <select name="category" class="exp-select" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category ?>"><?= expense_label($category) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="exp-field">
        <label>Amount (₹) <span style="color:var(--exp-danger)">*</span></label>
        <input type="number" name="amount" class="exp-input" placeholder="5000" step="0.01" min="1" required>
    </div>

    <div class="exp-field">
        <label>Expense Date <span style="color:var(--exp-danger)">*</span></label>
        <input type="date" name="expense_date" class="exp-input" value="<?= date('Y-m-d') ?>" required>
    </div>

    <div class="exp-field">
        <label>Payment Mode <span style="color:var(--exp-danger)">*</span></label>
        <select name="payment_mode" class="exp-select" required>
            <?php foreach ($payment_modes as $mode): ?>
                <option value="<?= $mode ?>"><?= expense_label($mode) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="exp-field">
        <label>Payment Status <span style="color:var(--exp-danger)">*</span></label>
        <select name="payment_status" class="exp-select" required>
            <?php foreach ($payment_statuses as $status): ?>
                <option value="<?= $status ?>"><?= expense_label($status) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="exp-field">
        <label>Vendor / Paid To</label>
        <input type="text" name="vendor" class="exp-input" placeholder="Vendor or person name">
    </div>

    <div class="exp-field full">
        <label>Notes</label>
        <textarea name="notes" class="exp-input exp-textarea" placeholder="Add bill number, reason, or other notes"></textarea>
    </div>
</div>
