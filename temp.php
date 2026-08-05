<?php include "connection.php";
$date = date('Y-m-d');

$sqlGetDistinctRecords = "SELECT DISTINCT(volume),issue FROM current_issue WHERE volume != (SELECT MAX(volume) FROM current_issue)";
$stmt = $conn->prepare($sqlGetDistinctRecords);
$stmt->execute();
$resultDistinct = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlGetRecentRecords = "SELECT * FROM current_issue WHERE volume != (SELECT MAX(volume) FROM current_issue)";
if(isset($_GET['volume']) && $_GET['volume'] != ""){
    $sqlGetRecentRecords = "SELECT * FROM current_issue WHERE volume = ".$_GET['volume'];
}
$stmt = $conn->prepare($sqlGetRecentRecords);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            min-height: 70vh;
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
            font-weight: 700;
            font-size: 2rem;
            color: #0b2b4a;
            position: relative;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .hero-body h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #2a7de1, #6cb2f5);
            border-radius: 4px;
        }

        .hero-body hr {
            display: none;
        }

        .volume-indicator {
            margin-top: 1rem;
            font-weight: 600;
            font-size: 1rem;
            color: #2a7de1;
            background: #eef6ff;
            padding: 0.3rem 1.6rem;
            border-radius: 40px;
            display: inline-block;
        }

        /* ── Main Content & Sidebar ── */
        .archive-main {
            margin-top: 2rem;
        }

        /* ── Article Cards ── */
        .article-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 20, 40, 0.04), 0 1px 4px rgba(0, 0, 0, 0.02);
            padding: 1.8rem 2rem;
            margin-bottom: 1.8rem;
            transition: box-shadow 0.25s ease, transform 0.2s ease;
            border: 1px solid #edf2f7;
        }

        .article-card:hover {
            box-shadow: 0 12px 40px rgba(0, 20, 40, 0.08);
            transform: translateY(-3px);
        }

        .article-card .card-title {
            font-size: 1.35rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            line-height: 1.3;
        }

        .article-card .card-title a {
            color: #0b2b4a;
            text-decoration: none;
            transition: color 0.2s;
        }

        .article-card .card-title a:hover {
            color: #2a7de1;
            text-decoration: underline;
        }

        .article-card .card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem 1.8rem;
            font-size: 0.85rem;
            color: #64748b;
            border-bottom: 1px solid #f0f4f9;
            padding-bottom: 0.8rem;
            margin-bottom: 0.8rem;
        }

        .article-card .card-meta .meta-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .article-card .card-meta .meta-item .label {
            font-weight: 600;
            color: #475569;
        }

        .article-card .card-meta .meta-item .value {
            color: #1e293b;
        }

        .article-card .card-meta .meta-item .value a {
            color: #2a7de1;
            text-decoration: none;
            word-break: break-all;
        }

        .article-card .card-meta .meta-item .value a:hover {
            text-decoration: underline;
        }

        .article-card .card-excerpt {
            font-size: 0.95rem;
            color: #334155;
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .article-card .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.8rem;
            border-top: 1px solid #f0f4f9;
            padding-top: 1rem;
            margin-top: 0.2rem;
        }

        .article-card .card-footer .read-more {
            font-weight: 600;
            font-size: 0.9rem;
            color: #2a7de1;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: gap 0.2s;
        }

        .article-card .card-footer .read-more:hover {
            gap: 0.6rem;
            text-decoration: underline;
        }

        .article-card .card-footer .post-date {
            font-size: 0.8rem;
            color: #94a3b8;
            background: #f1f5f9;
            padding: 0.15rem 1rem;
            border-radius: 40px;
        }

        /* ── No articles ── */
        .no-articles {
            background: #fff;
            border-radius: 16px;
            padding: 3rem 2rem;
            text-align: center;
            border: 1px dashed #d1d9e6;
            color: #64748b;
        }

        .no-articles h4 {
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        /* ── Sidebar: Archive List ── */
        .archive-sidebar {
            margin-top: 2rem;
        }

        .archive-sidebar .sidebar-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0b2b4a;
            margin-bottom: 1.2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .archive-sidebar .sidebar-title::before {
            content: '📚';
            font-size: 1.4rem;
        }

        .archive-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .archive-list li {
            margin-bottom: 0.5rem;
        }

        .archive-list li a {
            display: block;
            padding: 0.6rem 1rem;
            background: #ffffff;
            border-radius: 10px;
            color: #1e293b;
            text-decoration: none;
            font-weight: 500;
            border: 1px solid #edf2f7;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        }

        .archive-list li a:hover {
            background: #f1f9ff;
            border-color: #2a7de1;
            color: #2a7de1;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(42, 125, 225, 0.08);
        }

        .archive-list li a.active {
            background: #2a7de1;
            border-color: #2a7de1;
            color: #fff;
            box-shadow: 0 4px 14px rgba(42, 125, 225, 0.25);
        }

        .archive-list li a.active:hover {
            background: #1a6bc9;
            transform: translateX(4px);
        }

        .archive-list li a .volume-badge {
            display: inline-block;
            background: #eef2f6;
            color: #1e293b;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.1rem 0.6rem;
            border-radius: 30px;
            margin-left: 0.5rem;
        }

        .archive-list li a.active .volume-badge {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        /* ── Responsive ── */
        @media (max-width: 992px) {
            .archive-main .col-lg-9 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .archive-sidebar {
                margin-top: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .hero1 {
                padding: 1rem 0 2rem;
            }

            .hero-body h3 {
                font-size: 1.6rem;
            }

            .article-card {
                padding: 1.2rem 1.2rem;
            }

            .article-card .card-title {
                font-size: 1.2rem;
            }

            .article-card .card-meta {
                flex-direction: column;
                gap: 0.3rem;
                font-size: 0.8rem;
            }

            .article-card .card-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .archive-list li a {
                padding: 0.5rem 0.8rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .hero-body h3 {
                font-size: 1.4rem;
            }

            .article-card .card-title {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <?php include "include/header.php"; ?>

    <section class="hero1">
        <div class="container custom-container-width">
            <div class="row">
                <div class="col-lg-12 section-padding">
                    <div class="hero-body" data-aos="fade-up">
                        <h3>Archive</h3>
                        <?php if (isset($selectedVolume) && !empty($articles)): ?>
                            <span class="volume-indicator">
                                Volume <?php echo htmlspecialchars($articles[0]['volume']); ?>
                                &bull; Issue <?php echo htmlspecialchars($articles[0]['issue']); ?>
                            </span>
                        <?php elseif (empty($articles)): ?>
                            <span class="volume-indicator" style="background:#f1f5f9; color:#64748b;">
                                No articles found
                            </span>
                        <?php else: ?>
                            <span class="volume-indicator" style="background:#f1f5f9; color:#64748b;">
                                All archived volumes
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row archive-main">
                <!-- Main Content: Articles -->
                <div class="col-lg-9">
                    <?php if ($articles && count($articles) > 0): ?>
                        <?php foreach ($articles as $data): ?>
                            <div class="article-card">
                                <h4 class="card-title">
                                    <a href="current-issue-details.php?id=<?php echo htmlspecialchars($data['id']); ?>">
                                        <?php echo htmlspecialchars($data['title']); ?>
                                    </a>
                                </h4>

                                <div class="card-meta">
                                    <span class="meta-item">
                                        <span class="label">Author:</span>
                                        <span class="value"><?php echo htmlspecialchars($data['author_description'] ?: '—'); ?></span>
                                    </span>
                                    <span class="meta-item">
                                        <span class="label">Country:</span>
                                        <span class="value"><?php echo htmlspecialchars($data['country'] ?: '—'); ?></span>
                                    </span>
                                    <span class="meta-item">
                                        <span class="label">Volume:</span>
                                        <span class="value"><?php echo htmlspecialchars($data['volume']); ?></span>
                                    </span>
                                    <?php if (!empty($data['doi_no'])): ?>
                                        <span class="meta-item">
                                            <span class="label">DOI:</span>
                                            <span class="value"><?php echo htmlspecialchars($data['doi_no']); ?></span>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($data['dot_link'])): ?>
                                        <span class="meta-item">
                                            <span class="label">DOI Link:</span>
                                            <span class="value">
                                                <a href="<?php echo htmlspecialchars($data['dot_link']); ?>" target="_blank" rel="noopener">
                                                    <?php echo htmlspecialchars($data['dot_link']); ?>
                                                </a>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($data['abstract'])): ?>
                                    <div class="card-excerpt">
                                        <?php
                                        $abstract = strip_tags($data['abstract']);
                                        $excerpt = strlen($abstract) > 180 ? substr($abstract, 0, 180) . '…' : $abstract;
                                        echo htmlspecialchars($excerpt);
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <div class="card-footer">
                                    <a href="current-issue-details.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="read-more">
                                        Read More <span aria-hidden="true">→</span>
                                    </a>
                                    <span class="post-date">
                                        <?php echo date('d M Y', strtotime($data['publish_date'])); ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-articles">
                            <h4>No articles in this archive</h4>
                            <p>There are no articles available for the selected volume.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar: Archive Volumes -->
                <div class="col-lg-3 archive-sidebar">
                    <div class="sidebar-title">Archives</div>
                    <?php if ($archiveVolumes && count($archiveVolumes) > 0): ?>
                        <ul class="archive-list">
                            <?php foreach ($archiveVolumes as $vol): ?>
                                <li>
                                    <a href="?volume=<?php echo htmlspecialchars($vol['volume']); ?>" 
                                       class="<?php echo (isset($selectedVolume) && $selectedVolume == $vol['volume']) ? 'active' : ''; ?>">
                                        Volume <?php echo htmlspecialchars($vol['volume']); ?>
                                        <span class="volume-badge">Issue <?php echo htmlspecialchars($vol['issue']); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <!-- Optionally add a link to show all (clear filter) -->
                            <li>
                                <a href="?" class="<?php echo !isset($selectedVolume) ? 'active' : ''; ?>">
                                    All Archives
                                </a>
                            </li>
                        </ul>
                    <?php else: ?>
                        <p style="color:#94a3b8; font-size:0.9rem;">No archived volumes yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'include/footer.php'; ?>
    <?php include 'include/footerscript.php'; ?>
</body>

</html>