<?php

namespace App\Observers;

use App\Models\Attribute;
use App\Models\AttributeDetail;

class AttributeObserver
{
    /**
     * Handle the Attribute "created" event.
     *
     * @param \App\Models\Attribute $attribute
     * @return void
     */
    public function created(Attribute $attribute)
    {
        //
    }

    /**
     * Handle the Attribute "updated" event.
     *
     * @param \App\Models\Attribute $attribute
     * @return void
     */
    public function updated(Attribute $attribute)
    {
        //
    }

    /**
     * Handle the Attribute "deleted" event.
     *
     * @param \App\Models\Attribute $attribute
     * @return void
     */
    public function deleted(Attribute $attribute)
    {
        AttributeDetail::where('attribute_id', $attribute->id)->delete();
    }

    /**
     * Handle the Attribute "restored" event.
     *
     * @param \App\Models\Attribute $attribute
     * @return void
     */
    public function restored(Attribute $attribute)
    {
        //
    }

    /**
     * Handle the Attribute "force deleted" event.
     *
     * @param \App\Models\Attribute $attribute
     * @return void
     */
    public function forceDeleted(Attribute $attribute)
    {
        //
    }
}
