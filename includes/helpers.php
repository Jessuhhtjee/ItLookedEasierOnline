<?php

function format_prep_time(?string $value): string
{
    $map = [
        'under-15' => 'Under 15 min',
        '15-30' => '15-30 min',
        '30-60' => '30-60 min',
        'over-60' => 'Over 1 hour',
    ];

    return $map[$value ?? ''] ?? ($value ?: '—');
}

function format_label(?string $value): string
{
    if ($value === null || $value === '' || $value === 'none') {
        return '';
    }

    $map = [
        'apparentlyimpossible' => 'Apparently Impossible',
        'quick&easy' => 'Quick & Easy',
        'gluten-free' => 'Gluten-free',
        'dairy-free' => 'Dairy-free',
    ];

    if (isset($map[$value])) {
        return $map[$value];
    }

    return ucwords(str_replace(['-', '_'], ' ', $value));
}

function recipe_image_src(?string $image): string
{
    if ($image && file_exists(__DIR__ . '/../' . ltrim($image, '/'))) {
        return $image;
    }

    return 'Images/card-template.jpg';
}

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
