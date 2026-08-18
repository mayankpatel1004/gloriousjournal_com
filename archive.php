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
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "include/head.php"; ?>
    <style>
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
        .archive-list li a .vol-badge {
            display: inline-block;
            background: #eef2f6;
            color: #1e293b;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.1rem 0.6rem;
            border-radius: 30px;
            margin-left: 0.5rem;
        }
        /* ── Hero / Page Header ── */
        .hero1 {
            padding: 2rem 0 4rem;
            background: #f8fafc;
        }

        .section-padding {
            padding-top: 1.5rem;
        }

        .hero-body .sub-header {
            font-weight: 700;
            font-size: 2rem;
            color: #0b2b4a;
            position: relative;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .hero-body .sub-header::after {
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

        .volume-badge {
            display: inline-block;
            background: linear-gradient(135deg, #1a4b7a, #2a7de1);
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.3rem 1.6rem;
            border-radius: 40px;
            letter-spacing: 0.03em;
            box-shadow: 0 4px 12px rgba(42, 125, 225, 0.2);
            margin-top: 0.25rem;
        }

        /* ── Article Cards ── */
        .article-list {
            margin-top: 1.8rem;
        }

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
            font-size: 1.4rem;
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
            margin-bottom: 0.8rem;
            border-bottom: 1px solid #f0f4f9;
            padding-bottom: 0.8rem;
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

        /* ── Sidebar ── */
        .sidebar-wrapper {
            margin-top: 1.8rem;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .hero-body .sub-header {
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
        }

        @media (max-width: 480px) {
            .hero1 {
                padding: 1rem 0 2rem;
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
                        <?php if ($result && count($result) > 0): ?>
                            <span class="volume-indicator">
                                Volume <?php echo htmlspecialchars($result[0]['volume']); ?>
                                &bull; Issue <?php echo htmlspecialchars($result[0]['issue']); ?>
                            </span>
                        <?php else: ?>
                            <span class="volume-indicator" style="background:#f1f5f9; color:#64748b;">
                                No articles found
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row archive-main">
                <!-- Main Content: Articles -->
                <div class="col-lg-9">
                    <?php if ($result && count($result) > 0): ?>
                        <?php foreach ($result as $data): ?>
                            <div class="article-card">
                                <h4 class="card-title">
                                    <a href="current-issue-details.php?id=<?php echo htmlspecialchars($data['id']); ?>&pg=archive">
                                            <?php echo htmlspecialchars($data['title']); ?>
                                        </a>
                                </h4>
                                <?php
                                print_r($data['doi_link']);
                                ?>
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
                                    <span class="meta-item">
                                            <span class="label">Issue:</span>
                                            <span class="value"><?php echo htmlspecialchars($data['issue']); ?></span>
                                        </span>
                                    <?php if (!empty($data['doi_no'])): ?>
                                        <span class="meta-item">
                                            <span class="label">DOI:</span>
                                            <span class="value"><?php echo htmlspecialchars($data['doi_no']); ?></span>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($data['doi_no'])): ?>
                                            <span class="meta-item">
                                                <span class="label">Link:</span>
                                                <span class="value"><a target="_blank" href="<?php echo $data['doi_link'];?>"><?php echo htmlspecialchars($data['doi_no']); ?></a></span>
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
                    <?php if ($resultDistinct && count($resultDistinct) > 0): ?>
                        <ul class="archive-list">
                            <?php foreach ($resultDistinct as $data): ?>
                                <li>
                                    <a href="<?php echo $url . "archive.php?volume=" . $data['volume']; ?>">
                                        Volume <?php echo htmlspecialchars($data['volume']); ?>
                                        <span class="vol-badge">Issue <?php echo htmlspecialchars($data['issue']); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
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