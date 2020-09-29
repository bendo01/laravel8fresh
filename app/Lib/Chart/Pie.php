<?php
declare (strict_types = 1);
namespace App\Lib\Chart;

class Pie
{
    public $title;
    public $legend;
    public $tooltip;
    public $toolbox;
    public $calculable;
    public $series;

    public function __construct()
    {
        $this->title              = new \stdClass;
        $this->title->show        = false;
        $this->tooltip            = new \stdClass;
        $this->tooltip->trigger   = 'item';
        $this->tooltip->formatter = '{a} <br/>{b} : {c} ({d}%)';
        $this->legend             = new \stdClass;
        $this->legend->orient     = 'vertical';
        $this->legend->x          = 'left';
        $this->legend->data       = [];
        $this->toolbox            = new \stdClass;
        $this->toolbox->show      = false;
        $this->calculable         = true;
        $this->series             = [];
    }

    public function addLegends(array $data): bool
    {
        $this->legend->data = $data;
        return true;
    }

    public function createSeries(string $name): bool
    {
        $series         = new \stdClass;
        $series->name   = $name;
        $series->type   = 'pie';
        $series->radius = '55%';
        $series->center = ['50%', '60%'];
        $series->data   = [];
        array_push($this->series, $series);
        return true;
    }

    public function addData(string $name, float $value): bool
    {
        $data        = new \stdClass;
        $data->name  = $name;
        $data->value = $value;
        array_push($this->series[0]->data, $data);
        return true;
    }
}
