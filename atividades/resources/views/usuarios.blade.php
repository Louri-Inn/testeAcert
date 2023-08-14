<table class="table table-borderless table-dark formulario">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Login</th>
            <th scope="col">ID</th>
            <th scope="col">Seguidores</th>
            <th scope="col">Seguindo</th>
            <th scope="col">Criado</th>
            <th scope="col">Atualizado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> <img src="{{$resultado->avatar_url}}" width="100" height="100"> </td>
            <td> {{$resultado->login}} </td>
            <td> {{$resultado->id}} </td>
            <td> {{$resultado->followers}} </td>
            <td> {{$resultado->following}} </td>
            <td> {{$resultado->created_at}} </td>
            <td> {{$resultado->updated_at}} </td>
        </tr>
    </tbody>
    </table>

<style>
    th,td{
        font-size: 1.25rem;
    }
</style>

