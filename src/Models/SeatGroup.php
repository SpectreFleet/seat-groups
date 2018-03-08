<?php
/**
 * Created by PhpStorm.
 *  * User: Herpaderp Aldent
 * Date: 13.02.2018
 * Time: 21:43
 */

namespace Herpaderpaldent\Seat\SeatGroups\Models;


use Illuminate\Database\Eloquent\Model;

use Seat\Services\Repositories\Corporation\Corporation;
use Seat\Web\Models\User;

class Seatgroup extends Model
{
    use Corporation;
    protected $fillable = ['name','description','type','role_id' ];



    public function role(){
        return $this->belongsTo('Seat\Web\Models\Acl\Role', 'role_id','id');
    }

    public function user(){
        return $this->belongsToMany('Seat\Web\Models\User', 'seatgroup_user','user_id')
            ->withPivot('is_manager','on_waitlist');
    }

    public function corporation(){
        return $this->belongsToMany('Seat\Eveapi\Models\Corporation\CorporationInfo','corporation_info_seatgroup','seatgroup_id', 'corporation_id');
    }

    public function manager()
    {
        return $this->belongsToMany('Seat\Web\Models\User', 'seatgroup_user','user_id')
            ->wherePivot('is_manager',"=", true);
    }



    public function isManager(User $user, int $groupint){

        // TODO: clear this up create checker for manager
        return true;
        //if(Seatgroupmanager::where('group_id','=',$groupint)->where('user_id', '=', $user['id'])->count() >0){
        //    return true;
        //} else {return false;}


    }
    public function listManager(int $group){
        $managersHelper= Seatgroupmanager::where('group_id','=',$group)->get();

        //
        /**
         * TODO: when a Seatgroupmanager is created with the relation extend this function to call managers
         *
         *
         */

        $helper2 = $managersHelper->users();

        if(true){
            return (string) null;
        } else return null;
    }
}