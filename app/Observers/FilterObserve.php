<?php

namespace App\Observers;

use App\Models\Filter;
use App\Models\FilterDetail;

class FilterObserve
{
    /**
     * Handle the Filter "created" event.
     *
     * @param \App\Models\Filter $filter
     * @return void
     */
    public function created(Filter $filter)
    {
        //
    }

    /**
     * Handle the Filter "updated" event.
     *
     * @param \App\Models\Filter $filter
     * @return void
     */
    public function updated(Filter $filter)
    {
        //
    }

    /**
     * Handle the Filter "deleted" event.
     *
     * @param \App\Models\Filter $filter
     * @return void
     */
    public function deleted(Filter $filter)
    {
        FilterDetail::where('filter_id', $filter->id)->delete();
    }

    /**
     * Handle the Filter "restored" event.
     *
     * @param \App\Models\Filter $filter
     * @return void
     */
    public function restored(Filter $filter)
    {
        //
    }

    /**
     * Handle the Filter "force deleted" event.
     *
     * @param \App\Models\Filter $filter
     * @return void
     */
    public function forceDeleted(Filter $filter)
    {
        //
    }
}
