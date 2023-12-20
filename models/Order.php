<?php
namespace app\models;

use app\core\Application;
use app\core\DbModel;
use Exception;

class Order extends DbModel
{
    public const ORDER_NEW =0;//đơn hàng mới
    public const ORDER_CONF =1;// chờ xác nhận
    public const ORDER_WSM =2; // chờ xuất hàng
    public const ORDER_WFD =3;// chờ giao hàng
    public const ORDER_DELIVERED =4;// đã giao hàng
    public const ORDER_CANCEL = 5;// hủy
    public 	$order_id;
    public $order_date;
    public 	$total_amount;
    public $consignee_name;
    
    public $consignee_phone;

    public $consignee_add;

    public $user_id;

    public $through_user_id;


    public function rules()
    {
        return [
            'consignee_name' => [self::RULE_REQUIRED,[self::RULE_MIN, 'min' => 4]],
            'consignee_phone' => [self::RULE_REQUIRED, self::RULE_PHONE],
            'consignee_add' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4]],
        ];
    }

    public function tableName(): string
    {
        return "user_order";
    }
    public function attribute(): array
    {
        return [];
    }
    public function primaryKey(): string
    {
        return 'order_id';
    }

    public function addOrderNew()
    {
        try{
            $table = $this->tableName();
            $attributes = ['order_date', 'total_amount', 'consignee_name', 'consignee_phone', 'consignee_add', 'user_id'];
            $params = array_map(fn($attr) => ":$attr", $attributes);
    
            $stmt = self::prepare("INSERT INTO $table(" . implode(',', $attributes) . ") VALUES(" . implode(',', $params) . ")");
            foreach ($attributes as $attribute)
            {
                $stmt->bindValue(":$attribute", $this->{$attribute});
            }
            $stmt->execute();
            $lastInsertedId = Application::$app->db->getConnection()->lastInsertId();
            $this->order_id = $lastInsertedId;
            $items = &$_SESSION['cart'];
            foreach($items as $key => $value)
            {
                $detail = new DetailOrder();
                $detail->order_id =  $this->order_id;
                $detail->product_id = $key;
                $detail->quantity = $value['sl'];
                $detail->price = $value['product_price'];
                if(  !$detail->insertDetail())
                {
                    return false;
                }
                unset($items[$key]);
            }
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
       

    }
}