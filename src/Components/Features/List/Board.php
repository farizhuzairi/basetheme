<?php

namespace Hascha\BaseTheme\Components\Features\List;

use Closure;
use Illuminate\Support\Collection;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableContent;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Features\Traits\FeatureableEmptyList;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;
use Hascha\BaseTheme\Contracts\Component\ComponentableWithSynth;

class Board extends BaseComponent implements Componentable, FeatureableComponent, ComponentableWithSynth
{
    use Explained,
    Featureable,
    FeatureableSubject,
    FeatureableContent,
    FeatureableEmptyList,
    SetViewComponent;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $lists;

    /**
     * @var int
     */
    protected $counter;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var string
     */
    protected $info;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string|int|null
     */
    protected $spaces;

    /**
     * @var string|int
     */
    protected $lastKey;

    public function __construct(
        protected ?string $subject = null,
        protected ?string $introduction = null,
    )
    {
        parent::__construct(
            subject: $subject,
            introduction: $introduction
        );
    }
    
    protected function construction(ThemeService $service)
    {
        $this->lists = collect([]);
        $this->typeOfCounter();
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [];
    }

    /**
     * Build Data
     * @return void
     */
    public function buildUp()
    {
        $this->collection([
            'lists' => $this->lists->toArray(),
            'spaces' => $this->spaces ?? null,
            'dtoClass' => $this->dtoClass()
        ]);
    }

    /**
     * dtoClass
     * @return string
     */
    protected function dtoClass()
    {
        if(class_exists($this->dtoClass ?? "")) {
            return $this->dtoClass;
        }

        return \Hascha\BaseTheme\Data\BoardDto::class;
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.board.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "counter";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfCounter()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * type of info
     * @return static
     */
    public function typeOfInfo()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * Data Item
     * @return @static
     */
    public function list(string $title, ?Closure $closure = null)
    {
        if(! empty($title)) {

            $this->lastKey = \Illuminate\Support\Str::slug($title);
            if(! empty($closure)) $closure($this);

            $this->lists = $this->lists->put($this->lastKey, [
                'title' => $title,
                'info' => $this->info ?? null,
                'label' => $this->label ?? null,
                'counter' => $this->counter ?? 0,
                'icon' => $this->icon ?? 'hascha-chart-bar',
                'url' => $this->url ?? '#' . \Illuminate\Support\Str::slug($title),
                'typeOf' => $this->typeOf
            ]);

            unset($this->counter);
            unset($this->icon);
            unset($this->info);
            unset($this->label);
            unset($this->url);
            unset($this->lastKey);
        }

        return $this;
    }

    /**
     * spaces value
     * @return static
     */
    public function spaces(string|int $spaces)
    {
        $this->spaces = $spaces;
        return $this;
    }

    /**
     * set counter
     * @return @static
     */
    public function counter(int $counter)
    {
        $this->counter = $counter;
        return $this;
    }

    /**
     * set info
     * @return @static
     */
    public function info(string $info)
    {
        $this->info = $info;
        return $this;
    }

    /**
     * set icon
     * @return @static
     */
    public function icon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * set label
     * @return @static
     */
    public function label(string $label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * set url (direct to)
     * @return @static
     */
    public function url(string $url)
    {
        $this->url = $url;
        return $this;
    }
}