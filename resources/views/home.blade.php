
@extends('layouts.app')

@section('content')

@if (session('successMsg'))
<script type="application/javascript">swal("Success!", "{{session('successMsg')}}", "success");</script>
@endif

<template>
  
  <html>
    
  <div style="display: flex;
  background: url('https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg');
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
  <v-card
    class="mx-left"
    elevation="18"
    max-width="344"
    max-height="150"
    style="margin: 20px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(20px); border-radius: 20px;">
    <v-list-item three-line style="background-color: rgba(255, 0, 140, 0.432);">
      <v-list-item-content>
        <div class="text mb-3" style="margin left: 0px; color: white;">
          Add new record
        </div>
        
      </v-list-item-content>

      <v-list-item-avatar
        tile
        size="80"
        color="success"
      ></v-list-item-avatar>
    </v-list-item>

    <v-card-actions>
      <v-tooltip top>
      <v-btn
      color="#E91E63"
      fab
      dark
      v-bind="attrs"
      v-on="on"
      slot="activator"
      data-toggle="tooltip" data-placement="top" title="Add record"
      href="/create"
      style="margin-top: -35px; text-decoration: none;"
      >
      
        <i class="fas fa-plus fa-lg"></i>
      
        
      </v-btn>
      <span>test</span>
    </v-tooltip>

    
    </v-card-actions>
  </v-card>
  <div class="container">
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
      <tr style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(50px);">
        <th scope="row">{{$student->id}}</th>
        <td>{{$student->first_name}}</td>
        <td>{{$student->last_name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone}}</td>
        <td><a href="{{route('edit', $student->id)}}" class="btn btn-raised btn-outline-primary btn-sm"><i class="fas fa-edit fa-lg"></i></a> || 
        
        <form action="{{route('delete', $student->id)}}" style="display: none;" id="delete-form-{{$student->id}}" method="POST">
        {{csrf_field()}}
        {{method_field('delete')}}
        </form>  
        <button class="btn btn-raised btn-outline-danger btn-sm" onclick="
        /*if(confirm('are you sure to delete this data?')){
          event.preventDefault();
          document.getElementById('delete-form-{{$student->id}}').submit();

        }
        else{
          event.preventDefault();
        }*/
        
        swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this imaginary file!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            event.preventDefault();
            document.getElementById('delete-form-{{$student->id}}').submit();
          } else {
            swal('Your imaginary file is safe!');
          }
        });

        " data-toggle="tooltip" title='Delete'><i class="fas fa-trash fa-lg"></i></button></td>
      
      </tr>
      @endforeach
    </tbody>
    
  </table>
  <div>{{$students->links()}}</div>
</div>
   
</body>
</html> 
</template>
  
@endsection
