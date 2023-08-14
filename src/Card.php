<?php

namespace Perafan\CashierOpenpay;

use Illuminate\Database\Eloquent\Model;
use Perafan\CashierOpenpay\Openpay\Card as OpenpayCard;

class Card extends Model
{
    protected $fillable = [
        'cardeable_id', 'cardeable_type', 'name', 'openpay_id', 'type', 'brand', 'holder_name', 'card_number',
        'expiration_month', 'expiration_year', 'bank_name', 'bank_code',
    ];

    /**
     * Get the user that owns the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->cardeable();
    }

    /**
     * Get the model related to the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cardeable()
    {
        return $this->morphTo();
    }

    /**
     * Get the subscription as a Openpay card object.
     *
     * @return \OpenpayCard
     */
    public function asOpenpayCard()
    {
        $customer = $this->cardeable->asOpenpayCustomer();

        return OpenpayCard::find($this->openpay_id, $customer);
    }
}
