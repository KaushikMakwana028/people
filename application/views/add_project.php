<style>
    .project-form-wrapper {
        min-height: 100vh;
        background: linear-gradient(160deg, #f0f4ff 0%, #f7f8fc 50%, #eef1f8 100%);
    }

    /* Page Header */
    .page-header-bar {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        border-radius: 16px;
        padding: 1.75rem 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(78, 84, 200, 0.25);
    }

    .page-header-bar::before {
        content: '';
        position: absolute;
        top: -40%;
        right: -10%;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
    }

    .page-header-bar::after {
        content: '';
        position: absolute;
        bottom: -50%;
        left: 5%;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
    }

    .page-header-bar h4 {
        color: #fff;
        font-size: 1.4rem;
        font-weight: 700;
        letter-spacing: -0.3px;
        margin-bottom: 0.2rem;
    }

    .page-header-bar small {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
    }

    .btn-back-top {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        position: relative;
        z-index: 2;
    }

    .btn-back-top:hover {
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
        transform: translateX(-3px);
    }

    /* Form Card */
    .form-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06),
            0 2px 10px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        animation: cardSlideUp 0.5s ease forwards;
        background: #fff;
    }

    @keyframes cardSlideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-card .card-body {
        padding: 2.5rem;
    }

    /* Card Inner Header */
    .form-inner-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.75rem;
        border-bottom: 1px solid #f0f1f5;
    }

    .form-inner-header .icon-wrapper {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        background: linear-gradient(135deg, rgba(78, 84, 200, 0.1), rgba(143, 148, 251, 0.1));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: #4e54c8;
    }

    .form-inner-header h5 {
        font-size: 1.15rem;
        font-weight: 700;
        color: #1e1e2d;
        margin-bottom: 0.25rem;
    }

    .form-inner-header p {
        font-size: 0.82rem;
        color: #9ca3af;
        margin: 0;
    }

    /* Form Labels */
    .field-label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .field-label .required-star {
        color: #ef4444;
        font-size: 0.7rem;
    }

    .field-label .label-icon {
        color: #9ca3af;
        font-size: 1rem;
    }

    /* Form Inputs */
    .input-styled {
        border: 2px solid #e8eaef;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        background: #fafbfd;
        color: #1e1e2d;
        transition: all 0.3s ease;
        width: 100%;
    }

    .input-styled::placeholder {
        color: #b0b5c0;
    }

    .input-styled:focus {
        border-color: #4e54c8;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.08);
        outline: none;
    }

    .input-styled:hover:not(:focus) {
        border-color: #d0d3db;
    }

    textarea.input-styled {
        resize: vertical;
        min-height: 120px;
        line-height: 1.6;
    }

    /* Field Group */
    .field-group {
        margin-bottom: 1.75rem;
    }

    .field-hint {
        font-size: 0.72rem;
        color: #b0b5c0;
        margin-top: 0.4rem;
        padding-left: 0.15rem;
    }

    /* Divider */
    .form-divider {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, #e8eaef, transparent);
        margin: 0.5rem 0 1.75rem;
    }

    /* Action Buttons */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 0.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid #f0f1f5;
    }

    .btn-cancel {
        padding: 0.65rem 1.5rem;
        border-radius: 12px;
        border: 2px solid #e8eaef;
        background: #fff;
        color: #6b7280;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-cancel:hover {
        border-color: #d0d3db;
        background: #f9fafb;
        color: #374151;
    }

    .btn-submit {
        padding: 0.65rem 1.75rem;
        border-radius: 12px;
        border: none;
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        color: #fff;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(78, 84, 200, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transition: left 0.5s;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(78, 84, 200, 0.4);
    }

    .btn-submit:active {
        transform: translateY(0);
        box-shadow: 0 4px 15px rgba(78, 84, 200, 0.3);
    }

    /* Responsive */
    @media (max-width: 576px) {
        .form-card .card-body {
            padding: 1.5rem;
        }

        .page-header-bar {
            padding: 1.25rem 1.5rem;
            border-radius: 12px;
        }

        .page-header-bar h4 {
            font-size: 1.15rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn-cancel,
        .form-actions .btn-submit {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="page-wrapper project-form-wrapper">
    <div class="page-content">

        <!-- ================= PAGE HEADER ================= -->
        <div class="page-header-bar d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">
                    <?= isset($project) ? 'Edit Project' : 'Add New Project'; ?>
                </h4>
                <small>
                    <?= isset($project)
                        ? 'Update project details'
                        : 'Create a new project'; ?>
                </small>
            </div>

            <a href="<?= site_url('project'); ?>" class="btn-back-top">
                <i class="bx bx-arrow-back"></i> Back
            </a>
        </div>

        <!-- ================= MAIN CARD ================= -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10 col-12">

                <div class="card form-card">
                    <div class="card-body">

                        <!-- Card Inner Header -->
                        <div class="form-inner-header">
                            <div class="icon-wrapper">
                                <i class="bx <?= isset($project) ? 'bx-edit-alt' : 'bx-folder-plus'; ?>"></i>
                            </div>
                            <h5>
                                <?= isset($project) ? 'Update Project Details' : 'Project Information'; ?>
                            </h5>
                            <p>
                                <?= isset($project)
                                    ? 'Modify the fields below and save your changes'
                                    : 'Fill in the details below to create your project'; ?>
                            </p>
                        </div>

                        <form method="post" action="<?= isset($project)
                            ? site_url('project/update/' . $project->id)
                            : site_url('project/store'); ?>">

                            <!-- ================= PROJECT NAME ================= -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-rename label-icon"></i>
                                    Project Name
                                    <span class="required-star">●</span>
                                </label>
                                <input type="text" name="project_name" class="input-styled"
                                    placeholder="Enter project name" required value="<?= isset($project)
                                        ? htmlspecialchars($project->project_name)
                                        : ''; ?>">
                                <div class="field-hint">
                                    Give your project a clear, descriptive name
                                </div>
                            </div>

                            <!-- ================= PROJECT DESCRIPTION ================= -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-align-left label-icon"></i>
                                    Project Description
                                    <span class="required-star">●</span>
                                </label>
                                <textarea name="project_description" class="input-styled" rows="4"
                                    placeholder="Describe the project" required><?= isset($project)
                                        ? htmlspecialchars($project->project_description)
                                        : ''; ?></textarea>
                                <div class="field-hint">
                                    Outline the goals, scope, and key deliverables
                                </div>
                            </div>

                            <hr class="form-divider">

                            <!-- ================= ACTION BUTTONS ================= -->
                            <div class="form-actions">
                                <a href="<?= site_url('project'); ?>" class="btn-cancel">
                                    <i class="bx bx-x"></i>
                                    Cancel
                                </a>

                                <button type="submit" class="btn-submit">
                                    <i class="bx bx-save"></i>
                                    <?= isset($project) ? 'Update Project' : 'Add Project'; ?>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>