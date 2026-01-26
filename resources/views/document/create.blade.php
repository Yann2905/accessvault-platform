@extends('layouts.app')

@section('content')  
   
    <div class="app-container container-xxl">

    
       <div class="card">
            <div class="card-body">
	 
	                <form method="POST" enctype="multipart/form-data" action="{{ route('projet.document.store',$projet->id) }}" class="form w-100" id="kt_sign_up_form">
	
                             @csrf
							
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									    <h1 class="text-gray-900 fw-bolder mb-3">Créer un Document</h1>
                                         <div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
                               
									<!--end::Title-->
									<!--begin::Text-->
									<!--end::Link-->
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-8">
                                      <input type="text" name="nom_fichier" value=" {{old('nom_fichier') }}" class="form-control bg-transparent  @error('nom_fichier') is-invalid @enderror" required />
                                    @error('nom_fichier')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
							    </div>
								<div class="fv-row mb-8">
								<input type="file" name="chemin_fichier" placeholder= "choisir le fichier" autocomplete="off" class="form-control bg-transparent @error('chemin_fichier') is-invalid @enderror" required /  >
								@error('chemin_fichier')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							    </div>
								
								
								<!--end::Input group-->
								<!--begin::Actions-->
								
									<!--begin::Submit-->
									<!-- Boutons -->
                                <div class="d-flex flex-wrap justify-content-center gap-4">
                                    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                    <span class="indicator-label">Créer le document</span>
                                    <span class="indicator-progress">Veuillez patienter...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    </button>
                                
                                     <a href="{{ route('projet.document.index3',$projet->id) }}"class="btn btn-light">Retour au détail</a>
                                </div>
									<!--end::Submit-->
									
								</div>
								<!--end::Actions-->
                    </form>
			</div>
        </div>

    </div>
@endsection 							