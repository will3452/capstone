<?php

namespace App\Nova;

use App\Nova\Actions\AssignRole;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class User extends Resource
{
    public static $group = "Admininstrator";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

    public function title()
    {
        return "$this->first_name $this->last_name";
    }

    public function authorizedToAttachAny(NovaRequest $request, $model)
    {
        return false;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'first_name', 'last_name', 'name', 'email',
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

            Text::make('First Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Middle Name')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Date::make('Birthday', 'birth_date')
                ->hideFromIndex()
                ->required(),

            Number::make('Age')
                ->readonly()
                ->required(),

            Select::make('Sex')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ])->required(),

            Number::make('Weight')
                ->hideFromIndex()
                ->required()
                ->step(0.1),

            Number::make('Height')
                ->hideFromIndex()
                ->required()
                ->step(0.1),

            Text::make('Landline Number')
                ->hideFromIndex(),

            Text::make('Cellphone Number')
                ->hideFromIndex(),

            Text::make('Approved Date', 'is_approved')
                ->exceptOnForms()
                ->hideFromIndex(),

            // BelongsToMany::make("Roles"),
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
        return [
            (new AssignRole()),
            (new DownloadExcel()),
        ];
    }
}
