@extends('template.admin')


@section('judul')
Home
@endsection


@section('content')

<form method="POST" action="{{ Url('save-user') }}">
{{-- Cross site request forgery (CSRF), untuk keamanan dan agar tidak mix dengan situs web lain.
    isinya juga token --}}
@csrf
 <div class="form-group">
    <label>Name</label>
    <input name="value_name" type="text" value="{{ old('value_name') }}" class="form-control" required>
    <span style="color:red"> {{ $errors->first("value_name") }} </span>{{-- menampilkan pesan error bila tidak sesuai validasi inputan --}}
 </div>

 <div class="form-group">
    <label>Email</label>
    <input name="value_email" type="email" value="{{ old('value_email') }}" class="form-control" required>
   <span style="color:red"> {{ $errors->first("value_email") }} </span>
 </div>

 <div class="form-group">
    <label>Password</label>
    <input name="value_password" type="password" class="form-control" required>
    <span style="color:red"> {{ $errors->first("value_password") }} </span>
 </div>

 <div class="form-group">
    <label>Confirm Password</label>
    <input name="value_password_confirmation" type="password" class="form-control" required>
    <span style="color:red"> {{ $errors->first("value_password_confirmation") }} </span>
 </div>

 <div class="form-group">
    <label>DOB</label>
    <input name="value_date" type="date" value="{{ old('value_date') }}" class="form-control" required>
    {{ $errors->first("value_date") }}
 </div>


 <div class="form-group">
    <label>Gender</label>
    <select class="form-control" name="value_gender">
        <option value="M" @if(old('value_gender') == 'M') selected @endif>Male</option>
        <option value="F" @if(old('value_gender') == 'F') selected @endif>Female</option>
        <option value="O" @if(old('value_gender') == 'O') selected @endif>Other</option>
    </select>
    {{ $errors->first("value_gender") }}
</div>

<button type="submit" class="btn btn-success">Save</button>

</form>

@endsection






