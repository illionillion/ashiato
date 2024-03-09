<?php if (isset($this->cards) && !empty($this->cards)) : ?>
    <div class="place-item w-100">
        <div class="content-header">
            <h2></h2>
            <img src="" alt="画像">
            <div></div>
        </div>
        <div class="content-body">
            <div class="top d-flex justify-content-center align-items-center gap-3">
                <div class="price w-100 text-center">使ったお金：100円</div>
                <div class="staying-time w-100 text-center">滞在時間：3時間</div>
            </div>
            <div class="bottom d-flex justify-content-center align-items-center gap-3">
                <div class="left w-100 arrow text-center">↓</div>
                <div class="right w-100 text-center">
                    <div class="transportation">環状線</div>
                    <div class="moving-time">60分</div>
                    <div class="fee">800円</div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>