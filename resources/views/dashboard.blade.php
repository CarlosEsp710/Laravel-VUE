@extends('app')

@section('content')

    <div id="crud" class="row">
        <div class="col-xs-12">
            <h1 class="page-header">CRUD Laravel y VUEjs</h1>
        </div>
        <div class="col-sm-7">
            <form id="create" form method="POST" v-on:submit.prevent="createKeep">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Task</span>
                    <input type="text" class="form-control" placeholder="New Task" aria-label="Username"
                        aria-describedby="basic-addon1" v-model="newKeep">
                </div>
                <input type="submit" class="btn btn-primary" value="Nueva tarea">
            </form>
            <form id="update" form method="POST" v-on:submit.prevent="updateKeep(fillKeep.id)">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Task</span>
                    <input type="text" class="form-control" placeholder="Edit Task" aria-label="Username"
                        aria-describedby="basic-addon1" v-model="fillKeep.keep">
                </div>
                <input type="submit" class="btn btn-primary" value="Actualizar tarea">
            </form>

            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tarea</th>
                        <th colspan="2">
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="keep in keeps">
                        <td width="10px">@{{ keep . id }}</td>
                        <td>@{{ keep . keep }}</td>
                        <td width="10px">
                            <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)">Editar</a>
                        </td>
                        <td width="10px">
                            <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" v-if="pagination.current_page > 1">
                        <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">Anterior</a>
                    </li>
                    <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                        <a class="page-link" href="#" @click.prevent="changePage(page)">
                            @{{ page }}
                        </a>
                    </li>
                    <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                        <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-sm-5 card card">
            <pre>
                    @{{ $data }}
                </pre>
        </div>
    </div>

@endsection
