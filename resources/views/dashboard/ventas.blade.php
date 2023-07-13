<x-layout id="main-content" bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='Productos'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">            
            <div class="row">
                <div class="col-lg-6 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class=" shadow-primary border-radius-lg py-3 pe-3 ps-3">
                            <form action="{{ route('ventas_guardar') }}" method="post">
                            @csrf
                            <div class="row" >
                                <div class="input-field col s2">
                                    <p class="text-sm mb-0 text-capitalize">Producto:</p>
                                </div>
                                <div class="input-field col s4">
                                    <select name="producto" class="form-select">
                                        <option></option>
                                        @foreach($Productos as $Producto) 
                                            <option value="{{$Producto->id}}" > {{$Producto->nombre}} </option> 
                                        @endforeach
                                    </select>

                                </div>
                                <div class="input-field col s2">
                                    <p class="text-sm mb-0 text-capitalize">Cantidad:</p>
                                </div>
                                <div class="input-field col s4">    
                                    <input name="cantidad" type="number" min='0' class="validate">
                                </div>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Vender</button>
                            @if($errors->any())
                                <p style="color: red;">Debe completar el formulario para poder registrar.</p>
                            @endif
                            @if(isset($error))
                                <p style="color: red;">{{$error}}</p>
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
                                                # Venta
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Producto
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Cantidad Vendida
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Stock
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Precio Unidad
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$Ventas->isEmpty())
                                        @foreach($Ventas as $Venta)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$Venta->id}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$Venta->nombre}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$Venta->cantidad}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$Venta->stock}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">$ {{$Venta->precio}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">$ {{$Venta->total}}</h6>
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
