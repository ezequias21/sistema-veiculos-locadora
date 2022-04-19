@extends('admin.master.master')

@section('content')
    <div class="">
        <!-- top tiles -->
        <div class="page-title">
            <div class="title_left">
                <h3>Atualizar cliente</h3>
            </div>

            <div class="title_right pull-right">
                <div class="col-md-6 col-sm-6 pull-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="justify-content: flex-end; background: inherit;">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Atualizar cliente</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>


        @if (session()->exists('message'))
            @message(['color' => session()->get('color'), 'icon' => session()->get('icon')])
            {{ session()->get('message') }}
            @endmessage
        @endif

        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-user-plus"></i> Cadastro</h2>
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

                <form action="{{ route('admin.users.update', ['user' => $user->id ]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs justify-content-end bar_tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#main_data" role="tab"
                                aria-controls="main data" aria-selected="true">Dados principais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contracts" role="tab"
                                aria-controls="contracts" aria-selected="false">Veículos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#administrative" role="tab"
                                aria-controls="administrative" aria-selected="false">Administrativo</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                       

                        <div class="tab-pane fade show active" id="main_data" role="tabpanel" aria-labelledby="home-tab">


                            <div class="well mt-3" style="overflow: auto">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="lessor"
                                                    {{ old('lessor') == 'on' || old('lessor') == true ? 'checked' : ($user->lessor == 1 ? 'checked' : '') }}>
                                                Locador
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="lessee"
                                                    {{ old('lessee') == 'on' || old('lessee') == true ? 'checked' : ($user->lessee == 1 ? 'checked' : '') }}>
                                                Locatário
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="fullname">Nome:</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') ?? $user->name }}" required />
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="fullname">Gênero:</label>
                                    <select id="genre" class="form-control" name="genre" value="{{ old('genre') }}"
                                        required>
                                        <option value="male"
                                            {{ old('genre') == 'male' ? 'selected' : ($user->genre == 'male' ? 'selected' : '') }}>
                                            Masculino
                                        </option>
                                        <option value="female"
                                            {{ old('genre') == 'female' ? 'selected' : ($user->genre == 'female' ? 'selected' : '') }}>
                                            Feminino
                                        </option>
                                        <option value="other"
                                            {{ old('genre') == 'other' ? 'selected' : ($user->genre == 'other' ? 'selected' : '') }}>
                                            Outros
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="fullname">CPF:</label>
                                    <input type="text" id="document" class="form-control mask-doc" name="document"
                                        value="{{ old('document') ?? $user->document }}" required />
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <label for="fullname">Orgão Expedidor:</label>
                                    <input type="text" id="document_complementary" class="form-control"
                                        name="document_secondary_complement"
                                        value="{{ old('document_secondary_complement') ?? $user->document_secondary_complement }}"
                                        required />
                                </div>


                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="fullname">RG:</label>
                                    <input type="text" id="document_secondary" class="form-control"
                                        name="document_secondary"
                                        value="{{ old('document_secondary') ?? $user->document_secondary }}" required />
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="fullname">Data de Nascimento:</label>
                                    <input type="text" id="date_of_birth" class="form-control mask-date" name="date_of_birth"
                                        value="{{ old('date_of_birth') ?? $user->date_of_birth }}" required />
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="fullname">Estado Civil:</label>
                                    <select id="civil_status" class="form-control" name="civil_status" required>
                                        <option value="married"
                                            {{ old('civil_status') == 'married' ? 'selected' : ($user->married ? 'selected' : '') }}>
                                            Casado</option>
                                        <option value="separated"
                                            {{ old('civil_status') == 'separated' ? 'selected' : ($user->separated ? 'selected' : '') }}>
                                            Separado
                                        </option>
                                        <option value="single"
                                            {{ old('civil_status') == 'single' ? 'selected' : ($user->single ? 'selected' : '') }}>
                                            Solteiro</option>
                                        <option value="divorced"
                                            {{ old('civil_status') == 'divorced' ? 'selected' : ($user->divorced ? 'selected' : '') }}>
                                            Divorciado
                                        </option>
                                        <option value="widower"
                                            {{ old('civil_status') == 'widower' ? 'selected' : ($user->widower ? 'selected' : '') }}>
                                            Viúvo</option>
                                    </select>
                                </div>




                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="driver_license">CNH:</label>
                                    <input type="text" id="driver_license" class="form-control mask-driver-license" name="driver_license"
                                        value="{{ old('driver_license') ?? $user->driver_license }}" required />
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="cover">Foto: </label>
                                    <input type="file" class="form-control-file" id="cover" name="cover">
                                </div>
                            </div>











                            <div class="app_collapse active mt-3">

                                <div class="app_collapse_header">
                                    <span>Renda</span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="content">

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="fullname">Profissão:</label>
                                                    <input type="text" id="occupation" class="form-control"
                                                        name="occupation"
                                                        value="{{ old('occupation') ?? $user->occupation }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="fullname">Renda:</label>
                                                    <input type="text" id="income" class="form-control mask-money" name="income"
                                                        value="{{ old('income') ?? $user->income }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fullname">Empresa:</label>
                                            <input type="text" id="company" class="form-control" name="company"
                                                value="{{ old('company') ?? $user->company }}" required />
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="app_collapse active mt-2">

                                <div class="app_collapse_header">
                                    <span>Endereço</span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="zip">CEP:</label>
                                                    <input type="text" id="zip" class="form-control mask-zipcode" name="zip"
                                                        value="{{ old('zip') ?? $user->zip }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-12">
                                                <div class="form-group">
                                                    <label for="street">Endereço:</label>
                                                    <input type="text" id="street" class="form-control" name="street"
                                                        value="{{ old('street') ?? $user->street }}" required />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-sm-12">
                                                <div class="form-group">
                                                    <label for="number">Número:</label>
                                                    <input type="text" id="number" class="form-control" name="number"
                                                        value="{{ old('number') ?? $user->number }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="complement">Complemento:</label>
                                                    <input type="text" id="complement" class="form-control"
                                                        name="complement"
                                                        value="{{ old('complement') ?? $user->complement }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="district">Bairro:</label>
                                                    <input type="text" id="district" class="form-control" name="district"
                                                        value="{{ old('district') ?? $user->district }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="state">Estado:</label>
                                                    <input type="text" id="state" class="form-control" name="state"
                                                        value="{{ old('state') ?? $user->state }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="city">Cidade:</label>
                                                    <input type="text" id="city" class="form-control" name="city"
                                                        value="{{ old('city') ?? $user->city }}" required />
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>



                            <div class="app_collapse active mt-2">

                                <div class="app_collapse_header">
                                    <span>Contato</span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="fullname">Residencial:</label>
                                                    <input type="text" id="telephone" class="form-control mask-phone"
                                                        name="telephone" placeholder="Número do telefone com DDD"
                                                        value="{{ old('telephone') ?? $user->telephone }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="cell">Celular:</label>
                                                    <input type="text" id="cell" class="form-control mask-cell" name="cell"
                                                        placeholder="Número do celular com DDD"
                                                        value="{{ old('cell') ?? $user->cell }}" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse active mt-2">

                                <div class="app_collapse_header">
                                    <span>Acesso</span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="text" id="email" class="form-control" name="email"
                                                        value="{{ old('email') ?? $user->email }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="password">Senha:</label>
                                                    <input type="password" id="password" class="form-control"
                                                        name="password" value='' />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="tab-pane fade" id="contracts" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="app_collapse mt-2 active">

                                <div class="app_collapse_header">
                                    <span>Locador</span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="content">
                                        @if ($user->vehicles()->get())
                                            @foreach ($user->vehicles()->get() as $vehicle)
       
                                                <div class="mb-3"  style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                                    <div class="x_panel mb-0" style="border: 0">
                                                        <div class="x_content">
                                                            <div class="row">
                                                                <div class="col-md-5 col-sm-12">
                                                                    <img class="img-fluid" style="border-radius: 3px"
                                                                        src="https://quatrorodas.abril.com.br/wp-content/uploads/2021/05/Chevrolet-S10-High-Country-2022-6-e1620926953624.jpg?quality=70&strip=info"
                                                                        alt="">
                                                                </div>
                                                                <div class="col-md-7 col-sm-12">
                                                                    <h3 class="mb-2">{{ $vehicle->category()->select('name')->first()->name}} 
                                                                        <small> {{ $vehicle->model()->select('name')->first()->name }} 1.3</small>
                                                                    </h3>
                                                                    <div class="border mb-4"></div>
                                                                    <div class="cards-container">

                                                                        <div class="card-car "></i>
                                                                            <div class="card-car-icon"><i
                                                                                    class="fa fa-car"></i></div>
                                                                            <div class="card-car-body">Ar condicionado
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-car"></i>
                                                                            <div class="card-car-icon"><i
                                                                                    class="fa fa-car"></i></div>
                                                                            <div class="card-car-body">Direção hidráulica
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-car"></i>
                                                                            <div class="card-car-icon"><i
                                                                                    class="fa fa-car"></i></div>
                                                                            <div class="card-car-body">Control. de
                                                                                Estabilidade e
                                                                                tração</div>
                                                                        </div>
                                                                        <div class="card-car"></i>
                                                                            <div class="card-car-icon"><i
                                                                                    class="fa fa-car"></i></div>
                                                                            <div class="card-car-body">Frenagem automática
                                                                                de
                                                                                emergência</div>
                                                                        </div>
                                                                        <div class="card-car"></i>
                                                                            <div class="card-car-icon"><i
                                                                                    class="fa fa-car"></i></div>
                                                                            <div class="card-car-body">Vidro elétrico
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="d-flex justify-content-end pt-2 pr-3 pb-1"
                                                        style="background: #F5F7FA;border-top: 1px solid #E6E9ED ">
                                                        <button class="btn btn-success float-right"><i
                                                                class="fa fa-eye"></i>
                                                            Ver veículo</button>
                                                        <button class="btn btn-success float-right"><i
                                                                class="fa fa-edit"></i>
                                                            Editar
                                                            veículo</button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                            <div class="x_panel mb-0" style="border: 0">
                                                <div class="x_content">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-12">
                                                            <img class="img-fluid" style="border-radius: 3px"
                                                                src="https://quatrorodas.abril.com.br/wp-content/uploads/2021/05/Chevrolet-S10-High-Country-2022-6-e1620926953624.jpg?quality=70&strip=info"
                                                                alt="">
                                                        </div>
                                                        <div class="col-md-7 col-sm-12">
                                                            <h3 class="mb-2">Suliv <small>Fiat Cronus 1.3</small>
                                                            </h3>
                                                            <div class="border mb-4"></div>
                                                            <div class="cards-container">

                                                                <div class="card-car "></i>
                                                                    <div class="card-car-icon"><i
                                                                            class="fa fa-car"></i></div>
                                                                    <div class="card-car-body">Ar condicionado</div>
                                                                </div>
                                                                <div class="card-car"></i>
                                                                    <div class="card-car-icon"><i
                                                                            class="fa fa-car"></i></div>
                                                                    <div class="card-car-body">Direção hidráulica</div>
                                                                </div>
                                                                <div class="card-car"></i>
                                                                    <div class="card-car-icon"><i
                                                                            class="fa fa-car"></i></div>
                                                                    <div class="card-car-body">Control. de Estabilidade e
                                                                        tração</div>
                                                                </div>
                                                                <div class="card-car"></i>
                                                                    <div class="card-car-icon"><i
                                                                            class="fa fa-car"></i></div>
                                                                    <div class="card-car-body">Frenagem automática de
                                                                        emergência</div>
                                                                </div>
                                                                <div class="card-car"></i>
                                                                    <div class="card-car-icon"><i
                                                                            class="fa fa-car"></i></div>
                                                                    <div class="card-car-body">Vidro elétrico</div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-end pt-2 pr-3 pb-1"
                                                style="background: #F5F7FA;border-top: 1px solid #E6E9ED ">
                                                <button class="btn btn-success float-right"><i class="fa fa-eye"></i>
                                                    Ver veículo</button>
                                                <button class="btn btn-success float-right"><i class="fa fa-edit"></i>
                                                    Editar
                                                    veículo</button>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="administrative" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="well mt-3" style="overflow: auto">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="admin"
                                                    {{ old('admin') == 'on' || old('admin') == true ? 'checked' : ($user->admin == 1 ? 'checked' : '') }}>
                                                Administrador
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="client"
                                                    {{ old('client') == 'on' || old('client') == true ? 'checked' : ($user->client == 1? 'checked' : '') }}>
                                                Cliente
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>
                    <div>
                        <button class="btn btn-success float-right" type="submit"><i
                                class="fa fa-check-square-o mr-2"></i>Salvar alterações</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
