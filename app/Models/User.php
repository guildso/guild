<?php

namespace App\Models;

use App\Models\ShiftLog;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\UploadedFile;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateProfilePhoto(UploadedFile $photo)
    {
        tap($this->profile_photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'profile_photo_path' => $photo->storePublicly(
                    'profile-photos', ['disk' => $this->profilePhotoDisk()]
                ),
            ])->save();

            if ($previous) {
                \Illuminate\Support\Facades\Storage::disk($this->profilePhotoDisk())->delete($previous);
            }
        });
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function profilePhotoDisk()
    {
        if (isset($_ENV['VAPOR_ARTIFACT_NAME'])) {
            return  's3';
        }
        if(isset($_ENV['DO_SPACES']) && $_ENV['DO_SPACES'] == true ) {
            return 'spaces';
        }
        return 'public';
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function shifts()
    {
        return $this->hasMany('App\Models\Shift');
    }

    public function shiftLogs()
    {
        return $this->hasMany('App\Models\ShiftLog');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function badges(){
    	return $this->belongsToMany('App\Models\Badge');
    }

    public function hasBadge($badge){
        return $this->badges()->where('badge_id', '=', $badge)->count();
    }

    public function awardBadge($badge){
        $this->badges()->attach($badge);
    }

    public function removeBadge($badge){
        $this->badges()->detach($badge);
    }

    public function completedTasks(){
        return $this->tasks()->where('status', 'Completed')->get();
    }

    public function startShift()
    {
        $shift = $this->shifts()->where('team_id', $this->currentTeam->id)->exists();

        if ($shift) {
            $shift = $this->shifts()->where('team_id', $this->currentTeam->id)->firstOrFail();
            $shift->status = 'on';
            $shift->started_at = new Carbon;
            $shift->user_id = auth()->user()->id;
            try {
                $shift->update();
                return true;
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            $shift = new Shift;
            $shift->status = 'on';
            $shift->started_at = new Carbon;
            $shift->user_id = $this->id;
            $shift->team_id = $this->currentTeam->id;
            try {
                $shift->save();
                return true;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function endShift()
    {
        $shift = $this->shifts()->where('team_id', $this->currentTeam->id)->whereNotNull('started_at')->firstOrFail();
        $now = new Carbon;
        $shift_started = $shift->started_at;
        $totalHours = $now->diffInMinutes($shift->started_at, true);
        $totalHours = $totalHours/60;
        $shift->total_hours += $totalHours;
        $shift->status = 'off';
        $shift->started_at = NULL;

        try {
            $shift->save();
            $this->logShift($shift_started ,$now, $totalHours);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function isOnShift()
    {
        $shift = $this->shifts()->where('team_id', $this->currentTeam->id)->where('status', 'on')->exists();
        if ($shift) {
            return true;
        }
        return false;
    }

    public function totalHoursWorked()
    {
        if ($this->shifts()->where('team_id', $this->currentTeam->id)->exists()) {
            $shift = $this->shifts()->where('team_id', $this->currentTeam->id)->firstOrFail();
            return round($shift->total_hours, 2);
        }
        return 0;
    }

    public function logShift($started_at, $now, $totalHours)
    {
        $log = new ShiftLog;
        $log->started_at = $started_at;
        $log->finished_at = $now;
        $log->total_hours = $totalHours;
        $log->team_id = $this->currentTeam->id;
        $log->user_id = auth()->user()->id;
        $log->save();
    }
}
