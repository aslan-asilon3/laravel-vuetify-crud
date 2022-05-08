@extends('layouts.app')
@section('content')

@if($errors->any())
@foreach ($errors->all() as $error)
<script type="application/javascript">swal("Error!", "{{$error}}", "error");</script>
@endforeach
@endif

<div style="display: flex;
  background: url('https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg');
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
<div class="container" style="margin-top: 20px; margin-bottom:20px; border-radius:10px; background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(20px); max-width: 500px;">
<form action="{{ route('store')}}" method="POST">

    {{csrf_field()}}
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <p class="h4 mb-4" align="center">Add student</p>
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <input type="text" autocomplete="no" id="form3Example1" name="firstname" class="form-control" style="background: rgba(255, 255, 255, 0.1);"/>
          <label class="form-label" for="form3Example1">First name</label>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="text" autocomplete="no" id="form3Example2" name="lastname" class="form-control" style="background: rgba(255, 255, 255, 0.1);" />
          <label class="form-label" for="form3Example2">Last name</label>
        </div>
      </div>
    </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" autocomplete="no" id="form3Example3" name="email" class="form-control" style="background: rgba(255, 255, 255, 0.1);" />
      <label class="form-label" for="form3Example3">Email address</label>
    </div>
  
    
    <!-- Phone input -->
    <div class="form-outline mb-4">
        <input type="text" id="form3Example4" name="phone" class="form-control" style="background: rgba(255, 255, 255, 0.1);"/>
        <label class="form-label" for="form3Example4">Phone Number</label>
      </div>
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Add Data</button>
  
    
  </form>
</div>
</div>
@endsection