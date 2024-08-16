<div class="row row-filter">

    <div class="col-6">
        <div class="row">
            @if(! $isPageUsers)
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
                    <select id="selectInput" class="form-select" aria-label="Default select Users">
                        <option selected>Todos</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <div class="col-4 col-filter">
                    <label for="">Filtrar por Rol</label>
                    <select id="selectInput" class="form-select" aria-label="Default select Roles">
                        <option selected>Todos</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>


    <div class="col-6 col-search">
        <div class="row">
            <div class="{{ $isAdmin ? 'col-8' : 'col-4' }}">
                <label for="searchInput" class="visually-hidden">Search</label>
                <input type="search" class="form-control" id="searchInput" placeholder="Buscar...">
            </div>

            @if($isAdmin and ! $isPageUsers)
                <div class="col-4">
                    <div class="text-xl-end mt-xl-0 mt-2">
                        <a href="{{ route('admin.spaces.create') }}" class="btn btn-danger mb-2 me-2">
                            <i class="fa-solid fa-plus"></i>
                            New Space
                        </a>
                    </div>
                </div>
            @elseif ($isPageUsers)
                <div class="col-4">
                    <div class="text-xl-end mt-xl-0 mt-2">
                        <a href="{{ route('admin.users.create')}}" class="btn btn-danger mb-2 me-2">
                            <i class="fa-solid fa-plus"></i>
                            New User
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    function fetchSpaces(searchInput, selectInput, resultContainer) {
        var searchQuery = searchInput.value;
        var userId = selectInput.value;
        var url = window.location.pathname;
        var params = new URLSearchParams();

        if (searchQuery) {
            params.append('search', searchQuery);
        }

        if (userId && userId !== 'Todos') {
            params.append('user_id', userId);
        }

        fetch(url + '?' + params.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(html => {
                resultContainer.innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
    }

    // Setup event listeners
    document.addEventListener('DOMContentLoaded', function () {
        var resultContainer = document.getElementById('resultContainer');
        if (resultContainer) {
            var searchInput = document.getElementById('searchInput');
            var selectInput = document.getElementById('selectInput');

            // Event listener for search input
            searchInput.addEventListener('input', function () {
                fetchSpaces(searchInput, selectInput, resultContainer);
            });

            // Event listener for user select
            selectInput.addEventListener('change', function () {
                fetchSpaces(searchInput, selectInput, resultContainer);
            });
        } else {
            console.error('Error: resultContainer not found');
        }
    });
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