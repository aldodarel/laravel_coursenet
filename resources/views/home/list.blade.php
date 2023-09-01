@extends('template.admin')

@section('content')

{{-- <style>
.pagination > li > a
    {
        background-color: white;
        color: #5A4181;
    }

    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover
    {
        color: #5a5a5a;
        background-color: #eee;
        border-color: #ddd;
    }

    .pagination > .active > a
    {
        color: white;
        background-color: #5A4181 !Important;
        border: solid 1px #5A4181 !Important;
    }

    .pagination > .active > a:hover
    {
        background-color: #5A4181 !Important;
        border: solid 1px #5A4181;
    }
</style> --}}

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Gender</th>
            <th>DOB</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->gender }}</td>
            <td>{{ $d->dob }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- menampilkan pagination dari laravel --}}
{{ $data->render() }}


@endsection
 {{-- <td>{{ $loop->iteration }}</td> udah aturan dari laravel agar id bisa di loop dan tidak lompat2--}}
