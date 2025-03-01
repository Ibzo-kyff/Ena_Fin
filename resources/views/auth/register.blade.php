<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Inscription</div>
                    <div class="card-body">
                    @if (session('success'))
                    <div class="text-black p-3 rounded-md mb-4 text-center">
                        {{ session('success') }}
                    </div>
                   @endif
                        <form method="POST" action="/register">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nom_complet" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="nom_complet" name="nom_complet" value="{{ old('nom_complet') }}" required autofocus>
                            </div>
                            
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="role" class="form-label">Rôle</label>
                                <select id="role" name="role" class="form-select">
                                    <option value="user">Utilisateur</option>
                                    <option value="admin">Administrateur</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="corps" class="form-label">Corps</label>
                                <select id="corps" name="corps" class="form-select" required>
                                    <option value="Administrateur civil">Administrateur civil</option>
                                    <option value="Sécurité sociale">Sécurité sociale</option>
                                    <option value="Inspecteur des impots">Impôts</option>
                                    <option value="Finances">Finances</option>
                                    <option value="Douanes">Douanes</option>
                                    <option value="Trésor">Trésor</option>
                                    <option value="Planificateur">Planificateur</option>
                                    <option value="Affaires étrangères">Affaires étrangères</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                
                                {{-- Message d'erreur pour le mot de passe --}}
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                         
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    J'accepte les <a href="{{ route('terms.show') }}" target="_blank">Conditions d'utilisation</a> et la <a href="{{ route('policy.show') }}" target="_blank">Politique de confidentialité</a>
                                </label>
                            </div>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('login') }}" class="text-decoration-none">Déjà inscrit ?</a>
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
