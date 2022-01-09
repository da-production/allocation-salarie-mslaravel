@extends('layouts.salarie.landing')

@php
    $pagetitle = "Inscription Etape 2";
@endphp

@section('styles')
        <!-- selectize css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/selectize.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}" />
        <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
        <link rel="stylesheet" href="{{ asset('assets/css/datepiker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/keyboard-arabic.css') }}">
        <style>
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
                <div class="row justify-content-center">
                    {{-- <h3 class="col-12 text-center">MESURES D'ENCOURAGEMENT ET D'APPUI A LA PROMOTION DE L'EMPLOI</h3> --}}
                    {{-- <h3 class="col-12 text-center">Subvention mensuelle à l'emploi accordée aux employeurs</h3> --}}
                    @if (session()->has('success'))
                        <div class="col-10">
                            <div class="alert alert-success" role="alert"> {{ session('success') }}</div>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="col-10">
                            <div class="alert alert-danger" role="alert"> {{ session('error') }}</div>
                        </div>
                    @endif
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
                                
<style>
    .text-muted-2{
        color: #161c2d;
    }
</style>
{{-- <form method="post" action="{{ $type == 'subvention' ? route('employeur.subvention.inscription.store') : route('employeur.formation.inscription.store') }}" name="contact-form" id="contact-form3"> --}}
    <form method="post" action="{{ route('inscription.etape2.store') }}" name="contact-form" id="contact-form3">
    @csrf
    <div class="col-md-12 alert alert-info">
        <h6 class="mb-0 text-center"> <i class="fa fa-info-circle"></i> Etape - 2</h6>
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
        {{-- <div class="col-md-3">
            <div class="form-group app-label">
                <div class="form-button">
                    <select class="nice-select rounded" name="statut_juridique_id">
                        <option data-display="Selectionnez">Selectionnez</option>
                        <option value="1">Subvention</option>
                        <option value="2">Formation</option>
                    </select>
                </div>
            </div>
        </div> --}}
    </h4>


    <div class="row">
        <div class="col-md-3">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="nom_fr" >Nom (FR)</label>
                <input value="{{ auth()->user()->nom }}" name="nom_fr" type="text" class="form-control  resume input-success-readonly @error('nom_fr') is-invalid @enderror" autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2 text-right">
                <label class="text-muted-2 " for="nom_ar" >اللقب</label>
                <input type="text" name="nom_ar" class="form-control  resume keyboardInput  @error('nom_ar') is-invalid @enderror" dir="rtl"  autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="prenom_fr" >Prénom (FR)</label>
                <input value="{{ auth()->user()->prenom }}" name="prenom_fr" type="text" class="form-control  resume input-success-readonly @error('prenom_fr') is-invalid @enderror" autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2 text-right">
                <label class="text-muted-2 " for="prenom_ar" >اسم</label>
                <input type="text" name="prenom_ar" class="form-control  resume keyboardInput  @error('prenom_ar') is-invalid @enderror" dir="rtl" autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="date_naissance" >Date de Naissance</label>
                <input data-toggle="datepicker" name="date_naissance" type="text" class="form-control datepicker resume  @error('date_naissance') is-invalid @enderror" placeholder="YYYY-DD-MM" autocomplete="off" id="installationDate">
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="lieu_naissance" >Lieu de Naissance</label>
                <input name="lieu_naissance" type="text" class="form-control  resume  @error('lieu_naissance') is-invalid @enderror" autocomplete="off" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="adresse_fr" >Adresse</label>
                <input name="adresse_fr" type="text" class="form-control resume  @error('adresse_fr') is-invalid @enderror"  autocomplete="off" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group app-label mt-2 text-right">
                <label class="text-muted-2" for="adresse_ar" >العنوان</label>
                <input name="adresse_ar" type="text" class="form-control resume keyboardInput @error('adresse_ar') is-invalid @enderror" dir="rtl" autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2 ">
                <label class="text-muted-2 " for="email" >Email</label>
                <input name="email" type="text" class="form-control resume  @error('email') is-invalid @enderror"  autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2 ">
                <label class="text-muted-2 " for="tel_mobile_1" >N Mobile 1</label>
                <input name="tel_mobile_1" type="text" class="form-control resume  @error('tel_mobile_1') is-invalid @enderror"  autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2 ">
                <label class="text-muted-2 " for="tel_mobile_1" >N Mobile 2</label>
                <input name="tel_mobile_1" type="text" class="form-control resume  @error('tel_mobile_1') is-invalid @enderror"  autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2 ">
                <label class="text-muted-2 " for="fix" >Fix</label>
                <input name="fix" type="text" class="form-control resume  @error('fix') is-invalid @enderror"  autocomplete="off" >
            </div>
        </div>
        <div class="col-md-12">
            <div class="alert alert-light">
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group mt-2">
                            <input name="condition_accepte" style="height: 25px; margin-top: 15px;" type="checkbox" id="condition_accepte" class="form-control" placeholder="" value="1" required >
                        </div>
                    </div>
                    <div class="col-md-11 pl-0">
                        <div class="form-group mt-2 ">
                            <label class="text-muted-2 display-block text-left" style="font-size:15px;" for="condition_accepte">
                                J'atteste par ailleurs que je n'ai bénéficié d'aucun avantage en matière de cotisation de sécurité sociale accordé par la législation en vigueur.
                            </label>
                            @error('condition_accepte')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-2 text-right">
            <button type="submit" role="button" class="btn btn-primary">Valider</button>
            {{-- <button type="button" role="button" class="btn btn-info" id="check">Véréfier</button>
            <button type="reset" role="button" class="btn btn-danger">Annuler</button> --}}
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

<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.inputmask.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#employeur").inputmask("9999999999"); // 10length
            $("#code_employeur_cnas").inputmask("9999999999") // 10length
            $("#nass").inputmask("999999999999"); // 12length
            $("#email-e").inputmask({ alias: "email"});
            $("#email").inputmask({ alias: "email"});
            $("#NIF").inputmask("999999999999999");  // 15length
            $("#NIS").inputmask("999999999999999");  // 15length
            $("#RIB").inputmask("99999999999999999999");  // 20length
            $('.password').on('mouseenter', function(){
                $(this).attr('type','text');
            });
            $('.password').on("mouseleave", function(){
                $(this).attr('type','password');
                });

            // $('#check').on('click',function(){
            //     var input = $('input');
            //     $('input').each(function(){
            //         console.log('\n',$(this).val());
            //     });
            // });
            var wilayaFr = $('#wilaya-fr');
            var wilayaAr = $('#wilaya-ar');
            wilayaFr.on('change', function(){
                wilayaAr.val($(this).val());
                console.log(wilayaAr.val());
            });
            wilayaAr.on('change', function(){
                wilayaFr.val($(this).val());
                console.log(wilayaFr.val());
            });
        });
        @if($errors->any())
        swal({
                title: "Attention",
                text: "Veuillez remplir tous les champs, \n et respecter le formatage des champs",
                icon: "warning",
                button: "Fermer",
                dangerMode: true,
            });
        @endif
    </script>
    <script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>
    <script src="{{ asset('assets/js/datepiker.js') }}"></script>
    <script src="{{ asset('assets/js/datepiker-fr.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    

@endsection

