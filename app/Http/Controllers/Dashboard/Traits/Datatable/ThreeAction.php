<?php
namespace App\Http\Controllers\Dashboard\Traits\Datatable;

/**
 *
 */
trait ThreeAction
{
    protected function attributeForCheckout($data, $type)
    {
        $event = $data->isCheckin ? "checkout(".$data->id.")" : "checkin(".$data->id.")";
        $textEvent = $data->isCheckin ? "Checkout" : "Check-in";
        $btnColor = $data->isCheckin ? "warning" : "info";

        $attribute = [
            'event' => $event,
            'color' => $btnColor,
            'text'  => $textEvent,
        ];

        $liCheckout = $this->liCheckout($attribute);

        if ($type === 'component') {
            $attribute['event'] = "checkout(".$data->id.")";
            $attribute['color'] = "warning";
            $attribute['text'] = "Checkout";

            $liCheckout = $this->liCheckout($attribute);
            if ($data->available_quantity === 0) {
                $$liCheckout = '';
            }
        }

        return $liCheckout;
    }

    private function liCheckout(array $attribute)
    {
        return '<li>
                    <div class="d-flex justify-content-center pt-2">
                        <button onclick="'.$attribute['event'].'" type="button" class="btn btn-'.$attribute['color'].' btn-lg">'.$attribute['text'].'</button>
                    </div>
                    <hr>
                </li>';

    }
}

