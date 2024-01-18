<?php


namespace Modules\Blog\Datas;

use Spatie\LaravelData\Data;


class RatingArticleData extends Data{

    public string $userId;
    public string $articleId;
    public string $ratingId;
    public int $credit;
}
