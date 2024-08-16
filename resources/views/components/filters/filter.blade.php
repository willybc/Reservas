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
                <label for="searchInput" class="visually-hidden">Search</label>
                <input type="search" class="form-control" id="searchInput" placeholder="Buscar...">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var resultContainer = document.getElementById('resultContainer');
        if (resultContainer) {
            var searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('input', function () {
                var searchQuery = this.value;
                var url = window.location.pathname;

                fetch(url + '?search=' + searchQuery, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest' // Indica que es una solicitud AJAX
                    }
                })
                    .then(response => response.text())
                    .then(html => {
                        resultContainer.innerHTML = html;
                    })
                    .catch(error => console.error('Error:', error));
            })
        } else {
            console.error('Error: resultContainer not found');
        }

    })
</script>

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