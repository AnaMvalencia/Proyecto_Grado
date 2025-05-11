@extends('layouts.app')

@section('title','Inicializar producto')

@push('css')
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Inicializar producto</h1>

    <x-breadcrumb.template>
        <x-breadcrumb.item :href="route('panel')" content="Inicio" />
        <x-breadcrumb.item :href="route('productos.index')" content="Productos" />
        <x-breadcrumb.item active='true' content="Inicializar producto" />
    </x-breadcrumb.template>

    <div class="mb-a">
        <button type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#VerPlanoModal">
            Ver plano
        </button>
    </div>


    <x-forms.template :action="route('inventario.store')" method='post'>

        <x-slot name='header'>
            <p>Producto: <span> class='fw-bold'>{{$producto->nombre_completo}}</span></p>
        </x-slot>
        </-------producto id--->
        <div class="row g-4">
            <input type="hidden" name="producto_id" value="$producto->id">

            </-------Ubicaciones---->
            <div class="col-12">
                <label for="ubicacione_id" class="form-label">Seleccione una ubicacion:</label>
                <select name="ubicaciones_id"
                    id="ubicaciones_id"
                    class="form-select">
                    @foreach ($ubicaciones as $item)
                    <option value="{{$item->id}}" {{old('ubicacione_id') == $item->id ? 'selected' : ''}}>
                        {{$item->nombre}}
                        @endforeach
                </select>
                @error(ubicacione_id)
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </div>

            </---Cantidad--->
            <div class="col-md-6">
                <x-forms.input id="cantidad" required='true' type='number' />
            </div>

            </-------Fecha_vencimiento---->
            <div class="col-md-6">
                <x-forms.input id="fecha_vencimiento" type='date' label='Fecha de Vencimiento' />
            </div>
        </div>

        <x-slot name='footer'>
            <button type="submit" class="btn btn-primary">Inicializar</button>

        </x-slot>

    </x-forms.template>

    <!-- Modal -->
    <div class="modal fade" id="VerPlanoModal" 
    tabindex="-1" 
    aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Plano de ubicaciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="row">
                    <div class="col-12">
                        <img src="" alt="">
                    </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('js')

@endpush