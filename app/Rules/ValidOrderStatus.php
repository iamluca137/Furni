<?php

namespace App\Rules;

use App\Models\Order;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidOrderStatus implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $order;

    public function __construct($orderId)
    {
        $this->order = Order::findOrFail($orderId);
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // List of invalid transitions
        // 1 - Processing
        // 2 - Shipping
        // 3 - Completed
        // 4 - Cancelled
        // 5 - Returns/Refunds
        $invalidTransitions = [
            1 => [3, 5],
            2 => [1, 4, 5],
            3 => [1, 2, 4],
            4 => [1, 2, 3, 5],
            5 => [1, 2, 3, 4],
        ];

        $currentStatus = $this->order->order_status_id;

        // Check if the new status is in the list of invalid transitions
        if (in_array($value, $invalidTransitions[$currentStatus])) {
            $fail('Invalid order status transition');
        } 
    }
}
