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

@section('content')
<div class="row">
    
    {{-- Starting Profile informations --}}

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
                <div class="element-info">
                    <div class="element-info-with-icon">
                      <div class="element-info-icon">
                        <div class="os-icon os-icon-wallet-loaded"></div>
                      </div>
                      <div class="element-info-text">
                        <h5 class="element-inner-header">
                          Demande #{{ $demande->code_demande }}
                        </h5>
                      </div>
                    </div>
                  </div>
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


    {{-- TODO: List all demande --}}

    {{-- <div class="element-wrapper" data-step="4" data-intro="Rubrique de Téléchargement et d'Insertion, 
      ici vous trouverez les fichiers à télécharger ainsi que ceux à insérer" >
      <h6 class="element-header">
          Liste des demandes
      </h6>
        <div class="element-box-tp">
            <div class="el-buttons-list full-width">
              @forelse ($demandes as $key => $demande)
              <a class="btn btn-light btn-sm" href="{{ route('salarie.demande', ['code'=>$demande->code_demande]) }}">
                <i class="os-icon os-icon-file"></i> <span>Demande ({{++$key}})</span>
              </a>
              @empty
              <span>Aucune demande</span>
              @endforelse
            </div>
        </div>
    </div> --}}

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
