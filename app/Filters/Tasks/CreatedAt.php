<?php


namespace App\Filters\Tasks;


use App\Filters\Tasks\Main\Filter;

class CreatedAt extends Filter
{

    protected function applyFilter($builder)
    {
        return $builder->where('created_at', request($this->filterName()));
    }
}
