<div class="container">
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="/families/create" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="name" class="form-control" aria-describedby="Nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantidade de Membros</label>
                    <input type="number" name="quantity_members" class="form-control" aria-describedby="Quantidade de Membros" placeholder="Quantidade de Membros">
                </div>
                
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>