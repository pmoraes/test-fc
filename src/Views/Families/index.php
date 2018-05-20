<div class="container">
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Família</th>
                        <th scope="col">Membros</th>
                        <th scope="col">Guerras</th>
                        <th scope="col">Vitórias</th>
                        <th scope="col">Derrotas</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($families as $family): ?>
                        <tr>
                            <th scope="row"><?= $family['name']; ?></th>
                            <td><?= $family['quantity_members']; ?></td>
                            <td><?= $family['Wars']; ?></td>
                            <td><?= $family['Victories']; ?></td>
                            <td><?= $family['Wars'] - $family['Victories']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/families/update/<?= $family['id']; ?>">Editar</a>
                                        <a class="dropdown-item" href="/families/read/<?= $family['id']; ?>">Visualizar</a>
                                        <a class="dropdown-item" href="/families/remove/<?= $family['id']; ?>" onclick="if (confirm('Você está certo?')) { window.location.href='/families/remove/<?= $family["id"]; ?>'; } event.returnValue = false; return false;">Deletar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="text-center"><a class="btn btn-success" href="/families/create/">Adicionar Familia</a></p>
        </div>
    </div>
</div>