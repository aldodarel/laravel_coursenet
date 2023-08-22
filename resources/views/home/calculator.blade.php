@extends('template.admin')


@section('content')

<h5>Calculator</h5>
<p>===============</p>

<form action="{{ Url('calculator') }}" method="POST">
@csrf

<label>Input angka 1</label>
<input type="number" name="input1" value="{{ old('input1') }}" class="form-control">
<span style="color:red"> {{ $errors->first("input1") }} </span>
<br><br>

<label>Operator</label>
<select class="form-control" name="v_operator">
    <option value="add">+</option>
    <option value="subtract">-</option>
    <option value="multiply">*</option>
    <option value="divide">/</option>
</select>
<br><br>

<label>Input angka 2</label>
<input type="number" name="input2" value="{{ old('input2') }}" class="form-control">
<span style="color:red"> {{ $errors->first("input2") }} </span>
<br><br>


<button type="submit" class="btn btn-success">Submit</button>

@endsection
</form>
