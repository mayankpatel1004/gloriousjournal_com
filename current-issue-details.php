<?php include "connection.php";
$date = date('Y-m-d');
$id = 0;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
}
$sqlGetRecentRecords = "SELECT * FROM current_issue WHERE volume = (SELECT MAX(volume) FROM current_issue) AND id = $id";
if(isset($_GET['pg']) && $_GET['pg'] == 'archive'){
    $sqlGetRecentRecords = "SELECT * FROM current_issue WHERE id = $id";
}
$stmt = $conn->prepare($sqlGetRecentRecords);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "include/head.php"; ?>
    <style>
        /* ── Global Reset & Base ── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Roboto, system-ui, sans-serif;
            background: #f6f9fc;
            color: #1e293b;
            line-height: 1.6;
        }

        /* ── Hero / Page Header ── */
        .hero1 {
            padding: 2rem 0 4rem;
            background: linear-gradient(145deg, #f8fafc 0%, #eef2f6 100%);
            min-height: 80vh;
        }

        .custom-container-width {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .section-padding {
            padding: 1.5rem 0 0.5rem;
        }

        .hero-body h3 {
            font-weight: 600;
            font-size: 1.8rem;
            letter-spacing: 0.02em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .hero-body .sub-header {
            color: #0b2b4a;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .hero-body .sub-header::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #2a7de1, #6cb2f5);
            border-radius: 4px;
        }

        .hero-body hr {
            display: none;
        }

        .volume-badge {
            display: inline-block;
            background: linear-gradient(135deg, #1a4b7a, #2a7de1);
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.4rem 1.6rem;
            border-radius: 40px;
            letter-spacing: 0.03em;
            box-shadow: 0 4px 12px rgba(42, 125, 225, 0.25);
            margin-top: 0.25rem;
        }

        /* ── Article Card ── */
        .article-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0, 20, 40, 0.06), 0 2px 8px rgba(0, 0, 0, 0.02);
            padding: 2.2rem 2.5rem;
            transition: box-shadow 0.25s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(2px);
            margin-top: 1.5rem;
        }

        .article-card:hover {
            box-shadow: 0 16px 56px rgba(0, 20, 40, 0.10);
        }

        /* ── Meta Grid ── */
        .meta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem 2.5rem;
            margin: 1.8rem 0 1.2rem;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            padding: 0.4rem 0;
            border-bottom: 1px solid #f0f4f9;
        }

        .meta-item .label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 0.1rem;
        }

        .meta-item .value {
            font-size: 1rem;
            font-weight: 500;
            color: #0b2b4a;
            word-break: break-word;
        }

        .meta-item .value a {
            color: #2a7de1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .meta-item .value a:hover {
            color: #1a4b7a;
            text-decoration: underline;
        }

        .meta-item .value .doi-badge {
            display: inline-block;
            background: #eef6ff;
            padding: 0.1rem 0.9rem;
            border-radius: 30px;
            font-size: 0.85rem;
            color: #1a4b7a;
            font-weight: 500;
        }

        /* ── Title Row ── */
        .title-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .title-row h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0b2b4a;
            line-height: 1.3;
            flex: 1;
            margin: 0;
        }

        .title-row .post-date {
            font-size: 0.85rem;
            color: #64748b;
            background: #f1f5f9;
            padding: 0.25rem 1rem;
            border-radius: 40px;
            white-space: nowrap;
            font-weight: 500;
        }

        /* ── Abstract & Keywords ── */
        .abstract-section,
        .keywords-section {
            margin-top: 1.8rem;
            padding-top: 1.8rem;
            border-top: 1px solid #ecf1f7;
        }

        .abstract-section h4,
        .keywords-section h4 {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
            color: #2a7de1;
            margin-bottom: 0.4rem;
        }

        .abstract-section p,
        .keywords-section p {
            font-size: 0.98rem;
            color: #1e293b;
            line-height: 1.7;
        }

        .keywords-section p {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem 0.6rem;
        }

        .keywords-section p span {
            background: #f1f5f9;
            padding: 0.1rem 1rem;
            border-radius: 30px;
            font-size: 0.85rem;
            color: #1e293b;
            border: 1px solid #e2e8f0;
        }

        /* ── Download Button ── */
        .download-section {
            margin-top: 2rem;
            padding-top: 1.8rem;
            border-top: 1px solid #ecf1f7;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.8rem 1.5rem;
        }

        .download-section .label {
            font-weight: 600;
            color: #1e293b;
            font-size: 0.95rem;
        }

        .btn-download {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #1a4b7a, #2a7de1);
            color: #fff;
            padding: 0.6rem 1.8rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(42, 125, 225, 0.25);
            border: none;
            cursor: pointer;
        }

        .btn-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(42, 125, 225, 0.35);
            background: linear-gradient(135deg, #0f3a62, #1a6bc9);
            color: #fff;
            text-decoration: none;
        }

        .btn-download i {
            font-size: 1.1rem;
        }

        /* ── "View" link fallback ── */
        .download-link-simple {
            color: #2a7de1;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 2px solid rgba(42, 125, 225, 0.2);
            transition: border-color 0.2s;
            font-size: 0.95rem;
        }

        .download-link-simple:hover {
            border-bottom-color: #2a7de1;
            color: #1a4b7a;
        }

        /* ── Popup / Modal ── */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.96);
            width: 92%;
            max-width: 720px;
            max-height: 88vh;
            background: #ffffff;
            border-radius: 24px;
            padding: 2.2rem 2.5rem;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.25), 0 10px 30px rgba(0, 0, 0, 0.08);
            z-index: 1000;
            overflow-y: auto;
            transition: opacity 0.25s ease, transform 0.25s ease;
            opacity: 0;
            pointer-events: none;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
        }

        .popup.open {
            opacity: 1;
            pointer-events: auto;
            transform: translate(-50%, -50%) scale(1);
        }

        .popup .close-btn {
            position: absolute;
            top: 1rem;
            right: 1.4rem;
            font-size: 2rem;
            line-height: 1;
            color: #94a3b8;
            cursor: pointer;
            transition: color 0.2s, transform 0.2s;
            background: none;
            border: none;
            padding: 0.2rem 0.6rem;
            border-radius: 40px;
        }

        .popup .close-btn:hover {
            color: #1e293b;
            transform: rotate(90deg);
            background: #f1f5f9;
        }

        .popup .popup-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0b2b4a;
            margin: 0 0 1.2rem 0;
            line-height: 1.3;
            padding-right: 2rem;
        }

        .popup .popup-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.6rem 1.5rem;
            margin-bottom: 1.2rem;
            background: #f8fafc;
            padding: 1rem 1.2rem;
            border-radius: 16px;
        }

        .popup .popup-meta .pm-item {
            display: flex;
            flex-direction: column;
        }

        .popup .popup-meta .pm-item .pm-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
            color: #64748b;
        }

        .popup .popup-meta .pm-item .pm-value {
            font-weight: 500;
            color: #0b2b4a;
            font-size: 0.95rem;
        }

        .popup .popup-meta .pm-item .pm-value a {
            color: #2a7de1;
            text-decoration: none;
        }

        .popup .popup-meta .pm-item .pm-value a:hover {
            text-decoration: underline;
        }

        .popup .popup-abstract {
            margin-top: 1rem;
        }

        .popup .popup-abstract h5 {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
            color: #2a7de1;
            margin-bottom: 0.2rem;
        }

        .popup .popup-abstract p {
            font-size: 0.95rem;
            color: #1e293b;
            line-height: 1.7;
        }

        .popup .popup-keywords {
            margin-top: 1rem;
        }

        .popup .popup-keywords h5 {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
            color: #2a7de1;
            margin-bottom: 0.2rem;
        }

        .popup .popup-keywords p {
            display: flex;
            flex-wrap: wrap;
            gap: 0.3rem 0.6rem;
        }

        .popup .popup-keywords p span {
            background: #f1f5f9;
            padding: 0.05rem 1rem;
            border-radius: 30px;
            font-size: 0.85rem;
            color: #1e293b;
            border: 1px solid #e2e8f0;
        }

        .popup .popup-download {
            margin-top: 1.6rem;
            padding-top: 1.2rem;
            border-top: 1px solid #ecf1f7;
            display: flex;
            align-items: center;
            gap: 0.8rem 1.2rem;
            flex-wrap: wrap;
        }

        .popup .popup-download .label {
            font-weight: 600;
            color: #1e293b;
            font-size: 0.9rem;
        }

        /* ── Overlay ── */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(11, 43, 74, 0.45);
            backdrop-filter: blur(4px);
            z-index: 999;
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .overlay.open {
            opacity: 1;
        }

        /* ── Clickable title in card ── */
        .clickable-title {
            cursor: pointer;
            transition: color 0.2s;
            color: #0b2b4a;
            font-weight: 600;
        }

        .clickable-title:hover {
            color: #2a7de1;
            text-decoration: underline;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .hero1 {
                padding: 1rem 0 2.5rem;
            }

            .article-card {
                padding: 1.5rem 1.2rem;
                border-radius: 16px;
            }

            .meta-grid {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .title-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .title-row h2 {
                font-size: 1.4rem;
            }

            .title-row .post-date {
                font-size: 0.75rem;
                padding: 0.15rem 0.9rem;
            }

            .popup {
                padding: 1.8rem 1.2rem;
                width: 94%;
                max-height: 90vh;
            }

            .popup .popup-title {
                font-size: 1.2rem;
            }

            .popup .popup-meta {
                grid-template-columns: 1fr;
                padding: 0.8rem 1rem;
            }

            .volume-badge {
                font-size: 0.8rem;
                padding: 0.3rem 1.2rem;
            }

            .hero-body h3 {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            .article-card {
                padding: 1rem 0.9rem;
            }

            .meta-item .value {
                font-size: 0.9rem;
            }

            .btn-download {
                padding: 0.5rem 1.4rem;
                font-size: 0.8rem;
                width: 100%;
                justify-content: center;
            }

            .download-section {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* ── Scrollbar styling for popup ── */
        .popup::-webkit-scrollbar {
            width: 6px;
        }

        .popup::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 8px;
        }

        .popup::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 8px;
        }

        .popup::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body>
    <?php include "include/header.php"; ?>

    <section class="hero1">
        <div class="container custom-container-width">
            
            <!-- Article Card -->
            <div class="row">
                <div class="col-12">
                    <div class="article-card">
                        <!-- Title + Date -->
                         <div class="volume-badge">
                            Volume <?php echo htmlspecialchars($data['volume'] ?? ''); ?> &bull; Issue <?php echo htmlspecialchars($data['issue'] ?? ''); ?>
                        </div>
                        <br /><br />
                        <div class="title-row">
                            <h2>
                                <span>
                                    <?php echo htmlspecialchars($data['title'] ?? 'Untitled'); ?>
                                </span>
                            </h2>
                            <span class="post-date">
                                <?php echo date('d M Y', strtotime($data['publish_date'] ?? 'now')); ?>
                            </span>
                        </div>

                        <!-- Meta Grid -->
                        <div class="meta-grid">
                            <div class="meta-item">
                                <span class="label">Author(s)</span>
                                <span class="value"><?php echo htmlspecialchars($data['author_description'] ?? '—'); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="label">Country</span>
                                <span class="value"><?php echo htmlspecialchars($data['country'] ?? '—'); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="label">Volume / Issue</span>
                                <span class="value"><?php echo htmlspecialchars($data['volume'] ?? '—'); ?> / <?php echo htmlspecialchars($data['issue'] ?? ''); ?></span>
                            </div>
                            
                            
                            <div class="meta-item">
                                <span class="label">DOI</span>
                                <span class="value">
                                    <?php if (!empty($data['doi_no'])): ?>
                                        <span class="doi-badge"><a href="<?php echo htmlspecialchars($data['dot_link']); ?>"><?php echo htmlspecialchars($data['doi_no']); ?></a></span>
                                    <?php else: ?>
                                        —
                                    <?php endif; ?>
                                </span>
                            </div>
                            <?php if (!empty($data['dot_link'])): ?>
                                <div class="meta-item" style="grid-column: 1 / -1;">
                                    <span class="label">DOI Link</span>
                                    <span class="value">
                                        <a href="<?php echo htmlspecialchars($data['dot_link']); ?>" target="_blank" rel="noopener">
                                            <?php echo htmlspecialchars($data['dot_link']); ?>
                                        </a>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Abstract -->
                        <?php if (!empty($data['abstract'])): ?>
                            <div class="abstract-section">
                                <h4>Abstract</h4>
                                <p><?php echo nl2br(htmlspecialchars($data['abstract'])); ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Keywords -->
                        <?php if (!empty($data['keywords'])): ?>
                            <div class="keywords-section">
                                <h4>Keywords</h4>
                                <p>
                                    <?php
                                    $keywords = array_map('trim', explode(',', $data['keywords']));
                                    foreach ($keywords as $kw) {
                                        if (!empty($kw)) {
                                            echo '<span>' . htmlspecialchars($kw) . '</span>';
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <!-- Download -->
                        <?php if (!empty($data['attachment'])): ?>
                            <div class="download-section">
                                <span class="label">📄 Full Article</span>
                                <a class="btn-download" href="<?php echo htmlspecialchars($url . 'uploads/' . $data['attachment']); ?>" target="_blank">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                    Download PDF
                                </a>
                                <a class="download-link-simple" href="<?php echo htmlspecialchars($url . 'uploads/' . $data['attachment']); ?>" target="_blank">View online</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Popup / Modal ─── -->
    <div class="overlay" id="overlay<?php echo htmlspecialchars($data['id']); ?>"></div>
    <div class="popup" id="popup<?php echo htmlspecialchars($data['id']); ?>">
        <button class="close-btn" onclick="closePopup('<?php echo htmlspecialchars($data['id']); ?>')">×</button>

        <h4 class="popup-title"><?php echo htmlspecialchars($data['title'] ?? 'Untitled'); ?></h4>

        <div class="popup-meta">
            <div class="pm-item">
                <span class="pm-label">Author(s)</span>
                <span class="pm-value"><?php echo htmlspecialchars($data['author_description'] ?? '—'); ?></span>
            </div>
            <div class="pm-item">
                <span class="pm-label">Volume</span>
                <span class="pm-value"><?php echo htmlspecialchars($data['volume'] ?? '—'); ?></span>
            </div>
            <div class="pm-item">
                <span class="pm-label">Country</span>
                <span class="pm-value"><?php echo htmlspecialchars($data['country'] ?? '—'); ?></span>
            </div>
            <div class="pm-item">
                <span class="pm-label">DOI No.</span>
                <span class="pm-value"><?php echo htmlspecialchars($data['doi_no'] ?? '—'); ?></span>
            </div>
            <?php if (!empty($data['dot_link'])): ?>
                <div class="pm-item" style="grid-column: 1 / -1;">
                    <span class="pm-label">DOI Link</span>
                    <span class="pm-value">
                        <a href="<?php echo htmlspecialchars($data['dot_link']); ?>" target="_blank" rel="noopener">
                            <?php echo htmlspecialchars($data['dot_link']); ?>
                        </a>
                    </span>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($data['abstract'])): ?>
            <div class="popup-abstract">
                <h5>Abstract</h5>
                <p><?php echo nl2br(htmlspecialchars($data['abstract'])); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($data['keywords'])): ?>
            <div class="popup-keywords">
                <h5>Keywords</h5>
                <p>
                    <?php
                    $keywords = array_map('trim', explode(',', $data['keywords']));
                    foreach ($keywords as $kw) {
                        if (!empty($kw)) {
                            echo '<span>' . htmlspecialchars($kw) . '</span>';
                        }
                    }
                    ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if (!empty($data['attachment'])): ?>
            <div class="popup-download">
                <span class="label">📄 Full Article</span>
                <a class="btn-download" href="<?php echo htmlspecialchars($url . 'uploads/' . $data['attachment']); ?>" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    Download PDF
                </a>
                <a class="download-link-simple" href="<?php echo htmlspecialchars($url . 'uploads/' . $data['attachment']); ?>" target="_blank">View online</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- ─── Scripts ─── -->
    <script>
        
    </script>

    <?php include 'include/footer.php'; ?>
    <?php include 'include/footerscript.php'; ?>
</body>

</html>