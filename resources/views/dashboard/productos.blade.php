<x-layout id="main-content" bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='Productos'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">            
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">inbox</i>
                            </div>
                            <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Productos</p>
                                <h4 class="mb-0">{{count($Productos)}}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2">&nbsp;</div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class=" shadow-primary border-radius-lg py-3 pe-3 ps-3">
                            <form action="{{ route('productos_guardar') }}" method="post">
                            @csrf
                            <div class="row" >
                                <div class="input-field col s2">
                                    @isset($Producto->id)
                                    <input type="hidden" name="id" value="{{$Producto->id}}">
                                    @endisset
                                    <p class="text-sm mb-0 text-capitalize">Nombre Del Producto:</p>
                                </div>
                                <div class="input-field col s4">
                                    @isset($Producto->nombre)
                                    <input name="nombre" type="text" class="validate" value="{{$Producto->nombre}}">
                                    @else
                                    <input name="nombre" type="text" class="validate">
                                    @endisset
                                </div>
                                <div class="input-field col s2">
                                    <p class="text-sm mb-0 text-capitalize">Refrencia Del Producto:</p>
                                </div>
                                <div class="input-field col s4">    
                                    @isset($Producto->referencia)                            
                                    <input name="referencia" type="text" class="validate" value="{{$Producto->referencia}}">
                                    @else
                                    <input name="referencia" type="text" class="validate">
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s2">
                                    <p class="text-sm mb-0 text-capitalize">Precio Del Producto:</p>
                                </div>
                                <div class="input-field col s4">
                                    @isset($Producto->precio) 
                                    <input name="precio" type="number"  min="0" class="validate"  value="{{$Producto->precio}}">
                                    @else
                                    <input name="precio" type="text" class="validate">
                                    @endisset
                                </div>
                                <div class="input-field col s2">
                                    <p class="text-sm mb-0 text-capitalize">Peso Del Producto:</p>
                                </div>
                                <div class="input-field col s4">    
                                    @isset($Producto->peso)                             
                                    <input name="peso" type="number"  min="0" class="validate"  value="{{$Producto->peso}}">
                                    @else
                                    <input name="peso" type="text" class="validate">
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s2">
                                    <p class="text-sm mb-0 text-capitalize">Categoria Del Producto:</p>
                                </div>
                                <div class="input-field col s4">
                                    @isset($Producto->id_categoria) 
                                    <select name="id_categoria" class="form-select">
                                    <option></option>
                                        @foreach($Categorias as $Categoria) 
                                            @if($Producto->id_categoria == $Categoria->id)
                                                <option value="{{$Categoria->id}}" selected > {{$Categoria->descripcion}} </option> 
                                            @else
                                                <option value="{{$Categoria->id}}" > {{$Categoria->descripcion}} </option> 
                                            @endif
                                        @endforeach
                                    </select>
                                    @else
                                    <select name="id_categoria" class="form-select">
                                    <option></option>
                                        @foreach($Categorias as $Categoria) 
                                        <option value="{{$Categoria->id}}" > {{$Categoria->descripcion}} </option> 
                                        @endforeach
                                    </select>
                                    @endisset

                                    

                                </div>
                                <div class="input-field col s2">
                                    <p class="text-sm mb-0 text-capitalize">Stock  Del Producto:</p>
                                </div>
                                <div class="input-field col s4">  
                                    @isset($Producto->stock)                               
                                    <input name="stock" type="number"  min="0" class="validate"  value="{{$Producto->stock}}">
                                    @else
                                    <input name="stock" type="text" class="validate">
                                    @endisset
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            @if($errors->any())
                                <p style="color: red;">Debe completar el formulario para poder registrar.</p>
                            @endif
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row mt-4">
                            
            </div>
            <div class="row mb-4">
                <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nombre
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Referencia
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Precio
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Peso
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Categoria
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Stock
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7">
                                                Accion
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$Productos->isEmpty())
                                        @foreach($Productos as $prod)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$prod->nombre}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$prod->referencia}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$prod->precio}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$prod->peso}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$prod->descripcion}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$prod->stock}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <a href="{{ route('productos_editar', ['id'=> $prod->id]) }}"><i class="material-icons opacity-10">create</i></a>
                                                     </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <a href="{{ route('productos_eliminar', ['id'=> $prod->id]) }}"><i class="material-icons opacity-10">delete</i></a>
                                                  </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </main>
    </div>
    @push('js')
    
    <script type="text/javascript">
    
    $(document).ready(function(){
        });
    </script>
    @endpush
</x-layout>
