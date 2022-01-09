@extends('layouts.salarie.profile')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
<link rel="stylesheet" href="{{ asset('assets/css/keyboard-arabic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/datepiker.css') }}">
<style>
  .diplay-none{
    display: none;
  }
    @media print {
    
    h*{
        font-size: 1.75rem;
    }

    p, span, b,u, li,a{
        font-size: 1.3rem;
    }
   .Printbutton{
        display:none;
    }
    .dont-print{
        display:none;
    }

    .mw{
        width:27cm !important;
        max-width:27cm !important;
    }
 }
 .help-button{
    position: fixed;
    bottom: 20px;
    left: 20px;
    font-size: 45px;
    text-decoration: none !important;
 }
</style>
@endsection

@php
    $types = App\Models\Demande::types();
@endphp

@section('content')
<div class="row">
    {{-- Starting Profile informations --}}

{{-- {{ dd(App\Models\Demande::types()) }} --}}

    <x-salarie.profile.card-component  />
    {{-- Ending Profile informationa --}}

    <div class="col-sm-8 mw">
        @if(session('sucess'))
            <div class="alert alert-success dont-print">
                <b>{{session('sucess')}}</b>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger dont-print">
                <b>{{session('error')}}</b>
            </div>
        @endif
        <div class="element-wrapper">
            <div class="element-box mw" data-step="2" data-intro="Espace reservé aux informations modifiables ...">
              @if (!empty($types))
                <form method="post" action="{{ route('salarie.nouvelle.demande.store') }}" class="mb-5">
                  @csrf
                  <div class="element-info">
                    <div class="element-info-with-icon">
                      <div class="element-info-icon">
                        <div class="os-icon os-icon-wallet-loaded"></div>
                      </div>
                      <div class="element-info-text">
                        <h5 class="element-inner-header">
                          Ouvrire une demande
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="type_demande">Type Demande</label>
                          <select name="type_demande" class="form-control" id="type_demande">
                            <option value=""></option>
                            @foreach ($types as $key => $value)
                                
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                          {{-- <div class="help-block form-text with-errors form-control-feedback"></div> --}}
                        </div>
                      </div>
                      <div class="col-sm-6 d-none" id="suppression">
                        <div class="form-group">
                          <label for="date_supperssion">Date Supression</label>
                          <input name="" class="form-control" id="date_supperssion" value="{{ Date('Y-m-d') }}" readonly="true" />
                          {{-- <div class="help-block form-text with-errors form-control-feedback"></div> --}}
                        </div>
                      </div>
                      <div class="col-sm-3 d-none susppension">
                        <div class="form-group">
                          <label for="date_supperssion">Date Début</label>
                          <input name="date_supperssion" class="form-control" id="date_supperssion" value="{{ Date('Y-m-d') }}" readonly="true" />
                          {{-- <div class="help-block form-text with-errors form-control-feedback"></div> --}}
                        </div>
                      </div>
                      <div class="col-sm-3 d-none susppension">
                        <div class="form-group">
                          <label for="date_supperssion">Date fin</label>
                          <input data-toggle="datepicker" name="date_fin" class="form-control datepicker" id="date_supperssion" />
                          {{-- <div class="help-block form-text with-errors form-control-feedback"></div> --}}
                        </div>
                      </div>
                  </div>
                  <div class="form-buttons-w">
                    <button class="btn btn-primary" type="submit"> Ajouter</button>
                  </div>
                </form >
                @endif
                <form method="post" action="{{ route('salarie.profile.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="element-info">
                      <div class="element-info-with-icon">
                        <div class="element-info-icon">
                          <div class="os-icon os-icon-wallet-loaded"></div>
                        </div>
                        <div class="element-info-text">
                          <h5 class="element-inner-header">
                            Profil
                          </h5>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for=""> Email</label>
                      <input class="form-control" placeholder="Enter email" value="{{ auth()->user()->email }}" disabled readonly="readonly" type="email">
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for=""> Nom</label>
                          <input class="form-control" name="nom" value="{{ auth()->user()->nom }}" required="required" type="text">
                          {{-- <div class="help-block form-text text-muted form-control-feedback">
                            Minimum of 6 characters
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Prénom</label>
                          <input class="form-control" name="prenom" value="{{ auth()->user()->prenom }}" required="required" type="text">
                          {{-- <div class="help-block form-text with-errors form-control-feedback"></div> --}}
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Mot de Passe</label>
                            <input class="form-control" name="password" type="text">
                            {{-- <div class="help-block form-text text-muted form-control-feedback">
                              Minimum of 6 characters
                            </div> --}}
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Confirmer le Mot de Passe</label>
                            <input class="form-control" name="password_confirmation"  type="text">
                            {{-- <div class="help-block form-text with-errors form-control-feedback"></div> --}}
                          </div>
                        </div>
                      </div>
                    <div class="form-buttons-w">
                      <button class="btn btn-primary" type="submit"> Modifier</button>
                    </div>
                </form >
                <form action="{{ route('salarie.update') }}" method="post" class="mt-5">
                    @csrf
                    @method('PUT')
                    <div class="element-info">
                      <div class="element-info-with-icon">
                        <div class="element-info-icon">
                          <div class="os-icon os-icon-wallet-loaded"></div>
                        </div>
                        <div class="element-info-text">
                          <h5 class="element-inner-header">
                            Salarie
                          </h5>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Adresse</label>
                          <input class="form-control" value="{{ auth()->user()->salarie->adresse_fr }}" name="adresse_fr" required="required" type="text">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group text-right">
                          <label class="text-muted-2" for="adresse_ar" >العنوان</label>
                          <input class="form-control keyboardInput" dir="rtl" value="{{ auth()->user()->salarie->adresse_fr }}" name="adresse_ar" required="required" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Email d'entreprise</label>
                            <input class="form-control" value="{{ auth()->user()->salarie->email }}" name="email" required="required" type="email">
                          </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                              <label for="">N Mobile 1</label>
                              <input class="form-control"  value="{{ auth()->user()->salarie->tel_mobile_1 }}" name="tel_mobile_1" required="required" type="text">
                              {{-- <div class="help-block form-text text-muted form-control-feedback">
                                Minimum of 6 characters
                              </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                              <label for="">N Mobile 1</label>
                              <input class="form-control"  value="{{ auth()->user()->salarie->tel_mobile_2 }}" name="tel_mobile_2" required="required" type="text">
                              {{-- <div class="help-block form-text text-muted form-control-feedback">
                                Minimum of 6 characters
                              </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="">Fix</label>
                            <input class="form-control"  value="{{ auth()->user()->salarie->fix }}" name="fix" required="required" type="text">
                            {{-- <div class="help-block form-text text-muted form-control-feedback">
                              Minimum of 6 characters
                            </div> --}}
                          </div>
                      </div>
                    </div>
                    <div class="form-buttons-w">
                      <button class="btn btn-primary" type="submit"> Modifier</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('sidebar')

<div class="content-panel dont-print">
    <div class="content-panel-close">
        <i class="os-icon os-icon-close"></i>
    </div>
    {{-- @include('partials.components.mon-espace-rightsidebar')

    @include('partials.components.formation-doc', ['files'=> $files]) --}}
    {{-- <x-employeur.demandes-component /> --}}

    <div class="element-wrapper" data-step="4" data-intro="Rubrique de Téléchargement et d'Insertion, 
      ici vous trouverez les fichiers à télécharger ainsi que ceux à insérer" >
      <h6 class="element-header">
          Liste des demandes
      </h6>
        <div class="element-box-tp">
            <div class="el-buttons-list full-width">
              @forelse ($demandes as $key => $demande)
                <a class="btn btn-light btn-sm" href="{{ route('salarie.demande', ['code'=>$demande->code_demande]) }}">
                  <i class="os-icon os-icon-file"></i> <span>demande {{ App\Models\Demande::displayTypes($demande->type_demande) }} ({{++$key}})</span>
                </a>
              @empty
              <span>Aucune demande</span>
              @endforelse
            </div>
        </div>
    </div>

</div>
<a href="javascript:void(0);" onclick="guide();" class="help-button">
    <i class="os-icon os-icon-help-circle"></i>
</a>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/js/keyboard.js') }}" charset="UTF-8"></script>
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
<script src="{{ asset('assets/js/datepiker.js') }}"></script>
<script src="{{ asset('assets/js/datepiker-fr.js') }}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    function printFunction() {
        window.print();
    }

    $('#telecharger').on("click", function(){
      $('#telecharger-list').slideToggle('fast');
    });
    function guide()
    {
        introJs().setOptions({
            nextLabel: 'suivant',
            prevLabel: 'précédent',
            doneLabel: 'Fermer',
        }).start();
    }

    $("#type_demande").on("change", function(){
      let supression = $("#suppression");
      let susppension = $(".susppension");
      console.log($(this).val());
      if($(this).val() == 2)
      {
        supression.removeClass('d-none');
      }else{
        supression.addClass('d-none');
      }

      if($(this).val() == 1)
      {
        susppension.removeClass('d-none');
      }else{
        susppension.addClass('d-none');
      }
    });
    
</script>
@endsection
