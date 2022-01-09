<div class="col-sm-4 dont-print">
    <div data-step="1" data-intro="Espace Employeur, Ici vous trouverez quelques informations vous concernant">
      <div class="element-wrapper">
        <div class="element-box">
          <h6 class="element-header">
            Espace Salarie
          </h6>
          @if(!is_null(auth()->user()->salarie))
          <div class="timed-activities compact">
            <div class="timed-activity">
              <div class="ta-date">
                <span>Information  {{ isset($type) ? $type : '' }}</span>
              </div>
              <div class="ta-record-w">
                <div class="ta-record">
                  <div class="ta-timestamp">
                    <strong>Code Employeur</strong>
                  </div>
                  <div class="ta-activity">
                    {{ auth()->user()->code_employeur }}
                  </div>
                </div>
                <div class="ta-record">
                  <div class="ta-timestamp">
                    <strong>Matricule</strong>
                  </div>
                  <div class="ta-activity">
                    {{ auth()->user()->salarie->matricule }}
                  </div>
                </div>
                <div class="ta-record">
                  <div class="ta-timestamp">
                    <strong>Nom</strong>
                  </div>
                  <div class="ta-activity">
                    {{ auth()->user()->salarie->nom_fr }} - {{ auth()->user()->salarie->nom_ar }}
                  </div>
                </div>
                <div class="ta-record">
                  <div class="ta-timestamp">
                    <strong>Prenom</strong>
                  </div>
                  <div class="ta-activity">
                    {{ auth()->user()->salarie->prenom_fr }} - {{ auth()->user()->salarie->prenom_ar }}
                  </div>
                </div>
                <div class="ta-record">
                  <div class="ta-timestamp">
                    <strong>Wilaya</strong>
                  </div>
                  <div class="ta-activity">
                      ({{ auth()->user()->wilaya->code }}) - {{ auth()->user()->wilaya->libelle_fr }}
                  </div>
                </div>
                <div class="ta-record">
                    <div class="ta-timestamp">
                      <strong>Adresse</strong>
                    </div>
                    <div class="ta-activity">
                        {{ auth()->user()->salarie->adresse_fr }}
                    </div>
                  </div>
                <div class="ta-record">
                    <div class="ta-timestamp">
                      <strong>Date et lieu de Naissance</strong>
                    </div>
                    <div class="ta-activity">
                        Née le <b>{{ auth()->user()->salarie->date_naissance }}</b> à <b>{{ auth()->user()->salarie->lieu_naissance }}</b>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          @else
            Vous n'avez pas encore spécifier votre type d'inscription
          @endif 
          {{-- <div class="alert alert-danger">
            <p>Pour ouvrir une demande <button class="btn btn-primary">Ouvrire</button></p>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
