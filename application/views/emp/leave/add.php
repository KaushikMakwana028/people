<style>
/* ── CSS Variables ── */
:root {
  --grad-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  --grad-success: linear-gradient(135deg, #10b981 0%, #059669 100%);
  --grad-warning: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
  --grad-info: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
  --soft-primary: #eef2ff;
  --soft-success: #ecfdf5;
  --soft-warning: #fffbeb;
  --soft-danger: #fff1f2;
  --soft-info: #ecfeff;
  --soft-purple: #faf5ff;
  --radius-lg: 20px;
  --radius-md: 14px;
  --radius-sm: 10px;
  --shadow-card: 0 4px 24px rgba(0,0,0,.06);
  --shadow-hover: 0 12px 40px rgba(0,0,0,.12);
  --text-dark: #0f172a;
  --text-mid: #475569;
  --text-light: #94a3b8;
  --border-light: #f1f5f9;
}

/* ── Hero Banner ── */
.leave-hero {
  background: var(--grad-primary);
  border-radius: var(--radius-lg);
  padding: 36px 34px;
  color: #fff;
  margin-bottom: 30px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 12px 45px rgba(102, 126, 234, .35);
}

.leave-hero::before,
.leave-hero::after {
  content: '';
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, .07);
}

.leave-hero::before {
  width: 280px;
  height: 280px;
  top: -120px;
  right: -80px;
}

.leave-hero::after {
  width: 180px;
  height: 180px;
  bottom: -80px;
  left: -60px;
}

.leave-hero .hero-content {
  position: relative;
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 16px;
}

.leave-hero .hero-left h3 {
  font-weight: 800;
  font-size: 24px;
  margin-bottom: 6px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.leave-hero .hero-left p {
  margin: 0;
  opacity: .85;
  font-size: 14px;
}

.leave-hero .hero-badge {
  background: rgba(255, 255, 255, .18);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, .25);
  border-radius: 50px;
  padding: 10px 24px;
  font-weight: 700;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 8px;
}

/* ── Form Card ── */
.leave-form-card {
  background: #fff;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  border: 1px solid var(--border-light);
  overflow: hidden;
  animation: fadeSlideUp .5s ease both;
}

@keyframes fadeSlideUp {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}

.form-card-header {
  padding: 24px 30px;
  border-bottom: 1px solid var(--border-light);
  display: flex;
  align-items: center;
  gap: 14px;
  background: #fafbfd;
}

.form-card-header .header-icon {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  background: var(--grad-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  color: #fff;
  flex-shrink: 0;
  box-shadow: 0 6px 20px rgba(102, 126, 234, .3);
}

.form-card-header .header-text h5 {
  margin: 0;
  font-weight: 700;
  font-size: 18px;
  color: var(--text-dark);
}

.form-card-header .header-text p {
  margin: 4px 0 0;
  font-size: 13px;
  color: var(--text-light);
}

.form-card-body {
  padding: 30px;
}

/* ── Step Indicators ── */
.form-steps {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0;
  margin-bottom: 34px;
  padding: 0 10px;
}

.step-item {
  display: flex;
  align-items: center;
  gap: 0;
}

.step-circle {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  font-weight: 700;
  flex-shrink: 0;
  transition: all .3s ease;
  background: #f1f5f9;
  color: var(--text-light);
  border: 2px solid #e2e8f0;
}

.step-circle.active {
  background: var(--grad-primary);
  color: #fff;
  border-color: transparent;
  box-shadow: 0 4px 15px rgba(102, 126, 234, .3);
}

.step-circle.completed {
  background: var(--grad-success);
  color: #fff;
  border-color: transparent;
  box-shadow: 0 4px 15px rgba(16, 185, 129, .3);
}

.step-line {
  width: 60px;
  height: 3px;
  background: #e2e8f0;
  border-radius: 2px;
  margin: 0 6px;
  transition: background .3s ease;
}

.step-line.active {
  background: var(--grad-primary);
}

.step-label {
  font-size: 11px;
  font-weight: 600;
  color: var(--text-light);
  text-align: center;
  margin-top: 6px;
  text-transform: uppercase;
  letter-spacing: .5px;
}

.step-wrap {
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* ── Form Groups ── */
.form-group-enhanced {
  margin-bottom: 24px;
  position: relative;
}

.form-group-enhanced .form-label-custom {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 700;
  color: var(--text-mid);
  text-transform: uppercase;
  letter-spacing: .8px;
  margin-bottom: 10px;
}

.form-group-enhanced .form-label-custom .label-icon {
  width: 30px;
  height: 30px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  flex-shrink: 0;
}

.label-icon.emp    { background: var(--soft-primary); color: #667eea; }
.label-icon.date   { background: var(--soft-info);    color: #0891b2; }
.label-icon.type   { background: var(--soft-warning); color: #d97706; }
.label-icon.reason { background: var(--soft-purple);  color: #9333ea; }

/* Styled Inputs */
.input-enhanced {
  border: 2px solid #e2e8f0;
  border-radius: var(--radius-sm);
  padding: 12px 16px;
  font-size: 14px;
  font-weight: 500;
  color: var(--text-dark);
  background: #fafbfd;
  width: 100%;
  transition: all .3s ease;
  appearance: none;
  -webkit-appearance: none;
}

.input-enhanced:hover {
  border-color: #cbd5e1;
  background: #fff;
}

.input-enhanced:focus {
  outline: none;
  border-color: #667eea;
  background: #fff;
  box-shadow: 0 0 0 4px rgba(102, 126, 234, .12);
}

select.input-enhanced {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10l-5 5z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 16px center;
  padding-right: 40px;
  cursor: pointer;
}

textarea.input-enhanced {
  min-height: 120px;
  resize: vertical;
  line-height: 1.6;
}

/* ── Leave Type Cards ── */
.leave-type-options {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
  margin-top: 10px;
}

@media (max-width: 768px) {
  .leave-type-options {
    grid-template-columns: 1fr;
  }
}

.leave-type-option input[type="radio"] {
  display: none;
}

.leave-type-option label {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 22px 14px;
  border: 2px solid #e8ecf1;
  border-radius: 16px;
  cursor: pointer;
  transition: all .3s ease;
  background: #fafbfd;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.leave-type-option label::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: transparent;
  transition: background .3s ease;
}

.leave-type-option label i {
  font-size: 30px;
  transition: all .3s ease;
  color: var(--text-light);
}

.leave-type-option label .type-name {
  font-weight: 700;
  font-size: 13px;
  color: var(--text-mid);
  transition: color .3s ease;
}

.leave-type-option label .type-time {
  font-size: 11px;
  color: var(--text-light);
  font-weight: 500;
  transition: color .3s ease;
}

.leave-type-option label:hover {
  border-color: #667eea;
  background: var(--soft-primary);
}

.leave-type-option label:hover i {
  transform: scale(1.1);
  color: #667eea;
}

/* Full Day Selected */
.leave-type-option input#type_full:checked + label {
  border-color: #10b981;
  background: linear-gradient(135deg, #ecfdf5, #d1fae5);
  box-shadow: 0 6px 20px rgba(16, 185, 129, .2);
}

.leave-type-option input#type_full:checked + label::before {
  background: var(--grad-success);
}

.leave-type-option input#type_full:checked + label i {
  color: #059669;
  transform: scale(1.1);
}

.leave-type-option input#type_full:checked + label .type-name {
  color: #059669;
}

/* Half Day 1 Selected */
.leave-type-option input#type_half1:checked + label {
  border-color: #f59e0b;
  background: linear-gradient(135deg, #fffbeb, #fef3c7);
  box-shadow: 0 6px 20px rgba(245, 158, 11, .2);
}

.leave-type-option input#type_half1:checked + label::before {
  background: var(--grad-warning);
}

.leave-type-option input#type_half1:checked + label i {
  color: #d97706;
  transform: scale(1.1);
}

.leave-type-option input#type_half1:checked + label .type-name {
  color: #d97706;
}

/* Half Day 2 Selected */
.leave-type-option input#type_half2:checked + label {
  border-color: #06b6d4;
  background: linear-gradient(135deg, #ecfeff, #cffafe);
  box-shadow: 0 6px 20px rgba(6, 182, 212, .2);
}

.leave-type-option input#type_half2:checked + label::before {
  background: var(--grad-info);
}

.leave-type-option input#type_half2:checked + label i {
  color: #0891b2;
  transform: scale(1.1);
}

.leave-type-option input#type_half2:checked + label .type-name {
  color: #0891b2;
}

/* ── Time Info Alert ── */
.time-info-box {
  display: none;
  margin-top: 16px;
  padding: 16px 20px;
  border-radius: var(--radius-sm);
  border-left: 4px solid #667eea;
  background: var(--soft-primary);
  animation: slideDown .3s ease;
  display: flex;
  align-items: center;
  gap: 12px;
}

.time-info-box.hidden {
  display: none;
}

.time-info-box.show {
  display: flex;
}

@keyframes slideDown {
  from { opacity: 0; transform: translateY(-10px); }
  to   { opacity: 1; transform: translateY(0); }
}

.time-info-box.warning {
  border-left-color: #f59e0b;
  background: var(--soft-warning);
}

.time-info-box.info {
  border-left-color: #06b6d4;
  background: var(--soft-info);
}

.time-info-box .info-icon {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  flex-shrink: 0;
}

.time-info-box.warning .info-icon {
  background: rgba(245, 158, 11, .15);
  color: #d97706;
}

.time-info-box.info .info-icon {
  background: rgba(6, 182, 212, .15);
  color: #0891b2;
}

.time-info-box .info-text {
  font-size: 13px;
  font-weight: 600;
  color: var(--text-mid);
}

.time-info-box .info-text strong {
  color: var(--text-dark);
}

/* ── Textarea Character Count ── */
.textarea-wrap {
  position: relative;
}

.char-count {
  position: absolute;
  bottom: 12px;
  right: 14px;
  font-size: 11px;
  color: var(--text-light);
  font-weight: 600;
  pointer-events: none;
}

/* ── Submit Button ── */
.btn-submit-leave {
  background: var(--grad-primary);
  border: none;
  color: #fff;
  padding: 16px 32px;
  font-size: 15px;
  font-weight: 700;
  border-radius: var(--radius-md);
  width: 100%;
  cursor: pointer;
  transition: all .3s ease;
  letter-spacing: .5px;
  box-shadow: 0 8px 30px rgba(102, 126, 234, .3);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  margin-top: 8px;
}

.btn-submit-leave:hover {
  transform: translateY(-3px);
  box-shadow: 0 14px 40px rgba(102, 126, 234, .4);
}

.btn-submit-leave:active {
  transform: translateY(-1px);
}

.btn-submit-leave:disabled {
  opacity: .55;
  cursor: not-allowed;
  transform: none;
  box-shadow: none;
}

/* ── Form Divider ── */
.form-divider {
  height: 1px;
  background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
  margin: 28px 0;
}

/* ── Info Tips ── */
.form-tip {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 14px 18px;
  background: #fffbeb;
  border: 1px solid #fde68a;
  border-radius: var(--radius-sm);
  margin-bottom: 24px;
}

.form-tip i {
  color: #d97706;
  font-size: 18px;
  flex-shrink: 0;
  margin-top: 1px;
}

.form-tip span {
  font-size: 13px;
  color: #92400e;
  font-weight: 500;
  line-height: 1.5;
}

/* ── Side Info Panel ── */
.leave-info-panel {
  background: #fff;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  border: 1px solid var(--border-light);
  overflow: hidden;
  animation: fadeSlideUp .6s ease both;
}

.info-panel-header {
  padding: 20px 24px;
  background: #fafbfd;
  border-bottom: 1px solid var(--border-light);
}

.info-panel-header h6 {
  margin: 0;
  font-weight: 700;
  font-size: 15px;
  color: var(--text-dark);
  display: flex;
  align-items: center;
  gap: 8px;
}

.info-panel-body {
  padding: 24px;
}

.info-list-item {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  padding: 16px;
  border-radius: var(--radius-sm);
  margin-bottom: 12px;
  transition: all .25s ease;
  border: 1px solid transparent;
}

.info-list-item:hover {
  background: #fafbfd;
  border-color: var(--border-light);
}

.info-list-item:last-child {
  margin-bottom: 0;
}

.info-item-icon {
  width: 42px;
  height: 42px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
}

.info-item-icon.green  { background: var(--soft-success); color: #059669; }
.info-item-icon.amber  { background: var(--soft-warning); color: #d97706; }
.info-item-icon.cyan   { background: var(--soft-info);    color: #0891b2; }
.info-item-icon.purple { background: var(--soft-purple);  color: #9333ea; }

.info-item-text h6 {
  margin: 0 0 4px;
  font-size: 14px;
  font-weight: 600;
  color: var(--text-dark);
}

.info-item-text p {
  margin: 0;
  font-size: 12px;
  color: var(--text-light);
  line-height: 1.5;
}

/* ── Quick Stats Mini ── */
.quick-stat-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid var(--border-light);
}

.quick-stat-box {
  text-align: center;
  padding: 16px 10px;
  border-radius: var(--radius-sm);
  background: #fafbfd;
  border: 1px solid var(--border-light);
}

.quick-stat-box .qs-value {
  font-size: 22px;
  font-weight: 800;
  line-height: 1;
  margin-bottom: 4px;
}

.quick-stat-box .qs-value.green  { color: #059669; }
.quick-stat-box .qs-value.red    { color: #e11d48; }

.quick-stat-box .qs-label {
  font-size: 11px;
  font-weight: 600;
  color: var(--text-light);
  text-transform: uppercase;
  letter-spacing: .5px;
}

/* ── Responsive ── */
@media (max-width: 992px) {
  .leave-hero .hero-content {
    flex-direction: column;
    align-items: flex-start;
  }
}

@media (max-width: 768px) {
  .leave-hero { padding: 26px 22px; }
  .leave-hero .hero-left h3 { font-size: 20px; }
  .form-card-body { padding: 22px; }
  .form-card-header { padding: 20px 22px; }
  .form-steps { gap: 0; }
  .step-line { width: 30px; }
}

@media (max-width: 576px) {
  .leave-type-options { grid-template-columns: 1fr; }
  .quick-stat-row { grid-template-columns: 1fr; }
}
</style>

<!-- ══════════ Start Page Wrapper ══════════ -->
<div class="page-wrapper">
  <div class="page-content">

    <!-- ── Hero Banner ── -->
    <div class="leave-hero">
      <div class="hero-content">
        <div class="hero-left">
          <h3>
            <i class="bx bx-calendar-plus"></i>
            Apply for Leave
          </h3>
          <p>Submit your leave request — your manager will be notified instantly</p>
        </div>
        <div class="hero-badge">
          <i class="bx bx-calendar"></i>
          <?= date('l, d M Y') ?>
        </div>
      </div>
    </div>

    <!-- ── Main Layout ── -->
    <div class="row g-4">

      <!-- Left: Form Card -->
      <div class="col-lg-8">
        <div class="leave-form-card">

          <!-- Card Header -->
          <div class="form-card-header">
            <div class="header-icon">
              <i class="bx bx-edit"></i>
            </div>
            <div class="header-text">
              <h5>Leave Application Form</h5>
              <p>Fill in the details below to submit your request</p>
            </div>
          </div>

          <!-- Card Body -->
          <div class="form-card-body">

            <!-- Step Indicators -->
            <div class="form-steps">
              <div class="step-wrap">
                <div class="step-circle active" id="step1">1</div>
                <div class="step-label">Employee</div>
              </div>
              <div class="step-line" id="line1"></div>
              <div class="step-wrap">
                <div class="step-circle" id="step2">2</div>
                <div class="step-label">Details</div>
              </div>
              <div class="step-line" id="line2"></div>
              <div class="step-wrap">
                <div class="step-circle" id="step3">3</div>
                <div class="step-label">Type</div>
              </div>
              <div class="step-line" id="line3"></div>
              <div class="step-wrap">
                <div class="step-circle" id="step4">4</div>
                <div class="step-label">Submit</div>
              </div>
            </div>

            <!-- Tip -->
            <div class="form-tip">
              <i class="bx bx-info-circle"></i>
              <span>Leave requests must be submitted at least <strong>1 day in advance</strong>. Emergency leaves require manager approval.</span>
            </div>

            <form method="post" action="<?= site_url('emp/leave/store') ?>" id="leaveForm">

              <!-- Employee Select -->
              <div class="form-group-enhanced">
                <label class="form-label-custom">
                  <span class="label-icon emp"><i class="bx bx-user"></i></span>
                  Employee
                </label>
           <select class="form-select" disabled >
    <option>
        <?= $employee->name ?>
    </option>
</select>

<input type="hidden" name="employee_id" value="<?= $employee->id ?>">
              </div>

              <!-- Leave Date -->
              <div class="form-group-enhanced">
                <label class="form-label-custom">
                  <span class="label-icon date"><i class="bx bx-calendar"></i></span>
                  Leave Date
                </label>
                <input type="date"
                       name="leave_date"
                       class="input-enhanced"
                       required
                       id="leaveDate"
                       min="<?= date('Y-m-d') ?>">
              </div>

              <div class="form-divider"></div>

              <!-- Leave Type Cards -->
              <div class="form-group-enhanced">
                <label class="form-label-custom">
                  <span class="label-icon type"><i class="bx bx-time-five"></i></span>
                  Leave Type
                </label>

                <div class="leave-type-options">
                  <div class="leave-type-option">
                    <input type="radio" name="leave_type" value="full_day"
                           id="type_full" required>
                    <label for="type_full">
                      <i class="bx bx-sun"></i>
                      <span class="type-name">Full Day</span>
                      <span class="type-time">Entire Day Off</span>
                    </label>
                  </div>

                  <div class="leave-type-option">
                    <input type="radio" name="leave_type" value="first_half"
                           id="type_half1">
                    <label for="type_half1">
                      <i class="bx bx-cloud-light-rain"></i>
                      <span class="type-name">1st Half</span>
                      <span class="type-time">10:00 AM - 02:00 PM</span>
                    </label>
                  </div>

                  <div class="leave-type-option">
                    <input type="radio" name="leave_type" value="second_half"
                           id="type_half2">
                    <label for="type_half2">
                      <i class="bx bx-moon"></i>
                      <span class="type-name">2nd Half</span>
                      <span class="type-time">02:00 PM - 07:00 PM</span>
                    </label>
                  </div>
                </div>

                <!-- Time Info Box -->
                <div class="time-info-box hidden" id="leave_time_info">
                  <div class="info-icon">
                    <i class="bx bx-time-five"></i>
                  </div>
                  <div class="info-text" id="time_text"></div>
                </div>
              </div>

              <div class="form-divider"></div>

              <!-- Reason -->
              <div class="form-group-enhanced">
                <label class="form-label-custom">
                  <span class="label-icon reason"><i class="bx bx-message-detail"></i></span>
                  Reason <span style="font-weight:400; text-transform:none; letter-spacing:0; color: var(--text-light);">(Optional)</span>
                </label>
                <div class="textarea-wrap">
                  <textarea name="reason"
                            class="input-enhanced"
                            id="reasonField"
                            placeholder="Describe the reason for your leave..."
                            maxlength="500"></textarea>
                  <span class="char-count"><span id="charUsed">0</span>/500</span>
                </div>
              </div>

              <div class="form-divider"></div>

              <!-- Submit -->
              <button type="submit" class="btn-submit-leave" id="submitBtn">
                <i class="bx bx-send"></i>
                Submit Leave Request
              </button>

            </form>

          </div>
        </div>
      </div>

      <!-- Right: Info Panel -->
      <div class="col-lg-4">

        <div class="leave-info-panel">
          <div class="info-panel-header">
            <h6>
              <i class="bx bx-book-open" style="color: #667eea;"></i>
              Leave Guidelines
            </h6>
          </div>
          <div class="info-panel-body">

            <div class="info-list-item">
              <div class="info-item-icon green">
                <i class="bx bx-sun"></i>
              </div>
              <div class="info-item-text">
                <h6>Full Day Leave</h6>
                <p>Takes the entire working day off. Counts as 1 leave day.</p>
              </div>
            </div>

            <div class="info-list-item">
              <div class="info-item-icon amber">
                <i class="bx bx-cloud-light-rain"></i>
              </div>
              <div class="info-item-text">
                <h6>1st Half (Morning)</h6>
                <p>10:00 AM – 02:00 PM. Counts as 0.5 leave day.</p>
              </div>
            </div>

            <div class="info-list-item">
              <div class="info-item-icon cyan">
                <i class="bx bx-moon"></i>
              </div>
              <div class="info-item-text">
                <h6>2nd Half (Afternoon)</h6>
                <p>02:00 PM – 07:00 PM. Counts as 0.5 leave day.</p>
              </div>
            </div>

            <div class="info-list-item">
              <div class="info-item-icon purple">
                <i class="bx bx-bell"></i>
              </div>
              <div class="info-item-text">
                <h6>Approval Process</h6>
                <p>Your manager will receive instant notification and can approve/reject.</p>
              </div>
            </div>

            <!-- Quick Stats -->
            <div class="quick-stat-row">
              <div class="quick-stat-box">
                <div class="qs-value green"><?= isset($leaves_remaining) ? $leaves_remaining : '--' ?></div>
                <div class="qs-label">Remaining</div>
              </div>
              <div class="quick-stat-box">
                <div class="qs-value red"><?= isset($leaves_taken) ? $leaves_taken : '--' ?></div>
                <div class="qs-label">Taken</div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
    <!-- /row -->

  </div>
</div>

<!-- Overlay & Back-to-top -->
<div class="overlay toggle-icon"></div>
<a href="javascript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>

<!-- ══════════ Scripts ══════════ -->
<script>
// ── Leave Type Change Handler ──
const radios    = document.querySelectorAll('input[name="leave_type"]');
const infoBox   = document.getElementById('leave_time_info');
const timeText  = document.getElementById('time_text');

radios.forEach(radio => {
  radio.addEventListener('change', function () {
    if (this.value === 'first_half') {
      infoBox.className = 'time-info-box show warning';
      timeText.innerHTML = '<strong>1st Half:</strong> 10:00 AM – 02:00 PM';
    } else if (this.value === 'second_half') {
      infoBox.className = 'time-info-box show info';
      timeText.innerHTML = '<strong>2nd Half:</strong> 02:00 PM – 07:00 PM';
    } else {
      infoBox.className = 'time-info-box hidden';
      timeText.innerHTML = '';
    }
  });
});

// ── Character Counter ──
const reasonField = document.getElementById('reasonField');
const charUsed    = document.getElementById('charUsed');

if (reasonField) {
  reasonField.addEventListener('input', function () {
    charUsed.textContent = this.value.length;
  });
}

// ── Step Progress Tracker ──
const empSelect  = document.getElementById('empSelect');
const leaveDate  = document.getElementById('leaveDate');
const step1      = document.getElementById('step1');
const step2      = document.getElementById('step2');
const step3      = document.getElementById('step3');
const step4      = document.getElementById('step4');
const line1      = document.getElementById('line1');
const line2      = document.getElementById('line2');
const line3      = document.getElementById('line3');

function updateSteps() {
  const hasEmp  = empSelect && empSelect.value !== '';
  const hasDate = leaveDate && leaveDate.value !== '';
  const hasType = document.querySelector('input[name="leave_type"]:checked');

  // Step 1
  if (hasEmp) {
    step1.classList.remove('active');
    step1.classList.add('completed');
    step1.innerHTML = '<i class="bx bx-check"></i>';
    line1.classList.add('active');
    step2.classList.add('active');
  } else {
    step1.classList.add('active');
    step1.classList.remove('completed');
    step1.innerHTML = '1';
    line1.classList.remove('active');
    step2.classList.remove('active', 'completed');
    step2.innerHTML = '2';
  }

  // Step 2
  if (hasEmp && hasDate) {
    step2.classList.remove('active');
    step2.classList.add('completed');
    step2.innerHTML = '<i class="bx bx-check"></i>';
    line2.classList.add('active');
    step3.classList.add('active');
  } else if (!hasEmp) {
    line2.classList.remove('active');
    step3.classList.remove('active', 'completed');
    step3.innerHTML = '3';
  }

  // Step 3
  if (hasEmp && hasDate && hasType) {
    step3.classList.remove('active');
    step3.classList.add('completed');
    step3.innerHTML = '<i class="bx bx-check"></i>';
    line3.classList.add('active');
    step4.classList.add('active');
  } else {
    line3.classList.remove('active');
    step4.classList.remove('active');
  }
}

if (empSelect)  empSelect.addEventListener('change', updateSteps);
if (leaveDate)  leaveDate.addEventListener('change', updateSteps);
radios.forEach(r => r.addEventListener('change', updateSteps));

// ── Submit Animation ──
const form = document.getElementById('leaveForm');
if (form) {
  form.addEventListener('submit', function () {
    const btn = document.getElementById('submitBtn');
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Submitting...';
    btn.disabled = true;
  });
}
</script>