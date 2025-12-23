@php
    // Determine resource type and id
    $resource = isset($company) ? 'companies' : 'employees';
    $id = isset($company) ? $company->id : $employee->id;
@endphp

<div class="action-buttons">
    <!-- Edit -->
    <a href="{{ route($resource . '.edit', $id) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i>
    </a>

    <!-- View -->
    <a href="{{ route($resource . '.show', $id) }}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>

    <!-- Delete Button -->
    <button
        type="button"
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#deleteModal{{ $id }}">
        <i class="fas fa-trash-alt"></i>
    </button>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <form action="{{ route($resource . '.destroy', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


