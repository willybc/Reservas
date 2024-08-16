<div class="table-responsive table-spaces">
    <div id="resultContainer">
        <table class="table table-centered table-nowrap mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 20px;">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck1">
                            <label for="customCheck1" class="form-check-label">&nbsp;</label>
                        </div>
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role_id</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck{{ $user->id }}">
                                <label for="customCheck{{ $user->id }}" class="form-check-label">&nbsp;</label>
                            </div>
                        </td>

                        <td>{{ $user->name }}</td>
                        <td>
                            <h5 class="my-0">{{ $user->email ?? 'N/A' }}</h5>
                        </td>
                        <td>{{ $user->role->role ?? 'NULL' }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="action-icon">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="action-icon" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-id="{{ $user->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal DELETE -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este espacio con ID: <span id="userId">...</span>? Esta acción no
                se puede deshacer.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if($users->isEmpty())
    <p class="text-center">No se encontraron usuarios.</p>
@endif

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-id');
            var form = deleteModal.querySelector('#deleteForm');
            var userIdSpan = deleteModal.querySelector('#userId');
            form.action = '{{ url("/users") }}/' + userId;
            userIdSpan.textContent = userId; // Mostrar el ID en el modal
        });
    });
</script>
@endsection