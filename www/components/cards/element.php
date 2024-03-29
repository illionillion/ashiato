<?php if (isset($cards) && !empty($cards)): ?>
    <?php foreach ($cards as $i => $card): ?>
        <div class="place-item w-100">
            <div class="content-header">
                <h2 class="contentname">
                    <?= htmlspecialchars($card["bookmark_content_name"]); ?>
                </h2>
                <img class="contentimg" src="<?= $card["bookmark_content_image_path"] ?>" alt="画像">
                <div class="contentcoment">
                    <?= htmlspecialchars($card["bookmark_content_comment"]); ?>
                </div>
            </div>
            <div class="content-body">
                <div class="top d-flex justify-content-center align-items-center gap-3">
                    <div class="price w-100 text-center">使ったお金：<?= $card["used_money"] ?>円</div>
                    <div class="staying-time w-100 text-center">滞在時間：<?= $card["stay_time_h"] ?>時間<?= $card["stay_time_m"] ?>分</div>
                </div>
                <div class="bottom d-flex justify-content-center align-items-center gap-3">
                    <div class="left w-50 arrow text-center">
                        <div class="<?= $i < (count($cards) - 1) ? "arrow" : "" ?>"></div>
                    </div>
                    <div class="right w-50 text-center">
                        <div class="transportation"><?= htmlspecialchars($card["how_move"]); ?></div>
                        <div class="moving-time">移動時間：<?= $card["move_time_h"] ?>時間<?= $card["move_time_m"] ?>分</div>
                        <div class="fee">交通費：<?= $card["used_money"] ?>円</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>