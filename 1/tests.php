<?php

/* 
 * 
 */
abstract class Shapes {
    protected $color = '#000';
    protected $line_size = 1;
    private $dx = 1;
    private $dy = 1;
    
    protected function __construct (array $params) {
        $this->color = $params['color'];
        $this->line_size = $params['line_size'];
        $this->dx = $params['dx'];
        $this->dy = $params['dy'];
    }
    
    public static function getInstance ($type, array $params) {
        if (class_exists($type) && get_parent_class($type) == 'Shapes' )
            return new $type ($params);
    }
    
    abstract function jpg_draw();
    abstract function arr_draw();
}


/* 
 * 
 */
class Circle extends Shapes {
    private $radius = 10;
    
    protected function __construct (array $params) {
        $this->radius = $params['radius'];
    }
    public function jpg_draw() {;
        echo "Нарисован круг в формате jpg.";
    }
    public function arr_draw() {
        echo "Круг в формате массива точек.";
    }
}

/* 
 * 
 */
class Square extends Shapes {
    private $height = 10;
    
    protected function __construct (array $params) {
        $this->dx = $params['dx'];
        $this->height = $params['height'];
    }
    public function jpg_draw() {
        echo "Нарисован квадрат в формате jpg.";
    }
         
    public function arr_draw() {
        echo "Квадрат в формате массива точек.";
    }
}


//------------------------------------------------------------------

/* 
 * 
 */
class Controller {
    function run ($shapes) {
        foreach ($shapes as $shape) {
            $shape = Shapes::getInstance($shape['type'], $shape['params']);
            $shape->jpg_draw();
        }
    }
}

//------------------------------------------------------------------

$graph_app = new Controller();
$graph_app->run($_POST['params']);
