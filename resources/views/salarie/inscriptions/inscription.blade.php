@extends('layouts.landing')

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
                                <form method="post" action="{{ route('register') }}" name="contact-form" id="contact-form3">
                                    @csrf
                                    <div class="col-md-12 alert alert-info">
                                        <h6 class="mb-0 text-center"> <i class="fa fa-info-circle"></i> l'Inscription ce fait en deux étapes</h6>
                                    </div>
                                    <div class="mx-3 mb-3 steps-container row d-flex justify-content-between">
                                        
                                        <div>
                                            <div class="steps step-1 start success">1</div>
                                            <div class="text-center mt-1">
                                            </div>
                                        </div>
                                        <div class="sizedBox active-sizedbox"></div>
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
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <div class="form-button">
                                                    <select class="nice-select rounded" name="type">
                                                        <option>Type de mesure</option>
                                                        <option value="1">Subvention</option>
                                                        <option value="2">Formation</option>
                                                    </select>
                                                    @error('type')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <div class="form-button">
                                                    <select class="form-control" name="cod_wilaya">
                                                        <option value="">Wilayas</option>
                                                    </select>
                                                    @error('cod_wilaya')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
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
@endsection

@section('script')
{{-- {!! NoCaptcha::renderJs() !!} --}}
@endsection
