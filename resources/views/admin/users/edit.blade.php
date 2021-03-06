@extends('admin.master.master')
@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Editar Cliente</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                               class="text-orange">{{ $user->name }}</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="nav">
                @if($errors->all())
                    @foreach($errors->all() as $error)
                        @message(['color' => 'orange'])
                        <p class="icon-asterisk">{{ $error }}</p>
                        @endmessage
                    @endforeach
                @endif
                @if(session()->exists('message'))
                    @message(['color' => session()->get('color')])
                    <p class="icon-asterisk">{{ session()->get('message') }}</p>
                    @endmessage
                @endif

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#complementary" class="nav_tabs_item_link">Dados Complementares</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#realties" class="nav_tabs_item_link">Im??veis</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#management" class="nav_tabs_item_link">Administrativo</a>
                    </li>
                </ul>

                <form class="app_form" action="{{ route('admin.users.update' , ['user' => $user->id]) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_gc">
                                <span class="legend">Perfil:</span>
                                <label class="label">
                                    <input type="checkbox"
                                           name="lessor" {{ (old('lessor') == 'on' || old('lessor') == true ? 'checked' : ($user->lessor == true ? 'checked' : '')) }}><span>Locat??rio</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox"
                                           name="lessee" {{ (old('lessee') == 'on' || old('lessee') == true ? 'checked' : ($user->lessee == true ? 'checked' : '')) }}><span>Locador</span>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Nome:</span>
                                <input type="text" name="name" placeholder="Nome Completo"
                                       value="{{ old('name') ?? $user->name }}"/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Genero:</span>
                                    <select name="genre">
                                        <option
                                            value="male" {{ (old('genre') == 'male' ? 'selected' : ($user->genre == 'male' ? 'selected' : '')) }}>
                                            Masculino
                                        </option>
                                        <option
                                            value="female" {{ (old('genre') == 'female' ? 'selected' : ($user->genre == 'female' ? 'selected' : '')) }}>
                                            Feminino
                                        </option>
                                        <option
                                            value="other" {{ (old('genre') == 'other' ? 'selected' : ($user->genre == 'other' ? 'selected' : '')) }}>
                                            Outros
                                        </option>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">*CPF:</span>
                                    <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                           value="{{ old('document') ?? $user->document }}"/>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*RG:</span>
                                    <input type="text" name="document_secondary" placeholder="RG do Cliente"
                                           value="{{ old('document_secondary') ?? $user->document_secondary }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">??rg??o Expedidor:</span>
                                    <input type="text" name="document_secondary_complement" placeholder="Expedi????o"
                                           value="{{ old('document_secondary_complement') ?? $user->document_secondary_complement }}"/>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Data de Nascimento:</span>
                                    <input type="tel" name="date_of_birth" class="mask-date"
                                           placeholder="Data de Nascimento"
                                           value="{{ old('date_of_birth') ?? $user->date_of_birth }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">*Naturalidade:</span>
                                    <input type="text" name="place_of_birth" placeholder="Cidade de Nascimento"
                                           value="{{ old('place_of_birth') ?? $user->place_of_birth }}"/>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Estado Civil:</span>
                                    <select name="civil_status">
                                        <optgroup label="C??njuge Obrigat??rio">
                                            <option
                                                value="married" {{ (old('civil_status') == 'married' ? 'selected' : ($user->civil_status == 'married' ? 'selected' : '')) }}>
                                                Casado
                                            </option>
                                            <option
                                                value="separated" {{ (old('civil_status') == 'separated' ? 'selected' : ($user->civil_status == 'separated' ? 'selected' : '')) }}>
                                                Separado
                                            </option>
                                        </optgroup>
                                        <optgroup label="C??njuge n??o Obrigat??rio">
                                            <option
                                                value="single" {{ (old('civil_status') == 'single' ? 'selected' : ($user->civil_status == 'single' ? 'selected' : '')) }}>
                                                Solteiro
                                            </option>
                                            <option
                                                value="divorced" {{ (old('civil_status') == 'divorced' ? 'selected' : ($user->civil_status == 'divorced' ? 'selected' : '')) }}>
                                                Divorciado
                                            </option>
                                            <option
                                                value="widower" {{ (old('civil_status') == 'widower' ? 'selected' : ($user->civil_status == 'widower' ? 'selected' : '')) }}>
                                                Vi??vo
                                            </option>
                                        </optgroup>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">Foto</span>
                                    <input type="file" name="cover">
                                </label>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Renda</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Profiss??o:</span>
                                            <input type="text" name="occupation" placeholder="Profiss??o do Cliente"
                                                   value="{{ old('occupation') ?? $user->occupation }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Renda:</span>
                                            <input type="tel" name="income" class="mask-money"
                                                   placeholder="Valores em Reais"
                                                   value="{{ old('income') ?? $user->income }}"/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Empresa:</span>
                                        <input type="text" name="company_work" placeholder="Contratante"
                                               value="{{ old('company_work') ?? $user->company_work }}"/>
                                    </label>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Endere??o</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*CEP:</span>
                                            <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                                   placeholder="Digite o CEP"
                                                   value="{{ old('zipcode') ?? $user->zipcode }}"/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Endere??o:</span>
                                        <input type="text" name="street" class="street"
                                               placeholder="Endere??o Completo"
                                               value="{{ old('street') ?? $user->street }}"/>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*N??mero:</span>
                                            <input type="text" name="number" placeholder="N??mero do Endere??o"
                                                   value="{{ old('number') ?? $user->number }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                   value="{{ old('complement') ?? $user->complement }}"/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood"
                                               placeholder="Bairro"
                                               value="{{ old('neighborhood') ?? $user->neighborhood }}"/>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                   value="{{ old('state') ?? $user->state }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                   value="{{ old('city') ?? $user->city }}"/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Contato</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Residencial:</span>
                                            <input type="tel" name="telephone" class="mask-phone"
                                                   placeholder="N??mero do Telefonce com DDD"
                                                   value="{{ old('telephone') ?? $user->telephone }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Celular:</span>
                                            <input type="tel" name="cell" class="mask-cell"
                                                   placeholder="N??mero do Telefonce com DDD"
                                                   value="{{ old('cell') ?? $user->cell }}"/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Acesso</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*E-mail:</span>
                                            <input type="email" name="email" placeholder="Melhor e-mail"
                                                   value="{{ old('email') ?? $user->email }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Senha:</span>
                                            <input type="password" name="password" placeholder="Senha de acesso"
                                                   value=""/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="complementary" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>C??njuge</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none content_spouse">

                                    <label class="label">
                                        <span class="legend">Tipo de Comunh??o:</span>
                                        <select name="type_of_communion" class="select2">
                                            <option
                                                value="Comunh??o Universal de Ben" {{ (old('type_of_communion') == 'Comunh??o Universal de Ben' ? 'selected' : ($user->type_of_communion == 'Comunh??o Universal de Ben' ? 'selected' : '')) }}>
                                                Comunh??o Universal de Bens
                                            </option>
                                            <option
                                                value="Comunh??o Parcial de Bens" {{ (old('type_of_communion') == 'Comunh??o Parcial de Bens' ? 'selected' : ($user->type_of_communion == 'Comunh??o Parcial de Bens' ? 'selected' : '')) }}>
                                                Comunh??o Parcial de Bens
                                            </option>
                                            <option
                                                value="Separa????o Total de Bens" {{ (old('type_of_communion') == 'Separa????o Total de Bens' ? 'selected' : ($user->type_of_communion == 'Separa????o Total de Bens' ? 'selected' : '')) }}>
                                                Separa????o Total de Bens
                                            </option>
                                            <option
                                                value="Participa????o Final de Aquestos" {{ (old('type_of_communion') == 'Participa????o Final de Aquestos' ? 'selected' : ($user->type_of_communion == 'Participa????o Final de Aquestos' ? 'selected' : '')) }}>
                                                Participa????o Final de Aquestos
                                            </option>
                                        </select>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Nome:</span>
                                        <input type="text" name="spouse_name" placeholder="Nome do C??njuge"
                                               value="{{ old('spouse_name') ?? $user->spouse_name }}"/>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Genero:</span>
                                            <select name="spouse_genre">
                                                <option
                                                    value="male" {{ (old('spouse_genre') == 'male' ? 'selected' : ($user->spouse_genre == 'male' ? 'selected' : '')) }}>
                                                    Masculino
                                                </option>
                                                <option
                                                    value="female" {{ (old('spouse_genre') == 'female' ? 'selected' : ($user->spouse_genre == 'female' ? 'selected' : '')) }}>
                                                    Feminino
                                                </option>
                                                <option
                                                    value="other" {{ (old('spouse_genre') == 'other' ? 'selected' : ($user->spouse_genre == 'other' ? 'selected' : '')) }}>
                                                    Outros
                                                </option>
                                            </select>
                                        </label>

                                        <label class="label">
                                            <span class="legend">CPF:</span>
                                            <input type="text" class="mask-doc" name="spouse_document"
                                                   placeholder="CPF do Cliente"
                                                   value="{{ old('spouse_document') ?? $user->spouse_document }}"/>
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">RG:</span>
                                            <input type="text" name="spouse_document_secondary"
                                                   placeholder="RG do Cliente"
                                                   value="{{ old('spouse_document_secondary') ?? $user->spouse_document_secondary }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">??rg??o Expedidor:</span>
                                            <input type="text" name="spouse_document_secondary_complement"
                                                   placeholder="Expedi????o"
                                                   value="{{ old('spouse_document_secondary_complement') ?? $user->spouse_document_secondary_complement }}"/>
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Data de Nascimento:</span>
                                            <input type="tel" class="mask-date" name="spouse_date_of_birth"
                                                   placeholder="Data de Nascimento"
                                                   value="{{ old('spouse_date_of_birth') ?? $user->spouse_date_of_birth }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Naturalidade:</span>
                                            <input type="text" name="spouse_place_of_birth"
                                                   placeholder="Cidade de Nascimento"
                                                   value="{{ old('spouse_place_of_birth') ?? $user->spouse_place_of_birth }}"/>
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Profiss??o:</span>
                                            <input type="text" name="spouse_occupation"
                                                   placeholder="Profiss??o do Cliente"
                                                   value="{{ old('spouse_occupation') ?? $user->spouse_occupation }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Renda:</span>
                                            <input type="text" class="mask-money" name="spouse_income"
                                                   placeholder="Valores em Reais"
                                                   value="{{ old('spouse_income') ?? $user->spouse_income }}"/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">Empresa:</span>
                                        <input type="text" name="spouse_company_work" placeholder="Contratante"
                                               value="{{ old('spouse_company_work') ?? $user->spouse_company_work }}"/>
                                    </label>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Empresa</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">

                                    <div class="companies_list">
                                        <div class="no-content mb-2">N??o foram encontrados registros!</div>

                                        <div class="companies_list_item mb-2">
                                            <p><b>Raz??o Social:</b> UpInside Treinamentos LTDA</p>
                                            <p><b>Nome Fantasia:</b> UpInside Treinamentos</p>
                                            <p><b>CNPJ:</b> 12.3456.789/0001-12 - <b>Inscri????o Estadual:</b>1231423421
                                            </p>
                                            <p><b>Endere??o:</b> Rodovia Dr. Ant??nio Luiz de Moura Gonzaga, 3339 Bloco A
                                                Sala
                                                208</p>
                                            <p><b>CEP:</b> 88048-301 <b>Bairro:</b> Campeche <b>Cidade/Estado:</b>
                                                Florian??polis/SC</p>
                                        </div>
                                    </div>

                                    <p class="text-right">
                                        <a href="javascript:void(0)" class="btn btn-green btn-disabled icon-building-o">Cadastrar
                                            Nova Empresa</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="realties" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Locador</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div id="realties">
                                        <div class="realty_list">
                                            <div class="realty_list_item mb-1">
                                                <div class="realty_list_item_actions_stats">
                                                    <img src="assets/images/realty.jpeg" alt="">
                                                    <ul>
                                                        <li>Venda: R$ 450.000,00</li>
                                                        <li>Aluguel: R$ 2.000,00</li>
                                                    </ul>
                                                </div>

                                                <div class="realty_list_item_content">
                                                    <h4>Casa Residencial - Campeche</h4>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-location"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span
                                                                class="realty_list_item_description_title">Bairro:</span>
                                                            <span
                                                                class="realty_list_item_description_content">Campeche</span>
                                                        </div>
                                                    </div>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-util-area"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span
                                                                class="realty_list_item_description_title">??rea ??til:</span>
                                                            <span class="realty_list_item_description_content">150m&sup2;</span>
                                                        </div>
                                                    </div>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-bed"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span
                                                                class="realty_list_item_description_title">Domit??rios:</span>
                                                            <span class="realty_list_item_description_content">4 Quartos<br><span>Sendo 2 su??tes</span></span>
                                                        </div>
                                                    </div>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-garage"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span
                                                                class="realty_list_item_description_title">Garagem:</span>
                                                            <span
                                                                class="realty_list_item_description_content">4 Vagas<br><span>Sendo 2 cobertas</span></span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="realty_list_item_actions">
                                                    <ul>
                                                        <li class="icon-eye">1234 Visualiza????es</li>
                                                    </ul>
                                                    <div>
                                                        <a href="" class="btn btn-blue icon-eye">Visualizar Im??vel</a>
                                                        <a href="" class="btn btn-green icon-pencil-square-o">Editar
                                                            Im??vel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="no-content">N??o foram encontrados registros!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-3">
                                <div class="app_collapse_header collapse">
                                    <h3>Locat??rio</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div id="realties">
                                        <div class="no-content">N??o foram encontrados registros!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="management" class="d-none">
                            <div class="label_gc">
                                <span class="legend">Conceder:</span>
                                <label class="label">
                                    <input type="checkbox"
                                           name="admin" {{ (old('admin') == 'on' || old('admin') == true ? 'checked' : ($user->admin == true ? 'checked' : '')) }}><span>Administrativo</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox"
                                           name="client" {{ (old('client') == 'on' || old('client') == true ? 'checked' : ($user->client == true ? 'checked' : '')) }}><span>Cliente</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Altera????es
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
