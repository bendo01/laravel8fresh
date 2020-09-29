<?php
declare (strict_types = 1);
namespace App\Lib\Chart;

class MultiLine
{
    public $tooltip;
    public $legend;
    public $toolbox;
    public $calculable;
    public $xAxis;
    public $yAxis;
    public $series;


    public function __construct()
    {
        $this->tooltip          = new \stdClass;
        $this->tooltip->trigger = 'axis';
        $this->legend           = new \stdClass;
        $this->legend->textStyle = new \stdClass;
        $this->legend->textStyle->color = 'fff';
        $this->legend->data     = [];
        $this->toolbox          = new \stdClass;
        $this->toolbox->show    = false;
        $this->calculable       = true;
        $this->xAxis            = [];
        $this->yAxis            = [];
        $this->series           = [];
        $this->createYAxis();
    }

    public function createXAxis(array $data): bool
    {
        $xAxisItem                             = new \stdClass;
        $xAxisItem->nameTextStyle              = new \stdClass;
        $xAxisItem->nameTextStyle->color       = '#fff';
        $xAxisItem->axisLine                   = new \stdClass;
        $xAxisItem->axisLine->show             = true;
        $xAxisItem->axisLine->lineStyle        = new \stdClass;
        $xAxisItem->axisLine->lineStyle->color = '#fff';
        $xAxisItem->type                       = 'category';
        $xAxisItem->boundaryGap                = false;
        $xAxisItem->data                       = $data;
        array_push($this->xAxis, $xAxisItem);
        return true;
    }

    public function createYAxis()
    {
        $yAxisItem       = new \stdClass;
        $yAxisItem->nameTextStyle              = new \stdClass;
        $yAxisItem->nameTextStyle->color       = '#fff';
        $yAxisItem->axisLine                   = new \stdClass;
        $yAxisItem->axisLine->show             = true;
        $yAxisItem->axisLine->lineStyle        = new \stdClass;
        $yAxisItem->axisLine->lineStyle->color = '#fff';
        $yAxisItem->type = 'value';
        array_push($this->yAxis, $yAxisItem);
    }

    public function createSeries(string $name, array $data): bool
    {
        $seriesItem = new \stdClass;
        $seriesItem->name = $name;
        $seriesItem->type = 'line';
        $seriesItem->data = $data;
        array_push($this->series, $seriesItem);
        return true;
    }

    public function createLegendData(array $data):bool
    {
        $this->legend->data = $data;
        return true;
    }
}
