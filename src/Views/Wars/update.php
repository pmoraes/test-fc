<div class="container">
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="/wars/update/<?= $war['id']; ?>" method="POST">
                <input type="hidden" name="id" value="<?= $war['id']; ?>">
                <div class="form-group">
                    <label>Família desafiadora</label>
                    <select class="form-control" name="family_id_challenging" required>
                        <?php foreach ($families as $family): ?>
                            <?php $selected = '';?>
                            <?php if ($war['family_id_challenging'] == $family['id']): ?>
                                <?php $selected = 'selected';?>
                            <?php endif; ?>
                            <option value="<?= $family['id']?>" <?= $selected; ?>><?= $family['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Família desafiada</label>
                    <select class="form-control" name="family_id_challenged" required>
                        <?php foreach ($families as $family): ?>
                            <?php $selected = '';?>
                            <?php if ($war['family_id_challenged'] == $family['id']): ?>
                                <?php $selected = 'selected';?>
                            <?php endif; ?>
                            <option value="<?= $family['id']?>" <?= $selected; ?>><?= $family['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Data Início</label>
                    <input type="text" name="date_start" class="form-control datepicker" aria-describedby="Data Início" placeholder="Data Início" value="<?= date('d-m-Y', strtotime($war['date_start']));?>" required>
                </div>

                <div class="form-group">
                    <label>Data Fim</label>
                    <input type="text" name="date_end" class="form-control datepicker" aria-describedby="Data Fim" placeholder="Data Fim" value="<?= date('d-m-Y', strtotime($war['date_start']));?>" required>
                </div>

                <div class="form-group">
                    <label>Família Vencedora</label>
                    <select class="form-control" name="family_id_winner" required>
                        <?php foreach ($families as $family): ?>
                            <?php $selected = '';?>
                            <?php if ($war['family_id_winner'] == $family['id']): ?>
                                <?php $selected = 'selected';?>
                            <?php endif; ?>
                            <option value="<?= $family['id']?>" <?= $selected; ?>><?= $family['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>