<?php
class ServiceUserIdentity extends UserIdentity {
    const ERROR_NOT_AUTHENTICATED = 3;

    /**
     * @var EAuthServiceBase the authorization service instance.
     */
    protected $service;

    /**
     * Constructor.
     * @param EAuthServiceBase $service the authorization service instance.
     */
    public function __construct($service) {
        $this->service = $service;
    }

    /**
     * Authenticates a user based on {@link username}.
     * This method is required by {@link IUserIdentity}.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        if ($this->service->isAuthenticated) {
            $criteria =new CDbCriteria();
            $criteria->compare("service",$this->service->serviceName);
            $criteria->compare("id",$this->service->id);
            if(($eauth=EauthBind::model()->find($criteria))!=null)
            {
                $user =  $eauth->user;
            }
            else
            {

                $eauth =  new EauthBind();
                $eauth->id= $this->service->id;
                $eauth->service=$this->service->serviceName;
                $user=new User();
                $user->name =$this->service->getAttribute('name');
                $user->save();
                $eauth->userId= $user->id;
                $eauth->save();
            }
            $this->username = $user->name;
            $this->setState('id', $user->id);
            $this->setState('name', $user->name);
            $this->errorCode = self::ERROR_NONE;
        }
        else {
            $this->errorCode = self::ERROR_NOT_AUTHENTICATED;
        }
        return !$this->errorCode;
    }
}
