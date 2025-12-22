<div class="d-flex gap-1">
    <!-- Edit -->
    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">
        <i class="fas fa-edit"></i>
    </a>

    <!-- View -->
    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-info">
        <i class="fas fa-eye"></i>
    </a>

    <!-- Delete -->
    <form action="{{ route('companies.destroy', $company->id) }}"
          method="POST"
          class="delete-form d-inline">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-sm btn-danger">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</div>
