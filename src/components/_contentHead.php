<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0"><?php
                echo $pageItemObject["title"] ?? null; ?></h1>
            <?php
            $pageItemObject['description'] = $pageItemObject['description'] ?? null;
            if ($pageItemObject['description']) {
                ?>
                <small class="text-muted"><?php
                    echo $pageItemObject['description']; ?></small>
                <?php
            }
            ?>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php
                if (!empty($pageItemObject['breadcrumb'])) {
                    foreach ($pageItemObject['breadcrumb'] as $breadcrumb) {
                        ?>
                        <li class="breadcrumb-item">
                            <a href="<?php
                            echo $breadcrumb['link']; ?>">
                                <?php
                                echo $breadcrumb['title']; ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ol>
        </div>
    </div>
</div>
