<?php if (isset($id) && !empty($id)) : ?>
    <div class="modal fade modal-dialog-scrollable" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="<?= $id ?>Label">場所追加</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="w-100 form-label">
                        <label for="place-name" class="w-100 mb-1">場所名</label>
                        <input type="text" id="place-name" name="place-name" class="form-control w-100" placeholder="場所名を入力" />
                    </div>
                    <div class="w-100 form-label">
                        <label for="place-address" class="w-100 mb-1">住所</label>
                        <input type="text" id="place-address" name="place-address" class="form-control w-100" placeholder="住所を入力" />
                    </div>
                    <div class="w-100 form-label">
                        <label for="place-comment" class="w-100 mb-1">ひとこと</label>
                        <textarea type="text" id="place-comment" name="place-comment" class="form-control w-100"></textarea>
                    </div>
                    <div class="w-100 form-label">
                        <label for="expenses" class="w-100 mb-1">交通費</label>
                        <input type="number" id="expenses" name="expenses" class="form-control w-100" placeholder="**円" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">戻る</button>
                    <button type="button" class="btn btn-primary" id="placeAddBtn">追加</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>