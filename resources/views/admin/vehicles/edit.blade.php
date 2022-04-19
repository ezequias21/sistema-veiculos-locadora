@extends('admin.master.master')

@section('content')
    <div class="">
        <!-- top tiles -->
        <div class="page-title">
            <div class="title_left">
                <h3>Atualizar veículo</h3>
            </div>

            <div class="title_right pull-right">
                <div class="col-md-6 col-sm-6 pull-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="justify-content: flex-end; background: inherit;">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.vehicles.index') }}">Veículos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Atualizar veículo</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>

        @if ($errors->any())
            @messageList
            @foreach ($errors->all() as $error)
                <li class="p-1">{{ $error }}</li>
            @endforeach
            @endmessageList
        @endif

        @if (session()->exists('message'))
            @message(['color' => session()->get('color'), 'icon' => session()->get('icon')])
            {{ session()->get('message') }}
            @endmessage
        @endif

        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa-solid fa-car"></i> Editar</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <form action="{{ route('admin.vehicles.update', ['vehicle' => $vehicle->id]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <ul class="nav nav-tabs justify-content-end bar_tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#main_data" role="tab"
                                aria-controls="main data" aria-selected="true">Dados principais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="false">Recursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#images" role="tab"
                                aria-controls="images" aria-selected="false">Imagens</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">


                        <div class="tab-pane fade show active" id="main_data" role="tabpanel" aria-labelledby="home-tab">


                            <div class="row">


                                <div class="form-group  mt-3 col-md-12">
                                    <label for="fullname">Proprietário:</label>
                                    <select id="user" class="form-control" name="user" required>

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ ($user->id === $vehicle->user ? 'selected' : '') }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="fullname">N° RENAVAM:</label>
                                    <input type="text" id="renavam" class="form-control mask-renavam" name="renavam"
                                        value="{{ old('renavam') ?? $vehicle->renavam }}" required />
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="fullname">Placa:</label>
                                    <input type="text" id="license_plate" class="form-control mask-license-plate" name="license_plate"
                                        value="{{ old('license_plate') ?? $vehicle->license_plate }}" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="brand">Marca:</label>
                                    <select id="brand" class="form-control" name="brand" required>
                                         @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id === $vehicle->brand ? 'selected' : ''}}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>





                                <div class="form-group col-md-5 col-sm-12">
                                    <label for="model">Modelo:</label>
                                    <select id="model" class="form-control" name="model" required>
                                         @foreach($model_cars as $model_car)
                                            <option value="{{ $model_car->id }}" {{ $model_car->id === $vehicle->model ? 'selected' : ''}}>{{ $model_car->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-sm-12">
                                    <label for="category">Categoria:</label>
                                    <select id="category" class="form-control" name="category" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id === $vehicle->category ? 'selected' : ''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-2 col-sm-12">
                                    <label for="color">Cor:</label>
                                    <input type="text" id="color" class="form-control" name="color"
                                        value="{{ old('color') ?? $vehicle->color }}" required />
                                </div>
                                <div class="form-group col-md-5 col-sm-12">
                                    <label for="status">Status:</label>
                                    <select id="status" class="form-control" name="status" required>
                                        <option value="available" {{ (old('available') == 'available' ? 'selected' : ($vehicle->status == 'available' ? 'selected' : '')) }}>Disponível</option>
                                        <option value="unavailable" {{ (old('unavailable') == 'unavailable' ? 'selected' : ($vehicle->status == 'unavailable' ? 'selected' : '')) }}>Indisponível</option>
                                        <option value="rented" {{ (old('rented') == 'rented' ? 'selected' : ($vehicle->status == 'rented' ? 'selected' : '')) }}>Alugado</option>
                                        <option value="sold" {{ (old('sold') == 'sold' ? 'selected' : ($vehicle->status == 'sold' ? 'selected' : '')) }}>Vendido</option>
                                    </select>
                                </div>

                                <div class="app_collapse active mt-3">

                                    <div class="app_collapse_header">
                                        <span>Precificação</span>
                                    </div>

                                    <div class="app_collapse_content">
                                        <div class="content">

                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="sale_price">Valor de venda:</label>
                                                        <input type="text" id="sale_price" class="form-control mask-money"
                                                            name="sale_price" value="{{ old('sale_price') ?? $vehicle->sale_price }}" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="rental_price">Valor de alocação:</label>
                                                        <input type="text" id="rental_price mask-money" class="form-control"
                                                            name="rental_price" value="{{ old('rental_price') ?? $vehicle->rental_price }}"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="app_collapse mt-2">

                                    <div class="app_collapse_header">
                                        <span>Descrição</span>
                                    </div>

                                    <div class="app_collapse_content">
                                        <div class="content">


                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                        <div class="tab-pane fade show" id="details" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="well mt-3" style="overflow: auto">
                                <div class="row">

                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="native_wifi"
                                                    {{ old('native_wifi') == 'on' || old('native_wifi') == true ? 'checked' : ($vehicle->native_wifi == 1 ? 'checked' : '') }}>
                                                Wifi-nativo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat"
                                                    name="emergency_branking_system"
                                                    {{ old('emergency_branking_system') == 'on' || old('emergency_branking_system') == true ? 'checked' : ($vehicle->emergency_branking_system == 1 ? 'checked' : '') }}>
                                                Frenagem automática de mergência
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="easy_park"
                                                    {{ old('easy_park') == 'on' || old('easy_park') == true ? 'checked' : ($vehicle->easy_park == 1 ? 'checked' : '') }}>
                                                easy-park
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="sunroof"
                                                    {{ old('sunroof') == 'on' || old('sunroof') == true ? 'checked' : ($vehicle->sunroof == 1 ? 'checked' : '') }}>
                                                teto solar
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="reversing_camera"
                                                    {{ old('reversing_camera') == 'on' || old('reversing_camera') == true ? 'checked' : ($vehicle->reversing_camera == 1 ? 'checked' : '') }}>
                                                camêra de ré
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat"
                                                    name="stability_and_traction_system"
                                                    {{ old('stability_and_traction_system') == 'on' || old('stability_and_traction_system') == true? 'checked': ($vehicle->stability_and_traction_system == 1 ? 'checked' : '') }}>
                                                Controle de estabilidade e tração
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="remote_start"
                                                    {{ old('remote_start') == 'on' || old('remote_start') == true ? 'checked' : ($vehicle->remote_start == 1 ? 'checked' : '') }}>
                                                Sistema de partida remota
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="air_bag"
                                                    {{ old('air_bag') == 'on' || old('air_bag') == true ? 'checked' : ($vehicle->air_bag == 1 ? 'checked' : '') }}>
                                                air bag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="eletric_windowscreen"
                                                    {{ old('eletric_windowscreen') == 'on' || old('eletric_windowscreen') == true ? 'checked' : ($vehicle->eletric_windowscreen == 1 ? 'checked' : '') }}>
                                                Vidro elétrico
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="air_conditioner"
                                                    {{ old('air_conditioner') == 'on' || old('air_conditioner') == true ? 'checked' : ($vehicle->air_conditioner == 1 ? 'checked' : '') }}>
                                                Ar condicionado
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="eletric_lock"
                                                    {{ old('eletric_lock') == 'on' || old('eletric_lock') == true ? 'checked' : ($vehicle->eletric_lock == 1 ? 'checked' : '') }}>
                                                Trava elétrica
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="hydraulic_steering"
                                                    {{ old('hydraulic_steering') == 'on' || old('hydraulic_steering') == true ? 'checked' : ($vehicle->hydraulic_steering == 1 ? 'checked' : '') }}>
                                                Direção hidráulica
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="abs"
                                                    {{ old('abs') == 'on' || old('abs') == true ? 'checked' : ($vehicle->abs == 1 ? 'checked' : '') }}>
                                                ABS
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="images" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="form-group">
                                <label class="label-from-control">Imagens</label>
                                <input type="file" class="form-control-file" name="files[]" multiple>
                            </div>
                            <div class="content_image"></div>

                            <div class="content_image">
                                @foreach($vehicle->images()->get() as $image)
                                <div class="image_item">
                                    <img class="img-fluid" src="{{ $image->url_cropped }}" alt="">
                                    <div class="property_image_actions">
                                        <a href="javascript:void(0)"
                                           class="btn btn-small {{ ($image->cover == true ? 'btn-green' : '') }} icon-check icon-notext image-set-cover"
                                           data-action=""></a>
                                        <a href="javascript:void(0)"
                                           class="btn btn-red btn-small icon-times icon-notext image-remove"
                                           data-action=""></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success float-right" type="submit"><i
                                    class="fa fa-check-square-o mr-2"></i>Atualizar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('input[name="files[]"]').change(function(files) {

                $('.content_image').text('');

                $.each(files.target.files, function(key, value) {
                    var reader = new FileReader();
                    reader.onload = function(value) {
                        $('.content_image').append(
                            '<div class="image_item">' +
                            '<div class="embed radius" ' +
                            'style="background-image: url(' + value.target.result +
                            '); background-size: cover; background-position: center center;">' +
                            '</div>' +
                            '</div>');
                    };
                    reader.readAsDataURL(value);
                });
            });
        });
    </script>
@endsection
