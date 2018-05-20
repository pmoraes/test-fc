<div class="container">
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="/wars/create" method="POST">
                <div class="form-group">
                    <label>Família desafiadora</label>
                    <select class="form-control" name="family_id_challenging" required>
                        <?php foreach ($families as $family): ?>
                            <option value="<?= $family['id']?>"><?= $family['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Família desafiada</label>
                    <select class="form-control" name="family_id_challenged" required>
                        <?php foreach ($families as $family): ?>
                            <option value="<?= $family['id']?>"><?= $family['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Data Início</label>
                    <input type="text" name="date_start" class="form-control datepicker" aria-describedby="Data Início" placeholder="Data Início" required>
                </div>

                <div class="form-group">
                    <label>Data Fim</label>
                    <input type="text" name="date_end" class="form-control datepicker" aria-describedby="Data Fim" placeholder="Data Fim" required>
                </div>

                <div class="form-group">
                    <label>Família Vencedora</label>
                    <select class="form-control" name="family_id_winner" required>
                        <?php foreach ($families as $family): ?>
                            <option value="<?= $family['id']?>"><?= $family['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>