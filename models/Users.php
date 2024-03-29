<?php
    namespace app\models;

use app\core\Application;
use app\core\DbModel;
use Exception;

    class Users extends DbModel
    {
        public const STATUS_ACTIVITY = 0;
        public const STATUS_LOCK = 1;
        protected $table ="user";
        public  $user_id;
        public  $user_email;
        public  $user_firstname;
        public  $user_lastname;
        public  $user_phone;
        public  $user_address;
        public  $user_password;
        public  $status;
        public function rules()
        {
            return [
          
                'user_firstname' => [self::RULE_REQUIRED],
                'user_lastname'=>[self::RULE_REQUIRED],
                'user_phone'=>[self::RULE_REQUIRED,self::RULE_PHONE],
                'user_address'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>5]],
                
            ];
        }

    
        public function tableName(): string
        {
            return $this->table;
        }
        public function attribute(): array
        {
            return [];
        }
        public function primaryKey(): string
        {
            return 'user_id';
        }

        public function selectAll()
        {
            try{
                $sql = "select * from user";
                $stm = self::prepare($sql);
                $stm->execute();
                $data = $stm->fetchAll(\PDO::FETCH_CLASS,static::class);
                return $data;
            }catch (Exception $e)
            {
                Application::$app->session->setFlash('error', 'Error !!!');
            }
        }   
        public function insertData()
        {
           
            $this->status = self::STATUS_ACTIVITY;
            $this->user_password = md5($this->user_password);
            return self::save(['user_email','user_firstname','user_lastname','user_phone','user_address','user_password','status']);
        }

      
        public function getUserById($id)
        {
            return self::findOne(['user_id'=>$id]);
        }


        public function upateUser($attribute, $where)
        {
            return self::update($attribute, $where);
        }

        public function removeUserById($id)
        {
            if(self::remove(['user_id'=>$id]))
            {
                return true;
            }
            return false;
        }
    }

   
?>