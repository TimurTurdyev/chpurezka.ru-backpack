<?php

namespace App\Observers;

use App\Models\AttributeDetail;
use App\Models\Detail;
use App\Models\FilterDetail;

class DetailObserver
{
    /**
     * Handle the Detail "created" event.
     *
     * @param \App\Models\Detail $detail
     * @return void
     */
    public function created(Detail $detail)
    {
        //
    }

    /**
     * Handle the Detail "updated" event.
     *
     * @param \App\Models\Detail $detail
     * @return void
     */
    public function updated(Detail $detail)
    {
        //
    }

    /**
     * Handle the Detail "deleted" event.
     *
     * @param \App\Models\Detail $detail
     * @return void
     */
    public function deleted(Detail $detail)
    {
        FilterDetail::where('detail_id', $detail->id)->delete();
        AttributeDetail::where('detail_id', $detail->id)->delete();
    }

    /**
     * Handle the Detail "restored" event.
     *
     * @param \App\Models\Detail $detail
     * @return void
     */
    public function restored(Detail $detail)
    {
        //
    }

    /**
     * Handle the Detail "force deleted" event.
     *
     * @param \App\Models\Detail $detail
     * @return void
     */
    public function forceDeleted(Detail $detail)
    {
        //
    }
}
