<?php


namespace App\Filters\Tasks;


use App\Filters\Tasks\Main\Filter;

class Status extends Filter
{

    protected function applyFilter($builder)
    {
        $request = (integer)request($this->filterName());
        return $builder->where('status', $request);
    }
}
