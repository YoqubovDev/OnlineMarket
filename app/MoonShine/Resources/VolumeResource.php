<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\MoonShine\Pages\Dashboard;
use Illuminate\Database\Eloquent\Model;
use App\Models\Volume;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Volume>
 */
class VolumeResource extends ModelResource
{
    protected string $model = Volume::class;

    protected string $title = 'Volumes';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')->sortable(),
            Date::make('Created At', 'created_at')->sortable(),


        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Name','name'),
                BelongsTo::make(
                    'Volume',
                    'volume',
                    fn($item)=>"$item->id. $item->name",
                    VolumeResource::class)
                    ->afterFill(
                        fn($field) => $field->setColumn('product_volume_id')
                    ),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Name', 'name'),
            Date::make('Created At', 'created_at'),
//            HasMany::make('Categories', '', fn($item)=>"$item->id. $item->name",
//                CategoryResource::class),

        ];
    }

    /**
     * @param Volume $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
