<?php

namespace App\Nova;

use App\Nova\Actions\ProductPriceAction;
use App\Nova\Metrics\CountUser;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Status;

//use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Trix;
use Drobee\NovaSluggable\SluggableText;
use Drobee\NovaSluggable\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Timothyasp\Color\Color;
use Laravel\Nova\Fields\VaporImage;
use Laravel\Nova\Http\Requests\NovaRequest;
//use Bernhardh\NovaIconSelect\NovaIconSelect;
//use Bernhardh\NovaIconSelect\IconProviders\FontAwesomeIconProvider;
use NovaIcon\Icon;
use Mdixon18\Fontawesome\Fontawesome;
use Waynestate\Nova\CKEditor;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class Profile extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Profile::class;

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
        'id', 'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            SluggableText::make("імя", 'name')->sortable()->rules('required'),

//            TextWithSlug::make('url')
//                ->slug('slug'),
            Slug::make('Slug')->slugSeparator('-'),
//            Slug::make('Slug')->sortable()->rules("required")->slugLanguage('ru'),
//            Color::make("Color"),
//            Number::make('sort_order'),


            Fontawesome::make('Icon')->addButtonText('Вибрати іконку')->defaultIcon('far', ''),

//            Trix::make("Текст Trix", 'body')->sortable(),
            CKEditor::make("Текст cke", 'body')->options([
                'height' => 300,
//                'toolbar' => [
//                    ['Source','-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
//                    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
//                    ['Image','Table','HorizontalRule','SpecialChar','PageBreak'],
//                    '/',
//                    ['Bold','Italic','Strike','-','Subscript','Superscript'],
//                    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
//                    ['JustifyLeft','JustifyCenter','JustifyRight'],
//                    ['Link','Unlink','Anchor'],
//                    '/',
//                    ['Format','FontSize'],
//                    ['Maximize', 'ShowBlocks','-','About']
//                ],
            ])->sortable()->hideFromIndex(),
            Number::make("Вік", 'year_old')->default(" ")->sortable(),
            Date::make('create', "created_at")->default(" ")->sortable(),
            Date::make('update', "updated_at")->default(" ")->sortable(),
            Date::make('birthday', "birthday_at")->default(" ")->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new CountUser()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new ProductPriceAction()
        ];
    }
}
