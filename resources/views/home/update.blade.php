@extends('template.admin')


@section('judul')
Home
@endsection


@section('content')

<form method="POST" action="{{ Url('update-user') }}">
{{-- Cross site request forgery (CSRF), untuk keamanan dan agar tidak mix dengan situs web lain.
    isinya juga token --}}
@csrf

{{-- kirim id yang akan diupdate ke laravel --}}
<input type="hidden" name="value_id" value="{{ $data->id }}">

 <div class="form-group">
    <label>Name</label>
    <input name="value_name" type="text" value="{{ $data->nama }}" class="form-control" required>
    <span style="color:red"> {{ $errors->first("value_name") }} </span>{{-- menampilkan pesan error bila tidak sesuai validasi inputan --}}
 </div>

 <div class="form-group">
    <label>Email</label>
    <input name="value_email" type="email" value="{{ $data->email }}" class="form-control" required>
   <span style="color:red"> {{ $errors->first("value_email") }} </span>
 </div>

 <div class="form-group">
    <label>DOB</label>
    <input name="value_date" type="date" value="{{ $data->dob }}" class="form-control" required>
    {{ $errors->first("value_date") }}
 </div>

 <div class="form-group">
    <label>Address</label>
    <input name="value_address" type="text" value="{{ $data->address }}" class="form-control" required>
    {{ $errors->first("value_address") }}
 </div>

 <div class="form-group">
    <label>Gender</label>
    <select class="form-control" name="value_gender">
        <option value="M" @if($data->gender == 'M') selected @endif>Male</option>
        <option value="F" @if($data->gender == 'F') selected @endif>Female</option>
        <option value="O" @if($data->gender == 'O') selected @endif>Other</option>
    </select>
    {{ $errors->first("value_gender") }}
</div>

<button type="submit" class="btn btn-success">Update</button>

</form>

@endsection






