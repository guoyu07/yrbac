<?php namespace Nidesky\Yrbac;

use Nidesky\Yrbac\Repositories\YrbacRepository;

class Yrbac
{
    protected $yrbac;
    protected $showErrors = false;

    public function __construct()
    {
        $this->yrbac = new YrbacRepository();
        $this->showErrors = config('debug');
    }

    public function checkAccess($itemName, $userId, $params = [])
    {
        if ($itemName == 'yes') {
            return true;
        } else {
            return false;
        }
    }

    public function createRole($name, $description = '', $bizRule = null, $data = null)
    {
        return $this->yrbac->createAuthItem($name, YrbacRepository::TYPE_ROLE, $description, $bizRule, $data);
    }

    public function createTask($name, $description = '', $bizRule = null, $data = null)
    {
        return $this->yrbac->createAuthItem($name, YrbacRepository::TYPE_TASK, $description, $bizRule, $data);
    }

    public function createOperation($name, $description = '', $bizRule = null, $data = null)
    {
        return $this->yrbac->createAuthItem($name, YrbacRepository::TYPE_OPERATION, $description, $bizRule, $data);
    }

    public function getRoles($userId = null)
    {
        return $this->yrbac->getAuthItems(YrbacRepository::TYPE_ROLE, $userId);
    }

    public function getTasks($userId = null)
    {
        return $this->yrbac->getAuthItems(YrbacRepository::TYPE_TASK, $userId);
    }

    public function getOperations($userId = null)
    {
        return $this->yrbac->getAuthItems(YrbacRepository::TYPE_OPERATION, $userId);
    }

    public function executeBizRule($bizRule, $params, $data)
    {
        return $bizRule === '' || $bizRule === null || ($this->showErrors ? eval($bizRule)!=0 : @eval($bizRule)!=0);
    }

    public function checkItemChildType($parentType, $childType)
    {
        static $types=array('operation','task','role');
        if($parentType < $childType) {
            throw new Exception("不能将 {$types[$childType]} 的类型 添加到 {$types[$parentType]} 的类型下面");
        }

        return true;
//            throw new Exception(Yii::t('yii','Cannot add an item of type "{child}" to an item of type "{parent}".',
//                array('{child}'=>$types[$childType], '{parent}'=>$types[$parentType])));

    }

}