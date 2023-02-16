<?php

foreach ($cardArray as $cardObject) {
    ?>
    <div class="row">
        <?php
        foreach ($cardObject["child"] as $cardChildObject) {
            ?>
            <div class="col-sm">
                <div class="small-box">
                    <div class="inner">
                        <h3><?php
                            echo $cardChildObject["value"]; ?></h3>

                        <p><?php
                            echo $cardChildObject["title"]; ?></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-<?php
                        echo $cardChildObject["icon"]; ?>"></i>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
};
?>