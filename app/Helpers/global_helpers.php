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

        while($modelClass::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }


        return $slug;
    }
}
