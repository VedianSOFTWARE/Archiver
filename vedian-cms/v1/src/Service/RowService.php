<?php

namespace Vedian\Cms\Services;

use Illuminate\Support\Collection;

class RowService extends CmsService
{
    protected Collection $columns;
    
    public function save()
    {

    }

    public function addColumn(ColumnService $column)
    {
        $this->columns->push($column);
    }

    public function removeColumn(ColumnService $column)
    {
        $this->columns->forget($column);
    }

    public function sortColumns()
    {
        // needs to be implemented as custom sorting logic
    }

}
