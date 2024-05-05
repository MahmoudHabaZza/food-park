<?php

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug(string $model, string $name)
    {
        $modelClass = "App\\Models\\$model";
        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model Not Found");
        }

        $slug = Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }


        return $slug;
    }

    if (!function_exists('currencyPosition')) {
        function currencyPosition($price)
        {
            if (config('settings.site_default_currency_position') === 'left') {
                return config('settings.site_currency_icon') . $price;
            } else {
                return $price . config('settings.site_currency_icon');
            }
        }
    }
}
