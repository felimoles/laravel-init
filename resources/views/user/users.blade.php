@extends('layouts.app')

@section('content')
<div>
    Usuarios
    @if (Route::has('login'))
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col"> role</th>
      <th scope="col"> rut</th>
      <th scope="col"> created at</th>
      <th scope="col">opciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($usr as $key=>$users)
    <tr>
      <th scope="row">{{++$key}}</th>
      <td>{{$users->id}}</td>
      <td>{{$users->name}}</td>
      <td>{{$users->email}}</td>
      <td>{{$users->role}}</td>
      <td>{{$users->rut}}</td>
      <td>{{$users->created_at}}</td>
      <td>
      <form action="{{url('users/'.$users->id)}}" method="post">
                @csrf
                @method('delete')
         <input type="submit" class="btn btn-primary" value="borrar">
            
        </form>
        <a href="{{url('users/'.$users->id.'/edit')}}" class="btn btn-primary">editar</a>
    </td>
       
    </tr>
    @endforeach
  </tbody>
</table>

    @endif
    <form action="{{url('users/store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="f" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">rut</label>
                                <input type="text" name="rut" class="form-control" id="exampleInputRut" placeholder="f" required autofocus>
                            </div>
    

  <select name="role" class="form-select" style="width:auto;">
                   
                    <option  value="user">User</option>
                    <option value="organizer">Lead</option>
                    <option value="admin">Admin</option>
                    </select>
                     
                            <button type="submit" class="btn btn-primary">Crear usuario</button>
    </form>
</div>
@endsection