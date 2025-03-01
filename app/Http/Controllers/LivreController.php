<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre; 
use App\Models\Corps; 
use App\Models\CorpsLivre; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LivreController extends Controller
{
    public function create()
    {
        $corps=Corps::all();
        return view('livres.create',compact('corps'));
    }
    public function index(Request $request)
    {
        // Récupère le corps de l'utilisateur connecté
        $corps = Auth::user()->corps;
    
        // Recherche le corps correspondant dans la base de données
        $corps_id = Corps::where('nom', $corps)->first();
    
        // Récupère le terme de recherche
        $search = $request->input('search');
    
        // Requête de base pour récupérer les livres du corps de l'utilisateur
        $livres = Livre::join('corps_livre', 'corps_livre.livre_id', '=', 'livres.id')
            ->where('corps_livre.corps_id', $corps_id->id);
    
        // Ajoute la condition de recherche si un terme est fourni
        if ($search) {
            $livres->where(function ($query) use ($search) {
                $query->where('livres.titre', 'like', '%' . $search . '%')
                      ->orWhere('livres.description', 'like', '%' . $search . '%');
            });
        }
    
        // Exécute la requête et récupère les résultats
        $livres = $livres->select('livres.*')->get();
    
        // Retourne la vue avec les livres filtrés
        return view('dashboard', compact('livres'));
    }

public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'chemin' => 'required|file|mimes:pdf',
        'corps' => 'required|array' 
    ]);

    // Stocke le fichier avec un nom unique
    $chemin = $request->file('chemin')->storeAs(
        'livres',
        time() . '_' . $request->file('chemin')->getClientOriginalName(),
        'public'
    );

    // Crée le livre
    $livre = Livre::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'chemin' => $chemin
    ]);

    // Vérifie si des corps sont sélectionnés avant d'attacher
    if (!empty($request->corps)) {
        foreach ($request->corps as  $c) {
            $corps_livre=New CorpsLivre();
            $corps_livre->corps_id=$c;
            $corps_livre->livre_id= $livre->id;
            $corps_livre->save();
        }
    }

    return redirect()->route('dashboard')->with('success', 'Livre ajouté avec succès.');
}

};