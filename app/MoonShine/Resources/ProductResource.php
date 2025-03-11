<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<Products>
 */
class ProductResource extends ModelResource
{
    protected string $model = Products::class;

    protected string $title = 'Products';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            \MoonShine\UI\Fields\Text::make('name')->sortable(),
            \MoonShine\UI\Fields\Text::make('description')->sortable(),
            \MoonShine\UI\Fields\Text::make('price')->sortable(),
            \MoonShine\UI\Fields\Text::make('sale_price')->sortable(),
            \MoonShine\UI\Fields\Text::make('category_id')->sortable(),
            \MoonShine\UI\Fields\Text::make('product_volume')->sortable(),
            \MoonShine\UI\Fields\Text::make('stock_quantity')->sortable(),
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
                \MoonShine\UI\Fields\Text::make('name'),
                \MoonShine\UI\Fields\Text::make('description'),
                \MoonShine\UI\Fields\Text::make('price'),
                \MoonShine\UI\Fields\Text::make('sale_price'),
                \MoonShine\UI\Fields\Text::make('category_id'),
                \MoonShine\UI\Fields\Text::make('product_volume'),
                \MoonShine\UI\Fields\Text::make('stock_quantity'),
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
            \MoonShine\UI\Fields\Text::make('name'),
            \MoonShine\UI\Fields\Text::make('description'),
            \MoonShine\UI\Fields\Text::make('price'),
            \MoonShine\UI\Fields\Text::make('sale_price'),
            \MoonShine\UI\Fields\Text::make('category_id'),
            \MoonShine\UI\Fields\Text::make('product_volume'),
            \MoonShine\UI\Fields\Text::make('stock_quantity'),
        ];
    }

    /**
     * @param Products $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'sale_price' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'product_volume' => 'required|string|max:255',
            'stock_quantity' => 'required|string|max:255',
        ];
    }
}
