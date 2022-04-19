@extends('admin.master.master')

@section('content')
    <div class="">
        <!-- top tiles -->
        <div class="page-title">
            <div class="title_left">
                <h3>Novo veículo</h3>
            </div>

            <div class="title_right pull-right">
                <div class="col-md-6 col-sm-6 pull-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="justify-content: flex-end; background: inherit;">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Veículos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Novo veículo</li>
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
                <h2><i class="fa-solid fa-car"></i> Cadastro</h2>
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

                <form action="{{ route('admin.vehicles.store') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    <ul class="nav nav-tabs justify-content-end bar_tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#main_data" role="tab"
                                aria-controls="main data" aria-selected="true">Dados principais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="false">Detalhes</a>
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
                                        <option value="1">José das melancias</option>
                                        <option value="2">Val do bloco</option>
                                        <option value="3">Geraldo</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="fullname">N° RENAVAM:</label>
                                    <input type="text" id="renavam" class="form-control mask-renavam" name="renavam"
                                        value="{{ old('renavam') }}" required />
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="fullname">Placa:</label>
                                    <input type="text" id="license_plate" class="form-control mask-license-plate" name="license_plate"
                                        value="{{ old('license_plate') }}" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="brand">Marca:</label>
                                    <select id="brand" class="form-control" name="brand" required>
                                        <option value="1">Volkswagen</option>
                                        <option value="2">Chevrolet</option>
                                        <option value="3">Audi</option>
                                        <option value="4">Seat</option>
                                    </select>
                                </div>





                                <div class="form-group col-md-5 col-sm-12">
                                    <label for="model">Modelo:</label>
                                    <select id="model" class="form-control" name="model" required>
                                        <option value="1">Onix</option>
                                        <option value="2">Onix Plus</option>
                                        <option value="3">Cruze</option>
                                        <option value="4">Cruze Sport6 RS</option>
                                        <option value="5">Spin</option>
                                        <option value="6">Spin Active</option>
                                        <option value="7">Tracker</option>
                                        <option value="8">Equinox</option>
                                        <option value="9">TrailBlazer</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-sm-12">
                                    <label for="category">Categoria:</label>
                                    <select id="category" class="form-control" name="category" required>
                                        <option value="0">Aventureiro compacto</option>
                                        <option value="1">Hatch subcompacto</option>
                                        <option value="2">Hatch compacto</option>
                                        <option value="3">Hatch médio</option>
                                        <option value="4">Sedã compacto</option>
                                        <option value="5">Sedã médio</option>
                                        <option value="6">Sedã grande</option>
                                        <option value="7">Familiar compacto</option>
                                        <option value="8">Familiar médio</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-2 col-sm-12">
                                    <label for="color">Cor:</label>
                                    <input type="text" id="color" class="form-control" name="color"
                                        value="{{ old('color') }}" required />
                                </div>
                                <div class="form-group col-md-5 col-sm-12">
                                    <label for="status">Status:</label>
                                    <select id="status" class="form-control" name="status" required>
                                        <option value="available">Disponível</option>
                                        <option value="unavailable">Indisponível</option>
                                        <option value="rented">Alugado</option>
                                        <option value="sold">Vendido</option>
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
                                                            name="sale_price" value="{{ old('sale_price') }}" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="rental_price">Valor de alocação:</label>
                                                        <input type="text" id="rental_price" class="form-control mask-money"
                                                            name="rental_price" value="{{ old('rental_price') }}" required />
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
                                                    {{ old('native_wifi') == 'on' || old('native_wifi') == true ? 'checked' : '' }}>
                                                Wifi-nativo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat"
                                                    name="emergency_branking_system"
                                                    {{ old('emergency_branking_system') == 'on' || old('emergency_branking_system') == true ? 'checked' : '' }}>
                                                Frenagem automática de mergência
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="easy_park"
                                                    {{ old('easy_park') == 'on' || old('easy_park') == true ? 'checked' : '' }}>
                                                easy-park
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="sunroof"
                                                    {{ old('sunroof') == 'on' || old('sunroof') == true ? 'checked' : '' }}>
                                                teto solar
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="reversing_camera"
                                                    {{ old('reversing_camera') == 'on' || old('reversing_camera') == true ? 'checked' : '' }}>
                                                camêra de ré
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat"
                                                    name="stability_and_traction_system"
                                                    {{ old('stability_and_traction_system') == 'on' || old('stability_and_traction_system') == true? 'checked': '' }}>
                                                Controle de estabilidade e tração
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="remote_start"
                                                    {{ old('remote_start') == 'on' || old('remote_start') == true ? 'checked' : '' }}>
                                                Sistema de partida remota
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="air_bag"
                                                    {{ old('air_bag') == 'on' || old('air_bag') == true ? 'checked' : '' }}>
                                                air bag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="eletric_windowscreen"
                                                    {{ old('eletric_windowscreen') == 'on' || old('eletric_windowscreen') == true ? 'checked' : '' }}>
                                                Vidro elétrico
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="air_conditioner"
                                                    {{ old('air_conditioner') == 'on' || old('air_conditioner') == true ? 'checked' : '' }}>
                                                Ar condicionado
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="eletric_lock"
                                                    {{ old('eletric_lock') == 'on' || old('eletric_lock') == true ? 'checked' : '' }}>
                                                Trava elétrica
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="hydraulic_steering"
                                                    {{ old('hydraulic_steering') == 'on' || old('hydraulic_steering') == true ? 'checked' : '' }}>
                                                Direção hidráulica
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="abs"
                                                    {{ old('abs') == 'on' || old('abs') == true ? 'checked' : '' }}>
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

                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success float-right" type="submit"><i
                                    class="fa fa-check-square-o mr-2"></i>Cadastrar</button>
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
