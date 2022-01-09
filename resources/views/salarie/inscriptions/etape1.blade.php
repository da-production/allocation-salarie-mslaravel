@extends('layouts.salarie.landing')

@php
    $pagetitle = "Subvention - Inscription";
@endphp

@section('styles')
        <!-- selectize css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/selectize.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}" />

<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
<style>
    .check{
        background-color: #c5c5c5;
    }
    .spinner{
        position: absolute;
        top: 42px;
        width: 20px;
        right: 20px;
        display: none;
    }
    .steps-container{
        display: flex;
        flex-wrap: nowrap;
    }
    .steps{
        height: 50px;
        width: 50px;
        text-align: center;
        line-height: 47px;
        font-weight: bold;
        font-size: 25px;
        border: 3px solid #b4c0e4;
        border-radius: 50px;
        position: relative;
        color: #b4c0e4;
    }
    .steps::before{
        content: '';
        position: absolute;
        top: 50%;
        left: 100px;
        transform: translateY(-50%);
        height: 2px;
        background-color: #b4c0e4;
        height: 100%;
    }
    .sizedBox{
        width: calc(100% - (100px));
        height: 4px;
        background-color: #b4c0e4;
        position: relative;
        top: 23px;
    }
    .active-sizedbox {
        background-color: #2f55d4;
    }
    .active-success {
        background-color: #2fd4a9;
    }
    .steps.active{
        border-color: #2f55d4;
        color: #2f55d4;
    }
    .steps.success{
        border-color: #2fd4a9;
        color: #2fd4a9;
    }
</style>
@endsection

@section('section-content')

        <section class="section py-1">
            <div class="container">
                <div class="row">
                    
                    {{-- <h1 class="col-12 text-center">Mesures d’encouragements d’aide à l’emploi</h1> --}}
                    <h3 class="col-12 text-center">Inscription</h3>
                    {{-- @if ($errors->any())    
                    <div class="col-10 offset-md-1">
                        <div class="alert alert-danger" role="alert"> Merci de compléter tous les champs</div>
                    </div>
                    @endif --}}
                </div>
            </div>
        </section>

        <!-- POST A JOB START -->
        <section class="section pt-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="rounded shadow bg-white p-4">
                            <div class="custom-form">
                                <div id="message3"></div>
                                <form method="post" action="{{ route('inscription') }}" name="contact-form" id="contact-form3">
                                    @csrf
                                    <div class="col-md-12 alert alert-info">
                                        <h6 class="mb-0 text-center"> <i class="fa fa-info-circle"></i> l'Inscription ce fait en deux étapes</h6>
                                        <h3 class="text-center">Etape 1</h3>
                                    </div>
                                    <div class="mx-3 mb-3 steps-container row d-flex justify-content-between">
                                        
                                        <div>
                                            <div class="steps step-1 start active">1</div>
                                            <div class="text-center mt-1">
                                            </div>
                                        </div>
                                        <div class="sizedBox sizedbox"></div>
                                        <div>
                                            <div class="steps step-1 end">2</div>
                                            <div class="text-center mt-1">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-dark mb-3 row">
                                        <div class="col-md-9">
                                            Inscription :
                                        </div>
                                    </h4>

                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group app-label">
                                                <div class="form-button">
                                                    <select class="form-control" name="code_wilaya">
                                                        @foreach ($wilayas as $wilaya)
                                                            <option value="{{ $wilaya->code }}">{{ ($wilaya->code) }} - {{ $wilaya->libelle_fr }} {{ $wilaya->libelle_ar }}</option>
                                                        @endforeach
                                                        <option value="">Wilayas</option>
                                                    </select>
                                                    @error('cod_wilaya')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group app-label mt-2">
                                                <label class="text-muted">Nom</label>
                                                <input  name="nom" type="text" class="form-control resume" value="{{ old('nom') }}" placeholder="" required>
                                                @error('nom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group app-label mt-2">
                                                <label class="text-muted">Prenom</label>
                                                <input name="prenom" type="text" class="form-control resume" value="{{ old('prenom') }}" placeholder="" required>
                                                @error('prenom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group app-label mt-2 position-relative">
                                                <label class="text-muted">Code Employeur (CNAS)</label>
                                                <input name="code_employeur" id="code_employeur" type="text" class="form-control employeur_code" value="{{ old('code_employeur') }}" placeholder="" required autocomplete="false">
                                                <img class="spinner" src="{{ asset('assets/images/loading-buffering.gif') }}" alt="">
                                                @error('code_employeur')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <p class="text-danger code_emplyeur_message"></p>
                                                <p class="text-danger code_emplyeur_message_existe" style="display: none"></p>
                                                <p class="text-success code_emplyeur_message_success" style="display: none"></p>
                                            </div>
                                        </div>

                                    </div>


                                    <h4 class="text-dark mb-3">Compte Identifiant :</h4>

                                    <div class="row alert alert-light">
                                        <div class="col-md-4">
                                            <div class="form-group app-label mt-2">
                                                <label class="text-muted" for="email">E-MAIL</label>
                                                <input id="email" name="email" type="text" class="form-control resume" value="{{ old('email') }}" placeholder="" required>
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group app-label mt-2">
                                                <label class="text-muted">Mot de passe</label>
                                                <input id="company-name" name="password" type="password" class="form-control resume password" placeholder="" required>
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group app-label mt-2">
                                                <label class="text-muted">Confirmer votre mot de passe</label>
                                                <input id="company-name" name="password_confirmation" type="password" class="form-control password resume" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" style="direction: rtl;">
                                            {{-- {!! NoCaptcha::display() !!} --}}
                                            @error('g-recaptcha-response')
                                                <p class="text-danger text-right">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-lg-12 mt-2 text-right">
                                            <button type="submit" role="button" class="btn btn-primary">Valider</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- POST A JOB END -->
@endsection


@section('before-appjs')
        <!-- selectize js -->
        <script src="{{ asset('assets/js/selectize.min.js') }}"></script>

        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
@endsection

@section('script')
{{-- {!! NoCaptcha::renderJs() !!} --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
{{-- <script>
    $(function(){
    var submit = true;
        $("#code_employeur").on('keyup',function(){
            $(".code_emplyeur_message").hide();
            $(".code_emplyeur_message_existe").hide();
            code = $(this).val().replaceAll('_', '');
                // if(String(code).length == 10){
                //     $("#code_employeur").val("");
                //     $("#code_employeur").addClass('check').blur().attr('readonly',false);
                // }
                if(String(code).length == 10){
                    // code = code.slice(0, -2);
                    try{
                        somme1 = (parseInt(code.charAt(0))
                                + parseInt(code.charAt(2))
                                + parseInt(code.charAt(4))
                                + parseInt(code.charAt(6))) * 2;

                        somme2 = (parseInt(code.charAt(1))
                                + parseInt(code.charAt(3))
                                + parseInt(code.charAt(5))
                                + parseInt(code.charAt(7)));
                        cle = ("" + (99 - (somme1 + somme2))).padStart(2, '0');
                        // code = code + cle;
                        // 1617047460
                        $("#code_employeur").val(code);
                        // $("#code_employeur").blur().attr('readonly',true);
                        $('.spinner').show();
                        axios.get("{{ route('code.employeur') }}?code="+code)
                        .then(function (response) {
                            console.log(response);
                            if(response.data.message != "00"){
                                // $(".code_emplyeur_message").show().text("le code employeur n'est pas valide");
                                // $("#code_employeur").addClass('check').blur().attr('readonly',false);
                                swal({
                                        title: "Attention",
                                        text: "le code employeur n'est pas valide",
                                        icon: "warning",
                                        button: "Fermer",
                                        dangerMode: true,
                                    });
                                $("#code_employeur").val("");
                                $('.spinner').hide();
                                // submit = false;
                            }else{
                                if(response.data.cotisant.statut == "1"){
                                    $(".code_emplyeur_message").hide();
                                    $('.spinner').hide();
                                    submit = true;
                                }else{
                                    $('.spinner').hide();
                                    swal({
                                        title: "Attention",
                                        text: response.data.cotisant.statut,
                                        icon: "warning",
                                        button: "Fermer",
                                        dangerMode: true,
                                    });
                                    // submit = false;
                                    return submit;
                                }
                                console.log(response);
                                
                            }
                        })
                        .catch(function (error) {
                                $('.spinner').hide();
                            console.log(error);
                        });
                        axios.get("{{ route('code.employeur') }}?code="+code)
                        .then(function(response){
                            
                            if(response.data.code === "true"){
                                // submit = false;
                                // $(".code_emplyeur_message_existe").show().text(response.data.message);
                                swal({
                                        title: "Attention",
                                        text: response.data.message,
                                        icon: "warning",
                                        button: "Fermer",
                                        dangerMode: true,
                                    });
                                console.log("true");
                            }else{
                                if(response.data.cotisant.statut == "1"){
                                    $(".code_emplyeur_message_success").show().text(response.data.message);
                                    submit = true;
                                }else{
                                    $('.spinner').hide();
                                    swal({
                                        title: "Attention",
                                        text: response.data.cotisant.statut,
                                        icon: "warning",
                                        button: "Fermer",
                                        dangerMode: true,
                                    });
                                    // submit = false;
                                    return submit;
                                }
                                
                            }
                        });
                    }catch (error) {}
                }
        });
        $("#contact-form3").on('submit', function(e){
            if(!submit){
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script> --}}
@endsection
