@extends('layouts.front')
@section('title', 'Sipariş Detayı')
@push('css')
@endpush
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Sipariş Detayı</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ürün Adı</th>
                            <th>Ürün Adedi</th>
                            <th>Ürün Fiyatı</th>
                            <th>Toplam</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
