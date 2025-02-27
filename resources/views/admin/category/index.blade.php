@extends('layouts.admin')
@section('title', 'Kategori Listeleme')
@push('css')
@endpush
@section('body')
    {{-- kategori listele --}}
    <div class="row justify-content-center">
        <div class="col col-11">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus mr-2"></i>
                            Yeni Kategori Ekle
                        </a>
                    </div>
                    <h3 class="card-title">
                        Kategori Listesi
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="categoryTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Adı</th>
                                <th>Slug</th>
                                <th>Üst Kategori</th>
                                <th>Aktif/Pasif</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryList as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->parent_id ?? 'Ana Kategori' }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-warning">Pasif</span>
                                        @endif
                                    <td>
                                        <div class="btn-group" role="group">

                                            <a href="{{ route('admin.category.show', $category->id) }}"
                                                class="btn btn-outline-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"
                                                class="btn btn-outline-success btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.category.destroy', ['category' => $category->id]) }}" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col col-12">
                            {{ $categoryList->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('js')
@endpush
