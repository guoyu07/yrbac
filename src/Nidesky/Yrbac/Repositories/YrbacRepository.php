<?php namespace Nidesky\Yrbac\Repositories;

use Nidesky\Yrbac\Models\AuthItem;
use Nidesky\Yrbac\Models\AuthAssignment;

class YrbacRepository
{
    const TYPE_OPERATION = 0;
    const TYPE_TASK      = 1;
    const TYPE_ROLE      = 2;

    public function createAuthItem($name, $type = 0, $description = '', $bizRule = null, $data = null)
    {
        $authItem = AuthItem::create([
            'name'          => $name,
            'type'          => $type,
            'description'   => $description,
            'bizRule'       => $bizRule,
            'data'          => $data
        ]);

        return $authItem;
    }

    public function getAuthItems($type = null, $userId = null)
    {
        if ($type === null && $userId === null) {
            $result = AuthItem::get();
        } elseif ($userId === null) {
            $result = AuthItem::where(['type' => $type])->get();
        } elseif ($type === null) {
            $itemnames = AuthAssignment::where('user_id', $userId)->lists('itemname');
            $result    = AuthItem::whereIn('name', $itemnames)->get();
        } else {
            $itemnames = AuthAssignment::where('user_id', $userId)->lists('itemname');
            $result    = AuthItem::where('type', $type)->whereIn('name', $itemnames)->get();
        }

        return $result;
    }


}

