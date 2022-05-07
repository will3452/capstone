<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Role;
use App\Models\Status;
use App\Nova\Metrics\NewPatient;
use App\Nova\Metrics\PendingAppointments;
use App\Nova\Metrics\UnreadMessages;
use ChrisWare\NovaBreadcrumbs\NovaBreadcrumbs;
use Coroowicaksono\ChartJsIntegration\BarChart;
use Ericlagarda\NovaTextCard\TextCard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use OptimistDigital\NovaSettings\NovaSettings;
use Spatie\BackupTool\BackupTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        NovaSettings::addSettingsFields([
            Image::make('Logo'),

            Select::make('Status')
                ->options(Status::get()->pluck('label', 'id')),

            Text::make('System Name')
                ->required(),

            Textarea::make('Privacy And Policy')
                ->required(),

            Textarea::make('Terms And Conditions')
                ->required(),

            Text::make('Messenger id'),

        ]);

    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return auth()->id() == 1;
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
/*    protected function cards()
    {
        if (auth()->id() != 1) {
            return [];
        }

        $diagnoses = \App\Models\Diagnosis::get();
        $data = [];
        $appointmentToday = Appointment::where('status', 'pending')->whereDate('date', '=', today())->first();

        foreach ($diagnoses as $diagnosis) {
            $data[] = $diagnosis->userDiagnoses()->count();
        }

        return [
            (new BarChart())
                ->title('Diagnoses')
                ->animations([
                    'enabled' => true,
                    'easing' => 'easeinout',
                ])
                ->series(array([
                    'barPercentage' => 0.5,
                    'label' => 'Diagnoses',
                    'backgroundColor' => '#035672',
                    'data' => $data,
                ]))
                ->options([
                    'xaxis' => [
                        'categories' => $diagnoses->pluck('name'),
                    ],
                ])
                ->width('full'),
            (new TextCard())
                ->heading('Appointment Today')
                ->width('1/2')
                ->text($appointmentToday == null ? "No Appointment" : Carbon::parse($appointmentToday->time)->format('h:i A') . ' to ' . $appointmentToday->user->name),
            PendingAppointments::make()
                ->width('1/2'),
            NewPatient::make()->width('1/2'),
            UnreadMessages::make()->width('1/2'),

        ];
    }       */

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {

        return [
            // (new BackupTool())->canSee(function () {
            //     return auth()->user()->hasRole(Role::ADMIN);
            // }),
            (new NovaSettings)->canSee(function () {
                return auth()->user()->hasRole(Role::ADMIN);
            }),
            new NovaBreadcrumbs,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //sample
    }
}
