<div class="row row-filter">
    <div class="col-6">
        <div class="row">
            @if(! $isAdmin)
                <div class="col-6 col-filter">
                    <label for="">Verificar Disponibilidad</label>
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fa-regular fa-calendar-days"></i>
                        Selecciona el rango de fechas
                    </button>
                </div>
            @endif

            <div class="{{ $isAdmin ? 'col-4' : 'col-4' }} col-filter">
                <label for="">Filtrar por usuarios</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Todos</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-6 col-search">
        <div class="row">
            <div class="{{ $isAdmin ? 'col-8' : 'col-4' }}">
                <label for="inputPassword2" class="visually-hidden">Search</label>
                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
            </div>

            @if($isAdmin)
                <div class="col-4">
                    <div class="text-xl-end mt-xl-0 mt-2">
                        <a href="{{ route('admin.spaces.create') }}" class="btn btn-danger mb-2 me-2">
                            <i class="fa-solid fa-plus"></i>
                            Add New Space
                        </a>
                    </div>
                </div>
            @endif
        </div>
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
        align-content: flex-end;
    }
</style>