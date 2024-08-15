<div class="row row-filter">
    <div class="col-6">
        <div class="row">
            <div class="col-6 col-filter">
                <label for="">Verificar Disponibilidad</label>
                <button type="button" class="btn btn-outline-secondary">
                    <i class="fa-regular fa-calendar-days"></i>
                    Selecciona el rango de fechas
                </button>
            </div>

            <div class="col-6 col-filter">
                <label for="">Filtrar por usuarios</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Todos</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>


    <div class="col-4 col-search">
        <label for="inputPassword2" class="visually-hidden">Search</label>
        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
    </div>
</div>

<style>
    .row-filter {
        display: flex;
        justify-content: space-between;
        margin: 2rem 0;
    }

    .col-filter {
        display: flex;
        flex-direction: column;
    }

    .col-filter button {
        text-align: left;
    }

    .col-search {
        display: flex;
        align-items: flex-end;
    }
</style>