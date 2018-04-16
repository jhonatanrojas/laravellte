@extends('admin.template.main');

@section('title')
Lista de Usuarios

@endsection

 

@section('contect')
<div class="page-header">
      <h1>Lista de Usuarios</h1>
    </div>
   
 <div class="tab-content p-y-4">
 <div class="row">
 <div class="col-md-6 col-lg-offset-3">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
            <th>Accion</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach($users as $user)
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>
        <td>
        
        @if($user->type=="admin")
         <span class="label label-primary">     {{$user->type}} </span>

         @else
<span class="label label-success">  {{$user->type}}</span>
         @endif
     </td>
             <td>
             <a href="" class="btn btn-danger">Danger</a>

             <a href=""class="btn btn-warning">Warning</a
             </td>
      </tr>
    @endforeach
    </tbody>
  </table>
    {!! $users->render()!!}
  </div>

</div>

</div>

    </div>

@endsection