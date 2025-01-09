@extends('layouts.admin')
@section('title', 'Kategori')
@push('css')
@endpush
@section('body')
    {{-- kategori listele --}}
    <div class="row justify-content-center">
        <div class="col col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title
                ">Kategori Listesi</h3>
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
                                <th>Kısa Açıklama</th>
                                <th>Aktif/Pasif</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryList as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->parent_id ?? 'Ana Kategori' }}</td>
                                    <td>{{ $category->short_description }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Pasif</span>
                                        @endif
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Adı</th>
                                <th>Slug</th>
                                <th>Üst Kategori</th>
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('js')
@endpush
