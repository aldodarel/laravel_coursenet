<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document PDF</title>
</head>

<body>
    <b>
        <h2>Users Data</h2>
    </b>
    <p>Tanggal dan Waktu Cetak: {{ $tanggal }}</p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th align="center" style="border: 1.5px solid black; padding: 10px;">No</th>
                <th style="border: 1.5px solid black; padding: 10px;">Nama</th>
                <th style="border: 1.5px solid black; padding: 10px;">Email</th>
                <th style="border: 1.5px solid black; padding: 10px;">Gender</th>
                <th style="border: 1.5px solid black; padding: 10px;">DOB</th>
            </tr>
        </thead>
        {{ $no = 1 }}
        <tbody>
            @foreach ($data as $d)
                <tr>
                    {{-- agar data bisa berurut paginationnya --}}
                    {{-- <td>{{ $data->firstItem() + $loop->index }}</td> --}}
                    <td align="center" style="border: 1px solid black; padding: 10px;">{{ $no }}</td>
                    <td style="border: 1px solid black; padding: 10px;">{{ $d->nama }}</td>
                    <td style="border: 1px solid black; padding: 10px;">{{ $d->email }}</td>
                    <td style="border: 1px solid black; padding: 10px;">{{ $d->gender }}</td>
                    <td align="center" style="border: 1px solid black; padding: 10px;">{{ $d->dob }}</td>
                    {{-- untuk delete data --}}
                    {{-- http://localhost:8000/update-user/1 --}}
                    {{-- http://localhost:8000/update-user/2 --}}
                    {{-- <td>
             <a href="{{ Url('update-user') }}/{{ $d->id }}" class="btn btn-primary">Update</a>
            </td> --}}
                    <br><br>

                    {{-- 3 hal dalam mengirim data yang harus ada: method, url, name  --}}
                    {{-- <form method="post" action="{{ Url('delete-user') }}">
                @csrf
                <input name="form1" type="hidden" value="{{ $d->id }}"/>
                <button type="submit" onclick="return confirm('Are you sure want to delete this data?');" class="btn btn-danger">Delete</button>
            </form> --}}
                </tr>
                {{ $no++ }}
            @endforeach
        </tbody>
    </table>
</body>

</html>
