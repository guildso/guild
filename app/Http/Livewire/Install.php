<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
use App\Models\Company;
use \Auth;

class Install extends Component
{
    public $company_name;
    public $website;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public $step = 0;

    protected $rules = [
        'company_name' => 'required|min:3',
        'name' => 'required|min:3',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required'
    ];

    public function finish(){

        tap(User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]), function (User $user) {

            // If this is the first user we will create a team with the user
            if(User::count() == 1){
                $this->createTeam($user, $this->company_name);

            // Else, we can assign that user to the first team
            } else {
                $team = Team::first();
                $user->teams()->attach($team, ['role' => 'member']);
                $user->current_team_id = $team->id;
                $user->save();
                $user->switchTeam($team);
            }

            Auth::login($user);

        });

        Company::create([
            'name' => $this->company_name,
            'website' => $this->website ?? ''
        ]);

        return redirect('dashboard?onboard=true');


        //return redirect('login');


    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user, $company_name)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => $company_name . " Guild",
            'personal_team' => true,
        ]));
    }

    /**
     * Next Step.
     * If step is 1 validate company name and website
     * If step is 2 validate name, email, and password.
     *
     * @return void
     */
    public function nextStep(){
        if($this->step == 1)
        {
            $this->validateOnly('company_name');
        }
        elseif($this->step == 2)
        {
            $this->validate();
        }

        $this->step += 1;
    }

    public function render()
    {
        return view('livewire.install');
    }
}
