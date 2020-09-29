<?php
declare (strict_types = 1);
namespace App\Lib\Chart;

class Radar
{
    public $title;
    public $legend;
    public $toolbox;
    public $calculable;
    public $tooltip;
    public $polar;
    public $series;

    public function __construct()
    {
        $this->title            = new \stdClass;
        $this->title->text      = new \stdClass;
        $this->title->show      = false;
        $this->tooltip          = new \stdClass;
        $this->tooltip->trigger = 'item';
        $this->legend           = new \stdClass;
        $this->legend->orient   = 'vertical';
        $this->legend->x        = 'left';
        $this->legend->y        = 'bottom';
        $this->legend->textStyle = new \stdClass;
        $this->legend->textStyle->color = 'fff';
        $this->legend->data     = [];
        $this->calculable       = true;
        $this->toolbox          = new \stdClass;
        $this->toolbox->show    = false;
        $this->polar            = [];
        $this->series           = [];
        $this->createPolarItemIndicator();
    }

    public function createPolarItemIndicator(): bool
    {
        $itemIndicator            = new \stdClass;
        $itemIndicator->indicator = [];
        array_push($this->polar, $itemIndicator);
        return true;
    }

    public function createSeriesItem(string $name): bool
    {
        $seriesItem       = new \stdClass;
        $seriesItem->type = 'radar';
        $seriesItem->name = $name;
        $seriesItem->data = [];
        array_push($this->series, $seriesItem);
        return true;
    }

    public function addLegendData(string $name): bool
    {
        array_push($this->legend->data, $name);
        return true;
    }

    public function addPolarIndicator(string $name, float $max = 0): bool
    {
        $indicator                   = new \stdClass;
        $indicator->text             = $name;
        $indicator->max              = $max;
        $this->polar[0]->indicator[] = $indicator;
        return true;
    }

    public function addSeriesData(string $name, array $value): bool
    {
        $data                    = new \stdClass;
        $data->name              = $name;
        $data->value             = $value;
        $this->series[0]->data[] = $data;
        return true;
    }

    public function highestValue(array $datas): float
    {
        $highestValue = 0;
        foreach ($datas as $data) {
            if ($data > $highestValue) {
                $highestValue = $data;
            }
        }
        return $highestValue;
    }

    public function getHighestValue()
    {
        $highestValue = 0;
        foreach ($this->series[0]->data as $dataSeries) {
            foreach ($dataSeries->value as $value) {
                if ($value > $highestValue) {
                    $highestValue = $value;
                }
            }
        }
        return $highestValue;
    }
}
