<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Invite;
use App\Models\Invitations;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InviteTeam extends Controller
{
    public function accept(Request $request, Invite $invite, $token)
    {
        if ($invite->token != $token) {
            return "Bad token";
        }
    
        // Vérifier si l'utilisateur a déjà une invitation en attente pour l'équipe concernée
        $existingInvitation = Invitations::where('user_id', $request->user()->id)
                                          ->where('team_id', $invite->team_id)
                                          ->first();
    
        if ($existingInvitation) {
            // Mettre à jour le rôle de l'invitation existante
            $existingInvitation->role = $invite->role;
            $existingInvitation->save();
        } else {
            // Créer une nouvelle invitation
            $invite = Invitations::create([
                "team_id" => $invite->team_id,
                "user_id" => $request->user()->id,
                "role" => $invite->role,
            ]);
        }
    
        return redirect()->route("dashboard");
    }
    
    public function create(Request $request, Team $team)
    {

        abort_if(!$request->user()->hasTeamPermission($team, 'admin'), 403, 'Vous devez être administrateur pour effectuer cette action.');

         // Vérifier si l'utilisateur a déjà une invitation en attente pour l'équipe concernée
        $existingInvitation = Invitations::where('team_id',$team->id)
         ->first();

         if($existingInvitation) {
            return redirect()->route("invite.show", $existingInvitation->id);
         }


        $invite = Invite::create([
            "team_id" => $team->id,
            "token" => Str::random(32),
            "role" => "member",
        ]);

        return redirect()->route("invite.show", $invite);
    }

    public function show(Invite $invite)
    {

        return view("teams.invitation.show", [
            "invite" => $invite,
            "qrcode" => QrCode::size(200)->generate(route("invite.accept", [$invite, $invite->token]))
        ]);
    }

    public function index()
    {
        return view("teams.invitation.index", [
            "invites" => Invite::all()
        ]);
    }

    public function destroy(Invite $invite)  
    {
       $invite->delete();

       return redirect()->route("dashboard");
    }
}
