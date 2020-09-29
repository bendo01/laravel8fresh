<?php
declare (strict_types = 1);
namespace App\Lib\Chart;

class PieRose
{
    public $title;
    public $tooltip;
    public $legend;
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
        $this->legend->x          = 'center';
        $this->legend->y          = 'top';
        $this->legend->data       = [];
        $this->toolbox            = new \stdClass;
        $this->toolbox->show      = false;
        $this->calculable         = false;
        $this->series             = [];
    }

    public function addLegends(array $data): bool
    {
        $this->legend->data = $data;
        return true;
    }

    public function createSeries(string $name): bool
    {
        $series                                       = new \stdClass;
        $series->name                                 = $name;
        $series->type                                 = 'pie';
        $series->radius                               = [20, 120];
        $series->center                               = ['50%', '60%'];
        $series->roseType                             = 'radius';
        $series->width                                = '100%';
        $series->max                                  = 40;
        $series->itemStyle                            = new \stdClass;
        $series->itemStyle->normal                    = new \stdClass;
        $series->itemStyle->normal->label             = new \stdClass;
        $series->itemStyle->normal->label->show       = false;
        $series->itemStyle->normal->labelLine         = new \stdClass;
        $series->itemStyle->normal->labelLine->show   = false;
        $series->itemStyle->emphasis                  = new \stdClass;
        $series->itemStyle->emphasis->label           = new \stdClass;
        $series->itemStyle->emphasis->label->show     = false;
        $series->itemStyle->emphasis->labelLine       = new \stdClass;
        $series->itemStyle->emphasis->labelLine->show = false;
        $series->data                                 = [];
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
