<?php

namespace App\Tables;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\Can;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;

class Countries extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('country_code', 'LIKE', "%{$value}%")
                        ->orWhere('name', 'LIKE', "%{$value}%"); 
                });
            });
        });

        return QueryBuilder::for(Country::class)
            ->defaultSort('id')
            ->allowedSorts(['id', 'name', 'country_code'])
            ->allowedFilters(['name', 'country_code', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'name', 'country_code'])
            ->column('id', sortable: true)
            ->column(key: 'name', searchable: true, sortable: true)
            ->column(key: 'country_code', searchable: true, sortable: true)
            ->paginate(15);
    }
}
