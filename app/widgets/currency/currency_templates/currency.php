<option value="" class="label"><?= $this->currency['code'] . ' :'?></option>
<?php foreach($this->currencies as $k => $v): ?>
    <?php if($this->currency['code'] != $k): ?>
        <option value="<?= $k ?>"><?= $k ?></option>
    <?php endif; ?>
<?php endforeach; ?>