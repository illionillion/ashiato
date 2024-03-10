<?php if (isset($id) && !empty($id)): ?>
    <div class="modal fade modal-dialog-scrollable" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>Label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="<?= $id ?>Label">場所追加</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <form id="<?= $id ?>Form">
                        <div class="w-100 form-label">
                            <label for="place-name" class="w-100 mb-1">場所名</label>
                            <input type="text" id="place-name" name="place-name" class="form-control w-100"
                                placeholder="場所名を入力" />
                        </div>
                        <div class="w-100 form-label">
                            <label for="place-address" class="w-100 mb-1">住所</label>
                            <input type="text" id="place-address" name="place-address" class="form-control w-100"
                                placeholder="住所を入力" />
                        </div>
                        <div class="w-100 form-label">
                            <label for="image-input" class="btn btn-secondary text-center">画像を追加</label>
                            <input type="file" name="" id="image-input" accept="image/png, image/jpeg" class="d-none" />
                            <div class="preview" id="preview"></div>
                        </div>
                        <div class="w-100 form-label">
                            <label for="place-comment" class="w-100 mb-1">ひとこと</label>
                            <textarea id="place-comment" name="place-comment" class="form-control w-100"
                                placeholder="ひとことコメントを入力"></textarea>
                        </div>
                        <div class="w-100 form-label">
                            <label for="" class="w-100 mb-1">滞在時間</label>
                            <input type="number" id="stay-time-h" name="stay-time-h" class="form-control w-100"
                                placeholder="**時間" />
                            <input type="number" id="stay-time-m" name="stay-time-m" class="form-control w-100"
                                placeholder="**分" />
                        </div>
                        <div class="w-100 form-label">
                            <label for="used-money" class="w-100 mb-1">使ったお金</label>
                            <input type="number" id="used-money" name="used-money" class="form-control w-100"
                                placeholder="**円" />
                        </div>
                        <div class="w-100 form-label">
                            <label for="expenses" class="w-100 mb-1">交通費</label>
                            <input type="number" id="expenses" name="expenses" class="form-control w-100"
                                placeholder="**円" />
                        </div>
                        <div class="w-100 form-label">
                            <label for="" class="w-100 mb-1">移動時間</label>
                            <input type="number" id="move-time-h" name="move-time-h" class="form-control w-100"
                                placeholder="**時間" />
                            <input type="number" id="move-time-m" name="move-time-m" class="form-control w-100"
                                placeholder="**分" />
                        </div>
                        <div class="w-100 form-label">
                            <label for="how-move" class="w-100 mb-1">移動手段</label>
                            <textarea id="how-move" name="how-move" class="form-control w-100"
                                placeholder="移動手段を入力"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">戻る</button>
                    <button type="button" class="btn btn-primary" id="placeAddBtn">追加</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>