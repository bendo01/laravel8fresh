<?php
declare (strict_types = 1);
namespace App\Lib\Chart;

class Scatter
{
    public $title;
    public $tooltip;
    public $toolbox;
    public $dataZoom;
    public $legend;
    public $dataRange;
    public $grid;
    public $xAxis;
    public $yAxis;
    public $animation;
    public $series;

    public function __construct()
    {
        $this->title                                  = new \stdClass;
        $this->title->show                            = false;
        $this->tooltip                                = new \stdClass;
        $this->tooltip->trigger                       = 'axis';
        $this->tooltip->axisPointer                   = new \stdClass;
        $this->tooltip->axisPointer->show             = true;
        $this->tooltip->axisPointer->type             = 'cross';
        $this->tooltip->axisPointer->lineStyle        = new \stdClass;
        $this->tooltip->axisPointer->lineStyle->type  = 'dashed';
        $this->tooltip->axisPointer->lineStyle->width = 1;
        $this->toolbox                                = new \stdClass;
        $this->toolbox->show                          = false;
        $this->dataZoom                               = new \stdClass;
        $this->dataZoom->show                         = true;
        $this->dataZoom->start                        = 30;
        $this->dataZoom->end                          = 70;
        $this->legend                                 = new \stdClass;
        $this->legend->data                           = [];
        $this->dataRange                              = new \stdClass;
        $this->dataRange->min                         = 1;
        $this->dataRange->max                         = 10;
        $this->dataRange->orient                      = 'horizontal';
        $this->dataRange->y                           = 30;
        $this->dataRange->x                           = 'center';
        $this->dataRange->color                       = ['black','red'];
        $this->dataRange->splitNumber                 = 5;
        $this->grid                                   = new \stdClass;
        $this->grid->y2                               = 80;
        $this->xAxis                                  = [];
        $this->yAxis                                  = [];
        $this->animation                              = false;
        $this->series                                 = [];
    }

    public function createXAxis(array $data): bool
    {
        $xAxisProperties                  = new \stdClass;
        $xAxisProperties->type            = 'category';
        $xAxisProperties->boundaryGap     = true;
        $xAxisProperties->axisTick        = new \stdClass;
        $xAxisProperties->axisTick->onGap = false;
        $xAxisProperties->splitLine       = new \stdClass;
        $xAxisProperties->splitLine->show = false;
        $xAxisProperties->data            = $data;
        array_push($this->xAxis, $xAxisProperties);
        return true;
    }

    public function createYAxis(array $data): bool
    {
        $yAxisProperties       = new \stdClass;
        $yAxisProperties->type = 'category';
        $yAxisProperties->data = $data;
        array_push($this->yAxis, $yAxisProperties);
        return true;
    }

    public function createLegendData(array $data): bool
    {
        $this->legend->data = $data;
        return true;
    }

    public function createSeries(string $name, array $data): bool
    {
        $seriesItem = new \stdClass;
        $seriesItem->name = $name;
        $seriesItem->type = 'scatter';
        $seriesItem->data = $data;
        array_push($this->series, $seriesItem);
        return true;
    }

    public function setMaxValue(int $max): bool
    {
        $this->dataRange->max = $max;
        return true;
    }

    public function setSplitNumber(int $number): bool
    {
        $this->dataRange->splitNumber = $number;
        return true;
    }
}
