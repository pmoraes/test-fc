<div class="container">
    <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td><?= $war['id']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Família Desafiadora</strong></td>
                            <td><?= $war['ChallengingName']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Família Desafiada</strong></td>
                            <td><?= $war['ChallengedName']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Ínicio</strong></td>
                            <td><?= date('d-m-Y', strtotime($war['date_start'])); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Fim</strong></td>
                            <td><?= date('d-m-Y', strtotime($war['date_end'])); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Vencedora</strong></td>
                            <td><?= $war['WinnerName']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>