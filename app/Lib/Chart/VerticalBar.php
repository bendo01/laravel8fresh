<?php
declare (strict_types = 1);
namespace App\Lib\Chart;

class VerticalBar
{
    public $title;
    public $tooltip;
    public $legend;
    public $toolbox;
    public $calculable;
    public $xAxis;
    public $yAxis;
    public $series;

    public function __construct()
    {
        $this->title = new \stdClass;
        $this->title->show = false;
        $this->tooltip = new \stdClass;
        $this->tooltip->trigger = 'axis';
        $this->legend = new \stdClass;
        $this->legend->data = [];
        $this->toolbox = new \stdClass;
        $this->toolbox->show = false;
        $this->calculable = true;
        $this->xAxis = [];
        $this->yAxis = [];
        $this->series = [];
        $this->createXAxis();
    }

    public function createLegend(string $name): bool
    {
        array_push($this->legend->data, $name);
        return true;
    }

    public function createXAxis(): bool
    {
        $xAxis = new \stdClass;
        $xAxis->type = 'value';
        $xAxis->boundaryGap = [0, 0.01];
        array_push($this->xAxis, $xAxis);
        return true;
    }

    public function createYAxis(array $data): bool
    {
        $yAxis = new \stdClass;
        $yAxis->type = 'category';
        $yAxis->data = $data;
        array_push($this->yAxis, $yAxis);
        return true;
    }

    public function addSeries(string $name, array $data): bool
    {
        $series = new \stdClass;
        $series->name = $name;
        $series->type = 'bar';
        $series->data = $data;
        array_push($this->series, $series);
        return true;
    }
}
