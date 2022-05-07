<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use App\Nova\Actions\AddFinalDiagnosis;

class UserDiagnosis extends Resource
{

    public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\UserDiagnosis::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('User'),
            BelongsTo::make('Diagnosis', 'diagnosis', Diagnosis::class),
            DateTime::make('Recorded At', 'created_at')
                ->exceptOnForms(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        // $patient = \App\Models\Patient::find($request->viaResourceId);
        // $modelId = $this->id;
        // $ud = optional(optional($patient)->diagnoses())->find($modelId);
        // return [
        //     (new DownloadExcel()), 
        //     (new AddFinalDiagnosis())
        //         ->canSee(fn () => ! optional(optional($ud)->finalDiagnosis())->exists())
        //         // ->showOnTableRow(),
        // ];

        return [
            (new DownloadExcel()), 
            (new AddFinalDiagnosis())
                // ->showOnTableRow(),
        ];
    }
}
