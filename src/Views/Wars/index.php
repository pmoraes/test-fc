<div class="container">
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="/wars" method="POST" class="mt-5 mb-5">
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="date_start" class="form-control datepicker" placeholder="Data Início" required>
                    </div>
                    <div class="col">
                        <input type="text" name="date_end" class="form-control datepicker" placeholder="Data Fim" required>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary float-right">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Família Desafiadora</th>
                        <th scope="col">Família Desafiada</th>
                        <th scope="col">Ínicio</th>
                        <th scope="col">Fim</th>
                        <th scope="col">Vencedora</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($wars as $war): ?>
                        <tr>
                            <td><?= $war['ChallengingName']; ?></td>
                            <td><?= $war['ChallengedName']; ?></td>
                            <td><?= date('d-m-Y', strtotime($war['date_start'])); ?></td>
                            <td><?= date('d-m-Y', strtotime($war['date_end'])); ?></td>
                            <td><?= $war['WinnerName']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/wars/update/<?= $war['id']; ?>">Editar</a>
                                        <a class="dropdown-item" href="/wars/read/<?= $war['id']; ?>">Visualizar</a>
                                        <a class="dropdown-item" href="/wars/remove/<?= $war['id']; ?>" onclick="if (confirm('Você está certo?')) { window.location.href='/wars/remove/<?= $war["id"]; ?>'; } event.returnValue = false; return false;">Deletar</a>
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
            <p class="text-center"><a class="btn btn-success" href="/wars/create/">Adicionar Guerra</a></p>
        </div>
    </div>
</div>