<?php

declare(strict_types=1);

namespace Modules\Media\Support;

use Modules\Media\Models\Media;
use Webmozart\Assert\Assert;

// use Spatie\MediaLibrary\MediaCollections\Models\Media;
// use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
// use Modules\Media\Contracts\PathGenerator;
// implements PathGenerator
class TemporaryUploadPathGenerator
{
<<<<<<< HEAD
=======
    /**
     * @param \Modules\Media\Models\Media $media
     */
>>>>>>> origin/dev
    public function getPath($media): string
    {
        return $this->getBasePath($media).'/'.md5($media->id . $media->uuid . 'original').'/';
    }

<<<<<<< HEAD
=======
    /**
     * @param \Modules\Media\Models\Media $media
     */
>>>>>>> origin/dev
    public function getPathForConversions($media): string
    {
        return $this->getBasePath($media).'/'.md5($media->id . $media->uuid . 'conversion');
    }

<<<<<<< HEAD
=======
    /**
     * @param \Modules\Media\Models\Media $media
     */
>>>>>>> origin/dev
    public function getPathForResponsiveImages($media): string
    {
        return $this->getBasePath($media).'/'.md5($media->id . $media->uuid . 'responsive');
    }

<<<<<<< HEAD
    /*
    * Get a unique base path for the given media.
    */
=======
    /**
     * Get a unique base path for the given media.
     *
     * @param \Modules\Media\Models\Media $media
     */
>>>>>>> origin/dev
    protected function getBasePath($media): string
    {
        Assert::string($id = $media->getKey());
        $key = md5($media->uuid . $id);

        return "tmp/{$key}";
    }
}
