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

<a href="{{ Url('/pdf-user') }}" class="btn btn-primary">Download PDF</a><br><br>
<a href="{{ Url('/excel-user') }}" class="btn btn-success">Download Excel</a><br><br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            {{-- agar data bisa berurut paginationnya --}}
            <td>{{ $data->firstItem() + $loop->index }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->gender }}</td>
            <td>{{ $d->dob }}</td>
            {{-- untuk delete data --}}
            <td>
                {{-- http://localhost:8000/update-user/1 --}}
                {{-- http://localhost:8000/update-user/2 --}}
                <a href="{{ Url('update-user') }}/{{ $d->id }}" class="btn btn-primary">Update</a>
                <br><br>

                {{-- 3 hal dalam mengirim data yang harus ada: method, url, name  --}}
            <form method="post" action="{{ Url('delete-user') }}">
                @csrf
                <input name="form1" type="hidden" value="{{ $d->id }}"/>
                <button type="submit" onclick="return confirm('Are you sure want to delete this data?');" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- menampilkan pagination dari laravel --}}
{{ $data->render() }}


@endsection
 {{-- <td>{{ $loop->iteration }}</td> udah aturan dari laravel agar id bisa di loop dan tidak lompat2--}}
