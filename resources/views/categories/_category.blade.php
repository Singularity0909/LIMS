<div class="list-group-item">
  {{ $category->id }} - {{ $category->name }}
  <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="float-right">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-sm btn-danger delete-btn">
      <i class="fa fa-trash-o fa-lg"></i> Delete</a>
    </button>
  </form>
  <form action="{{ route('categories.edit', $category->id) }}" method="get" class="float-right">
    <button type="submit" class="btn btn-sm btn-secondary update-btn">
      <i class="fa fa-cog"></i> Update</a>
    </button>
  </form>
</div>
